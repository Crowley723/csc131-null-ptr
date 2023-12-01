<?php
session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['Logout Success'] = TRUE;
header("Location: /index.php");
exit();
?>