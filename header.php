<?php session_start(); ?>
<!DOCTYPE html>
<style>
:root {
  --rwgr: #043124;
  --ssgr: #004e38;
  --stgr: #008554;
  --spgr: #55ba47;
  --gvgr: #e6ea85;
  --hgo: #e6b711;
  --hgob: #fac606;
  --hgobmd: #fcdc69;
  --hgoblt: #fde89b;
  --wgo: #dad490;
  --wgomd: #e8e5bc;
  --wgolt: #f2f0d9;
  --brz: #cfb668;
  --brzdk: #524829;
  --white: #fff;
  --graymin: #ddd;
  --graylt: #aaa;
  --graymd: #777;
  --graydk: #333;
  --black: #000;
  --rwgr80a: rgba(4, 49, 36, 0.8);
  --rwgr60a: rgba(4, 49, 36, 0.6);
  --rwgr40a: rgba(4, 49, 36, 0.4);
  --rwgr20a: rgba(4, 49, 36, 0.2);
  --rwgr00a: rgba(4, 49, 36, 0);
  --ssgr80a: rgba(0, 78, 56, 0.8);
  --ssgr60a: rgba(0, 78, 56, 0.6);
  --ssgr40a: rgba(0, 78, 56, 0.4);
  --ssgr20a: rgba(0, 78, 56, 0.2);
  --ssgr00a: rgba(0, 78, 56, 0);
  --stgr80a: rgba(0, 133, 84, 0.8);
  --stgr60a: rgba(0, 133, 84, 0.6);
  --stgr40a: rgba(0, 133, 84, 0.4);
  --stgr20a: rgba(0, 133, 84, 0.2);
  --stgr00a: rgba(0, 133, 84, 0);
  --spgr80a: rgba(0, 133, 84, 0.8);
  --spgr60a: rgba(0, 133, 84, 0.6);
  --spgr40a: rgba(0, 133, 84, 0.4);
  --spgr20a: rgba(0, 133, 84, 0.2);
  --spgr00a: rgba(0, 133, 84, 0);
  --hgob80a: rgba(250, 198, 6, 0.8);
  --hgob60a: rgba(250, 198, 6, 0.6);
  --hgob40a: rgba(250, 198, 6, 0.4);
  --hgob20a: rgba(250, 198, 6, 0.2);
  --hgob00a: rgba(250, 198, 6, 0);
  --wgo80a: rgba(218, 212, 144, 0.8);
  --wgo60a: rgba(218, 212, 144, 0.6);
  --wgo40a: rgba(218, 212, 144, 0.4);
  --wgo20a: rgba(218, 212, 144, 0.2);
  --wgo00a: rgba(218, 212, 144, 0);
  --black80a: rgba(0, 0, 0, 0.8);
  --black60a: rgba(0, 0, 0, 0.6);
  --black40a: rgba(0, 0, 0, 0.4);
  --black20a: rgba(0, 0, 0, 0.2);
  --black00a: rgba(0, 0, 0, 0);
  --white80a: rgba(255, 255, 255, 0.8);
  --white60a: rgba(255, 255, 255, 0.6);
  --white40a: rgba(255, 255, 255, 0.4);
  --white20a: rgba(255, 255, 255, 0.2);
  --white00a: rgba(255, 255, 255, 0);
  --hero-dropshadow: 0 1px 2px rgba(0, 0, 0, .5);
  --spotlt: rgb(230, 234, 133);
  --spotbt: #ffffbb;
  --all-corners: .25rem .25rem .25rem .25rem;
  --tab-top-corners: 0.25rem 0.25rem 0 0;
  --tab-bottom-corners: 0 0 .25rem .25rem;

  ::-webkit-input-placeholder {
    font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
:-moz-placeholder {
    font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
::-moz-placeholder {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
:-ms-input-placeholder {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

}
body {
  margin:0;
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
* {

}
.title-shit{
    padding: 1vh 0;
    text-align: center;
    background-color: var(--wgo);
    color: black;
    margin: 0px;
    height: 20vh;
    max-height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.title-shit h1{
  padding: 2vh 2vw;
  
}
.top-nav {
    overflow: hidden;
    background-color: var(--white);
    padding: 1vh 0 1vh;
    box-sizing: border-box;
}
.top-nav-content-container {
    width: 90%;
    max-width: 1400px;
    flex-wrap: nowrap;
    margin: 0 auto;
    display: flex;
}
.signin-box{
  margin: auto;
  width: 25%;
  text-align: center;
  border: 3px solid green;
  padding: 10px;
}
.signin-box .img-container{
  width: inherit;
  height: inherit;
}
.signin-nav {
    display: flex;
    justify-content: space-between;
    background-color: var(--rwgr);
    width: 100%;
    margin: 0 auto;
    padding: 0.5rem;
    box-sizing: border-box;
}
.signin-nav a, .account-dropdown{
    padding: 0.5rem;
    color: var(--white);
    font-size: 1.25rem;
    font-weight: 600;
    text-align: center;
    padding: 0.5rem 1.5rem;
    text-decoration: none;

}
.signup-box {
  margin: 16px auto 16px;
  width : 25%;
  padding: 20px 10px 50px;
  text-align: center;
  border: 1px solid green;
  box-shadow: 3px 3px 3px grey;
  background-color: white;

}
.signup-box .entry-label {
  text-align: left;
}
.signup-box .form-container{
  padding: 16px 16px 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-bottom: 0;

}
.signup-box input:not([type="checkbox"]) {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid var(--black40a);
  box-sizing: border-box;
}
.signup-box input[type="password"] {
 /* margin-bottom: 0px;*/
}
.signup-button {
  color: var(--rwgr);
}

.signup-box .password-validation{
  display: flex;
  flex-direction: column;
  justify-content: left;
  text-align: left;
  font-size: 12px;
  font-weight: bold;
  display: none;
}
.signup-box .separator {
  display: flex;
  align-items: center;
  text-align: center;
  padding: 10px 0;
}

.signup-box .line {
  flex-grow: 1;
  height: 1px;
  background-color: var(--black40a);
  margin: 0 10px;
}

.signup-box .text {
  color: var(--black40a);
}
.password-validation li{
  color: red;
  margin-top: 0px;
}
.existingAccount {
  font-size: 1.25rem;
  display: inline-block;
}

.top-nav a {
    float: left;
    display: block;
    color: var(--black);
    min-width: 7.5vw;
    z-index: auto;
    text-align: center;
    padding: 0.5rem 1rem;
    text-decoration: none;
    font-size: 1.25rem;
    font-weight: 600;
    transition: color 1s;
    box-sizing: border-box;
    
}
.top-nav .nav a:hover{
    color: var(--brz);
    
}
.top-nav .icon {
    display: none;
}

@media screen and (max-width: 1100px) {
  .top-nav-content-container {
    width: 90%; /* Adjusted width for better responsiveness */
  }

  .top-nav a {
    min-width: auto; /* Allowing buttons to adjust their width based on content */
  }
}

@media screen and (max-width: 600px) {
  .top-nav-content-container {
    flex-wrap: wrap; /* Allow items to wrap to the next line on small screens */
  }

  .top-nav a:not(:first-child),
  .dropdown .dropbtn {
    display: none;
  }

  .top-nav a.icon {
    float: right;
    display: block;
  }

  .top-nav.responsive {
    position: relative;
  }

  .top-nav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }

  .top-nav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

  .top-nav.responsive .dropdown {
    float: none;
  }

  .top-nav.responsive .dropdown-content {
    position: relative;
  }

  .top-nav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }

  .signin-box,
  .signup-box {
    width: 90%; /* Adjusted width for better responsiveness */
  }

  /* Additional styles to stack menu items vertically when the menu is open */
  .top-nav.responsive .nav {
    flex-direction: column;
    align-items: stretch;
  }
}

.buttonIndent {
 text-indent: 20px
}
.signup-box button{
  background-color: var(--stgr);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-size: 17px;
}
.top-nav .img { 
    /*height: 51px;
    width: 500px;*/
    max-height: 100%;
    max-width: 100%;
    width: auto;
    height: auto;

    border-style: none;
    box-sizing: content-box;
    line-height: 30px;
    display: inline-flex;
    align-self: center;
}

.account-dropdown {
    position: relative;
    display: flex;
    justify-content: space-between; /* Changed from justify to justify-content */
    background-color: var(--rwgr);
    flex-wrap: nowrap;
    font-weight: 600;
    z-index: 1;
}
.account-dropdown a {
  background-color: var(--stgr);
  color: white;
  border: none;
  cursor: pointer;
  font-size: 17px;
  text-align: right;
}

/* Style for the dropdown button */
.dropbtn {
    color: white;
    font-size: 1.25rem;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center; /* Added to vertically center content */
}

/* Style for the dropdown content */

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 2;
    white-space: nowrap;
    max-height: 200px;
    overflow-y: auto;

    /* Position the top of the dropdown at the bottom of the root element */
    top: 100%;
    bottom: auto;
    right: 0;
    left: auto;
}

/* Style for the buttons inside the dropdown */
.dropdown-content a {
    display: block;
    padding: 10px;
    text-align: left;
}

/* Show the dropdown content when hovering over the dropdown button */
.account-dropdown:hover .dropdown-content {
    display: block;
}

.success-overlay {
  display: none; /*block is enabled*/
  position: fixed;
  top: 20%;
  left: 50%;
  transform: translateX(-50%);
  background-color: var(--spgr80a);
  color: white;
  padding: 20px;
  border-radius: 5px;
  z-index: 999;
  opacity: 1;
  transition: opacity 1s ease-in-out;
  cursor: pointer;
}
.success-overlay.hidden {
    opacity: 0;
    pointer-events: none;
}



</style>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  
<?php 
if(isset($_SESSION['Email']) && isset($_SESSION['FullName']) && isset($_SESSION['Login Success']) && $_SESSION['Login Success'] === TRUE){
  echo "showLoginSuccessOverlay();";
  $_SESSION['Login Success'] = FALSE;
}else if(isset($_SESSION['Signup Success']) && ($_SESSION['Signup Success'] === TRUE)){
  echo "showSignupSuccessOverlay();";
  $_SESSION['Signup Success'] = FALSE;
} else if(isset($_SESSION['Logout Success']) && $_SESSION['Logout Success'] === TRUE){
  echo "showLogoutSuccessOverlay();";
  $_SESSION['Logout Success'] = FALSE;
}
?>
  

});


function showLoginSuccessOverlay() {
    var overlay = document.getElementById('login-success-overlay');
    overlay.style.display = 'block';

    setTimeout(function () {
        overlay.classList.add('hidden');
    }, 5000);
}
function showSignupSuccessOverlay() {
    var overlay = document.getElementById('signup-success-overlay');
    overlay.style.display = 'block';

    setTimeout(function () {
        overlay.classList.add('hidden');
    }, 5000);
}
function showLogoutSuccessOverlay() {
    var overlay = document.getElementById('logout-success-overlay');
    overlay.style.display = 'block';

    setTimeout(function () {
        overlay.classList.add('hidden');
    }, 5000);
}
function closeLoginOverlay(){
  var overlay = document.getElementById('login-success-overlay');
  overlay.classList.add('hidden');
}
function closeSignupOverlay(){
  var overlay = document.getElementById('signup-success-overlay');
  overlay.classList.add('hidden');
}
function closeLogoutOverlay(){
  var overlay = document.getElementById('logout-success-overlay');
  overlay.classList.add('hidden');
}

function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    autoDisplay: false,
    multianguagePage: true
  }, 'google_translate_element');
}

