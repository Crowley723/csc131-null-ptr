<?php

$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();
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

    $getEventsQuery = mysqli_prepare($databaseConnection, "SELECT * FROM Events");

    if ($getEventsQuery->execute() === TRUE) {
        $eventsResults = mysqli_stmt_get_result($getEventsQuery);
        $outputData = array();

        mysqli_stmt_close($getEventsQuery);
        $databaseConnection->close();
        
        while($eventData = mysqli_fetch_assoc($eventsResults)) {
            $EventTitle = $eventData["Title"];
            $eventCost = $eventData["Cost"];
            $eventDate = $eventData["Date"];
            $eventLocation = $eventData["Location"];
            $eventDescription = $eventData["Description"];
            $eventLink = $eventData["Link"];
            $eventImagePath = $eventData["Image path"];
            $outputData = array(
                "Title"=> $eventTitle,
                "Cost"=> $eventCost,
                "Date"=> $eventDate,
                "Location"=> $eventLocation,
                "Description"=> $eventDescription,
                "Link"=> $$eventLink,
                "Image Path"=> $eventImagePath,
            );
        }
        header("Content-Type: application/json");
        echo json_encode($data, JSON_THROW_ON_ERROR);
        
        }else{
            echo "Error: " . $getEventsQuery->error;
            $_SESSION['NoEventsFound'] = TRUE;
            header("Location: /events.php");
            ob_flush();
            exit();
        }


}else http_response_code(503);
    exit();
?>