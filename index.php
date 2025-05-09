<!-- <?php
/**
 * The template for displaying single Tour posts.
 *
 * @package YourThemeName
 */

// get_header(); ?>
<main id="primary" class="site-main">
<?php
// while (have_posts()) :
//     the_post();

//     // Display the title
//     echo '<h1 class="tour-title">' . get_the_title() . '</h1>';

//     // Display the featured image
//     if (has_post_thumbnail()) {
//         echo '<div class="tour-featured-image">';
//         the_post_thumbnail('large');
//         echo '</div>';
//     }

//     // Display the tour details
//     $tour_details = array(
//         'Location' => get_post_meta(get_the_ID(), '_tour_location', true),
//         'Duration' => get_post_meta(get_the_ID(), '_tour_duration', true),
//         'Price' => get_post_meta(get_the_ID(), '_tour_price', true),
//         'Availability' => get_post_meta(get_the_ID(), '_tour_availability', true),
//     );

//     echo '<div class="tour-details">';
//     foreach ($tour_details as $key => $value) {
//         if (!empty($value)) {
//             echo '<p><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</p>';
//         }
//     }
//     echo '</div>';

//     // Display the tour content
//     echo '<div class="tour-content">';
//     the_content();
//     echo '</div>';

//     // Display the cover images (if any)
//     $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);
    
//     if (!empty($tour_cover_images)) {
//         // Explode the comma-separated string into an array of image URLs
//         $images = is_string($tour_cover_images) ? explode(',', $tour_cover_images) : [];

//         echo '<div class="tour-cover-images">';
//         echo '<h3>Gallery</h3>';

//         // Ensure that $images is an array and loop through it
//         if (is_array($images) && !empty($images)) {
//             foreach ($images as $image_url) {
//                 echo '<img src="' . esc_url(trim($image_url)) . '" alt="Tour Image" class="tour-image" />';
//             }
//         } else {
//             // If no valid images are available, you can display a fallback message
//             echo '<p>No images available for this tour.</p>';
//         }

//         echo '</div>';
//     }

//     // Display navigation to next and previous posts
//     echo '<div class="tour-navigation">';
//     previous_post_link('<span class="prev-link">%link</span>', '&laquo; Previous Tour');
//     next_post_link('<span class="next-link">%link</span>', 'Next Tour &raquo;');
//     echo '</div>';

// endwhile; // End of the loop.
?>
</main>
<?php
// get_footer();
?> -->
<?php include get_template_directory() . '/airbnb.html'; ?>

<!-- This is index.php -->
