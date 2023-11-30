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

/* Apply hover effect to images within the event-card */
.event-card img:hover {
    opacity: 0.8; /* Adjust the opacity as needed */
    transition: opacity 0.3s ease; /* Add a smooth transition effect */
}

/* Optional: Add a border or box-shadow on hover */
.event-card img:hover {
    border: 2px solid var(--ssgr); /* Adjust the border color and width as needed */
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.4); /* Adjust the box-shadow as needed */
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

    <div id="event-container" class="event-container">


<div class="event-card">
                            <a href="https://www.eventbrite.com/e/christmas-potluck-brunch-registration-737288207877?aff=ebdssbdestsearch
">
                                <img src="/assets/potLockEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>Potluck Brunch</b></h4>
                                <a class="button" href="#modal1">More info</a>
                                <div class="popup" id="modal1">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: </p>
                                        <p>COST:$0</p>
                                        <p>LOCATION: Spiritual Life Center 2201 Park Towne Circle Sacramento, CA 95825</p>
                                        <a href="https://www.eventbrite.com/e/christmas-potluck-brunch-registration-737288207877?aff=ebdssbdestsearch
">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://www.eventbrite.com/e/the-official-christmas-bar-crawl-sacramento-tickets-754319880067?aff=ebdssbdestsearch">
                                <img src="/assets/BarCrawlEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>Christmas Bar Crawl</b></h4>
                                <a class="button" href="#modal2">More info</a>
                                <div class="popup" id="modal2">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: Join us for the ultimate Christmas bar crawl in Sacramento, where the holiday spirit and good times collide on December 16th, 2023</p>
                                        <p>COST:$10</p>
                                        <p>LOCATION: Tipsy Putt 630 K Street ##120 Sacramento, CA 95814</p>
                                        <a href="https://www.eventbrite.com/e/the-official-christmas-bar-crawl-sacramento-tickets-754319880067?aff=ebdssbdestsearch">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://www.eventbrite.com/e/muppet-christmas-carol-1992-tickets-712168082907?aff=ebdssbdestsearch
">
                                <img src="/assets/muppetsCarol.webp" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>Muppet Christmas Carol
</b></h4>
                                <a class="button" href="#modal3">More info</a>
                                <div class="popup" id="modal3">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: The Muppets present their own touching rendition of Charles Dickens' classic tale.</p>
                                        <p>COST:$10</p>
                                        <p>LOCATION: Crest Theatre 1013 K St Sacramento, CA 95814</p>
                                        <a href="https://www.eventbrite.com/e/muppet-christmas-carol-1992-tickets-712168082907?aff=ebdssbdestsearch
">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://allevents.in/sacramento/psychic-medium-john-edward-sacramento-ca/200025316912244?ref=eventlist-cat#">
                                <img src="/assets/psychicEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>Psychic Medium John Edward</b></h4>
                                <a class="button" href="#modal4">More info</a>
                                <div class="popup" id="modal4">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: See Psychic Medium John Edward live on tour! This is your chance to be part of a live group audience to watch John Edward connect with the other side. There will be question and answer sessions and messages from the other side. Is someone waiting to talk to you?</p>
                                        <p>COST:$0</p>
                                        <p>LOCATION: Hilton Sacramento Arden West, 2200 Harvard St,Sacramento,CA,United States</p>
                                        <a href="https://allevents.in/sacramento/psychic-medium-john-edward-sacramento-ca/200025316912244?ref=eventlist-cat#">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://allevents.in/sacramento/kawaii-rave-sacramento-21/10000740931495047?ref=eventlist-cat#">
                                <img src="/assets/raveEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>Kawaii Rave</b></h4>
                                <a class="button" href="#modal5">More info</a>
                                <div class="popup" id="modal5">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: Anime Inspired Rave Specializing in EDM, K-Pop, Hyperpop and Cosplay</p>
                                        <p>COST:$15</p>
                                        <p>LOCATION: 2326 J St, 2326 J Street, Sacramento, United States </p>
                                        <a href="https://allevents.in/sacramento/kawaii-rave-sacramento-21/10000740931495047?ref=eventlist-cat#">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://allevents.in/sacramento/v1011-holiday-jam-2023/210003072356559?ref=eventlist-cat#">
                                <img src="/assets/e40Event.webp" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>E-40's Holiday Jam</b></h4>
                                <a class="button" href="#modal6">More info</a>
                                <div class="popup" id="modal6">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: E-40 which is specially known for Music, Hip-Hop/Rap.
