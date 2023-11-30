<?php include("./header.php") ?>
<!DOCTYPE html>
<html>
<style>

body {
        
    width: 100vw;
    height: 100vh;
    background: url('/assets/fall-street-background.webp');
    background-size: cover;
    background-attachment: fixed;
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
    color: var(--wgo);
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
    color: var(--wgo);  /* change as needed */
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
    background-color: var(--wgo);  /* change as needed */
    color: var(--ssgr);
}
html, body {
    max-width: 100%;
    overflow-x: hidden;
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
        <div class="title-shit"><h1>Explore Events Around Your Campus Today!</h1></div>
        
        <div class="right-align" style="padding-right: 23px;">
        <a class="link-box" href="https://catalog.csus.edu/academic-calendar/">CSUS Calendar </a>
    </div>
    </body>

<div id="event-container"class="event-container">


</div> 


</html>