<?php

$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131EVENTSDBNAME");
$DBusername = getenv("CSC131EVENTSDBUSER");
$DBpassword = getenv("CSC131EVENTSDBPASS");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    ob_start();
    $databaseConnection = mysqli_connect($DBhostname, $DBusername, $DBpassword, $usersDB);

    if ($databaseConnection->connect_error) {
        http_response_code(500);
        ob_flush();
        exit();
       // throw new Exception("Database Connection Error, Error No.: ".$databaseConnection->connect_errno." | ".$databaseConnection->connect_error);
    }

    $getEventsQuery = mysqli_prepare($databaseConnection, "Select Events.ID, Events.Title, Events.Cost, Events.Date, Events.Location, Events.Description, Events.Link, Events.`Image path` from Events; ");

    if ($getEventsQuery->execute() === TRUE) {
        mysqli_stmt_bind_result($getEventsQuery,$eventID, $eventTitle, $eventCost, $eventDate, $eventLocation, $eventDescription, $eventLink, $eventImagePath);
        $outputData = array();
        
        while(mysqli_stmt_fetch($getEventsQuery)) {
            $outputData[] = array(
                "ID"=> $eventID,
                "Title"=> $eventTitle,
                "Cost"=> $eventCost,
                "Date"=> $eventDate,
                "Location"=> $eventLocation,
                "Description"=> $eventDescription,
                "Link"=> $eventLink,
                "Image Path"=> $eventImagePath,
            );
        }
        mysqli_stmt_close($getEventsQuery);
        $databaseConnection->close();

        header("Content-Type: application/json");
        echo json_encode($outputData, JSON_THROW_ON_ERROR);
        
        }else{
            //echo "Error: " . $getEventsQuery->error;
            $_SESSION['NoEventsFound'] = TRUE;
            header("Location: /events.php");
            ob_flush();
            exit();
        }
    


}else    http_response_code(503);
    ob_flush();
    exit();
?>