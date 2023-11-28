<?php include("./header.php") ?>
<!DOCTYPE html>
<html>
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
           
        width: 100vw;
        height: 100vh;
        background: url('/assets/fall-street-background.webp');
        background-size: cover;
        background-attachment: fixed;
        }

    h1 {
        padding: 16px 16px 16px 16px;
        text-align: center; 
        background-color:#dad490;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0px;
    }
    
    .event-card {
    /* Add shadows to create the "card" effect */
    flex: 1;
    box-shadow: 0 0 12px 0 rgba(0,0,0,0.4);
    /*border: 1px solid black;*/
    transition: 0.3s;
    padding: 8px;
    margin: 8px;
    text-align: center;
    justify-content: center;
    background-color: white;
    font-family: Arial, Helvetica, sans-serif;
    }

    /* On mouse-over, add a deeper shadow */
    .event-card:hover {
    box-shadow: 0 0 12px 0 rgba(0,0,0,0.6);
    }
    .event-card img{
      
    }

    /* Add some padding inside the card container */
    .event-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* Use 1fr to fill available width */
      gap: 16px; /* Adjust the gap between items as needed */
      padding: 16px;
    
    }


    .button {
    display: inline-block;
    border: 1px solid;
    border-color: var(--ssgr);
    background: var(--ssgr);
    padding: 10px 16px;
    border-radius: 4px;
    color: #dad490;
    font-family:'Times New Roman', Times, serif;
}
[id^=modal] {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
}
[id^=modal]:target {
    display: block;
}
input[type=checkbox] {
    position: absolute;
    clip: rect(0 0 0 0);
}
.popup {
    width: 100%;
    height: 100%;
    z-index: 99999;
}
.popup__overlay {
    position: fixed;
    z-index: 1;
    display: block;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: #000000b3;
}
.popup__wrapper {
    position: fixed;
    z-index: 9;
    width: 80%;
    max-width: 1200px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 8px;
    padding: 58px 32px 32px 32px;
    background: #fff;
    font-family: Arial, Helvetica, sans-serif;
}
.popup__close {
    position: absolute;
    top: 16px;
    right: 26px;
}

.link-box {
            display: inline-block;
            text-align: center;
            padding: 16px;
            background-color: var(--ssgr);  /* change as needed */
            color: #dad490;  /* change as needed */
            text-decoration: none;
            width: 15%;  /* change as needed */
            border-radius: 5px; /* rounded corners */
            gap: 16px; /* Adjust the gap between items as needed */
            padding: 16px;
        }
        .right-align {
            text-align: right;
            padding: 10px;
        }
        .link-box:hover {
            background-color: #dad490;  /* change as needed */
            color: var(--ssgr);
        }
        

</style>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            // Fetch data from the endpoint using Fetch API
            fetch('fetchevents.php')
                .then(response => response.json())
                .then(data => {
                    // Process the data and generate event cards
                    const eventsContainer = document.getElementById('event-container');

                    data.forEach(event => {
                        const eventCard = document.createElement('div');
                        eventCard.className = 'event-card';

                        eventCard.innerHTML = `
                            <a href="${event.Link}">
                                <img src="${event['Image Path']}" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>${event.Title}</b></h4>
                                <a class="button" href="#modal${event.ID}">More info</a>
                                <div class="popup" id="modal${event.ID}">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: ${event.Description}</p>
                                        <p>COST:$${event.Cost}</p>
                                        <p>LOCATION: ${event.Location}</p>
                                        <a href="${event.Link}">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        `;

                        eventsContainer.appendChild(eventCard);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
            });
    </script>

    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events</title>
        
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    </head>
    <body>
        <h1>Explore Events Around Your Campus Today!</h1><div class="right-align" style="padding-right: 23px;">
        <a class="link-box" href="https://catalog.csus.edu/academic-calendar/">
            CSUS Calendar 
        </a>
    </div>
    </body>

<div id="event-container"class="event-container">


</div> 


</html>