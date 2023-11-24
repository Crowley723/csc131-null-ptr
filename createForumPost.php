<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131FORUMDBNAME");
$DBusername = getenv("CSC131FORUMDBUSER");
$DBpassword = getenv("CSC131FORUMDBPASS");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();

    if(!isset($_SESSION['FullName']) || !isset($_SESSION['Email'])){
        echo "You must be logged in to create posts.";
        $_SESSION['MustBeLoggedIn'] = TRUE;
        http_response_code(401);
        header(("Location: /forum.php"));
        ob_flush();
        exit;
    }
    
    $postBody = htmlspecialchars($_POST['postText'], ENT_QUOTES, 'UTF-8');
    $userEmail = $_SESSION['Email'];
    $userName = $_SESSION['FullName'];
    $postID = hash('sha256', $userEmail . $postBody);

    if (empty($postBody)) {
        echo "Post cannot be empty.";
        $_SESSION['NeedPost'] = TRUE;
        header(("Location: /forum.php"));
        http_response_code(400);
        ob_flush();
        exit;
    }
    try{
        $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);
        if ($databaseConnection ->connect_error) {
            throw new Exception("Database Connection Error, Error No.: ".$databaseConnection->connect_errno." | ".$databaseConnection->connect_error);
        }
        checkPostExists($databaseConnection, $postID);
        

        $createForumPostsQuery = mysqli_prepare($databaseConnection, "INSERT INTO csc131.forum-posts (`ID`, `AUTHOR`, `POST BODY`) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($createForumPostsQuery, "sss", $postID, $userName, $postBody);
        if(mysqli_stmt_execute($createForumPostsQuery)){
            header("Location: /forum.php");
            $databaseConnection->close();
            http_response_code(200);
            ob_flush();
            exit();
        } else{
            header("Location: /forum.php");
            $_SESSION['UnknownError'] = TRUE;
            http_response_code(500);
            $databaseConnection->close();
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

function checkPostExists($databaseConnection, $postID){

    $findExistingForumPostQuery = mysqli_prepare($databaseConnection, "Select `ID` FROM csc131.forum-posts where `ID` = ?");
    mysqli_stmt_bind_param($findExistingForumPostQuery, "s", $postID);

    if(mysqli_stmt_execute($findExistingForumPostQuery)){
        mysqli_stmt_bind_result($findExistingForumPostQuery, $resultID);
        mysqli_stmt_fetch($findExistingForumPostQuery);
        if($resultID == $postID){
            header(("Location: /account/forum.php"));
            $_SESSION['DuplicatePost'] = TRUE;
            $databaseConnection->close();
            ob_flush();
            exit();
        }
        mysqli_stmt_close($findExistingForumPostQuery);
    }else{
        header(("Location: /account/forum.php"));
        $_SESSION['UnknownError'] = TRUE;
        mysqli_stmt_close($findExistingForumPostQuery);
        $databaseConnection->close();
        ob_flush();
        exit();
    }
    return false;
}


?>