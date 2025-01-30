<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/style/Trip_Details_Page.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" />
<div class="tour-package-container">
    <h1 class="tour-title">Unforgettable Ganga Sagar Mela Tour Package From Kolkata</h1>
    <div style="display: flex; align-items: center;">
    <span style="font-size: 1rem; color: black; font-family: Poppins;
    padding-left:7px;">by </span>
    <h2 class="tour-author" style="margin: 0;">GangaSagar TOURISM</h2>
</div>

    <span style="display: flex; align-items: center;">
        <span style="font-family: 'Material Icons'; font-size: 20px; color: green;background-color:greenyellow;border-radius: 50px;paddging-top:1px; padding: 0px; font-size: 16px; display: inline-flex; align-items: center; justify-content: center;">
            <span class="material-symbols-outlined">
                verified
                </span>
        </span>
        <span style="margin-left: 8px;color: rgb(0, 150, 0);">Recommended by 94% Traveller</span>
    </span>
    
</div>

<div class="hero_section_image-scroll-container-wrapper">
    <div class="hero_section_image-scroll-container">
        <!-- Images will be dynamically cloned -->
        <div class="hero_section_image-card">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/36/9e/ba/gangasagar.jpg?w=1000&h=-1&s=1" alt="Thumbnail 1">
        </div>
        <div class="hero_section_image-4%ard">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2b/2c/b5/ab/caption.jpg?w=1000&h=-1&s=1" alt="Thumbnail 2">
        </div>
        <div class="hero_section_image-card">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/68/2d/b6/gangasagar.jpg?w=1000&h=-1&s=1" alt="Thumbnail 3">
        </div>
        <div class="hero_section_image-card">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/68/2d/b4/gangasagar.jpg?w=1000&h=-1&s=1" alt="Thumbnail 4">
        </div>
        <div class="hero_section_image-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSak2xZOdDWvOFSJlpCQ2YJHqamao7pzMNMsw&s" alt="Thumbnail 5">
        </div>
        <div class="hero_section_image-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDI9oFagkMhmDyJfwOUXStbnO9KzuMtYVXLg&s" alt="Thumbnail 6">
        </div>
    </div>
    <div class="image-indicators"></div>
</div>


<style>
    .video-scroll-container {
        display: flex;
        overflow-x: auto;
        padding: 10px;
        gap: 10px;
        scroll-snap-type: x mandatory;
    }

    .video-scroll-container::-webkit-scrollbar {
        display: none;
    }

    .video-card {
        width: 180px;
        height: 300px;
        flex: 0 0 auto;
        background: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        scroll-snap-align: start;
    }

    .video-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    .video-lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .video-lightbox iframe {
        width: 90%;
        height: 75%;
        border: none;
    }

    .video-lightbox .close-btn {
        position: absolute;
        top:90%;
        right: 45%;
        font-size: 30px;
        color: white;
        cursor: pointer;
        /* z-index: 1010; */
        background: rgba(0, 0, 0);
        border-radius: 50%;
        padding: 3px 17px;
    }
    .video-lightbox img{
        position:absolute;
        top:10px;
        width:60%;
    }

    .video-lightbox .close-btn:hover {
        background: rgba(255, 0, 0, 0.6);
    }
</style>

<strong style="font-size:1.7rem; color:black; border-left: 5px solid red; border-radius: 5px; padding-left: 5px;">
    Know More &#8594;
</strong>

