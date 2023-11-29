<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131FORUMDBNAME");
$DBusername = getenv("CSC131FORUMDBUSER");
$DBpassword = getenv("CSC131FORUMDBPASS");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();
    if(!isset($_SESSION['FullName']) || !isset($_SESSION['Email'])){
        echo "You must be logged in to like posts.";
        $_SESSION['MustBeLoggedIn'] = TRUE;
        http_response_code(401);
        header(("Location: /forum.php"));
        ob_flush();
        exit;
    }
    $currentUserEmail = $_SESSION['Email'];
    $postID = $_POST["PostID"];

    try{
        $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);
        if ($databaseConnection ->connect_error) {
            throw new Exception("Database Connection Error, Error No.: ".$databaseConnection->connect_errno." | ".$databaseConnection->connect_error);
        }
        checkPreviouslyLiked($databaseConnection, $postID, $currentUserEmail);


        $createLikeEntryQuery = mysqli_prepare($databaseConnection, "
        INSERT INTO csc131.likes (user_id, post_id) VALUES (?, ?);
        ");

        mysqli_stmt_bind_param($createLikeEntryQuery,"ss", $currentUserEmail, $postID);
        if(mysqli_stmt_execute($createLikeEntryQuery)){
            mysqli_stmt_close($createLikeEntryQuery);

        }else{
            $databaseConnection->close();
            mysqli_stmt_close($createLikeEntryQuery);
            http_response_code(500);
            ob_flush();
            exit();
        }



        $incrementLikeCounterQuery = mysqli_prepare($databaseConnection, "UPDATE csc131.`forum-posts` SET `LIKES` = `LIKES` + 1 WHERE `ID` = ?");
        mysqli_stmt_bind_param($incrementLikeCounterQuery,"s", $postID);
        
        if(mysqli_stmt_execute($incrementLikeCounterQuery)){
            $databaseConnection->close();
            mysqli_stmt_close($incrementLikeCounterQuery);
            http_response_code(200);
            ob_flush();
            exit();
        }else{
            $databaseConnection->close();
            mysqli_stmt_close($incrementLikeCounterQuery);
            http_response_code(500);
            ob_flush();
            exit();
        }




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

function checkPreviouslyLiked($databaseConnection, $postID, $currentUserEmail){

    
    
    if($findPreviousLikesQuery = mysqli_prepare($databaseConnection, "SELECT csc131.`likes`.`post_id`
    FROM csc131.`likes`
    WHERE csc131.`likes`.`post_id` = ?
    AND csc131.`likes`.`user_id` = ?;
    ")){
        mysqli_stmt_bind_param($findPreviousLikesQuery, "ss", $postID, $currentUserEmail);
        
        if(mysqli_stmt_execute($findPreviousLikesQuery)){
            mysqli_stmt_bind_result($findPreviousLikesQuery,$returnPostID);
            mysqli_stmt_fetch($findPreviousLikesQuery);
            mysqli_stmt_close($findPreviousLikesQuery);
            if($returnPostID == $postID){
                
                $deletePreviousLikeQuery = mysqli_prepare($databaseConnection, "
                DELETE FROM csc131.`likes`
                WHERE csc131.`likes`.`post_id` = ?
                AND csc131.`likes`.`user_id` = ?;
                ");
                mysqli_stmt_bind_param($deletePreviousLikeQuery, "ss", $postID, $currentUserEmail);

                if(mysqli_stmt_execute($deletePreviousLikeQuery)){
                    mysqli_stmt_close($deletePreviousLikeQuery);
                }

                $decrementLikeCounter = mysqli_prepare($databaseConnection, "UPDATE csc131.`forum-posts` SET `LIKES` = `LIKES` - 1 WHERE `ID` = ?");
                mysqli_stmt_bind_param($decrementLikeCounter, "s", $postID);
                if(mysqli_stmt_execute($decrementLikeCounter)){
                    mysqli_stmt_close($decrementLikeCounter);
                    $databaseConnection->close();
                    ob_flush();
                    exit(); 
                }
                mysqli_stmt_close($decrementLikeCounter);
                $databaseConnection->close();
                ob_flush();
                exit();
            }
        }else{
            mysqli_stmt_close($findPreviousLikesQuery);
            echo "Error Executing findPreviousLikesQuery";
            $databaseConnection->close();
            ob_flush();
            exit();
        }
    }else{
        echo "Error Preparing findPreviousLikesQuery";
    }
    
    return false;
}

?>