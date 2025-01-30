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
