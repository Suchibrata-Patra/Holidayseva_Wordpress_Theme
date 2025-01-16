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
    <div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="#tour_form" class="list-group-item list-group-item-action active" data-toggle="collapse" aria-expanded="true">
                    Tour Details
                </a>
                <a href="#seo_form" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false">
                    SEO Settings
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div id="tour_form" class="collapse show">
                <h3>Tour Details</h3>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="tour_name">Tour Name:</label>
                        <input type="text" name="tour_name" value="<?php echo esc_attr($tour_name); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tour_details">Details:</label>
                        <textarea name="tour_details" class="form-control"><?php echo esc_textarea($tour_details); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tour_location">Location:</label>
                        <input type="text" name="tour_location" value="<?php echo esc_attr($tour_location); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tour_duration">Duration:</label>
                        <input type="text" name="tour_duration" value="<?php echo esc_attr($tour_duration); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tour_price">Price:</label>
                        <input type="number" name="tour_price" value="<?php echo esc_attr($tour_price); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tour_availability">Availability:</label>
                        <input type="text" name="tour_availability" value="<?php echo esc_attr($tour_availability); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tour_cover_images">Cover Images:</label>
                        <input type="text" name="tour_cover_images" id="tour_cover_images" value="<?php echo esc_attr(implode(',', (array)$tour_cover_images)); ?>" class="form-control" />
                        <button type="button" id="tour_cover_images_button" class="btn btn-primary mt-2">Select Images</button>
                    </div>
                </form>
            </div>

            <div id="seo_form" class="collapse">
                <h3>SEO Settings</h3>
                <div class="form-group">
                    <label for="rank_math_focus_keyword">Focus Keyword:</label>
                    <input type="text" name="rank_math_focus_keyword" id="rank_math_focus_keyword" class="form-control" />
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
add_action('after_switch_theme', 'create_custom_table');
?>