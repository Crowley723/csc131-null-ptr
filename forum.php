<?php include("./header.php") ?>
<!DOCTYPE html>
<html>
<style>
    h1 {
        padding: 16px 16px 16px 16px;   
    }
    body {

        width: 100vw;
        height: 100vh;
        background: url('/images/fall_tree_background.jpg');
        background-size: cover;
        background-attachment: fixed;
        overflow-x: hidden;
    }
    
    
</style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum</title>
        
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
        <script src="https://kit.fontawesome.com/31806d8454.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="fourmStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="forumScript.js"></script>
    </head>

    

<body>
    <div id="overlay" class="login-popup-overlay" onclick="closePopup()">
        <div id="loginPopup" class="login-popup">
            <div class="login-popup-content">
                <span class="login-popup-close" onclick="closePopup()">&times;</span>

                <p><a href="/account/login.php">Log In</a> to like or create posts.</p>
            <!-- Add a login button or link here -->
            </div>
        </div>
    </div>
    

    <!--<h1>Community Fourm</h1>-->

    <div class="title-shit"><h1>Share Your Thoughts</h1></div>


    <div class="container">
    <!-------- left-sidebar -------- -->    
    <div class="left-sidebar">

    </div>
    <!-------- main-content -------- --> 
    <div class="main-content" id="main-content"></div>
        
    <!-------- right-sidebar -------- --> 
    <div class="right-sidebar">
        <!-- Post Button -->
        <button class="post-button" onclick="checkLoginStatusPost()">Post</button>

        <!-- Modal -->
        <div id="postModal" class="modal">
            <div class="modal-content">
                <h2>Create a Post</h2>
                <form action="/createForumPost.php" method="POST" style="padding:8px">
                    <textarea id="postText" style="padding:8px"name="postText" placeholder="Type your post here" required></textarea>
                    <input type="submit">
                    <button type="button" onclick="closeModal()" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>