<?php include("../header.php") ?>
<!DOCTYPE html>
<html>
<head>
  <title>New Event</title>
  <link rel="stylesheet" type="text/css" href="newEvent.css">
</head>
<body>
  <div class="event-form">
    <h1 class="heading">New Event</h1>
    <form class="form" action="/events/handleNewEvent.php" method="post" enctype="multipart/form-data">
      <label class="form-label" for="title">Title:</label>
      <input class="form-input" type="text" id="title" name="title" placeholder="Enter the title" required>

      <label class="form-label" for="cost">Cost:</label>
        <div class="cost-input">
            <input type="number" id="cost" name="cost" min="0" value="0">
            
        </div>
      
      <label class="form-label" for="location">Location:</label>
      <input class="form-input" type="text" id="location" name="location" placeholder="Enter the location" required>

      <label class="form-label" for="description">Description:</label>
      <textarea class="form-textarea" id="description" name="description" placeholder="Enter the description" required></textarea>

      <label class="form-label" for="link">Link:</label>
      <input class="form-input" type="text" id="link" name="link" placeholder="Enter the link" required>

      <label class="form-label" for="image">Image:</label>
      <input class="form-file" type="file" id="image" name="image" accept="image/*" required>

      <input class="submit-btn" type="submit" value="Submit">
    </form>
  </div>
</body>
<script>
    function changeCost(value) {
  var costInput = document.getElementById("cost");
  var currentValue = parseInt(costInput.value) || 0;
  var newValue = currentValue + value;
  if (newValue >= 0) {
    costInput.value = newValue;
  }
}
</script>
</html>
<?php include("../footer.php") ?>