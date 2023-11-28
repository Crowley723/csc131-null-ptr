<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131FORUMDBNAME");
$DBusername = getenv("CSC131FORUMDBUSER");
$DBpassword = getenv("CSC131FORUMDBPASS");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    ob_start();
    //echo " Get Request!";
    
    
    try{
        $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);
        if ($databaseConnection ->connect_error) {
            throw new Exception("Database Connection Error, Error No.: ".$databaseConnection->connect_errno." | ".$databaseConnection->connect_error);
        }

        //$getForumPostsQuery = "SELECT * FROM `forum-posts` ORDER BY TIMESTAMP"; //get all forum posts.

        

        if(!isset($_SESSION['FullName']) || !isset($_SESSION['Email'])){
            $getForumPostsQuery = mysqli_prepare($databaseConnection, 
            "SELECT csc131.`forum-posts`.ID, csc131.`forum-posts`.`AUTHOR`, csc131.`Users`.`Full Name`, csc131.`forum-posts`.`POST BODY`, csc131.`forum-posts`.LIKES, csc131.`forum-posts`.`TIMESTAMP`
            FROM csc131.`forum-posts`
            JOIN csc131.`Users` ON csc131.`forum-posts`.`AUTHOR` = csc131.`Users`.`Email`
            ORDER BY csc131.`forum-posts`.`TIMESTAMP` DESC;
            ");//get all forum posts, with Name of author instead of email
        }else if($currentUserEmail = $_SESSION['Email']){
            $getForumPostsQuery = mysqli_prepare($databaseConnection,"
            SELECT
                forum_posts.ID,
                forum_posts.AUTHOR,
                Users.`Full Name`,
                forum_posts.`POST BODY`,
                forum_posts.LIKES,
                forum_posts.`TIMESTAMP`,
                CASE WHEN likes.post_id IS NOT NULL THEN 1 ELSE 0 END AS user_liked
            FROM
                csc131.`forum-posts` forum_posts
            JOIN
                csc131.`Users` Users ON forum_posts.`AUTHOR` = Users.`Email`
            LEFT JOIN
                csc131.likes likes ON forum_posts.ID = likes.post_id AND likes.user_id = ?
            ORDER BY
                forum_posts.`TIMESTAMP` DESC;
            ");//get all posts, with author NAME, also tells you if the current user (if any) has liked the post
            mysqli_stmt_bind_param($getForumPostsQuery, "s",$currentUserEmail);
        }
        

        if($postsResult = mysqli_execute($getForumPostsQuery)){
            $outputData = array();
            if(!isset($_SESSION['FullName']) || !isset($_SESSION['Email'])){
                mysqli_stmt_bind_result($getForumPostsQuery, $row_ID, $row_Email, $row_FullName, $row_POST_BODY, $row_LIKES, $row_TIMESTAMP); 
                while(mysqli_stmt_fetch($getForumPostsQuery)){;
                    $row_Identicon = generateIdenticon($row_Email);
                    $outputData[] = array(
                        'ID' => $row_ID,
                        'FULL NAME' => $row_FullName,
                        'POST BODY' => $row_POST_BODY,
                        'LIKES' => $row_LIKES,
                        'ICON' => $row_Identicon,
                        'TIMESTAMP' => $row_TIMESTAMP,
                    );
                }
            }else{
               mysqli_stmt_bind_result($getForumPostsQuery, $row_ID, $row_Email, $row_FullName, $row_POST_BODY, $row_LIKES, $row_TIMESTAMP, $row_UserLiked); 
               while(mysqli_stmt_fetch($getForumPostsQuery)){;
                $row_Identicon = generateIdenticon($row_Email);
                $outputData[] = array(
                    'ID' => $row_ID,
                    'FULL NAME' => $row_FullName,
                    'POST BODY' => $row_POST_BODY,
                    'LIKES' => $row_LIKES,
                    'ICON' => $row_Identicon,
                    'TIMESTAMP' => $row_TIMESTAMP,
                    'USER LIKED' => $row_UserLiked
                );
            }
            }

            
            

        
        header('Content-Type: application/json');
        echo json_encode($outputData, JSON_THROW_ON_ERROR);

        }
        //echo "After postResult";
        $databaseConnection->close();
        ob_flush();
        exit();
        
    }catch(Exception $e){
        echo "Internal Server Error: " . $e->getMessage();
        ob_flush();
        exit();
    }
        
}else{
    http_response_code(501);
    ob_flush();
    exit();
}


function generateIdenticon($identifier, $size = 128) {
    $hash = md5($identifier);
    $hashValues = array_map('hexdec', str_split($hash, 2));


    $image = imagecreatetruecolor($size, $size);
    $whiteColor = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $whiteColor);

    $gridSize = 4;
    $cellSize = $size / $gridSize;
    $color = imagecolorallocate($image, $hashValues[0] % 256, $hashValues[1] % 256, $hashValues[2] % 256);


    $mask = imagecreatetruecolor($size, $size);
    $maskColor = imagecolorallocate($mask, 0, 0, 0);
    imagecolortransparent($mask, $maskColor);
    imagefilledellipse($mask, $size / 2, $size / 2, $size, $size, $maskColor);


    imagecopymerge($image, $mask, 0, 0, 0, 0, $size, $size, 100);


    for ($i = 0; $i < $gridSize; $i++) {
        for ($j = 0; $j < $gridSize; $j++) {
            $index = $i * $gridSize + $j;
            $distanceX = abs($j - $gridSize / 2 + 0.5);
            $distanceY = abs($i - $gridSize / 2 + 0.5);
            $distance = sqrt($distanceX * $distanceX + $distanceY * $distanceY);

            if ($distance < $gridSize / 2) {
                $rectangleColor = $hashValues[$index] % 2 === 0 ? $color : $whiteColor;


                imagefilledrectangle(
                    $image,
                    $j * $cellSize,
                    $i * $cellSize,
                    ($j + 1) * $cellSize,
                    ($i + 1) * $cellSize,
                    $rectangleColor
                );

                $mirrorIndex = $gridSize - $j - 1;
                imagefilledrectangle(
                    $image,
                    ($gridSize - $j - 1) * $cellSize,
                    $i * $cellSize,
                    ($gridSize - $j) * $cellSize,
                    ($i + 1) * $cellSize,
                    $rectangleColor
                );
            }
        }
    }

    ob_start();
    imagepng($image);
    imagedestroy($image);
    imagedestroy($mask);
    $imageData = ob_get_clean(); 
    $base64 = base64_encode($imageData);

    return $base64;
}


?>