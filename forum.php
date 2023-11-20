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
        <link rel="stylesheet" href="fourmStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <script>
        jQuery(document).ready(function(){
    getPosts();
});

function getPosts(){
    $.ajax({
        url:'/getForumPosts.php',
        type:'GET',
        dataType: 'json',
        success: function(data){
            updatePage(data);
        },
        error: function(xhr, status, error){
            console.log(status + ': ' + error);
        }
    });
}

function updatePage(data){
    if(data && data.length > 0){  // Check if data is not null and has items
        for(var i = data.length - 1; i >= 0; i--){
            var post = data[i];
            if(post.hasOwnProperty('AUTHOR') && 
                post.hasOwnProperty('POST BODY') && 
                post.hasOwnProperty('LIKES') &&
                post.hasOwnProperty('TIMESTAMP')){

                const postContainer = document.createElement("div");
                postContainer.className = 'post-container';
                const mainContent = document.getElementById('main-content');
                mainContent.appendChild(postContainer);

                const userProfile = document.createElement("div");
                userProfile.className = 'user-profile';
                postContainer.appendChild(userProfile);

                const profileImage = document.createElement("img");
                profileImage.src = post['IMAGE PATH']; // Make sure 'IMAGE PATH' property exists in your data
                userProfile.appendChild(profileImage);

                const profileName = document.createElement("p");
                profileName.textContent = post['AUTHOR']; // Assuming 'AUTHOR' is a property in your data
                userProfile.appendChild(profileName);

                const timeStamp = document.createElement("span");
                timeStamp.textContent = post['TIMESTAMP']; // Assuming 'TIMESTAMP' is a property in your data
                userProfile.appendChild(timeStamp);

                const postText = document.createElement("p");
                postText.className = 'post-text';
                postText.textContent = post['POST BODY']; // Assuming 'POST BODY' is a property in your data
                postContainer.appendChild(postText);

                const activityIcons = document.createElement("div");
                activityIcons.className = 'activity-icons';
                postContainer.appendChild(activityIcons);

                const thumbsUpIcon = document.createElement("span");
                thumbsUpIcon.className = 'post-rating-button material-icons';
                thumbsUpIcon.textContent = 'thumb_up';
                activityIcons.appendChild(thumbsUpIcon);
            }
        }
    }
}

    </script>

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
            <div class="main-content" id="main-content">
                <div class="post-container">
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