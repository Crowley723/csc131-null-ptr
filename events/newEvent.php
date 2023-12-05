<?php
ob_start();
include("../header.php");/*
if(!isset($_SESSION['Email']) && !isset($_SESSION['FullName'])) {
    $_SESSION['Unauthenticated'] = TRUE;
    header("Location: /index.php");
    ob_flush();
    exit();
}*/
ob_flush();
?>


<!DOCTYPE html>
<html>
<style>
::-webkit-input-placeholder {
font-family: Helvetica;
}
:-moz-placeholder {
    font-family: Helvetica;
}
::-moz-placeholder {
    font-family: Helvetica;
}
:-ms-input-placeholder {
    font-family: Helvetica;
}
    body{
        background-image: url('/assets/fall-street-background.webp');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Optional: fixed background */
        margin: 0; /* Remove default body margin */
        padding: 0; /* Remove default body padding */
    }
    .new-event-header {
        margin-bottom: 0;;
    }
    .form-box {
        margin: 16px auto 16px;
        width : 25%;
        padding: 20px 10px 20px;
        text-align: center;
        border: 1px solid black;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.1);
        background-color: white;

    }
    .form-box .entry-label {
  text-align: left;
  color: black;
  padding: 1vh 0vw;
}
.form-box .form-container{
  padding: 16px 16px 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin: 0;

}

.form-box .form-input, .form-box .form-textarea {
  width: 100%;
  padding: 12px 12px;
  margin: 0;
  display: inline-block;
  border: 1px solid var(--black40a);
  box-sizing: border-box;
}
.form-box .form-textarea {
resize: vertical;
}
.form-box .form-file{
    margin: 0px 0 8px;
}
.form-box textarea::placeholder {
    font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 13px;
}
.form-box button {
  background-color: var(--stgr);
  color: white;
  padding: 14px 20px;
  border: none;
  margin:8px 0;
  font-size: 17px;
  border: none;
  cursor: pointer;
  text-decoration: none;
  transition: 1.5s;
  border-radius: 5px;
}
.form-box button:hover {
    background-color: #dad490;
    color: var(--stgr);
    transition: 1.5s;
  }

</style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Event</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">


    </head>
        <body>
        <div class="form-box">
            <h2 class="new-event-header">Create Event</h2>
            <div class="error-message">
                <?php
                if(isset($_SESSION['EventExists']) && $_SESSION['EventExists'] === TRUE){
                    echo "<p style=\"color:red;\">That event already exists</p>";
                    $_SESSION['EventExists'] = FALSE;
                }
                if(isset($_SESSION['BadFileSize']) && $_SESSION['BadFileSize'] === TRUE){
                    echo "<p style=\"color:red;\">The max file size is 5MB.</p>";
                    $_SESSION['BadFileSize'] = FALSE;
                }
                if(isset($_SESSION['BadImageSize']) && $_SESSION['BadImageSize'] === TRUE){
                    echo "<p style=\"color:red;\">The image must be 1024x1024 max.</p>";
                    $_SESSION['BadImageSize'] = FALSE;
                }
                if(isset($_SESSION['ImagickError']) && $_SESSION['ImagickError'] === TRUE){
                    echo "<p style=\"color:red;\">Unknown Image Error</p>";
                    $_SESSION['ImagickError'] = FALSE;
                }
                if(isset($_SESSION['InvalidFileType']) && $_SESSION['InvalidFileType'] === TRUE){
                    echo "<p style=\"color:red;\">The allowed filetypes are jpeg, png, gif, bmp, webp.</p>";
                    $_SESSION['InvalidFileType'] = FALSE;
                }
                if(isset($_SESSION['SaveFileError']) && $_SESSION['SaveFileError'] === TRUE){
                    echo "<p style=\"color:red;\">Unknown Image Error</p>";
                    $_SESSION['SaveFileError'] = FALSE;
                }
                if(isset($_SESSION['NoUpload']) && $_SESSION['NoUpload'] === TRUE){
                    echo "<p style=\"color:red;\">No File Uploaded</p>";
                    $_SESSION['NoUpload'] = FALSE;
                }
                if(isset($_SESSION['MustBeLoggedIn']) && $_SESSION['MustBeLoggedIn'] === TRUE){
                    echo "<p style=\"color:red;\">You must be logged in.</p>";
                    $_SESSION['MustBeLoggedIn'] = FALSE;
                }

                ?>
            </div>
            <form form class="form-container" action="/events/handleNewEvent.php" method="post" enctype="multipart/form-data">

                <label class="entry-label" for="EventTitle">Title:</label>
                <input class="form-input" type="text" id="EventTitle" name="EventTitle" placeholder="Enter the title" required>
 
                <label class="entry-label" for="EventCost">Cost:</label>
                <input class="form-input" type="number" id="EventCost" name="EventCost" min="0" value="0" required>
                
                <label class="entry-label" for="EventDate">Date:</label>
                <input class="form-input" type="text" id="EventDate" name="EventDate" placeholder="Enter the date time information" required>
                  
                <label class="entry-label" for="EventLocation">Location:</label>
                <input class="form-input" type="text" id="EventLocation" name="EventLocation" placeholder="Enter the location" required>

                <label class="entry-label" for="EventDescription">Description:</label>
                <textarea class="form-textarea" id="EventDescription" name="EventDescription" placeholder="Enter the description" required></textarea>

                <label class="entry-label" for="EventLink">Link:</label>
                <input class="form-input" type="text" id="EventLink" name="EventLink" placeholder="Enter the link" required>

                <label class="entry-label" for="EventImage">Image:</label>
                <input class="form-file" type="file" id="EventImage" name="EventImage" accept="image/*" required>

                <button id="submit">Submit</button>
            </form>
            
        </div>
    </body>
</body>
<script>
    function changeCost(value) {
    var costInput = document.getElementById("EventCost");
    var currentValue = parseInt(costInput.value) || 0;
    var newValue = currentValue + value;
    if (newValue >= 0) {
        costInput.value = newValue;
    }
}
</script>
</html>
<?php include("../footer.php") ?>