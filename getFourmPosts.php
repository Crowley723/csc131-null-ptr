<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    ob_start();
        

    ob_flush();
}else{
    http_response_code(503);
    exit();
}


?>