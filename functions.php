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
}
add_action('init', 'create_tour_post_type');

// Add custom fields for Tour details
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

// Callback function to display custom fields in the meta box
function display_tour_meta_box($post) {
    // Retrieve existing custom fields values
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_duration = get_post_meta($post->ID, '_tour_duration', true);
    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);

    ?>
    <label for="tour_name">Tour Name:</label>
    <input type="text" name="tour_name" value="<?php echo esc_attr($tour_name); ?>" class="widefat" />
    
    <label for="tour_details">Details:</label>
    <textarea name="tour_details" class="widefat"><?php echo esc_textarea($tour_details); ?></textarea>
    
    <label for="tour_location">Location:</label>
    <input type="text" name="tour_location" value="<?php echo esc_attr($tour_location); ?>" class="widefat" />

    <label for="tour_duration">Duration:</label>
    <input type="text" name="tour_duration" value="<?php echo esc_attr($tour_duration); ?>" class="widefat" />

    <label for="tour_price">Price:</label>
    <input type="number" name="tour_price" value="<?php echo esc_attr($tour_price); ?>" class="widefat" />

    <label for="tour_availability">Availability:</label>
    <input type="text" name="tour_availability" value="<?php echo esc_attr($tour_availability); ?>" class="widefat" />

    <label for="tour_cover_images">Cover Images:</label>
    <input type="text" name="tour_cover_images" id="tour_cover_images" value="<?php echo esc_attr(implode(',', (array)$tour_cover_images)); ?>" class="widefat" />
    <button type="button" id="tour_cover_images_button" class="button">Select Images</button>

    <label for="rank_math_focus_keyword">Focus Keyword:</label>
    <input type="text" name="rank_math_focus_keyword" id="rank_math_focus_keyword" class="regular-text" />

    <script type="text/javascript">
        jQuery(document).ready(function($){
            var mediaUploader;
            $('#tour_cover_images_button').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Select Cover Images',
                    button: {
                        text: 'Select Images'
                    },
                    multiple: true // Allow multiple file selection
                });

                mediaUploader.on('select', function() {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    var imageUrls = attachments.map(function(attachment) {
                        return attachment.url;
                    });
                    $('#tour_cover_images').val(imageUrls.join(', '));
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}

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

    // Save Focus Keyword
    if (isset($_POST['rank_math_focus_keyword'])) {
        update_post_meta($post_id, '_rank_math_focus_keyword', sanitize_text_field($_POST['rank_math_focus_keyword']));
    }
}

add_action('save_post', 'save_tour_meta');

// Optionally, you can add the function to create a custom table (call create_custom_table when needed)
add_action('after_switch_theme', 'create_custom_table');

// Create the options page under the "Tours" menu
function add_trip_options_page() {
    add_submenu_page(
        'edit.php?post_type=tour', // Parent menu slug for "Tours"
        'Add Trip', // Page title
        'Add Trip', // Menu title
        'manage_options', // Capability
        'add_trip', // Menu slug
        'display_add_trip_page' // Function to display the options page content
    );
}
add_action('admin_menu', 'add_trip_options_page');

// Function to display the options page
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
                $focus_keyword = sanitize_text_field($_POST['rank_math_focus_keyword']);

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
                        '_rank_math_focus_keyword' => $focus_keyword,
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
                    <td><input type="text" name="tour_cover_images" id="tour_cover_images" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="rank_math_focus_keyword">Focus Keyword:</label></th>
                    <td><input type="text" name="rank_math_focus_keyword" id="rank_math_focus_keyword" class="regular-text" /></td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="add_trip_submit" id="add_trip_submit" class="button-primary" value="Add Trip" />
            </p>
        </form>
    </div>
    <?php
}
?>
