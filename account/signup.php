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
        <h1>Signup Page!</h1>
        <div class="signup-box">
            <br> This is some text</br>
            <form action="/handleSignup.php" class="form-container">
                <label for="firstName" class="entry-label">First Name: </label><br>
                <input type="text" id="firstName" name="firstName" placeholder="Enter Full Name"><br><br>
                <label for="email" class="entry-label">Email: </label><br>
                <input type="email" id="email" name="email" placeholder="Enter Email"><br><br>
                <label for="password1" class="entry-label">Password: </label><br>
                <input type="password" id="password1" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" onchange="validatePassword()"><br><br>
                <div class="password-validation" style="hidden: block;">
                    <br>You must have the following:</br>
                    <br id="minCharMsg" style="display: block;">At least 8 characters</br>
                    <br id="minUpLowLetterMsg" style="display: block;">At least 1 upper and lowercase letters.</br>
                    <br id="minNumMsg" style="display: block;">At least 1 number</br>
                </div>
                <label for="password2" class="entry-label">Retype Password: </label><br>
                <input type="password" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Retype Password"><br><br>

            </form>
        </div>
    </body>
    <script>
var pwValidation = document.getElementById("password-validation");
var password1 = document.getElementById("password1");
var password2 = document.getElementById("password2");
var minCharRegex = /^.{8,}$/;
var minUpLowerRegex = /^(?=.*[a-z])(?=.*[A-Z]).+$/;
var minNumRegex = /\d+/;
var minCharMsg = document.getElementById("minCharMsg");
var minUpLowLetterMsg = document.getElementById("minUpLowLetterMsg");
var minNumMsg = document.getElementById("minNumMsg");

//add string concatenation and display: hidden for password validation display
function validatePassword(){
    if(!passwordHasMinimumCharacters()){
        minCharMsg.style.display = "none";
    } else{
        minCharMsg.style.display = "block";  
    }
    if(!passwordHasMinimumUpperAndLowerLetters()){
        minUpLowLetterMsg.style.display = "none";
    } else{
        minUpLowLetterMsg.style.display = "block";  
    }
    if(!passwordHasMinimumNumbers()){
        minNumMsg.style.display = "none";
    } else{
        minNumMsg.style.display = "block";  
    }
}

function passwordHasMinimumCharacters(){
    return minCharRegex.text(password1);
}
function passwordHasMinimumUpperAndLowerLetters(){
    return minUpLowerRegex.text(password1);
}
function passwordHasMinimumNumbers(){
    return minNumRegex.test(password1);
}

    </script>
</html>