<div class="video-scroll-container">
    <div class="video-card" data-video="https://www.youtube.com/embed/ZQWiZlqADe4">
        <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/gangasagar-tour-Packages.webp" alt="Thumbnail 1" style="border:1px solid black;">
    </div>
    <div class="video-card" data-video="https://www.youtube.com/embed/ZQWiZlqADe4">
        <img src="https://static.wixstatic.com/media/9ed41c_f877ff9537614bf9b80e846bcfe4366f~mv2.jpg/v1/fill/w_980,h_1470,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed41c_f877ff9537614bf9b80e846bcfe4366f~mv2.jpg" alt="Thumbnail 2">
    </div>
    <div class="video-card" data-video="https://www.youtube.com/embed/ZQWiZlqADe4">
        <img src="https://www.laurewanders.com/wp-content/uploads/2021/03/Short-travel-captions-0101-683x1024.jpg" alt="Thumbnail 3">
    </div>
    <div class="video-card" data-video="https://www.youtube.com/embed/ZQWiZlqADe4">
        <img src="https://escapetounknown.com/wp-content/uploads/2023/08/1-576x1024.webp" alt="Thumbnail 4">
    </div>
    <div class="video-card" data-video="https://www.youtube.com/embed/shorts/VIDEO_ID5">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSak2xZOdDWvOFSJlpCQ2YJHqamao7pzMNMsw&s" alt="Thumbnail 5">
    </div>
    <div class="video-card" data-video="https://www.youtube.com/embed/shorts/VIDEO_ID6">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDI9oFagkMhmDyJfwOUXStbnO9KzuMtYVXLg&s" alt="Thumbnail 6">
    </div>
</div>

<div class="video-lightbox" id="videoLightbox">
    <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="">
    <span class="close-btn" id="closeBtn">&times;</span>
    <iframe id="videoLightboxVideo" src="" allowfullscreen></iframe>
</div>

<script>
    const videoCards = document.querySelectorAll('.video-card');
    const videoLightbox = document.getElementById('videoLightbox');
    const videoLightboxVideo = document.getElementById('videoLightboxVideo');
    const closeBtn = document.getElementById('closeBtn');

    videoCards.forEach(card => {
        card.addEventListener('click', () => {
            const videoSrc = card.getAttribute('data-video');
            videoLightboxVideo.src = videoSrc;
            videoLightbox.style.display = 'flex';
        });
    });

    closeBtn.addEventListener('click', () => {
        videoLightbox.style.display = 'none';
        videoLightboxVideo.src = '';
    });

    videoLightbox.addEventListener('click', (e) => {
        if (e.target === videoLightbox) {
            videoLightbox.style.display = 'none';
            videoLightboxVideo.src = '';
        }
    });
</script>

<script>
    const scrollContainer = document.querySelector('.hero_section_image-scroll-container');
    const cards = Array.from(document.querySelectorAll('.hero_section_image-card'));
    const indicatorsContainer = document.querySelector('.image-indicators');

    // Clone first and last slides for infinite scroll
    const firstClone = cards[0].cloneNode(true);
    const lastClone = cards[cards.length - 1].cloneNode(true);
    scrollContainer.appendChild(firstClone);
    scrollContainer.insertBefore(lastClone, cards[0]);

    // Adjust initial scroll position to the first actual image
    scrollContainer.scrollLeft = cards[0].offsetWidth;

    // Create indicators
    cards.forEach((_, index) => {
        const indicator = document.createElement('div');
        indicator.classList.add('image-indicator');
        if (index === 0) indicator.classList.add('active');
        indicator.addEventListener('click', () => {
            scrollContainer.scrollTo({
                left: (index + 1) * cards[0].offsetWidth,
                behavior: 'smooth',
            });
        });
        indicatorsContainer.appendChild(indicator);
    });

    // Update active indicator and handle infinite scroll
    scrollContainer.addEventListener('scroll', () => {
        const scrollPosition = scrollContainer.scrollLeft;
        const containerWidth = cards[0].offsetWidth;

        // Wrap around logic
        if (scrollPosition >= (cards.length + 1) * containerWidth) {
            scrollContainer.scrollLeft = containerWidth;
        } else if (scrollPosition <= 0) {
            scrollContainer.scrollLeft = cards.length * containerWidth;
        }

        // Update active indicator
        const activeIndex = Math.round(scrollContainer.scrollLeft / containerWidth) - 1;
        document.querySelectorAll('.image-indicator').forEach((indicator, index) => {
            indicator.classList.toggle('active', index === (activeIndex + cards.length) % cards.length);
        });
    });
</script>

<!-- Include Google Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<div class="gangasagar-tour-content">
    <strong class="itinerary-title">Tour Info</strong>
