<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/style/Trip_Details_Page.css">



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
