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
// Function to handle the like functionality
function toggleLike(buttonId) {
    const likeBtn = document.getElementById(`likeBtn${buttonId}`);
    const likeCount = document.getElementById(`likeCount${buttonId}`);
  
    // Get the current like count
    let currentCount = parseInt(likeCount.innerText);
  
    // Toggle the like status
    if (likeBtn.innerText === '👍') {
      likeBtn.innerText = '👎';
      likeBtn.style.backgroundColor = '#efefef'; // Change color when liked
      currentCount++;
    } else {
      likeBtn.innerText = '👍';
      likeBtn.style.backgroundColor = '#efefef'; // Change color back when unliked
      currentCount--;
    }
  
    // Update the like count
    likeCount.innerText = currentCount;
  }
  