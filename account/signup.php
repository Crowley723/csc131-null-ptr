<?php include("../header.php") ?>
<!DOCTYPE html>
<html>
<style>
    h1 {
        padding: 16px 16px 16px 16px;   
    }
    
</style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    </head>
    <body>
        <div class="signup-box">
            <h2>Sign up for an account!</h2>
                <div class="error-message">
                <?php 
                if(isset($_SESSION['NeedName']) && $_SESSION['NeedName'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your name.</p>";
                    $_SESSION['NeedName'] = FALSE;
                }
                if(isset($_SESSION['NeedEmail']) && $_SESSION['NeedEmail'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your email.</p>";
                    $_SESSION['NeedEmail'] = FALSE;
                }
                if(isset($_SESSION['NeedPassword']) && $_SESSION['NeedPassword'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your password.</p>";
                    $_SESSION['NeedPassword'] = FALSE;
                }
                if(isset($_SESSION['NeedStudentID']) && $_SESSION['NeedStudentID'] === TRUE){
                    echo "<p style=\"color:red;\">You must include your student ID.</p>";
                    $_SESSION['NeedStudentID'] = FALSE;
                }

                if(isset($_SESSION['InvalidName']) && $_SESSION['InvalidName'] === TRUE){
                    echo "<p style=\"color:red;\">Invalid Name</p>";
                    $_SESSION['InvalidName'] = FALSE;
                }
                if(isset($_SESSION['InvalidEmail']) && $_SESSION['InvalidEmail'] === TRUE){
                    echo "<p style=\"color:red;\">Invalid Email</p>";
                    $_SESSION['InvalidEmail'] = FALSE;
                }
                if(isset($_SESSION['InvalidPassword']) && $_SESSION['InvalidPassword'] === TRUE){
                    echo "<p style=\"color:red;\">Invalid Password</p>";
                    $_SESSION['InvalidPassword'] = FALSE;
                }
                if(isset($_SESSION['InvalidStudentID']) && $_SESSION['InvalidStudentID'] === TRUE){
                    echo "<p style=\"color:red;\">Invalid StudentId</p>";
                    $_SESSION['InvalidStudentID'] = FALSE;
                }

                if(isset($_SESSION['AccountExists']) && $_SESSION['AccountExists'] === TRUE){
                    echo "<p style=\"color:red;\">An account with that email already exists. Try logging in.</p>";
                    $_SESSION['AccountExists'] = FALSE;
                }

                ?>

                </div>
            <form action="/account/handleSignup.php" method="post" class="form-container">

                <label for="firstName" class="entry-label" style="float: left">Full Name: </label> 
                <input type="text" id="firstName" name="firstName" placeholder="Enter Full Name" required><br><br>

                <label for="email" class="entry-label">Email: </label><br>
                <input type="email" id="email" name="email" placeholder="Enter Email" required><br><br>

                <label for="studentID" class="entry-label">Student ID: </label><br>
                <input type="text" id="studentID" name="studentID" placeholder="Enter Student ID" inputmode="numeric" pattern="^\d{9}$" required/><br><br>

                <label for="password1" class="entry-label">Password: </label><br>
                <input type="password" id="password1" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" onkeyup="checkPassword()" required><br><br>

                <div id="pw-validation-header" class="password-validation">
                    <p id="pw-validation-header2">Your password must have the following:</p>
                    <ul>
                    <li id="length">At least 8 characters</li>
                    <li id="uppercase" >At least one uppercase letter</li>
                    <li id="lowercase">At least one lowercase letter</li>
                    <li id="number">At least one number</li>
                    </ul>
                </div>

                <label for="password2" class="entry-label">Retype Password: </label><br>
                <input type="password" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Retype Password" onkeyup="matchPasswords()" required><br><br>
                <div id="retype-password" class="password-validation"style="color:red;>
                    <br">Your passwords do not match.</br>
                </div>

                <button id="submit">Submit</button>
            </form>
            <div class="separator">
                <div class="line"></div>
                <div class="text">OR</div>
                <div class="line"></div>
            </div>
            <div class="existingAccount" style="float: center"><span>Already have an account? </span><a class="signup-button" href="/account/login.php">Log In</a></div></div><br>
            
        </div>
    </body>
    <script>
        function matchPasswords(){
            var redonePassword = document.getElementById("password2").value;
            var password = document.getElementById("password1").value;
            var passwordMessage = document.getElementById("retype-password");
            
            if(password.trim() === redonePassword.trim()){
                passwordMessage.style.display = "none";
                console.log("pw match message: none");
                console.log(password + " : " + redonePassword);

            } else{
                console.log("pw match message: inline");
                console.log(password + " : " + redonePassword);
                passwordMessage.style.display = "inline";

            }
        }
        function checkPassword() {
            var header = document.getElementById("pw-validation-header");
            var password = document.getElementById("password1").value;
            var lengthRequirement = document.getElementById("length");
            var uppercaseRequirement = document.getElementById("uppercase");
            var lowercaseRequirement = document.getElementById("lowercase");
            var numberRequirement = document.getElementById("number");

            // Check length
            if (password.length >= 8) {
                lengthRequirement.style.display = "none";
            } else {
                lengthRequirement.style.display = "list-item";
            }

            // Check uppercase
            if (/[A-Z]/.test(password)) {
                uppercaseRequirement.style.display = "none";
            } else {
                uppercaseRequirement.style.display = "list-item";
            }

            // Check lowercase
            if (/[a-z]/.test(password)) {
                lowercaseRequirement.style.display = "none";
            } else {
                lowercaseRequirement.style.display = "list-item";
            }

            // Check number
            if (/\d/.test(password)) {
                numberRequirement.style.display = "none";
            } else {
                numberRequirement.style.display = "list-item";
            }
            if (password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /\d/.test(password)) {
                header.style.display = "none";
                console.log("header: none;");
            } else {
                header.style.display = "block";
            }
            matchPasswords();
        }
    </script>
</html>
<?php include("../footer.php") ?>