function setLanguage(selectedLanguage) {
    // Set the language in cookies
    document.cookie = "selectedLanguage=" + selectedLanguage;
    // Change the language of the Google Translate Element
    var translateElement = document.querySelector('.goog-te-combo');
    translateElement.value = selectedLanguage;
    translateElement.dispatchEvent(new Event('change'));
}

function checkCookie() {
  var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)selectedLanguage\s*=\s*([^;]*).*$)|^.*$/, "$1");
  if (cookieValue) {
      // Use the stored language preference
      setLanguage(cookieValue);
  } else {
      // Show the language selector popup
      googleTranslateElementInit();
  }
}
window.onload = checkCookie;

function showHamburgerMenu() {
    var x = document.getElementById("top-nav");
    if (x.className === "top-nav") {
      x.className += " responsive";
    } else {
      x.className = "top-nav";
    }
  }

$(document).ready(function() {
    // Perform an AJAX request to get the identicon based on the user's email
  $.ajax({
    type: 'GET',
    url: '/account/generateUserIcon.php',
    success: function(data) {
      // Set the image source to the data received from the server
      $('#identicon').attr('src', 'data:image/png;base64,' + data.image);
    },
    error: function() {
      console.error('Failed to load identicon.');
    }
  });
});


</script>


<!--if(isset($_SESSION['Email']) && isset($_SESSION['FullName'])) {
                  echo "<a href=\"#/account/dashboard.php\">Dashboard</a>";
                  echo "<a href=\"/account/logout.php\">Logout</a>";
                } else{
                  echo "<a href=\"/account/login.php\">Login</a>";
                }
                ?>//-->
