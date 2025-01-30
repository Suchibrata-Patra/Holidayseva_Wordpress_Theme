<link rel="stylesheet" href="<?php echo wp_get_uri();?>/Assets/style/Trip_Details_Page.css">
<div class="hero_section_holidayseva_tour_package_name">
    <h3>Unforgettable Kashmir Tour Package</h3>
    by <strong><u><i>Holidayseva</i></u></strong>
    Recommended by 95% travellers.
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
