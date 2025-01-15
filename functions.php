<?php
// Add theme support for post thumbnails
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

    // Add custom submenu page under 'Tours' for the 'Add Trip' options page
    add_submenu_page(
        'edit.php?post_type=tour', // Parent slug (custom post type menu)
        'Add Trip',                // Page title
        'Add Trip',                // Menu title
        'manage_options',          // Capability
        'add_trip',                // Menu slug
        'display_add_trip_page'    // Function to display the page content
    );
}
add_action('init', 'create_tour_post_type');

// Function to display the 'Add Trip' page content
function display_add_trip_page() {
    ?>
    <div class="wrap">
        <h1>Add a New Trip</h1>
        <form method="post" action="">
            <?php
            // Check if the form has been submitted
            if (isset($_POST['add_trip_submit'])) {
                // Get the data from the form and sanitize it
                $tour_name = sanitize_text_field($_POST['tour_name']);
                $tour_details = sanitize_textarea_field($_POST['tour_details']);
                $tour_location = sanitize_text_field($_POST['tour_location']);
                $tour_duration = sanitize_text_field($_POST['tour_duration']);
                $tour_price = floatval($_POST['tour_price']);
                $tour_availability = sanitize_text_field($_POST['tour_availability']);
                $tour_cover_images = sanitize_text_field($_POST['tour_cover_images']);

                // Create a new post of type 'tour'
                $tour_post = array(
                    'post_title' => $tour_name,
                    'post_content' => $tour_details,
                    'post_status' => 'publish',
                    'post_type' => 'tour',
                    'meta_input' => array(
                        '_tour_name' => $tour_name,
                        '_tour_details' => $tour_details,
                        '_tour_location' => $tour_location,
                        '_tour_duration' => $tour_duration,
                        '_tour_price' => $tour_price,
                        '_tour_availability' => $tour_availability,
                        '_tour_cover_images' => explode(',', $tour_cover_images),
                    ),
                );

                // Insert the post into the database
                $post_id = wp_insert_post($tour_post);

                if ($post_id) {
                    echo '<div class="updated"><p>Tour added successfully!</p></div>';
                } else {
                    echo '<div class="error"><p>Failed to add tour. Please try again.</p></div>';
                }
            }
            ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="tour_name">Tour Name:</label></th>
                    <td><input type="text" name="tour_name" id="tour_name" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_details">Details:</label></th>
                    <td><textarea name="tour_details" id="tour_details" rows="5" class="large-text" required></textarea></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_location">Location:</label></th>
                    <td><input type="text" name="tour_location" id="tour_location" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_duration">Duration:</label></th>
                    <td><input type="text" name="tour_duration" id="tour_duration" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_price">Price:</label></th>
                    <td><input type="number" name="tour_price" id="tour_price" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_availability">Availability:</label></th>
                    <td><input type="text" name="tour_availability" id="tour_availability" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_cover_images">Cover Images (comma-separated URLs):</label></th>
                    <td><input type="text" name="tour_cover_images" id="tour_cover_images" class="regular-text" required />
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="add_trip_submit" id="add_trip_submit" class="button-primary" value="Add Trip" />
            </p>
        </form>
    </div>
    <?php
}

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

// Function to add custom table when theme is activated
add_action('after_switch_theme', 'create_custom_table');

// Add theme support for post thumbnails
add_theme_support('post-thumbnails');
?>
