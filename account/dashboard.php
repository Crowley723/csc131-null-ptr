<?php
ob_start();
include("../header.php");
if(!isset($_SESSION['Email']) || !isset($_SESSION['FullName'])) {
    // Redirect to welcome page
    header("Location: /account/login.php");
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
    .account-name, .account-email, .account-studentid{
        text-align: left;
    }
    .account-info{
        padding: 16px 16px 0;
        display: flex;
        flex-direction: column;
        justify-content: left;
        margin-bottom: 0;
        text-align: left;

    }
    .account-info p {
        color: var(--graymd);
    }
    
</style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">

    </head>
        <body>
        <div class="signup-box">
            <h2>Account</h2>
            <div class="account-info">
                <div class="account-name" >
                    <label for="full-name">Full Name: </label>
                    <p style="margin-left: 10px"><?php echo $_SESSION['FullName']?></p>
                    </div>
                <div class="account-email">
                    <label for="full-name">Full Name: </label>
                    <p style="margin-left: 10px"><?php echo $_SESSION['Email']?></p>
                </div>
                <div class="account-studentid">
                    <label for="full-name">Student ID: </label>
                    <p style="margin-left: 10px"><?php echo $_SESSION['StudentID']?></p>
                </div>
            </div>
            <div class="error-message">
                <?php
                if(isset($_SESSION['NeedOldPassword']) && $_SESSION['NeedOldPassword'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your existing password.</p>";
                    $_SESSION['NeedOldPassword'] = FALSE;
                }
                if(isset($_SESSION['NeedNewPassword']) && $_SESSION['NeedNewPassword'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your new password.</p>";
                    $_SESSION['NeedNewPassword'] = FALSE;
                }
                if(isset($_SESSION['PasswordsMustMatch']) && $_SESSION['PasswordsMustMatch'] === TRUE){
                    echo "<p style=\"color:red;\">Your new passwords must match.</p>";
                    $_SESSION['PasswordsMustMatch'] = FALSE;
                }
                if(isset($_SESSION['InvalidNewPassword']) && $_SESSION['InvalidNewPassword'] === TRUE){
                    echo "<p style=\"color:red;\">Your new password is invalid.</p>";
                    $_SESSION['InvalidNewPassword'] = FALSE;
                }

                if(isset($_SESSION['WrongCredentials']) && $_SESSION['WrongCredentials'] === TRUE){
                    echo "<p style=\"color:red;\">Your password is incorrect.</p>";
                    $_SESSION['WrongCredentials'] = FALSE;
                }
                if(isset($_SESSION['PasswordChanged']) && $_SESSION['PasswordChanged'] === TRUE){
                    echo "<p style=\"color:var(--stgr);\">Password changed successfully.</p>";
                    $_SESSION['PasswordChanged'] = FALSE;
                }
                ?>
            </div>
            <form action="/account/handleChangePassword.php" method="post" class="form-container">

                <label for="old-password" class="entry-label">Old Password: </label> 
                <input type="password" id="old-password" name="old-password" placeholder="Enter Old Password" required><br><br>

                <label for="password1" class="entry-label">New Password: </label><br>
                <input type="password" id="password1" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" required><br><br>

                <label for="password2" class="entry-label">Retype New Password: </label><br>
                <input type="password" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" required><br><br>
                
                <button id="submit">Submit</button>
            </form>
            
        </div>
    </body>
</body>
</html>
<?php include("../footer.php") ?>