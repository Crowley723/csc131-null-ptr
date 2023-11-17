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
            background-color: #f2f2f2;
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
        background-color: #333;
        color: white;
        border: none;
        cursor: pointer;
    }
        .faq-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .faq-column {
            width: 32%; /* Adjusted for 3 columns */
            background-color: #f9f9f9;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
            font-size: 16px;
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
        }
        .faq-column a {
            text-decoration: none;
            color: #333;
        }
        .faq-column a:hover {
            text-decoration: underline;
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
            <a href="#">Map</a><br>
            <a href="#">Local international Eateries</a><br>
            <a href="#">More info</a>
        </div>
        <div class="faq-column">
            <div class="column-title">About the Events</div>
            <a href="#">What are the current events?</a><br>
            <a href="#">Student Life</a><br>
            <a href="#">Event locations</a>
        </div>
        <div class="faq-column">
            <div class="column-title">About Us</div>
            <a href="#">Something about help</a><br>
            <a href="#">Our objective</a><br>
            <a href="#">Please help....</a>
        </div>
    </div>
    <!-- Additional FAQ content and accordions would go here -->
    <script>
        // JavaScript for the accordion functionality goes here
    </script>
</body>
</html>