<?php session_start(); ?>
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
}
body {
  margin:0;
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}
.topnav {
    overflow: hidden;
    background-color: var(--white);
    margin-left: auto;
    margin-right: auto; 
    padding: 2rem 0 2rem;
    box-sizing: border-box;
    clear: both;
}
.container {
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
    float: right;
    justify: space-between;
    justify-content: right;
    background-color: var(--rwgr);
    width: 100%;
    flex-wrap: nowrap;
    margin: 0 auto;
    

}
.signin-nav a, .account-dropdown{
    padding: 0.5rem;
    color: var(--white);
    font-size: 1.25rem;
    font-weight: 600;
    text-align: center;
    padding: 0.5rem 1rem;
    text-decoration: none;

}
.signup-box {
  margin: auto;
  width : 25%;
  padding: 10px;
  text-align: center;
  border: 1px solid green;
  box-shadow: 3px 3px 3px grey;

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
.signup-box input {
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

.topnav a {
    float: left;
    display: block;
    color: var(--black);
    min-width: 160px;
    z-index: auto;
    text-align: center;
    padding: 0.5rem 1rem;
    text-decoration: none;
    font-size: 1.25rem;
    font-weight: 600;
    transition: color 1s;
}
.topnav .nav a:hover{
    color: var(--brz);
}
.topnav .icon {
    display: none;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
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
.topnav .img { 
    max-width: 100%;
    min-width: 180px;
    width: 45%;
    border-style: none;
    box-sizing: content-box;
    line-height: 30px;
    display: inline-flex;
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


</style>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
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
    var x = document.getElementById("topnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
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
  <?php
  if(isset($_SESSION['Email']) && isset($_SESSION['FullName'])) {
    echo "<div class=\"account-dropdown\">
            <div id=\"identicon-container\">
              <img id=\"identicon\" style=\"max-width: 35px; max-height: 35px; border: 1px solid black;\"class=\"dropbtn\">
            </div>
            <div class=\"dropdown-content\">
              <a href=\"#/account/dashboard.php\">Dashboard</a>
              <a href=\"/account/logout.php\">Logout</a>
            </div>
          </div>";
  } else{
    echo "<a href=\"/account/login.php\">Sign In</a>";
  }
  ?>  

</div>
<div style="clear: both;"></div>
<div class="topnav" id="topnav">
  <div class="container nav">
      <img src="/assets/sac-state-logo.png" class="img">  
      <a href="/">Home</a>
      <a href="/events.php">Events</a>
      <a href="/forum.php">Community Forum</a>
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