<?php
/**
 * The template for displaying single Tour posts.
 *
 * @package HolidaySeva
 *
 * Template Name: Tour
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();

        $post_id = get_the_ID();

        // Collect data
    // Retrieve existing custom fields values
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    $tour_description = get_post_meta($post->ID, '_tour_description', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_duration_days = get_post_meta($post->ID, '_tour_duration_days', true);
    $tour_duration_nights = get_post_meta($post->ID, '_tour_duration_nights', true);
    $day_plans = get_post_meta($post->ID, '_day_plans', true) ?: [];


    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_offers = get_post_meta($post->ID, '_tour_offers', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);
    $tour_highlights = get_post_meta($post->ID, '_tour_highlights', true);

    $itinerary = get_post_meta($post->ID, '_itinerary', true);
    $included = get_post_meta($post->ID, '_included', true);
    $excluded = get_post_meta($post->ID, '_excluded', true);
    // Fetch the saved Google Maps iframe
    $google_map_link = get_post_meta(get_the_ID(), '_google_map_link', true);
    $reviews = get_post_meta($post->ID, '_reviews', true);
    $reviews = is_array($reviews) ? $reviews : [];

        global $wpdb;
        $table_name = $wpdb->prefix . 'custom_bookings';
        $bookings = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM $table_name WHERE tour_id = %d", $post_id)
        );

        // Display all collected data
        echo '<h1>' . esc_html($tour_title) . '</h1>';
        echo $tour_thumbnail;
        echo '<p>' . esc_html($tour_description) . '</p>';
        echo '<p>Location: ' . esc_html($tour_location) . '</p>';
        echo '<p>Duration: ' . esc_html($tour_duration_days) . '</p>';
        echo '<p>Price: ' . esc_html($tour_price) . '</p>';
        echo '<p>Availability: ' . esc_html($tour_availability) . '</p>';
        echo '<p>Highlights: ' . esc_html($tour_highlights) . '</p>';

        if (!empty($day_plans)) {
            echo '<h3>Day Plans:</h3>';
            foreach ($day_plans as $day => $plan) {
                echo '<p>Day ' . esc_html($day) . ': ' . esc_html($plan) . '</p>';
            }
        }

        if (!empty($itinerary)) {
            echo '<h3>Itinerary:</h3><p>' . esc_html($itinerary) . '</p>';
        }

        if (!empty($included)) {
            echo '<h3>Included:</h3><p>' . esc_html($included) . '</p>';
        }

        if (!empty($excluded)) {
            echo '<h3>Excluded:</h3><p>' . esc_html($excluded) . '</p>';
        }

        if (!empty($google_map_link)) {
            echo '<h3>Google Map:</h3><p>' . esc_url($google_map_link) . '</p>';
        }

        // if (!empty($tour_cover_images)) {
        //     echo '<h3>Gallery:</h3>';
        //     $images = is_array($tour_cover_images) ? $tour_cover_images : explode(',', $tour_cover_images);
        //     foreach ($images as $image_url) {
        //         $trimmed_url = trim($image_url);
        //         if (!empty($trimmed_url)) {
        //             echo '<p>' . esc_url($trimmed_url) . '</p>';
        //         }
        //     }
        // }

        if (!empty($reviews)) {
            echo '<h3>Reviews:</h3>';
            foreach ($reviews as $review) {
                echo '<p>' . esc_html($review) . '</p>';
            }
        }

        if (!empty($bookings)) {
            echo '<h3>Bookings:</h3>';
            foreach ($bookings as $booking) {
                echo '<p>' . esc_html($booking->customer_name) . ' - ' . esc_html($booking->booking_date) . ' - ' . esc_html($booking->payment_status) . '</p>';
            }
        } else {
            echo '<p>No bookings available for this tour.</p>';
        }

    endwhile;
    ?>
</main><!-- #main -->

<?php get_footer(); ?>