</div>
<div class="my_tour_info_accordion" style="font-family: poppins;color: black;">
    <div class="my_tour_info_accordion-item active">
        <div class="my_tour_info_accordion_title">
            <div style="display: flex;">
                <button style="background-color: red;border: none;color:white;border-radius: 50px;padding: 2px 7px;margin-right: 10px;font-weight: 800;margin-bottom: 3px;">Day<br>1</button><span style="margin-top:10px;">Arrival in Kolkata & Transfer to Ganga Sagar</span>
            </div>
            <span class="material-icons arrow-icon" style="color:black;background-color: rgb(245, 245, 245);border-radius: 50px ;font-weight: 200;padding: 7px;">keyboard_arrow_down</span>
        </div>
        <div class="my_tour_info_accordion-content">
            <ul style="font-weight: 0.7rem !important; line-height: 0.8rem; margin-top: 1.03rem;">
                <li style="font-weight: 0.7rem !important; line-height: 0.8rem;"> <strong style="font-weight: 1rem;">Morning :</strong> Pick up from Kolkata (Airport/Hotel/Station).</li>
                <li style="font-weight: 0.7rem !important; line-height: 0.8rem;"> <strong style="font-weight: 1rem;">Journey : </strong> Scenic drive to Kakdwip, followed by a ferry ride to Ganga Sagar Island.</li>
                <li style="font-weight: 0.7rem !important; line-height: 0.8rem;"> <strong style="font-weight: 1rem;">Evening :</strong> Visit <strong>Kapil Muni Ashram,</strong>  the heart of Ganga Sagar.
                </li>
                <li style="font-weight: 0.7rem !important; line-height: 0.8rem;"> <strong style="font-weight: 1rem;">Overnight Stay :</strong>  At a comfortable accommodation near Ganga Sagar.
                </li>
            </ul>
        </div>
    </div>

    <div class="my_tour_info_accordion-item">
        <div class="my_tour_info_accordion_title">
            <div style="display: flex;">
                <button style="background-color: red;border: none;color:white;border-radius: 50px;padding: 5px 7px;margin-right: 10px;font-weight: 800;margin-bottom: 3px;">Day<br>2</button><span style="margin-top:10px;">Visit the Ganga Sagar Mela</span>
            </div>
            <span class="material-icons arrow-icon" style="color:black;background-color: rgb(245, 245, 245);border-radius: 50px ;font-weight: 200;padding: 7px;">keyboard_arrow_down</span>
        </div>
        <div class="my_tour_info_accordion-content">
            <ul style="font-weight: 0.7rem !important; line-height: 0.8rem; margin-top: 1.03rem;">
                <li style="font-weight: 0.7rem !important; line-height: 0.8rem;"> <strong style="font-weight: 1rem;">Morning :</strong> Participate in the holy rituals, take a dip in the sacred waters, and explore the vibrant mela.</li>
                <li style="font-weight: 0.7rem !important; line-height: 0.8rem;"> <strong style="font-weight: 1rem;">Journey : </strong> After breakfast,lunch back to kolkata with sweet memory of Ganga Sagar.</li>
                    </ul>
                </div>
    </div>

    
</div>

<style>
    .my_tour_info_accordion {
        font-family: poppins;
        width: 98%;
        max-width: 600px;
        margin: 0px 0px 0px 1px !important;
    }

    .my_tour_info_accordion-item {
        font-family: poppins;
        border-bottom: 1px solid #ddd;
    }

    .my_tour_info_accordion_title {
        font-family: poppins;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: none;
        /* padding: 1px 0px; */
        font-size: 16px;
        /* margin-top:10px; */
        font-weight: 500!important;
        cursor: pointer;
        text-align: left;
        transition: background 0.1s;
    }

    .my_tour_info_accordion_title:hover {
        font-family: poppins;
        background-color: rgb(252,252,252);
        text-decoration: none;
    }

    .arrow-icon {
        transition: transform 0.3s ease;
    }

    .my_tour_info_accordion-item.active .arrow-icon {
        transform: rotate(-90deg);
    }

    .my_tour_info_accordion-content {
        font-family: poppins;
        display: block;
        max-height: 0;
        margin-top: 0px;
        /* margin-bottom: 10px; */
        font-size: 14px;
        color: #000000;
        margin-left:50px;
        overflow: hidden;
        transition: max-height 0.6s cubic-bezier(0.25, 0.8, 0.25, 1), padding 0.3s ease;
    }

    .my_tour_info_accordion-item.active .my_tour_info_accordion-content {
        font-family: poppins;
        max-height: 700px;
        padding: 0px 0;
    }
    .material-icons arrow-icon :hover{
        text-decoration: underline;
    }
