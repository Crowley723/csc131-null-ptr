<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("USERSDB");
$DBusername = getenv("USERSDBUSER");
$DBpassword = getenv("USERSDBPASS");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $studentID = $_POST["studentID"];

    $fullNamePattern = "";
    $emailPattern = "";
    $passwordPattern = "";
    $studentIDPattern = "";

    // Validate form data (you can add more validation as needed)
    if (empty($username) || empty($email) || empty($password) || empty($studentID)) {
        echo "All fields are required.";
        exit;
    }


    $databaseConnection = new mysqli($DBhostname, $DBusername, $DBpassword, $usersDB);

    if ($databaseConnection->connect_error) {
        die("Connection failed: " . $databaseConnection->connect_error);
    }

    // Use a prepared statement to insert user data into database
    $insertUserQuery = $databaseConnection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insertUserQuery->bind_param("sss", $username, $email, $password);

    if ($insertUserQuery->execute() === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $insertUserQuery->error;
    }

    // Close the prepared statement and the database connection
    $insertUserQuery->close();
    $databaseConnection->close();
}



?>