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
        $tour_cover_images = get_post_meta($post_id, '_tour_cover_images', true);
        $tour_name = get_post_meta($post_id, '_tour_name', true);
        $tour_description = get_post_meta($post_id, '_tour_description', true);
        $tour_details = get_post_meta($post_id, '_tour_details', true);
        $tour_location = get_post_meta($post_id, '_tour_location', true);
        $tour_duration_days = get_post_meta($post_id, '_tour_duration_days', true);
        $tour_duration_nights = get_post_meta($post_id, '_tour_duration_nights', true);
        $day_plans = get_post_meta($post_id, '_day_plans', true) ?: [];

        $tour_price = get_post_meta($post_id, '_tour_price', true);
        $tour_offers = get_post_meta($post_id, '_tour_offers', true);
        $tour_availability = get_post_meta($post_id, '_tour_availability', true);
        $tour_highlights = get_post_meta($post_id, '_tour_highlights', true);

        $itinerary = get_post_meta($post_id, '_itinerary', true);
        $included = get_post_meta($post_id, '_included', true);
        $excluded = get_post_meta($post_id, '_excluded', true);

        $google_map_link = get_post_meta($post_id, '_google_map_link', true);
        $reviews = get_post_meta($post_id, '_reviews', true);
        $reviews = is_array($reviews) ? $reviews : [];

        global $wpdb;
        $table_name = $wpdb->prefix . 'custom_bookings'; $bookings =
  $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name WHERE tour_id =
  %d", $post_id) ); // Display data ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
        >
        <header class="entry-header">
            <h1 class="entry-title">
                <?php echo esc_html($tour_name ? $tour_name : get_the_title()); ?>
            </h1>
            <div class="tour-thumbnail">
                <?php echo get_the_post_thumbnail($post_id, 'large'); ?>
            </div>
        </header>

        <div class="entry-content">

            <p>
                <strong>Description:</strong>
                <?php echo esc_html($tour_description); ?>
            </p>
            <p>
                <strong>Location:</strong>
                <?php echo esc_html($tour_location); ?>
            </p>
            <p>
                <strong>Duration:</strong>
                <?php echo esc_html("$tour_duration_days Days, $tour_duration_nights Nights"); ?>
            </p>
            <p>
                <strong>Price:</strong>
                <?php echo esc_html($tour_price); ?>
            </p>
            <p>
                <strong>Availability:</strong>
                <?php echo esc_html($tour_availability); ?>
            </p>

            <?php if (!empty($tour_highlights) && is_array($tour_highlights)) : ?>
            <h3>Highlights:</h3>
            <ul>
                <?php foreach ($tour_highlights as $highlight) : ?>
                <?php if (!empty($highlight)) : // Only display non-empty highlights ?>
                <?php echo esc_html($highlight); ?>
                |
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($day_plans) && is_array($day_plans)) : ?>
            <h3>Day Plans:</h3>
            <ul>
                <?php foreach ($day_plans as $plans) : ?>
                <?php if (!empty($plans)) : // Only display non-empty Plans ?>
                <?php echo esc_html($plans); ?>
                |
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($tour_cover_images) && is_array($tour_cover_images)) : ?>
            <h3>Images:</h3>
            <ul>
                <?php foreach ($tour_cover_images as $image_url) : ?>
                <?php if (!empty($image_url)) : // Only display non-empty images ?>
                <li>
                    <img src="<?php echo esc_url($image_url); ?>" alt="Tour Cover Image" />
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($itinerary) && is_array($itinerary)) : ?>
            <h3>Itinerary</h3>
            <ul>
                <?php foreach ($itinerary as $plans) : ?>
                <?php if (!empty($plans)) : // Only display non-empty Plans ?>
                <?php echo esc_html($plans); ?>
                |
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($included) && is_array($included)) : ?>
            <h3>Included</h3>
            <ul>
                <?php foreach ($included as $items) : ?>
                <?php if (!empty($items)) : // Only display non-empty Plans ?>
                <?php echo esc_html($items); ?>
                |
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($excluded) && is_array($excluded)) : ?>
            <h3>Excluded</h3>
            <ul>
                <?php foreach ($excluded as $items) : ?>
                <?php if (!empty($items)) : // Only display non-empty Plans ?>
                <?php echo esc_html($items); ?>
                |
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            

            <?php if (!empty($tour_cover_images)) : ?>
            <h3>Gallery:</h3>
            <div class="gallery">
                <?php
                        $images = is_array($tour_cover_images) ? $tour_cover_images : explode(',', $tour_cover_images);
                        foreach ($images as $image_url) :
                            $trimmed_url = trim($image_url);
                            if (!empty($trimmed_url)) :
                                ?>
                <img src="<?php echo esc_url($trimmed_url); ?>" alt="Tour Image" class="tour-image" />
                <?php
                            endif;
                        endforeach;
                        ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($reviews) && is_array($reviews)) : ?>
            <h3>Reviews</h3>
            <ul>
                <?php foreach ($reviews as $review) : ?>
                <?php if (!empty($review)) : // Only display non-empty Plans ?>
                <?php echo esc_html($review); ?>
                |
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if (!empty($bookings)) : ?>
            <h3>Bookings:</h3>
            <ul>
                <?php foreach ($bookings as $booking) : ?>
                <li>
                    <?php echo esc_html($booking->customer_name . ' - ' .
          $booking->booking_date . ' - ' . $booking->payment_status); ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else : ?>
            <p>No bookings available for this tour.</p>
            <?php endif; ?>
        </div>

        <?php if (!empty($google_map_link)) : ?>
    <h3>Google Map:</h3>
    <div class="google-map-container">
        <?php
        echo wp_kses(
            $google_map_link,
            [
                'iframe' => [
                    'src'             => true,
                    'width'           => true,
                    'height'          => true,
                    'style'           => true,
                    'allowfullscreen' => true,
                    'loading'         => true,
                    'frameborder'     => true,
                ],
            ]
        );
        ?>
    </div>
<?php else : ?>
    <p>Google Map is not available for this tour.</p>
<?php endif; ?>


    </article>
    <?php
    endwhile;
    ?>
</main>
<!-- #main -->

<?php get_footer(); ?>