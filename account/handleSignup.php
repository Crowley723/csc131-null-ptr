<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, 'UTF-8');
    $email = $_POST["email"];
    $password = $_POST["password1"];
    $studentID = $_POST["studentID"];

    if (empty($fullName)) {
        echo "Full Name is required.";
        exit;
    }
    
    if (empty($email)) {
        echo "Email is required.";
        exit;
    }
    
    if (empty($password)) {
        echo "Password is required.";
        exit;
    }
    
    if (empty($studentID)) {
        echo "Student ID is required.";
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
    if(!passwordMatchesPattern($password)){
        echo "Invalid Password.";
        echo $password;
        exit();
    }
    if(!validateStudentID($studentID)){
        echo "Invalid StudentID.";
        exit();
    }

    

    


    $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);

    if (!$databaseConnection) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }else{
        echo 'Connected to DB';
    }
    $bcryptOptions = [ 
        'cost' => 12, 
    ]; 
      
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $bcryptOptions); 
    //prepared sql statement
    $insertUserQuery = mysqli_prepare($databaseConnection, "INSERT INTO csc131.Users (`Full Name`, `Email`, `Hashed Password`, `StudentID`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($insertUserQuery, "ssss", $fullName, $email, $hashedPassword, $studentID);

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
function passwordMatchesPattern($password) {
    // Define a regular expression for basic email validation
    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";

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