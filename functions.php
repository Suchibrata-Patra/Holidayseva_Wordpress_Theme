<?php
// Add theme support for post thumbnails
add_theme_support('post-thumbnails');

// Register custom post type for Tours
function create_tour_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Tours',
            'singular_name' => 'Tour',
            'add_new' => 'Add New Tour',
            'add_new_item' => 'Add New Tour',
            'edit_item' => 'Edit Tour',
            'new_item' => 'New Tour',
            'view_item' => 'View Tour',
            'search_items' => 'Search Tours',
            'not_found' => 'No Tours found',
            'not_found_in_trash' => 'No Tours found in Trash',
            'all_items' => 'All Tours',
            'insert_into_item' => 'Insert into tour',
            'uploaded_to_this_item' => 'Uploaded to this tour',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-palmtree',
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'tours'),
        'menu_position' => 2,
    );
    register_post_type('tour', $args);
}
add_action('init', 'create_tour_post_type');

// Add custom fields for Tours
function add_tour_meta_boxes() {
    add_meta_box(
        'tour_details_meta_box', 
        'Tour Details', 
        'display_tour_meta_box', 
        'tour', 
        'normal', 
        'high'
    );
}
add_action('add_meta_boxes', 'add_tour_meta_boxes');

// Display custom meta box for Tours
function display_tour_meta_box($post) {
    // Retrieve existing values
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_duration = get_post_meta($post->ID, '_tour_duration', true);
    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
    
    ?>
    <!-- Meta box content -->
    <label for="tour_name">Tour Name:</label>
    <input type="text" name="tour_name" value="<?php echo esc_attr($tour_name); ?>" /><br/>

    <label for="tour_details">Details:</label>
    <textarea name="tour_details"><?php echo esc_textarea($tour_details); ?></textarea><br/>

    <label for="tour_location">Location:</label>
    <input type="text" name="tour_location" value="<?php echo esc_attr($tour_location); ?>" /><br/>

    <label for="tour_duration">Duration:</label>
    <input type="text" name="tour_duration" value="<?php echo esc_attr($tour_duration); ?>" /><br/>

    <label for="tour_price">Price:</label>
    <input type="number" name="tour_price" value="<?php echo esc_attr($tour_price); ?>" /><br/>

    <label for="tour_availability">Availability:</label>
    <input type="text" name="tour_availability" value="<?php echo esc_attr($tour_availability); ?>" /><br/>

    <label for="tour_cover_images">Cover Images:</label>
    <input type="text" name="tour_cover_images" value="<?php echo esc_attr($tour_cover_images); ?>" />
    <?php
}

// Save custom meta box data
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    if (isset($_POST['tour_name'])) {
        update_post_meta($post_id, '_tour_name', sanitize_text_field($_POST['tour_name']));
    }
    if (isset($_POST['tour_details'])) {
        update_post_meta($post_id, '_tour_details', sanitize_textarea_field($_POST['tour_details']));
    }
    if (isset($_POST['tour_location'])) {
        update_post_meta($post_id, '_tour_location', sanitize_text_field($_POST['tour_location']));
    }
    if (isset($_POST['tour_duration'])) {
        update_post_meta($post_id, '_tour_duration', sanitize_text_field($_POST['tour_duration']));
    }
    if (isset($_POST['tour_price'])) {
        update_post_meta($post_id, '_tour_price', floatval($_POST['tour_price']));
    }
    if (isset($_POST['tour_availability'])) {
        update_post_meta($post_id, '_tour_availability', sanitize_text_field($_POST['tour_availability']));
    }
    if (isset($_POST['tour_cover_images'])) {
        update_post_meta($post_id, '_tour_cover_images', sanitize_text_field($_POST['tour_cover_images']));
    }
}
add_action('save_post', 'save_tour_meta');

// Include the AddTrip form from a separate file
function include_add_trip_form() {
    include get_template_directory() . '/admin/add-trip-form.php';
}
add_action('admin_menu', function() {
    add_submenu_page(
        'edit.php?post_type=tour', 
        'Add Trip', 
        'Add Trip', 
        'manage_options', 
        'add_trip', 
        'include_add_trip_form'
    );
});

// Create custom database table for bookings
function create_custom_booking_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_bookings';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        customer_name varchar(255) NOT NULL,
        tour_id mediumint(9) NOT NULL,
        booking_date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        payment_status varchar(20) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'create_custom_booking_table');
?>