</style>

<!-- Smooth JavaScript -->
<script>
    const items = document.querySelectorAll('.my_tour_info_accordion-item');

    items.forEach(item => {
        const title = item.querySelector('.my_tour_info_accordion_title');
        const content = item.querySelector('.my_tour_info_accordion-content');

        title.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            // Close all accordion items
            document.querySelectorAll('.my_tour_info_accordion-item').forEach(i => {
                i.classList.remove('active');
                i.querySelector('.my_tour_info_accordion-content').style.maxHeight = null;
            });

            // Toggle the clicked item
            if (!isActive) {
                item.classList.add('active');
                content.style.maxHeight = `${content.scrollHeight}px`; // Dynamically set max-height
            }
        });
    });
</script>

<!-- Include Google Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<div class="gangasagar-tour-content">
    <strong class="itinerary-title">FAQ</strong>
</div>
<div class="my_custom_accordion" style="font-family: poppins;color: black;">
    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            What's included
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            <ul>
                <b>1. Transportation</b>
                <li>AC vehicle for the entire journey (Kolkata ↔ Lot 8 ↔ Ganga Sagar).</li>
                <li>Ferry Tickets (Lot 8 ↔ Kachuberia).</li>
                <li>Road transfers within Ganga Sagar (Kachuberia ↔ Hotel ↔ Kapil Muni Temple).</li>
                <b>2. Meals</b>
                <li>Day 1: Dinner.</li>
                <li>Day 2: Breakfast.</li>
                <b>3. Assistance</b>
                <li>Professional guide to assist throughout the trip.</li>
            </ul>
        </div>
    </div>

    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            Itinerary
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            <p><strong>05:30 AM</strong>: Pickup from Kolkata and transfer to Harwood Point.</p>
            <p><strong>08:30 AM</strong>: Ferry ride to Kachuberia and road transfer to Ganga Sagar.</p>
            <p><strong>11:00 AM</strong>: Visit Kapil Muni Temple and take a holy dip in the Ganges.</p>
            <p><strong>01:00 PM</strong>: Lunch at a local restaurant in Ganga Sagar.</p>
            <p><strong>02:00 PM</strong>: Visit the Ganga Sagar Mela ground and explore local markets.</p>
            <p><strong>04:00 PM</strong>: Return journey to Kolkata, via ferry and AC vehicle.</p>
            <p><strong>07:30 PM</strong>: Drop-off in Kolkata.</p>
        </div>
    </div>

    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            Departure and return
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            <button style="background-color: #e0e0e0;color: #202020;padding:7px 13px;font-size:13px;font-weight:500;border-radius:3px;margin-top: 5px;">Start</button> Multiple pickup locations offered in Kolkata.
            <br>
            <button style="background-color: #e0e0e0;color: #202020;padding:7px 13px;font-size:13px;font-weight:500;border-radius:3px;margin-top: 5px;">End</button> Drop-off at selected location in Kolkata.
        </div>
    </div>

    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            Accessibility
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            <ul>
                <li>Not wheelchair accessible</li>
                <li>Near public transportation</li>
                <li>Infants must sit on laps</li>
            </ul>
            If you have questions about accessibility, we’d be happy to help. Just call the number below.<br>
            +91 8145302135
        </div>
    </div>

    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            Additional Information
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            <ul>
                <li>Confirmation will be received at time of booking</li>
                <li>Most travellers can participate</li>
                <li>This experience requires good weather. If it’s cancelled due to poor weather, you’ll be offered a different date or a full refund</li>
                <li>This experience requires a minimum number of travellers. If it’s cancelled because the minimum isn’t met, you’ll be offered a different date/experience or a full refund</li>
                <li>This tour/activity will have a maximum of 15 travellers</li>
            </ul>
        </div>
    </div>

    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            Cancellation Policy
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            For a full refund, cancel at least 24 hours in advance of the start date of the experience.
        </div>
    </div>

    <div class="my_custom_accordion-item">
        <div class="my_custom_accordion_title">
            Help
            <span class="material-icons arrow-icon" style="color:black;font-weight: 200;">keyboard_arrow_down</span>
        </div>
        <div class="my_custom_accordion-content">
            If you have questions about this tour or need help making your booking, we'd be happy to help.<br>
            8145302135
        </div>
    </div>
