<?php
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
                    <input type="text" name="tour_name" id="tour_name" class="form-control"  value="<?php echo esc_attr($tour_name); ?>" />
                </div>

                <div class="form-group">
                    <label for="tour_details">Details:</label>
                    <textarea name="tour_details" id="tour_details" class="form-control"><?php echo esc_textarea($tour_details); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="tour_location">Location:</label>
                    <input type="text" name="tour_location" id="tour_location" class="form-control" value="<?php echo esc_attr($tour_location); ?>" />
                </div>

                <div class="form-group">
                    <label for="tour_duration">Duration:</label>
                    <input type="text" name="tour_duration" id="tour_duration" class="form-control" value="<?php echo esc_attr($tour_duration); ?>" />
                </div>

                <div class="form-group">
                    <label for="tour_price">Price:</label>
                    <input type="number" name="tour_price" id="tour_price" class="form-control" value="<?php echo esc_attr($tour_price); ?>" />
                </div>

                <div class="form-group">
                    <label for="tour_availability">Availability:</label>
                    <input type="text" name="tour_availability" id="tour_availability" class="form-control" value="<?php echo esc_attr($tour_availability); ?>" />
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
?>