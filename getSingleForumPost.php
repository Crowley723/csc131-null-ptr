<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131FORUMDBNAME");
$DBusername = getenv("CSC131FORUMDBUSER");
$DBpassword = getenv("CSC131FORUMDBPASS");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    ob_start();
    if(!isset($_SESSION['FullName']) || !isset($_SESSION['Email'])){
        $_SESSION['MustBeLoggedIn'] = TRUE;
        http_response_code(401);
        header(("Location: /forum.php"));
        ob_flush();
        exit;
    }
    $currentUserEmail = $_SESSION['Email'];

    try {
        $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);
        if ($databaseConnection->connect_error) {
            throw new Exception("Database Connection Error, Error No.: " . $databaseConnection->connect_errno . " | " . $databaseConnection->connect_error);
        }

        // Check if the PostID is set in the GET parameters
        if (isset($_GET['PostID'])) {
            $postID = $_GET['PostID'];

            // Prepare the SQL statement to get a single post based on its ID
            
            $getSinglePostQuery = mysqli_prepare($databaseConnection, "
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
                WHERE
                    forum_posts.ID = ?
                ORDER BY
                    forum_posts.`TIMESTAMP` DESC;
            ");
            mysqli_stmt_bind_param($getSinglePostQuery, "ss", $currentUserEmail, $postID); // Assuming $currentUserEmail is available if needed
            if ($singlePostResult = mysqli_execute($getSinglePostQuery)) {
                $outputData = array();
                mysqli_stmt_bind_result($getSinglePostQuery, $row_ID, $row_Email, $row_FullName, $row_POST_BODY, $row_LIKES, $row_TIMESTAMP, $row_UserLiked);
                if (mysqli_stmt_fetch($getSinglePostQuery)) {
                    $row_Identicon = generateIdenticon($row_Email);
                    $outputData = array(
                        'ID' => $row_ID,
                        'FULL NAME' => $row_FullName,
                        'POST BODY' => $row_POST_BODY,
                        'LIKES' => $row_LIKES,
                        'ICON' => $row_Identicon,
                        'TIMESTAMP' => $row_TIMESTAMP,
                        'USER LIKED' => $row_UserLiked
                    );
                }

                header('Content-Type: application/json');
                echo json_encode($outputData, JSON_THROW_ON_ERROR);
                exit();
            }
        } else {
            // Handle the case when PostID is not set in the GET parameters
            echo "PostID is not provided.";
            exit();
        }

        $databaseConnection->close();
        ob_flush();
        exit();
    } catch (Exception $e) {
        echo "Internal Server Error: " . $e->getMessage();
        ob_flush();
        exit();
    }
} else {
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