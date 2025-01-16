<?php
// Add theme support for post thumbnails
add_theme_support('post-thumbnails');

add_filter( 'rank_math/snippet/rich_snippet_data', function( $data, $post ) {
    if ( 'tour' === $post->post_type ) {
        // Custom schema data for 'tour' post type
        $data['@type'] = 'TouristAttraction';
        $data['name'] = get_the_title( $post );
        $data['description'] = get_the_excerpt( $post );
        // Add other custom fields here
    }
    return $data;
}, 10, 2 );

function register_custom_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Custom Posts',
            'singular_name' => 'Custom Post',
        ),
        'public' => true,  // Make sure it's publicly accessible
        'has_archive' => true,  // Enable the archive page for the post type
        'rewrite' => array('slug' => 'custom-posts'),
        'show_in_rest' => true,  // This ensures it shows up in REST API (important for some integrations)
        'show_in_sitemap' => true, // Add this to explicitly include it in the sitemap
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('custom_post', $args); // Replace 'custom_post' with your post type slug
}
add_action('init', 'register_custom_post_type');



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
    <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="tab-link active" data-target="tour_form">Tour Details</a>
        <a href="#" class="tab-link" data-target="seo_form">SEO Settings</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Tour Form -->
        <div id="tour_form">
            <h3 class="form-title">Tour Details</h3>
            <form method="post" action="" class="styled-form">
                <div class="form-group">
                    <label for="tour_name">Tour Name:</label>
                    <input type="text" name="tour_name" id="tour_name" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tour_details">Details:</label>
                    <textarea name="tour_details" id="tour_details" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="tour_location">Location:</label>
                    <input type="text" name="tour_location" id="tour_location" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tour_duration">Duration:</label>
                    <input type="text" name="tour_duration" id="tour_duration" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tour_price">Price:</label>
                    <input type="number" name="tour_price" id="tour_price" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tour_availability">Availability:</label>
                    <input type="text" name="tour_availability" id="tour_availability" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="tour_cover_images">Cover Images:</label>
                    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control" />
                    <button type="button" id="tour_cover_images_button" class="form-button">Select Images</button>
                </div>
            </form>
        </div>

        <!-- SEO Form -->
        <div id="seo_form" class="hidden">
            <h3 class="form-title">SEO Settings</h3>
            <form method="post" action="" class="styled-form">
                <div class="form-group">
                    <label for="rank_math_focus_keyword">Focus Keyword:</label>
                    <input type="text" name="rank_math_focus_keyword" id="rank_math_focus_keyword" class="form-control" />
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Layout Styling */
    .container {
        display: flex;
        min-height: 100vh;
        background-color: #ecf0f1;
    }

    /* Sidebar Styling */
    .sidebar {
        width: 20%;
        background-color:rgb(0, 0, 0);
        color: white;
        padding: 10px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
        display: block;
        padding: 12px 15px;
        color: white;
        text-decoration: none;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .sidebar a.active {
        background-color: #3498db;
    }

    .sidebar a:hover {
        background-color: #2980b9;
    }

    /* Main Content Styling */
    .main-content {
        flex-grow: 1;
        padding: 30px;
    }

    .form-title {
        margin-bottom: 20px;
        color: #34495e;
        font-size: 1.5em;
        font-weight: bold;
    }

    /* Form Styling */
    .styled-form {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #34495e;
    }

    .form-group input, 
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #bdc3c7;
        border-radius: 5px;
        font-size: 1rem;
        color: #2c3e50;
    }

    .form-group input:focus, 
    .form-group textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    .form-button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .form-button:hover {
        background-color: #2980b9;
    }

    .hidden {
        display: none;
    }
</style>

<script>
    document.querySelectorAll('.tab-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.tab-link').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.main-content > div').forEach(content => content.classList.add('hidden'));

            this.classList.add('active');
            document.getElementById(this.dataset.target).classList.remove('hidden');
        });
    });

    document.getElementById('tour_cover_images_button').addEventListener('click', function() {
        alert('Media uploader functionality is disabled in this demo.');
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