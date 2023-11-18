<?php
session_start();
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();
    // Retrieve form data
    $fullName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, 'UTF-8');
    $email = $_POST["email"];
    $password = $_POST["password1"];
    $studentID = $_POST["studentID"];

    if (empty($fullName)) {
        echo "Full Name is required.";
        $_SESSION['NeedName'] = TRUE;
        header(("Location: /account/signup.php"));
        ob_flush();
        exit;
    }
    if (empty($email)) {
        echo "Email is required.";
        $_SESSION['NeedEmail'] = TRUE;
        header(("Location: /account/signup.php"));
        ob_flush();
        exit;
    }
    if (empty($password)) {
        echo "Password is required.";
        $_SESSION['NeedPassword'] = TRUE;
        header(("Location: /account/signup.php"));
        ob_flush();
        exit;
    }
    if (empty($studentID)) {
        echo "Student ID is required.";
        $_SESSION['NeedStudentID'] = TRUE;
        header(("Location: /account/signup.php"));
        ob_flush();
        exit;
    }

    if(!validateName($fullName)){
        echo "Invalid Name.";
        $_SESSION['InvalidName'] = TRUE;
        header(("Location: /account/signup.php"));
        exit();
    }
    if(!validateEmail($email)){
        echo "Invalid Email.";
        $_SESSION['InvalidEmail'] = TRUE;
        header(("Location: /account/signup.php"));
        exit();
    }
    if(!passwordMatchesPattern($password)){
        echo "Invalid Password.";
        $_SESSION['InvalidPassword'] = TRUE;
        header(("Location: /account/signup.php"));
        exit();
    }
    if(!validateStudentID($studentID)){
        echo "Invalid StudentID.";
        $_SESSION['InvalidStudentID'] = TRUE;
        header(("Location: /account/signup.php"));
        exit();
    }

    

    


    $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);

    if (!$databaseConnection) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }else{
        //echo 'Connected to DB';
    }
    $bcryptOptions = [ 
        'cost' => 12, 
    ]; 
      
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $bcryptOptions); 
    //prepared sql statement
    //"INSERT INTO csc131.Users (`Full Name`, `Email`, `Hashed Password`, `StudentID`) VALUES (?, ?, ?, ?)"
    $findUserQuery = mysqli_prepare($databaseConnection, "INSERT INTO csc131.Users (`Full Name`, `Email`, `Hashed Password`, `StudentID`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($findUserQuery, "ssss", $fullName, $email, $hashedPassword, $studentID);

    if (mysqli_stmt_execute($findUserQuery) === TRUE) {
        //echo "Signup successful!";
        header(("Location: /account/login.php"));
        mysqli_stmt_close($findUserQuery);
        $databaseConnection->close();
        ob_flush();
        exit();

    } else {
        header(("Location: /account/signup.php"));
        $_SESSION['UnknownError'] = true;
        mysqli_stmt_close($findUserQuery);
        $databaseConnection->close();
        ob_flush();
        exit();
    }
    
} else{
    http_response_code(503);
}
function validateEmail($email) {

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
    $name = htmlspecialchars($name);
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
    $password = htmlspecialchars($password);
    if (preg_match($passwordRegex, $password)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}
function validateStudentID($studentID) {
    // Define a regular expression for basic email validation
    $studentIDRegex = "/^[0-9]{8}$/";
    $studentID = htmlspecialchars($studentID);
    // Use the preg_match function to test the email against the regular expression
    if (preg_match($studentIDRegex, $studentID)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}




?>