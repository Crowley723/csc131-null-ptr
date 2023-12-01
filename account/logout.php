<?php
session_start();

header("Location: /index.php");
session_unset();
session_destroy();
?>