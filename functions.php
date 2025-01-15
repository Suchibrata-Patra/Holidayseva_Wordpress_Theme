<?php
add_theme_support('post-thumbnails');

// Function to create the custom table for bookings
function create_custom_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'custom_bookings'; // Name of your custom table
    $charset_collate = $wpdb->get_charset_collate();

    // SQL query to create the table
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

// Function to create a custom post type for Tours
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
        'show_in_rest' => true, // Enable Gutenberg block editor
        'has_archive' => true,
        'rewrite' => array('slug' => 'tours'),
        'menu_position' => 2,
    );
    register_post_type('tour', $args);
}
add_action('init', 'create_tour_post_type');

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Save custom fields values
    if (isset($_POST['tour_cover_images'])) {
        update_post_meta($post_id, '_tour_cover_images', explode(',', sanitize_text_field($_POST['tour_cover_images'])));
    }
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
}

add_action('save_post', 'save_tour_meta');

// Optionally, you can add the function to create a custom table (call create_custom_table when needed)
add_action('after_switch_theme', 'create_custom_table');

// Enqueue media uploader scripts for the media buttons
function enqueue_media_uploader_scripts() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'enqueue_media_uploader_scripts');