Mya which is specially known for Music, R&amp;B.
Blackstreet which is specially known for Music, R&amp;B.
Mistah Fab which is specially known for Music, Hip-Hop/Rap.
DJ Quik which is specially known for Music, Hip-Hop/Rap.
Sage the Gemini which is specially known for Music, Hip-Hop/Rap.
Baby Bash which is specially known for Music, R&amp;B.
Frankie J which is specially known for Music, R&amp;B.
Petey Pablo which is specially known for Music, Hip-Hop/Rap.
Lumidee which is specially known for Music, R&amp;B.
Lighter Shade of Brown which is specially known for Music, Hip-Hop/Rap.</p>
                                        <p>COST:$50</p>
                                        <p>LOCATION: Golden 1 Center, Sacramento, United States</p>
                                        <a href="https://allevents.in/sacramento/v1011-holiday-jam-2023/210003072356559?ref=eventlist-cat#">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://www.eventbrite.com/e/mlk-celebration-sacramento-celebrating-25-years-january-27-2024-tickets-528732983587">
                                <img src="/assets/MLKEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>MLK 25th Celebration</b></h4>
                                <a class="button" href="#modal7">More info</a>
                                <div class="popup" id="modal7">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: Description: The Annual MLK Celebration symbolizes the principles of freedom and unity and the celebration of diversity that highlighted the life of Dr. Martin Luther King Jr. Hosted in the Capital of California, this event serves as one of the largest gatherings of elected officials, judicial members, law enforcement, nonprofits, community members, business leaders and students from our region and beyond. Your sponsorship will enable us to energize and help the next generation connect to the work of those who have come before them.</p>
                                        <p>COST:$65</p>
                                        <p>LOCATION: 6000 J Street University Student Union Sacramento, CA 95819-6022</p>
                                        <a href="https://www.eventbrite.com/e/mlk-celebration-sacramento-celebrating-25-years-january-27-2024-tickets-528732983587">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://allevents.in/sacramento/new-year-challenge-year-of-the-dragon-2024;-2024;-2024-mile-save-$2/10000722542312507?ref=eventlist-cat#">
                                <img src="/assets/yearOfDragonEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>New Year Challenge of the Dragon</b></h4>
                                <a class="button" href="#modal8">More info</a>
                                <div class="popup" id="modal8">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION: </p>
                                        <p>COST:$18</p>
                                        <p>LOCATION: Participate from home! Sacramento, CA 95813</p>
                                        <a href="https://allevents.in/sacramento/new-year-challenge-year-of-the-dragon-2024;-2024;-2024-mile-save-$2/10000722542312507?ref=eventlist-cat#">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div><div class="event-card">
                            <a href="https://allevents.in/sacramento/hot-and-funny-comedians/10000699177076457?ref=eventlist-cat#">
                                <img src="/assets/comedyEvent.jpg" alt="Event Image" style="width:50%">
                            </a>
                            <div class="text-container">
                                <h4><b>Hot and Funny Comedians</b></h4>
                                <a class="button" href="#modal9">More info</a>
                                <div class="popup" id="modal9">
                                    <a class="popup__overlay" href="#"></a>
                                    <div class="popup__wrapper">
                                        <a class="popup__close" href="#">Close</a>
                                        <p>DESCRIPTION:  S?ee Sureni Weerasekera and Sydney Stigerts live at Sacramento Comedy Spot!

Both comedians have garnered followings on social media through stand-up and are regulars in the festival circuit.

Sydney Stigerts: With her blonde pompadour and blunt sarcasm, Sydney Stigerts established herself in the comedy scene at a young age. She delights in skewering her millennial peers almost as much as she likes mocking her queer community. On stage, she is high energy, relatable, and would love to tell you a story. Sydney has taken social media by storm and has become a viral sensation. She has performed at Big Pine Comedy Festival and Laughed Out Queer Festival in Las Vegas.

Sureni Weerasekera is a Sri Lankan-born, San Diego-raised, &amp; New York-based stand-up comedian, actor, and writer. She is known for her lighthearted, conversational banter to her ruthless, dark jabs that shed light on cultural dilemmas in a palatable, enticing way. has performed at San Francisco Sketchfest, New York Comedy Festival and Silicon Valley Pride Festival.

6?:30 PM Doors / 7 PM Show</p>
                                        <p>COST:$15</p>
                                        <p>LOCATION: Sacramento Comedy Spot, 1050 20th Street, Sacramento, United States </p>
                                        <a href="https://allevents.in/sacramento/hot-and-funny-comedians/10000699177076457?ref=eventlist-cat#">Visit event</a>
                                    </div>
                                </div>
                            </div>
                        </div></div> 


</html>
<?php include("./footer.php") ?>