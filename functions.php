<?php
// Register Tour Custom Post Type
function register_tour_post_type() {
    $args = array(
        'label'               => 'Tours',
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'taxonomies'          => array('category'),
    );
    register_post_type('tour', $args);
}
add_action('init', 'register_tour_post_type');

// Add Meta Boxes for Tour Details
function add_tour_meta_boxes() {
    add_meta_box(
        'tour_details_meta_box',
        'Tour Details',
        'tour_details_meta_box_callback',
        'tour',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_tour_meta_boxes');

function tour_details_meta_box_callback($post) {
    // Nonce field for security
    wp_nonce_field('tour_details_nonce', 'tour_details_nonce_field');

    // Get existing values (if any)
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_highlights = get_post_meta($post->ID, '_tour_highlights', true);
    $tour_itinerary = get_post_meta($post->ID, '_tour_itinerary', true);
    $tour_type = get_post_meta($post->ID, '_tour_type', true);
    $tour_capacity = get_post_meta($post->ID, '_tour_capacity', true);
    $tour_guide = get_post_meta($post->ID, '_tour_guide', true);
    $tour_language = get_post_meta($post->ID, '_tour_language', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);

    ?>
    <label for="tour_location">Tour Location:</label>
    <input type="text" name="tour_location" value="<?php echo esc_attr($tour_location); ?>" />
    <br/><br/>

    <label for="tour_highlights">Tour Highlights:</label>
    <textarea name="tour_highlights"><?php echo esc_textarea($tour_highlights); ?></textarea>
    <br/><br/>

    <label for="tour_itinerary">Tour Itinerary:</label>
    <textarea name="tour_itinerary"><?php echo esc_textarea($tour_itinerary); ?></textarea>
    <br/><br/>

    <label for="tour_type">Tour Type:</label>
    <input type="text" name="tour_type" value="<?php echo esc_attr($tour_type); ?>" />
    <br/><br/>

    <label for="tour_capacity">Capacity:</label>
    <input type="number" name="tour_capacity" value="<?php echo esc_attr($tour_capacity); ?>" />
    <br/><br/>

    <label for="tour_guide">Tour Guide:</label>
    <input type="text" name="tour_guide" value="<?php echo esc_attr($tour_guide); ?>" />
    <br/><br/>

    <label for="tour_language">Tour Language:</label>
    <input type="text" name="tour_language" value="<?php echo esc_attr($tour_language); ?>" />
    <br/><br/>

    <label for="tour_availability">Booking Availability:</label>
    <input type="number" name="tour_availability" value="<?php echo esc_attr($tour_availability); ?>" />
    <?php
}

function save_tour_meta_boxes($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['tour_details_nonce_field']) || !wp_verify_nonce($_POST['tour_details_nonce_field'], 'tour_details_nonce')) {
        return;
    }

    // Save custom fields
    if (isset($_POST['tour_location'])) {
        update_post_meta($post_id, '_tour_location', sanitize_text_field($_POST['tour_location']));
    }
    if (isset($_POST['tour_highlights'])) {
        update_post_meta($post_id, '_tour_highlights', sanitize_textarea_field($_POST['tour_highlights']));
    }
    if (isset($_POST['tour_itinerary'])) {
        update_post_meta($post_id, '_tour_itinerary', sanitize_textarea_field($_POST['tour_itinerary']));
    }
    if (isset($_POST['tour_type'])) {
        update_post_meta($post_id, '_tour_type', sanitize_text_field($_POST['tour_type']));
    }
    if (isset($_POST['tour_capacity'])) {
        update_post_meta($post_id, '_tour_capacity', sanitize_text_field($_POST['tour_capacity']));
    }
    if (isset($_POST['tour_guide'])) {
        update_post_meta($post_id, '_tour_guide', sanitize_text_field($_POST['tour_guide']));
    }
    if (isset($_POST['tour_language'])) {
        update_post_meta($post_id, '_tour_language', sanitize_text_field($_POST['tour_language']));
    }
    if (isset($_POST['tour_availability'])) {
        update_post_meta($post_id, '_tour_availability', sanitize_text_field($_POST['tour_availability']));
    }
}
add_action('save_post', 'save_tour_meta_boxes');

// Create Booking Table
function create_booking_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'tour_bookings';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        customer_name varchar(255) NOT NULL,
        customer_email varchar(255),
        tour_id bigint(20) NOT NULL,
        booking_date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        number_of_travelers int NOT NULL,
        special_requests text,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_booking_table');

// Handle Booking Form Submission
function handle_booking_form_submission() {
    if (isset($_POST['booking_submit'])) {
        global $wpdb;

        // Sanitize input
        $customer_name = sanitize_text_field($_POST['customer_name']);
        $customer_email = sanitize_email($_POST['customer_email']);
        $tour_id = intval($_POST['tour_id']);
        $number_of_travelers = intval($_POST['number_of_travelers']);
        $special_requests = sanitize_textarea_field($_POST['special_requests']);

        // Insert booking data into the database
        $wpdb->insert(
            $wpdb->prefix . 'tour_bookings',
            array(
                'customer_name'      => $customer_name,
                'customer_email'     => $customer_email,
                'tour_id'            => $tour_id,
                'number_of_travelers'=> $number_of_travelers,
                'special_requests'   => $special_requests
            )
        );
    }
}
add_action('admin_post_nopriv_submit_booking', 'handle_booking_form_submission');
add_action('admin_post_submit_booking', 'handle_booking_form_submission');

// Tour Payment Form (Optional)
function show_payment_form() {
    ?>
    <form method="POST" action="your_payment_gateway_url">
        <label for="payment_amount">Amount:</label>
        <input type="text" name="payment_amount" value="100" />
        
        <label for="payment_method">Payment Method:</label>
        <select name="payment_method">
            <option value="credit_card">Credit Card</option>
            <option value="paypal">PayPal</option>
        </select>
        
        <button type="submit">Proceed to Payment</button>
    </form>
    <?php
}

// Tour Reviews (Optional)
function add_review_rating($comment_id) {
    if (isset($_POST['rating'])) {
        add_comment_meta($comment_id, 'rating', $_POST['rating']);
    }
}
add_action('comment_post', 'add_review_rating');
?>