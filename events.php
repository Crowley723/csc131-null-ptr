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
        <h1>Explore Events Around Your Campus Today!</h1><div class="right-align" style="padding-right: 23px;">
        <a class="link-box" href="https://catalog.csus.edu/academic-calendar/">
            CSUS Calendar 
        </a>
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