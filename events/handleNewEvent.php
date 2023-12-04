<?php
$DBhostname = getenv("SQLHOSTNAME");
$usersDB = getenv("CSC131USERDBNAME");
$DBusername = getenv("CSC131USERDBUSER");
$DBpassword = getenv("CSC131USERDBPASS");
session_start();

define('MAX_FILE_SIZE',  5 * 1024 * 1024); // 5 MB
define('MAX_HEIGHT',  1024); 
define('MAX_WIDTH',  1024); 
define('ALLOWED_FILE_FORMATS',  ['JPEG', 'PNG', 'GIF', 'BMP', 'WEBP']);
define('SAVE_DIRECTORY',  "../assets/"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();
    $email = $_SESSION["Email"];
    $eventTitle = htmlspecialchars($_SESSION["EventTitle"], ENT_QUOTES, 'UTF-8');
    $eventCost = htmlspecialchars($_SESSION["EventCost"], ENT_QUOTES, 'UTF-8');
    $eventLocation = htmlspecialchars($_SESSION["EventLocation"], ENT_QUOTES, 'UTF-8');
    $eventDescription = htmlspecialchars($_SESSION["EventDescription"], ENT_QUOTES, 'UTF-8');
    $eventLink = htmlspecialchars($_SESSION["EventLink"], ENT_QUOTES, 'UTF-8');


    if (isset($_FILES['EventImage'])) {
        $uploaded_file = $_FILES['EventImage'];
        validateAndSaveImage($uploaded_file);




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
    $mime_type = finfo_file($finfo, $uploaded_file);
    finfo_close($finfo);
    if(in_array(strtoupper($mime_type), ALLOWED_FILE_FORMATS)){
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
    } catch (ImagickException $e) {
        http_response_code(500);
        $_SESSION["SaveFileError"] = TRUE;
        cleanup();
    }
    cleanup();
}


function validateAndSaveImage($uploaded_file){
    if (isset($uploaded_file)) {
    
        if ($uploaded_file['error'] === UPLOAD_ERR_OK) {
            (isCorrectFileType($uploaded_file)) ? null : cleanup();;

            (fileSizeIsGood($uploaded_file)) ? null : cleanup();;

            $imagick = createImagick($uploaded_file);

            (imageDimensionsAreGood($imagick)) ? null : cleanup();

            saveImage($imagick);

        } else {
            http_response_code(200);
            cleanup();
        }
    } else {
        http_response_code(200);
        cleanup();
    }
}

function cleanup(){ /*set Location header, flush output buffer and exit*/
    header("Location: /events/newEvent.php");
    ob_flush();
    exit();
}
?>
