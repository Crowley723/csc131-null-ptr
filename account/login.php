<?php
ob_start();
include("../header.php");
if(isset($_SESSION['Email']) && isset($_SESSION['FullName'])) {
    // Redirect to welcome page
    header("Location: /account/welcome.php");
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
        <title>Log In</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">

    </head>
        <body>
        <div class="signup-box">
            <h2>Log In</h2>
            <div class="error-message">
                <?php
                if(isset($_SESSION['NeedEmail']) && $_SESSION['NeedEmail'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your email.</p>";
                }
                if(isset($_SESSION['NeedPassword']) && $_SESSION['NeedPassword'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your password.</p>";
                }
                if(isset($_SESSION['InvalidEmail']) && $_SESSION['InvalidEmail'] === TRUE){
                    echo "<p style=\"color:red;\">Invalid email or password. Please try again.</p>";
                }
                if(isset($_SESSION['InvalidPassword']) && $_SESSION['InvalidPassword'] === TRUE){
                    echo "<p style=\"color:red;\">Your password is of the incorrect format.</p>";
                }
                if(isset($_SESSION['WrongCredentials']) && $_SESSION['WrongCredentials'] === TRUE){
                    echo "<p style=\"color:red;\">Invalid email or password. Please try again.</p>";
                }

                ?>
            </div>
            <form action="/account/handleLogin.php" method="post" class="form-container">

                <label for="email" class="entry-label">Email: </label> 
                <input type="email" id="email" name="email" placeholder="Enter Email" required><br><br>

                <label for="password1" class="entry-label">Password: </label><br>
                <input type="password" id="password1" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" required><br><br>

                <label class="rememberme">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                

                <button id="submit">Submit</button>
            </form>
            <div class="separator">
                <div class="line"></div>
                <div class="text">OR</div>
                <div class="line"></div>
            </div>
            <div class="existingAccount" style="float: center"><span>Need an account? </span><a class="signup-button" href="/account/signup.php">Sign up</a></div></div>

        </div>
    </body>
</body>
</html>