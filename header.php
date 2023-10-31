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
    max-width: 1240px;
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

.signin {
    display: flex;
    float: right;
    justify: space-between;
    justify-content: right;
    background-color: var(--rwgr);
    width: 100%;
    flex-wrap: nowrap;
    margin: 0 auto;
    

}
.signin a{
    padding: 0.5rem;
    color: var(--white);
    font-size: 1.25rem;
    font-weight: 600;
    text-align: center;
    padding: 0.5rem 1rem;
    text-decoration: none;

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
}

@media screen and (max-width: 600px) {
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
.img { 
    max-width: 100%;
    width: 45%;
    min-width: 180px;
    vertical-align: middle;
    border-style: none;
    box-sizing: content-box;
    line-height: 30px;
    display: inline-flex;
    flex: 0 0 35%;
}

</style>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
<div>
    <div class="signin">
        <div id="google_translate_element" style="color: var(--white)"></div>
        <a href="#/signin.php">Sign In</a>

    </div>
    <div style="clear: both;"></div>
    <div class="topnav" id="topnav">
        <div class="container nav">
            <img src="/assets/sac-state-logo.png" class="img">  
            <a href="/">Hello</a>
            <a href="#/events.php">Events</a>
            <a href="#/forum.php">Community Forum</a>
            <a href="#/map.php">Map</a>
            <a href="#/faq.php">Info</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="showHamburgerMenu()">&#9776;</a>
        </div>
</div>
<script type="text/javascript">
    function showHamburgerMenu() {
      var x = document.getElementById("topnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>
</div>

<?php

?>