<div>
<div class="signin-nav">
  <div id="google_translate_element" style="color: var(--white); align-content: center; float: right; margin-right: auto"></div>
  <div id="user-account" style="display: none">Hello </div>
  <!--a href="/account/login.php">Sign In</a//-->

  <div id="login-success-overlay" class="success-overlay" onclick="closeLoginOverlay()">You have been logged in!</div>
  <div id="signup-success-overlay" class="success-overlay" onclick="closeSuccessOverlay()">You have been signed up!</div>
  <div id="logout-success-overlay" class="success-overlay" onclick="closeLogoutOverlay()" style="background-color: rgba(200, 0, 0, 0.8)">You have been logged out!</div>

  <?php
  if(isset($_SESSION['Email']) && isset($_SESSION['FullName'])) {
    echo "<div class=\"account-dropdown\">
            <div id=\"identicon-container\">
              <img id=\"identicon\" style=\"max-width: 35px; max-height: 35px; border: 1px solid black; border-radius: 50%;\"class=\"dropbtn\">
            </div>
            <div class=\"dropdown-content\">
              <a href=\"/account/dashboard.php\">Dashboard</a>
              <a href=\"/account/logout.php\">Logout</a>
            </div>
          </div>";
  } else{
    echo "<a href=\"/account/login.php\">Log In</a>";
  }
  ?>  

</div>
<div style="clear: both;"></div>
<div class="top-nav" id="top-nav">
  <div class="top-nav-content-container nav">
      <img src="/assets/sac-state-logo-correct-500.png" class="img">  
      <a href="/">Home</a>
      <a href="/events/events.php">Events</a>
      <a href="/forum/forum.php">Community Forum</a>
      <a href="/map.php">Map</a>
      <a href="/faq.php">FAQ</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="showHamburgerMenu()">&#9776;</a>
  </div>
</div>
<script type="text/javascript">
  
    
  </script>
</div>

<?php

?>