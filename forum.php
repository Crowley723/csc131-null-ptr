<!DOCTYPE html>
<html>
<style>
    h1 {
        padding: 16px 16px 16px 16px;   
    }
</style>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum</title>
        <?php include("./header.php") ?>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
        <script src="https://kit.fontawesome.com/31806d8454.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="style.js" defer></script>
    </head>
    <body>
       <!-- <h1>COMMUNITY FORUM</h1> 
        <p>test</p> -->

        <nav>
            <div class="nav-left">
                <h1>Community Fourm</h1>
            </div>
            <div class="nav-right">
                <div class="nav-user-icon online">
                    <img src="images/profile-pic.png">
                </div>

            </div>
        </nav>

        <div class="container">
        <!-------- left-sidebar -------- -->    
            <div class="left-sidebar">

            </div>
        <!-------- main-content -------- --> 
            <div class="main-content">

                <div class="post-container" data-post-id="7712">
                <div class="user-profile">
                        <img src="images/profile-pic.png">
                        <div>
                            <p>Carol Jones</p>
                            <span>October 19 2023, 3:23 pm</span>
                        </div>
                    </div>
                    <p class="post-text">Making websites suck</p>
                    <div class="post-row">
                        <div class="activity-icons">
                        <span class="post-rating-button material-icons">thumb_up</span>
                        </div>
                    </div>
                </div>
                <div class="post-container">
                <div class="user-profile">
                        <img src="images/member-1.png">
                        <div>
                            <p>Scarlett</p>
                            <span>june 06 2023, 6:66 pm</span>
                        </div>
                    </div>
                    <p class="post-text">Sac State has the worst cs department</p>
                    <div class="post-row">
                        <div class="activity-icons">
                        <span class="post-rating-button material-icons">thumb_up</span>
                        </div>
                    </div>
                </div>

            </div>
        <!-------- right-sidebar -------- --> 
            <div class="right-sidebar">
                <div class="sidebar-title">
                    <a href="#"><i class="fa-solid fa-square-plus fa-2xl"></i><p>Add Post</p></a>
                </div>
                </div>
        </div>

</body>
</html>