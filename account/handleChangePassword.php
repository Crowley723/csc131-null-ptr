<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();    
    $email = $_SESSION["Email"];
    $oldPassword = $_POST["old-password"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    
    if (empty($oldPassword)) {
        echo "Password is required.";
        $_SESSION['NeedOldPassword'] = TRUE;
        header("Location: /account/dashboard.php");
        ob_flush();
        exit;
    }
    if (empty($password1)) {
        echo "Password is required.";
        $_SESSION['NeedNewPassword'] = TRUE;
        header("Location: /account/dashboard.php");
        ob_flush();
        exit;
    }
    if($password1 != $password2){
        echo "Passwords Must Match";
        $_SESSION['PasswordsMustMatch'] = TRUE;
        header("Location: /account/dashboard.php");
        ob_flush();
        exit();
    }
    if(!passwordMatchesPattern($password1)){
        echo "Invalid Password.";
        $_SESSION['InvalidNewPassword'] = TRUE;
        header("Location: /account/dashboard.php");
        ob_flush();
        exit();
    }

    $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);

    if (!$databaseConnection) {
        http_response_code(500);
        ob_flush();
        throw new Exception("Database Connection Error, Error No.: ".$databaseConnection->connect_errno." | ".$databaseConnection->connect_error);
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
            if (password_verify($oldPassword, $hashedPassword)) {
                 session_regenerate_id();
                 $bcryptOptions = [ 
                    'cost' => 13, 
                ]; 
                 $newHashedPassword = password_hash($password1, PASSWORD_BCRYPT, $bcryptOptions);
                 setNewPassword($databaseConnection, $newHashedPassword, $email);
                

                
                $_SESSION['Email'] = $email;
                $_SESSION['FullName'] = $fullName;      

                
                $databaseConnection->close();
                $_SESSION['PasswordChanged'] = TRUE;
                header("Location: /account/dashboard.php");
                ob_flush();
                exit(); 
            } else {
                $_SESSION['WrongCredentials'] = TRUE;
                header("Location: /account/dashboard.php");
                ob_flush();
                exit();
            }
        }else{
            $_SESSION['WrongCredentials'] = TRUE;
            header("Location: /account/dashboard.php");
            ob_flush();
            exit();
        }
    } else {
        echo "Error: " . $findUserQuery->error;
        exit();
    }
}

function setNewPassword($databaseConnection, $newHashedPassword, $email){
    $updatePasswordQuery = mysqli_prepare($databaseConnection, "UPDATE csc131.Users SET `Password Last Changed` = CURRENT_TIMESTAMP, `Hashed Password` = ? WHERE Email = ?");
    mysqli_stmt_bind_param($updatePasswordQuery, "ss", $newHashedPassword, $email);

    if(mysqli_stmt_execute($updatePasswordQuery)){
        mysqli_stmt_close($updatePasswordQuery);
        return true;
    }
    mysqli_stmt_close($updatePasswordQuery);
    return false;
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
?>