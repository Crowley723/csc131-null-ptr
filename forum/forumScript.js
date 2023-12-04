// Function to open the modal
function openModal() {
    document.getElementById('postModal').style.display = 'flex';
  }
  
  // Function to close the modal
  function closeModal() {
    document.getElementById('postModal').style.display = 'none';
  }
  
  // Function to submit the post
  function submitPost() {
    const postContent = document.getElementById('postText').value;
    // You can perform actions with the submitted content here, such as sending it to a server
    console.log('Submitted Post:', postContent);
    closeModal(); // Close the modal after submission (You might want to modify this behavior)
  }

    jQuery(document).ready(function(){
        getPosts();
    });

function getPosts(){
    $.ajax({
        url:'/forum/getForumPosts.php',
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

function updatePage(dataUnsorted){
    dataUnsorted.sort(function(a, b) {
    // Change '<' to '>' for descending order
    return a.TIMESTAMP.localeCompare(b.TIMESTAMP);
});
data = dataUnsorted;
console.log(data);
    if(data && data.length > 0){
        for(var i = data.length - 1; i >= 0; i--){
            var post = data[i];
            if( post.hasOwnProperty('FULL NAME') &&
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

                
                var identicon = new Image();
                identicon.src = "data:image/png;base64," + post['ICON'];
                userProfile.appendChild(identicon);

                const profileTextContainer = document.createElement("div");
                userProfile.appendChild(profileTextContainer);

                const profileName = document.createElement("p");
                profileName.textContent = post['FULL NAME'];
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
                thumbsUpIcon.className = 'like-btn';
                const postID = post['ID']
                thumbsUpIcon.onclick = function(){
                    checkLoginStatusLike(this.parentNode.parentNode.parentNode.parentNode.id);
                    
                }; 
                if(post['USER LIKED'] == 1){
                    thumbsUpIcon.innerText = '👎';
                }else{
                    thumbsUpIcon.innerText = '👍';
                }
                
                likeButton.appendChild(thumbsUpIcon);

                const thumbsUpCounter = document.createElement("span");
                thumbsUpCounter.className = 'like-count';
                thumbsUpCounter.innerText = post['LIKES'];
                likeButton.appendChild(thumbsUpCounter);
                
            }else{
                console.log("Missing Fields for Posts");
            }
        }
    }
}
function showLoginPopup() {
    showOverlay();
    var popup = document.getElementById("loginPopup");
    popup.style.display = "block";
}

// Function to close the login pop-up
function closePopup() {
    var popup = document.getElementById("loginPopup");
    popup.style.display = "none";
    hideOverlay();
}
function showOverlay() {
    $("#overlay").show();
}
function hideOverlay() {
    $("#overlay").hide();
}



function checkLoginStatusPost(){
    $.ajax({
      type: "POST",
      url: "/account/checkLoginStatus.php",
      success: function (response) {
        if (response === "authenticated") {
            openModal()
            return true;
        } else {
          showLoginPopup();
          return false;
        }
      },
      error: function (error) {
        console.log("Error checking login status: " + error);
      }
    });
}
function checkLoginStatusLike(postID){
    $.ajax({
      type: "POST",
      url: "/account/checkLoginStatus.php",
      success: function (response) {
        if (response === "authenticated") {
            
            toggleLike(postID);
            return true;
        } else {
         showLoginPopup();
          return false;
        }
      },
      error: function (error) {
        console.log("Error checking login status: " + error);
      }
    });
}
function checkLoginStatus(){
    $.ajax({
      type: "POST",
      url: "/account/checkLoginStatus.php",
      success: function (response) {
        if (response === "authenticated") {
            return true;
        } else {
          return false;
        }
      },
      error: function (error) {
        console.log("Error checking login status: " + error);
      }
    });
}
function toggleLike(parentID){
    $.ajax({
        type: "POST",
        url: "/forum/handleToggleLikePost.php",
        data: jQuery.param({ PostID: parentID }),
        contentType: "application/x-www-form-urlencoded",
        success: function (response) {
            // Check if the toggle was successful
            updatePost(parentID);
            
        },
        error: function (error) {
            console.log("Error toggling like: " + error);
        }
    });
}
function updatePost(parentID){
    $.ajax({
        url: '/forum/getSingleForumPost.php', // Adjust the URL to fetch a single post
        type: 'GET',
        data: jQuery.param({ PostID: parentID }),
        contentType: "application/x-www-form-urlencoded",
        success: function (postData) {
            // Find and update the existing post on the page
            var postContainer = document.getElementById(parentID);
            if (postContainer) {
                // Update the likes count and button based on the response
                var likeButton = postContainer.querySelector('.like-button');
                var thumbsUpCounter = likeButton.querySelector('.like-count');
                var thumbsUpIcon = likeButton.querySelector('.like-btn');
    
                thumbsUpCounter.innerText = postData['LIKES'];
                console.log(postData);

                if (postData['USER LIKED'] == 1) {
                    thumbsUpIcon.innerText = '👎';
                } else {
                    thumbsUpIcon.innerText = '👍';
                }
            } else {
                console.log("Post container not found");
            }
        },
        error: function (error) {
            console.log("Error loading single post:" + error);
        }
    });
}