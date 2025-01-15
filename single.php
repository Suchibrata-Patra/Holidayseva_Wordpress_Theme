<?php
/**
 * The template for displaying single Tour posts.
 *
 * @package YourThemeName
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();

        // Display the tour title
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
        echo '<h3>Tour Details</h3>';
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

        // Display the gallery images
        $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);
        if (!empty($tour_cover_images)) {
            echo '<div class="tour-cover-images">';
            echo '<h3>Gallery</h3>';
            $images = is_array($tour_cover_images) ? $tour_cover_images : explode(',', $tour_cover_images);
            foreach ($images as $image_url) {
                $trimmed_url = trim($image_url);
                if (!empty($trimmed_url)) {
                    echo '<img src="' . esc_url($trimmed_url) . '" alt="Tour Image" class="tour-image" />';
                }
            }
            echo '</div>';
        }

        // Fetch and display bookings for the current tour
        global $wpdb;
        $table_name = $wpdb->prefix . 'custom_bookings';
        $current_tour_id = get_the_ID();

        $bookings = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE tour_id = %d",
                $current_tour_id
            )
        );

        if (!empty($bookings)) {
            echo '<div class="tour-bookings">';
            echo '<h3>Bookings for this Tour</h3>';
            echo '<table class="bookings-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Customer Name</th>';
            echo '<th>Booking Date</th>';
            echo '<th>Payment Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($bookings as $index => $booking) {
                echo '<tr>';
                echo '<td>' . ($index + 1) . '</td>';
                echo '<td>' . esc_html($booking->customer_name) . '</td>';
                echo '<td>' . esc_html(date('F j, Y, g:i a', strtotime($booking->booking_date))) . '</td>';
                echo '<td>' . esc_html($booking->payment_status) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p>No bookings available for this tour.</p>';
        }

        // Display navigation to next and previous posts
        echo '<div class="tour-navigation">';
        previous_post_link('<span class="prev-link">%link</span>', '&laquo; Previous Tour');
        next_post_link('<span class="next-link">%link</span>', 'Next Tour &raquo;');
        echo '</div>';

    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
<style>
    .tour-title {
    font-size: 2em;
    margin-bottom: 20px;
}

.tour-featured-image img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.tour-details, .tour-content, .tour-bookings {
    margin-bottom: 40px;
}

.tour-cover-images img {
    max-width: 100px;
    height: auto;
    margin: 5px;
    display: inline-block;
}

.bookings-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.bookings-table th, .bookings-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.bookings-table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

</style>
<?php
get_footer();
?>