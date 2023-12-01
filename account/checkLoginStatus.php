<?php
session_start();
ob_start();
if(isset($_SESSION['Email']) && isset($_SESSION['FullName'])) {
    http_response_code(200);
    echo "authenticated";
    ob_flush();
    exit();
} else{
    http_response_code(200);
    echo "unauthenticated";
    ob_flush();
    exit();
}

?>