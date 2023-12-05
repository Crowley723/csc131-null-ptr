<?php
define('HOSTNAME',  getenv("SQLHOSTNAME")); 
define('DBNAME',  getenv("CSC131USERDBNAME")); 
define('DBUSER',  getenv("CSC131USERDBUSER")); 
define('DBPASSWORD',  getenv("CSC131USERDBPASS")); 
session_start();

define('MAX_FILE_SIZE',  5 * 1024 * 1024); // 5 MB
define('MAX_HEIGHT',  1024); 
define('MAX_WIDTH',  1024); 
define('ALLOWED_FILE_FORMATS', ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp']);
define('SAVE_DIRECTORY',  "../assets/"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();
    if(!isset($_SESSION['FullName']) || !isset($_SESSION['Email'])){
        $_SESSION['MustBeLoggedIn'] = TRUE;
        header(("Location: /events/newEvent.php"));
        http_response_code(401);
        ob_flush();
        exit;
    }


    $email = isset($_SESSION['Email']); 
    $eventTitle = htmlspecialchars($_POST["EventTitle"], ENT_QUOTES, 'UTF-8');
    $eventCost = htmlspecialchars($_POST["EventCost"], ENT_QUOTES, 'UTF-8');
    $eventDate = htmlspecialchars($_POST["EventDate"], ENT_QUOTES, 'UTF-8');
    $eventLocation = htmlspecialchars($_POST["EventLocation"], ENT_QUOTES, 'UTF-8');
    $eventDescription =   htmlspecialchars($_POST["EventDescription"], ENT_QUOTES, 'UTF-8');
    $eventLink = htmlspecialchars($_POST["EventLink"], ENT_QUOTES, 'UTF-8');
    $eventID = hash('sha256', $eventTitle . $eventDescription);
    


    if (isset($_FILES['EventImage'])) {
        $uploaded_file = $_FILES['EventImage'];
        $filePath = validateAndSaveImage($uploaded_file);
        if( $filePath != FALSE){
            $eventImagePath = $filePath;
        } else{
            $_SESSION["SaveFileError"] = TRUE;
        }
        $databaseConnection = mysqli_connect(HOSTNAME, DBUSER, DBPASSWORD, DBNAME);
        if ($databaseConnection->connect_error) {
            http_response_code(500);
            ob_flush();
            throw new Exception("Database Connection Error, Error No.: ".$databaseConnection->connect_errno." | ".$databaseConnection->connect_error);
        }

        (checkIfPostExists($databaseConnection, $eventID)) ? cleanup() : null;
        $addNewEventQuery = mysqli_prepare($databaseConnection,"Insert INTO csc131.Events (ID, Title, Cost, Date, Location, Description, Link, `Image path`, Author) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($addNewEventQuery, "sssssssss", $eventID, $eventTitle, $eventCost, $eventDate, $eventLocation, $eventDescription, $eventLink, $eventImagePath, $email);
        if (mysqli_stmt_execute($addNewEventQuery)){
            echo "TRUE";
        }else{
            echo "FALSE";
        }
        mysqli_stmt_close($addNewEventQuery);


        http_response_code(200);
        cleanup();
    }else{
        http_response_code(500);
        cleanup();
    }

} else{
    http_response_code(501);
    cleanup();
}



function checkIfPostExists($databaseConnection, $eventID){
$checkEventExistsQuery = mysqli_prepare($databaseConnection, "Select `ID` from Events WHERE ID = ?");
mysqli_stmt_bind_param($checkEventExistsQuery, "s", $eventID);
    if(mysqli_stmt_execute($checkEventExistsQuery)){
        mysqli_stmt_bind_result($checkEventExistsQuery, $resultID);
        mysqli_stmt_fetch($checkEventExistsQuery);
        if($resultID == $eventID){
            $_SESSION["EventExists"] = TRUE;
            mysqli_stmt_close($checkEventExistsQuery);
            return true;
        }
        mysqli_stmt_close($checkEventExistsQuery);
        return false;
    }

}
function addPost($databaseConnection, $newEvent){
    $addNewEventQuery = mysqli_prepare($databaseConnection,"Insert INTO csc131.Events (ID, Title, Cost, Date, Location, Description, Link, `Image path`, Author) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($addNewEventQuery, "sssssssss", $eventID, $eventTitle, $eventCost, $eventDate, $eventLocation, $eventDescription, $eventLink, $eventImagePath, $email);
    if (mysqli_stmt_execute($addNewEventQuery)){
        echo "TRUE";
    }else{
        echo "FALSE";
    }
    mysqli_stmt_close($addNewEventQuery);
    return;
}

function fileSizeIsGood($uploaded_file){
    if ($uploaded_file['size'] <= MAX_FILE_SIZE) {
        return true;
    }
    http_response_code(415);
    $_SESSION['BadFileSize'] = TRUE;
    return false;
}
function imageDimensionsAreGood($imagick){
    if ($imagick->getImageWidth() <= MAX_WIDTH || $imagick->getImageHeight() <= MAX_HEIGHT) {
        return true;
    }
    http_response_code(415);
    $_SESSION['BadImageSize'] = TRUE;
    return false;
}
function createImagick($uploaded_file){
    try {
        $imagick = new Imagick();
        $imagick->readImageBlob(file_get_contents($uploaded_file['tmp_name']));
        return $imagick;
    } catch (ImagickException $e) {
        $_SESSION['ImagickError'] = TRUE;
        http_response_code(500);
        cleanup();
    }
}
function isCorrectFileType($uploaded_file){
    if ($uploaded_file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $uploaded_file['tmp_name']);
    finfo_close($finfo);
    if(in_array($mime_type, ALLOWED_FILE_FORMATS)){
        return true;
    }
    http_response_code(415);
    $_SESSION['InvalidFileType'] = TRUE;
    return false;
}
function saveImage($imagick){
    $unique_id = uniqid('image-upload-', true);
    $image_format = strtoupper($imagick->getImageFormat());
    $target_file_path = SAVE_DIRECTORY . $unique_id . '.' . strtolower($image_format);
    try {
        $imagick->writeImage($target_file_path);
        http_response_code(200);
        return $target_file_path;
    } catch (ImagickException $e) {
        http_response_code(500);
        $_SESSION["SaveFileError"] = TRUE;
        return false;
    }
}


function validateAndSaveImage($uploaded_file){
    if (isset($uploaded_file)) {
    
        if ($uploaded_file['error'] === UPLOAD_ERR_OK) {
            (isCorrectFileType($uploaded_file)) ? null : cleanup();

            (fileSizeIsGood($uploaded_file)) ? null : cleanup();

            $imagick = createImagick($uploaded_file);

            //(imageDimensionsAreGood($imagick)) ? null : cleanup();

            return saveImage($imagick);

        } else {
            http_response_code(200);
            $_SESSION['UploadError'] = TRUE;
            cleanup();
        }
    } else {
        http_response_code(200);
        $_SESSION['NoUpload'] = TRUE;
        cleanup();
    }
}

function cleanup(){ /*set Location header, flush output buffer and exit*/
    //header("Location: /events/newEvent.php");
    ob_flush();
    exit();
}
?>