</div>

<!-- Smooth CSS -->
<style>
    .my_custom_accordion {
        font-family: poppins;
        width: 98%;
        max-width: 600px;
        margin: 10px 0px 0px 10px !important;
    }

    .my_custom_accordion-item {
        font-family: poppins;
        border-bottom: 1px solid #ddd;
    }

    .my_custom_accordion_title {
        font-family: poppins;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: none;
        padding: 1px 0px;
        font-size: 16px;
        margin-top:10px;
        font-weight: 500;
        cursor: pointer;
        text-align: left;
        transition: background 0.1s;
    }

    .my_custom_accordion_title:hover {
        font-family: poppins;
        background-color: rgb(252,252,252);
        text-decoration: underline;
    }

    .arrow-icon {
        transition: transform 0.3s ease;
    }

    .my_custom_accordion-item.active .arrow-icon {
        transform: rotate(-90deg);
    }

    .my_custom_accordion-content {
        font-family: poppins;
        display: block;
        max-height: 0;
        margin-top: 0px;
        margin-bottom: 10px;
        padding: 0 0px;
        font-size: 14px;
        color: #000000;
        overflow: hidden;
        transition: max-height 0.6s cubic-bezier(0.25, 0.8, 0.25, 1), padding 0.3s ease;
    }

    .my_custom_accordion-item.active .my_custom_accordion-content {
        font-family: poppins;
        max-height: 700px;
        padding: 0px 0;
    }
    .material-icons arrow-icon :hover{
        text-decoration: underline;
    }
</style>

<!-- Smooth JavaScript -->
<script>
    const accordion_items = document.querySelectorAll('.my_custom_accordion-item');

    accordion_items.forEach(item => {
        const title = item.querySelector('.my_custom_accordion_title');
        const content = item.querySelector('.my_custom_accordion-content');

        title.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            // Close all accordion accordion_items
            document.querySelectorAll('.my_custom_accordion-item').forEach(i => {
                i.classList.remove('active');
                i.querySelector('.my_custom_accordion-content').style.maxHeight = null;
            });

            // Toggle the clicked item
            if (!isActive) {
                item.classList.add('active');
                content.style.maxHeight = `${content.scrollHeight}px`; // Dynamically set max-height
            }
        });
    });
</script>

<div class="gangasagar-tour-content">
    <strong class="itinerary-title">Reviews  &#8594;</strong>
