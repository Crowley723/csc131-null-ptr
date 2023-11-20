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

        $getForumPostsQuery = "SELECT * FROM `forum-posts` ORDER BY TIMESTAMP";
        //echo " Before postResult";
        //echo $getForumPostsQuery;
        if($postsResult = $databaseConnection->query($getForumPostsQuery)){
            //echo " Inside postResult";
            $outputData = array();
            while($row = $postsResult->fetch_assoc()){
                $row_ID = $row["ID"];
                $row_AUTHOR = $row["AUTHOR"];
                $row_POST_BODY = $row["POST BODY"];
                $row_LIKES = $row["LIKES"];
                $row_IMAGE_PATH = $row["IMAGE PATH"];
                $row_TIMESTAMP = $row["TIMESTAMP"];
                $outputData[] = array(
                    'ID' => $row_ID,
                    'AUTHOR' => $row_AUTHOR,
                    'POST BODY' => $row_POST_BODY,
                    'LIKES' => $row_LIKES,
                    'IMAGE PATH' => $row_IMAGE_PATH,
                    'TIMESTAMP' => $row_TIMESTAMP
                );
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
    http_response_code(400);
    ob_flush();
    exit();
}


?>