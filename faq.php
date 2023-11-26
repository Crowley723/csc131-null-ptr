<!DOCTYPE html>
<html>
<style>
    h1 {
        padding: 16px 16px 16px 16px;   
    }
</style>
    <head>
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAQ</title>
        <?php include("./header.php") ?>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    </head>
</html>

<!-- Everything else in the FAQ page that's not the header -->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url('assets/SacState_Fall.jpg'); /* Set the background image using the relative path */
            background-size: cover; /* Cover the entire area of the box */
            background-position: center; /* Center the image in the box */
            background-repeat: no-repeat; /* Do not repeat the image */
            color: white;
            padding: 16px;
        }
        .search-bar {
        display: flex;
        justify-content: center;
        width: 50%; /* Adjust the width as you like, this sets it to half the width of its container */
        margin: auto; /* Center the search bar horizontally */
        margin-bottom: 20px; /* Add some margin below the search bar */
    }
    .search-bar input[type="text"] {
        flex: 1; /* Allows the text input to grow and fill available space */
        padding: 10px;
        margin-right: 10px;
        border: 1px solid #ddd;
    }
    .search-bar input[type="submit"] {
        padding: 10px 20px;
        background-color: #004e38; 
        color: white;
        border: none;
        cursor: pointer;
    }
    .search-bar input[type="submit"]:active {
    box-shadow: 0 0 10px white; /* Blue glow */
}
 /*Second row and links to different questions  */
    .faq-container {
        display: flex;
        justify-content: center;
        padding: 20px;
        margin: auto;
    }
    .faq-column {
        width: calc(33.333% - 40px); /* Adjust the width to account for margin/padding */
        margin: 0 20px; /* This adds margin to the left and right of each column */
        background-color: #f9f9f9;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        color: #004e38;
        height: 120px;
        flex-direction: column; /* Stack children vertically */
        justify-content: center; /* Center children vertically */
        align-items: center; /* Center children horizontally */
        text-align: center; /* Center text for inline or inline-block elements */

    }
    .faq-accordion {
        border-bottom: 1px solid #ddd;
        padding: 8px 0;
        cursor: pointer;
    }
    .faq-accordion:hover {
        background-color: #f0f0f0;
    }
    .faq-accordion:last-child {
        border-bottom: none;
    }
    .faq-accordion h2 {
        font-size: 20px;
        margin: 0;
    }
    .faq-accordion-content {
        display: none;
        padding: 15px;
        background-color: #f0f0f0;
        border-top: 1px solid #ddd;
    }
    .column-title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 24px; /* Set the font size to 16px */
        color: #004e38
    }
    .faq-column a {
        display: block;
        text-decoration: none;
        color: #333;
        margin-bottom: 0.1em;
        font-size: 18px;
    }
    .faq-column a:hover {
        text-decoration: underline;
    }
    a:active{
        color: yellow;
    }
    .Questions-container{
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }
    .Questions-header{
        font-weight: bold;
        margin-bottom: 10px;
        
    }


</style>
</head>
<body>
    <div class="header">
        <h1>Frequently Asked Questions</h1>
        <div class="search-bar">
            <input type="text" placeholder="Search FAQs...">
            <input type="submit" value="Search">
        </div>
    </div>
    <div class="faq-container">
        <div class="faq-column">
            <div class="column-title">About the Campus</div>
            <a href="map.php">Map</a><br>
            <a href="https://www.dining.csus.edu/campus-eateries-2/">On Campus Eatery</a><br>
            <a href="http://www.csus.edu">More info</a>
        </div>
        <div class="faq-column">
            <div class="column-title">About the Events</div>
            <a href="events.php">What are the current events?</a><br>
            <a href="https://www.csus.edu/student-life/">Student Life</a><br>
            <a href="https://events.csus.edu/">Campus Events</a>
        </div>
        <div class="faq-column">
            <div class="column-title">About Us</div>
            <a href="https://www.csus.edu/experience/fact-book/about-sac-state.html">Sacramento State Info</a><br>
            <a href="https://www.csus.edu/international-programs-global-engagement/international-student-scholar-services/">Student Programs</a><br>
            <a href="https://www.csus.edu/international-programs-global-engagement/international-student-scholar-services/housing.html">Housing Options</a>
        </div>
    </div>
    <br>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ Section</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .faq-header2 {
    color: #004e38; /* Dark blue color */
    font-size: 24px;
    margin-bottom: 10px;
    text-align: center; /* Centers text horizontally */
  }
  .faq-content2 {
    font-size: 20px;
    line-height: 1.6;
    color: #333; /* Dark text color */
    text-align: 10px;
    max-width: 1000px;
    margin: auto;
    padding: 20px;
    box-sizing: border-box;
  }
  .faq-section2 {
    background-color: #f5f5f5; /* Light grey background */
    color: #198754;
    font-weight: bold;
    padding: 20px;
    border-radius: 5px;
    text-align: center; /* Centers text horizontally */
  }
  .faq-question2 {
    color: #004e38; /* Light Green Color */
    font-weight: bold;
    width: fit-content; /* Specify a width or set it to fit-content */
    margin-left: auto;
    margin-right: auto; /* These auto margins center the block-level element *
  }
  .faq-link2 {
    color: #1a5a96; /* Blue color for links */
    text-decoration: none;
  }
  .faq-link2:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="faq-section2">
  <div class="faq-header2">Commonly Asked Questions</div>
  <div class="faq-content2">
    The Student Service Center provides a wide array of student services which are not limited to enrollment, Community Involvement, local events, and student wellbeing. Please see our commonly asked questions below.
    <br>
    <p><span class="faq-question2">Q: How can I contact people for the events?</span><br>
    You can get in touch with community leaders and the event hosts by email or visiting their events page <a href="events.php" class="faq-link2">Community Events</a></p>
    <br>
    <p><span class="faq-question2">Q: Where can I find someone to help guide me if I do not know the language that well?</span><br>
    There are many students on campus that may speak your language! Make a post in the <a href="forum.php" class="faq-link2">Community Forums</a> and connect with people today!</p>
    <br>
    <p><span class="faq-question2">Q: How do I get around the city being a foreign student?</span><br>
    Students can see their location and event locations by viewing the <a href="map.php" class="faq-link2">Map</a> .Any further questions can be handled by the community offices.</p>
    <br>
    <p><span class="faq-question2">Q: How do I apply for Financial Aid?</span><br>
    File your <a href="https://www.studentaid.gov" class="faq-link2">Federal Application for Student Aid (FAFSA)</a> or Dream Act Application. The application opens on October 1 each year. File by the priority deadline, March 2, leading into the Fall semester. The current application period is 2023-2024 for Spring/Summer 2024.</p>
  </div>
</div>

</body>
</html>



    <!-- Additional FAQ content and accordions would go here -->
    <script>
        // JavaScript for the accordion functionality goes here
    </script>
</body>
</html>