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
        <?php include("../header.php") ?>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    </head>
    <body>
        <div class="signup-box">
            <h2>Sign up for an account!</h2>
            <form action="/account/handleSignup.php" method="post" class="form-container">

                <div style="display: inline-block"><label for="firstName" class="entry-label" style="float: left">Full Name: </label> <div class="existingAccount" style="float: right"><span>Already have an account? </span><a href="/account/login.php">Log In</a></div></div><br>
                <input type="text" id="firstName" name="firstName" placeholder="Enter Full Name" required><br><br>

                <label for="email" class="entry-label">Email: </label><br>
                <input type="email" id="email" name="email" placeholder="Enter Email" required><br><br>

                <label for="studentID" class="entry-label">Student ID: </label><br>
                <input type="text" id="studentID" name="studentID" placeholder="Enter Student ID" inputmode="numeric" pattern="[0-9]+" required/><br><br>

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
                <div id="retype-password" class="password-validation">
                    <br>Your passwords do not match.</br>
                </div>

                <button id="submit">Submit</button>
            </form>
            <!--div class="separator">
                <div class="line"></div>
                <div class="text">OR</div>
                <div class="line"></div>
            </div//-->
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