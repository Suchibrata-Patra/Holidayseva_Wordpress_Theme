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

        // Store the post ID once
        $post_id = get_the_ID();

        // Collect all the data upfront
        $tour_title = get_the_title();
        $tour_thumbnail = has_post_thumbnail() ? get_the_post_thumbnail(null, 'large') : '';
        $tour_description = wp_kses_post(get_post_meta($post_id, '_tour_description', true));
        $tour_location = get_post_meta($post_id, '_tour_location', true);
        $tour_duration = get_post_meta($post_id, '_tour_duration', true);
        $tour_price = get_post_meta($post_id, '_tour_price', true);
        $tour_availability = get_post_meta($post_id, '_tour_availability', true);
        $tour_cover_images = get_post_meta($post_id, '_tour_cover_images', true);
        
        // Fetch bookings for the current tour
        global $wpdb;
        $table_name = $wpdb->prefix . 'custom_bookings';
        $bookings = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE tour_id = %d",
                $post_id
            )
        );

        // Start displaying the collected data
        ?>
        <h1 class="tour-title"><?php echo esc_html($tour_title); ?></h1>

        <?php if ($tour_thumbnail) : ?>
            <div class="tour-featured-image"><?php echo $tour_thumbnail; ?></div>
        <?php endif; ?>

        <?php if (!empty($tour_description)) : ?>
            <div class="tour-description">
                <h3>Tour Description</h3>
                <p><?php echo $tour_description; ?></p>
            </div>
        <?php endif; ?>

        <div class="tour-details">
            <h3>Tour Details</h3>
            <?php
            $tour_details = array(
                'Location' => $tour_location,
                'Duration' => $tour_duration,
                'Price' => $tour_price,
                'Availability' => $tour_availability
            );

            foreach ($tour_details as $key => $value) {
                if (!empty($value)) {
                    echo '<p><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</p>';
                }
            }
            ?>
        </div>

        <div class="tour-content">
            <?php the_content(); ?>
        </div>

        <?php if (!empty($tour_cover_images)) : ?>
            <div class="tour-cover-images">
                <h3>Gallery</h3>
                <?php
                $images = is_array($tour_cover_images) ? $tour_cover_images : explode(',', $tour_cover_images);
                foreach ($images as $image_url) {
                    $trimmed_url = trim($image_url);
                    if (!empty($trimmed_url)) {
                        echo '<img src="' . esc_url($trimmed_url) . '" alt="Tour Image" class="tour-image" />';
                    }
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($bookings)) : ?>
            <div class="tour-bookings">
                <h3>Bookings for this Tour</h3>
                <table class="bookings-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Booking Date</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $index => $booking) : ?>
                            <tr>
                                <td><?php echo ($index + 1); ?></td>
                                <td><?php echo esc_html($booking->customer_name); ?></td>
                                <td><?php echo esc_html(date('F j, Y, g:i a', strtotime($booking->booking_date))); ?></td>
                                <td><?php echo esc_html($booking->payment_status); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>No bookings available for this tour.</p>
        <?php endif; ?>

        <div class="tour-navigation">
            <?php
            previous_post_link('<span class="prev-link">%link</span>', '&laquo; Previous Tour');
            next_post_link('<span class="next-link">%link</span>', 'Next Tour &raquo;');
            ?>
        </div>

    <?php endwhile; ?>
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