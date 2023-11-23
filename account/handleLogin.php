<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();    
    $email = $_POST["email"];
    $password = $_POST["password1"];

    
    if (empty($email)) {
        echo "Email is required.";
        $_SESSION['NeedEmail'] = TRUE;
        header("Location: /account/login.php");
        ob_flush();
        exit;
    }
    if (empty($password)) {
        echo "Password is required.";
        $_SESSION['NeedPassword'] = TRUE;
        header("Location: /account/login.php");
        ob_flush();
        exit;
    }
    if(!validateEmail($email)){
        echo "Invalid Email.";
        $_SESSION['InvalidEmail'] = TRUE;
        header("Location: /account/login.php");
        ob_flush();
        exit();
    }
    if(!passwordMatchesPattern($password)){
        echo "Invalid Password.";
        $_SESSION['InvalidPassword'] = TRUE;
        header("Location: /account/login.php");
        ob_flush();
        exit();
    }

    $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);

    if (!$databaseConnection) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        ob_flush();
        exit;
    }else{
        //echo "<br>Connected to DB </br>";
    }
    



    $findUserQuery = mysqli_prepare($databaseConnection, "SELECT * FROM Users WHERE `Email` = ?");
    mysqli_stmt_bind_param($findUserQuery, "s", $email);

    if ($findUserQuery->execute() === TRUE) {
        $userResult = mysqli_stmt_get_result($findUserQuery);
        $userData = mysqli_fetch_assoc($userResult);

        mysqli_stmt_close($findUserQuery);
        

        if ($userData){
            $hashedPassword = $userData['Hashed Password'];
            $email = $userData['Email'];
            $fullName = $userData['Full Name'];
            if (password_verify($password, $hashedPassword)) {
                // Store user information in session variables
                
                $_SESSION['Email'] = $email;
                $_SESSION['FullName'] = $fullName;
            
                //echo "<br>User " . $_SESSION['FullName'] . " Logged In! </br>";
                
                setLoggedInDate($databaseConnection, $email);

                $databaseConnection->close();
                header("Location: /account/welcome.php");
                ob_flush();
                exit(); 
            } else {
                $_SESSION['WrongCredentials'] = TRUE;
                header("Location: /account/login.php");
                ob_flush();
                exit();
            }
        }else{
            $_SESSION['WrongCredentials'] = TRUE;
            header("Location: /account/login.php");
            ob_flush();
            exit();
        }
    } else {
        echo "Error: " . $findUserQuery->error;
        exit();
    }
}

function setLoggedInDate($databaseConnection, $email){
    $updateLastLoggedInQuery = mysqli_prepare($databaseConnection, "UPDATE csc131.Users SET `Last Logged In` = CURRENT_TIMESTAMP WHERE Email = ?");
    mysqli_stmt_bind_param($updateLastLoggedInQuery, "s", $email);

    if(mysqli_stmt_execute($updateLastLoggedInQuery)){
        mysqli_stmt_close($updateLastLoggedInQuery);
        return true;
    }
    mysqli_stmt_close($updateLastLoggedInQuery);
    return false;
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