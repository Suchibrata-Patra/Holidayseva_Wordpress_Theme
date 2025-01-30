<?php
/**
 * The template for displaying single Tour posts.
 *
 * @package YourThemeName
 */

get_header(); ?>
<style>
    .hero_section_image-scroll-container-wrapper {
        position: relative;
        z-index: 1;
        border-radius: 15px;
        padding: 2px;
    }

    .hero_section_image-scroll-container {
        display: flex;
        overflow-x: auto;
        gap: 10px;
        scroll-snap-type: x mandatory;
    }

    .hero_section_image-scroll-container::-webkit-scrollbar {
        display: none;
        object-fit: cover;

    }

    .hero_section_image-card {
        width: 100%;
        height: 60vh;
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

    .hero_section_image-card img {
        width: 100%;
        height: 100%;
        object-fit:fill;
        border-radius: 5px;
    }

    @media screen and (max-width: 768px) {
        .hero_section_image-card {
            height: 25vh;
        }
    }

    .image-indicators {
        display: flex;
        justify-content: center;
        gap: 5px;
        position: absolute;
        top: 105%;
        width: 100%;
    }

    .image-indicator {
        width: 10px;
        height: 10px;
        background-color: #ededed;
        border-radius: 50%;
        cursor: pointer;
    }

    .image-indicator.active {
        background-color: #ff0000;
    }
</style>

<div class="hero_section_image-scroll-container-wrapper">
    <div class="hero_section_image-scroll-container">
        <!-- Images will be dynamically cloned -->
        <div class="hero_section_image-card">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/36/9e/ba/gangasagar.jpg?w=1000&h=-1&s=1" alt="Thumbnail 1">
        </div>
        <div class="hero_section_image-card">
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

<main id="primary" class="site-main">
<?php
while (have_posts()) :
    the_post();

    // Display the title
    echo '<h1 class="tour-title">' . get_the_title() . '</h1>';

    // Display the featured image
    if (has_post_thumbnail()) {
        echo '<div class="tour-featured-image">';
        the_post_thumbnail('large');
        echo '</div>';
    }

    // Display the tour details
    $tour_details = array(
        'Location' => get_post_meta(get_the_ID(), '_tour_location', true),
        'Duration' => get_post_meta(get_the_ID(), '_tour_duration', true),
        'Price' => get_post_meta(get_the_ID(), '_tour_price', true),
        'Availability' => get_post_meta(get_the_ID(), '_tour_availability', true),
    );

    echo '<div class="tour-details">';
    foreach ($tour_details as $key => $value) {
        if (!empty($value)) {
            echo '<p><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</p>';
        }
    }
    echo '</div>';

    // Display the tour content
    echo '<div class="tour-content">';
    the_content();
    echo '</div>';

    // Display the cover images (if any)
    $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);
    
    if (!empty($tour_cover_images)) {
        // Explode the comma-separated string into an array of image URLs
        $images = is_string($tour_cover_images) ? explode(',', $tour_cover_images) : [];

        echo '<div class="tour-cover-images">';
        echo '<h3>Gallery</h3>';

        // Ensure that $images is an array and loop through it
        if (is_array($images) && !empty($images)) {
            foreach ($images as $image_url) {
                echo '<img src="' . esc_url(trim($image_url)) . '" alt="Tour Image" class="tour-image" />';
            }
        } else {
            // If no valid images are available, you can display a fallback message
            echo '<p>No images available for this tour.</p>';
        }

        echo '</div>';
    }

    // Display navigation to next and previous posts
    echo '<div class="tour-navigation">';
    previous_post_link('<span class="prev-link">%link</span>', '&laquo; Previous Tour');
    next_post_link('<span class="next-link">%link</span>', 'Next Tour &raquo;');
    echo '</div>';

endwhile; // End of the loop.
?>
</main><!-- #main -->
<?php
get_footer();
?>
This is index.php