</div><div class="card-section">
    <p>Experience Ganga Sagar with our customized pilgrimage packages.</p>
    <div class="card-container-wrapper">
        <div class="arrow arrow-left" onclick="scrollLeft()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"></path>
            </svg>
        </div>
        <div class="card-container" id="cardContainer">
            <div class="card">
                <div class="card-header">
                    <img src="https://i.pinimg.com/550x/3f/48/e4/3f48e4a78eafaf29e50fe2ca316bea59.jpg" alt="Profile Image">
                    <div class="text-content">
                        <span>Mrs, Rajeshwari S </span>
                        <span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                        </span>
                    </div>
                </div>
                <div class="card-content">
                    <strong>Great Experience</strong>
                    <br>I recently booked a Gangasagar tour package with Gangasagar Tourism, and I am beyond impressed with their exceptional service. From the initial inquiry to the end of the journey, every detail was meticulously planned, making our trip smooth and memorable.
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <img src="https://vedawellnessworld.com/wp-content/uploads/2024/05/abhishek.jpg" alt="Profile Image">
                    <div class="text-content">
                        <span>Mr, Arijit Y </span>
                        <span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                        </span>
                    </div>
                </div>
                <div class="card-content">
                    <strong>Awesome Experience</strong>
                    <br>This is my 1st time to visit to Ganga Sagar.I have visited during mela,huge crowd came from different state of India.Not olny that pepole from Nepal & Bhutan are available here.But thanks to govt.Of WB & Police to manage this type huge crowed.
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <img src="https://media.licdn.com/dms/image/v2/C5603AQFSrlqweIFE6w/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1650258468257?e=1740614400&v=beta&t=U_g5rT8qL2ZKLBA0NYbv8aV1D_qRFmRoalo4a4WUMM8" alt="Profile Image">
                    <div class="text-content">
                        <span>Mr, Divy D</span>
                        <span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                        </span>
                    </div>
                </div>
                <div class="card-content">
                    <strong>Accommodation Like Home</strong>
                    <br>I had the pleasure of staying at Pakhi Guest House during my Gangasagar trip, and it was an absolutely delightful experience. From the moment we arrived, we were greeted with warmth and excellent hospitality that made us feel right at home.
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYwCElvB60JZDlINjMDBGATePNl4Gw_Hg-3w&s" alt="Profile Image">
                    <div class="text-content">
                        <span>Mr, S.Oberoi</span>
                        <span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                            <span class="circle"></span>
                        </span>
                    </div>
                </div>
                <div class="card-content">
                    <strong>Best Tour Provider</strong>
                    <br>Our 2-day Kolkata to GangaSagar tour was unforgettable! From the start, everything was seamless and well-organized. The team at Gangasagar Tourism ensured we were comfortable and well taken care of, making the experience truly special.
                </div>
            </div>
            
            
        </div>
        <div class="arrow arrow-right" onclick="scrollRight()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"></path>
            </svg>
        </div>
    </div>
</div>

<style>
    .card-section {
        text-align: center;
        padding: 0px;
    }

    .card-section p {
        color: #000;
        text-align: left;
        margin: 10px 1%;
    }

    .card-container-wrapper {
        position: relative;
        margin: 0 6%;
    }

    .card-container {
        display: flex;
        overflow-x: auto;
        gap: 20px;
        padding: 10px;
        scrollbar-width: none;
    }

    .card-container::-webkit-scrollbar {
        display: none;
    }

    .card {
        flex: 0 0 auto;
        width: 250px;
        border-radius: 8px;
        border: 1px solid black;
        overflow: hidden;
        background-color: #fff;
        text-align: left;
        padding: 10px 15px;
    }

    .card img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 10px;
    }

    .card-header .text-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .card-header .text-content span:first-child {
        font-weight: 500;
        font-size: 1rem;
    }

    .card-header .text-content span:last-child {
        font-weight: 200;
        font-size: 0.8rem;
        color: grey;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .card-header .text-content .circle {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: rgb(37, 126, 5);
    }

    .card-content {
        font-size: 0.95rem;
        font-weight: 400;
        line-height: 1.03rem;
        color: #000;
        margin-top:-10px;
    }

    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        border: 1px solid #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 1000;
    }

    .arrow-left {
        left: -20px;
    }

    .arrow-right {
        right: -20px;
    }

    .arrow svg {
        width: 20px;
        height: 20px;
        fill: #000;
    }

    @media (max-width: 768px) {
        .card-container-wrapper {
            margin: 0;
        }

        .arrow {
            display: none;
        }

        .card-section p {
            font-size: 14px;
        }
    }
</style>

<script>
    const cardContainer = document.getElementById("cardContainer");

    function scrollLeft() {
        cardContainer.scrollBy({
            left: -300,
            behavior: "smooth",
        });
    }

    function scrollRight() {
        cardContainer.scrollBy({
            left: 300,
            behavior: "smooth",
        });
    }
</script>

