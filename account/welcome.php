<?php 
ob_start();
include("../header.php");
if(!isset($_SESSION['Email']) && !isset($_SESSION['FullName'])){
    header("Location: /index.php");
    ob_flush();
    exit();
}
ob_flush();

?>
<!DOCTYPE html>
<html>
<style>
    h1 {
        padding: 16px 16px 16px 16px;   
    }
    
</style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome!</title>
        
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    </head>
    <body>
        <h1>You're Logged In!</h1>
        
        <br>Welcome <?php echo $_SESSION['FullName']; ?>!</br>
        
        
</body>
</html>