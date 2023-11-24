<?php include("./header.php") ?>
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
        
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
        <script src="https://kit.fontawesome.com/31806d8454.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="fourmStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="forumScript.js"></script>
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
function likePost(){
    //need to get id of parent post to increment likes.

    $.ajax({
        url:'/handleLikePost.php',
        type:'POST',
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
    if(data && data.length > 0){
        for(var i = data.length - 1; i >= 0; i--){
            var post = data[i];
            if(post.hasOwnProperty('AUTHOR') && 
                post.hasOwnProperty('POST BODY') && 
                post.hasOwnProperty('LIKES') &&
                post.hasOwnProperty('TIMESTAMP')){

                const postContainer = document.createElement("div");
                postContainer.className = 'post-container';
                postContainer.id = post['ID'];
                const mainContent = document.getElementById('main-content');
                mainContent.appendChild(postContainer);

                const userProfile = document.createElement("div");
                userProfile.className = 'user-profile';
                postContainer.appendChild(userProfile);

                const profileImage = document.createElement("img");
                profileImage.src = post['IMAGE PATH']; 
                userProfile.appendChild(profileImage);

                const profileTextContainer = document.createElement("div");
                userProfile.appendChild(profileTextContainer);

                const profileName = document.createElement("p");
                profileName.textContent = post['AUTHOR'];
                profileTextContainer.appendChild(profileName);


                const timestampOptions = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true,
                };
                const dateObject = new Date(post['TIMESTAMP']);

                const timeStamp = document.createElement("span");
                timeStamp.textContent = dateObject.toLocaleString('en-US', timestampOptions); 
                profileTextContainer.appendChild(timeStamp);

                const postText = document.createElement("p");
                postText.className = 'post-text';
                postText.textContent = post['POST BODY']; 
                postContainer.appendChild(postText);

                const postRow = document.createElement("div");
                postRow.className = 'post-row';
                postContainer.appendChild(postRow);



                const activityIcons = document.createElement("div");
                activityIcons.className = 'activity-icons';
                postRow.appendChild(activityIcons);
            
                const likeButton = document.createElement("div");
                likeButton.className = 'like-button';
                activityIcons.appendChild(likeButton);
                
                const thumbsUpIcon = document.createElement("button");
                thumbsUpIcon.id = 'likeBtn2';
                thumbsUpIcon.className = 'like-btn';
                const postID = post['ID']
                thumbsUpIcon.onclick = function(){
                    toggleLike(postID);
                }; 
                thumbsUpIcon.innerText = '👍';
                likeButton.appendChild(thumbsUpIcon);

                const thumbsUpCounter = document.createElement("span");
                thumbsUpCounter.className = 'like-count';
                thumbsUpCounter.innerText = post['LIKES'];
                likeButton.appendChild(thumbsUpCounter);
                
            }
        }
    }
}

</script>

<body>
    <!--<h1>Community Fourm</h1>-->
    <nav>
        <div class="nav-left">
            <h1>Community Fourm</h1>
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
                <!-- Thumbs Up Button -->
                <div class="like-button">
                    <button onclick="toggleLike(1)" id="likeBtn1" class="like-btn">👍</button>
                    <span id="likeCount1" class="like-count">0</span>
                </div>
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
                <!-- Thumbs Up Button -->
                    <div class="like-button">
                        <button onclick="toggleLike(2)" id="likeBtn2" class="like-btn">👍</button>
                        <span id="likeCount2" class="like-count">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------- right-sidebar -------- --> 
    <div class="right-sidebar">
        <!-- Post Button -->
        <button class="post-button" onclick="openModal()">Post</button>

        <!-- Modal -->
        <div id="postModal" class="modal">
            <div class="modal-content">
                <h2>Share Your Thoughts</h2>
                <form action="/addPost.php" method="POST">
                    <textarea id="postText" name="postText" placeholder="Type your post here" required></textarea>
                    <input type="submit">
                    <button type="button" onclick="closeModal()" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>