<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERSDB");
$DBusername = getenv("CSC131USERSDBUSER");
$DBpassword = getenv("CSC131USERSDBPASS");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $email = $_POST["email"];
    $password = $_POST["password"];
    $studentID = $_POST["studentID"];

    if (empty($username) || empty($email) || empty($password) || empty($studentID)) {
        echo "All fields are required.";
        exit;
    }
    if(!validateName($fullName)){
        echo "Invalid Name.";
        exit();
    }
    if(!validateEmail($email)){
        echo "Invalid Email.";
        exit();
    }
    if(!validatePassword($password)){
        echo "Invalid Password.";
        exit();
    }
    if(!validateStudentID($studentID)){
        echo "Invalid StudentID.";
        exit();
    }

    

    


    $databaseConnection = new mysqli($DBhostname, $DBusername, $DBpassword, $usersDB);

    if ($databaseConnection->connect_error) {
        die("Connection failed: " . $databaseConnection->connect_error);
    }
    $bcryptOptions = [ 
        'cost' => 12, 
    ]; 
      
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $bcryptOptions); 
    //prepared sql statement
    $insertUserQuery = $databaseConnection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insertUserQuery->bind_param("sss", $username, $email, $hashedPassword);

    if ($insertUserQuery->execute() === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $insertUserQuery->error;
    }

    // Close the prepared statement and the database connection
    $insertUserQuery->close();
    $databaseConnection->close();
}
function validateEmail($email) {
    // Define a regular expression for basic email validation
    $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    // Use the preg_match function to test the email against the regular expression
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}
function validateName($name) {
    // Define a regular expression for basic email validation
    $nameRegex = "/^[a-zA-Z' -]+$/";
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    // Use the preg_match function to test the email against the regular expression
    if (preg_match($nameRegex, $name)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}
function validatePassword($password) {
    // Define a regular expression for basic email validation
    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    // Use the preg_match function to test the email against the regular expression
    if (preg_match($passwordRegex, $password)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}
function validateStudentID($studentID) {
    // Define a regular expression for basic email validation
    $studentIDRegex = "/^[0-9]{8}$/";

    // Use the preg_match function to test the email against the regular expression
    if (preg_match($studentIDRegex, $studentID)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}




?>