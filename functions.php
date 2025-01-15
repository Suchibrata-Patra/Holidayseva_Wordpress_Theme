<?php
add_theme_support('post-thumbnails');

// Function to create the custom table for toursings
function create_custom_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'tour_bookings'; // Name of your custom table
    $charset_collate = $wpdb->get_charset_collate();

    // SQL query to create the table
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        customer_name varchar(255) NOT NULL,
        tour_id mediumint(9) NOT NULL,
        toursing_date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        payment_status varchar(20) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Function to create a custom post type for tours
function create_tours_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Tours',
            'singular_name' => 'Tour',
            'add_new' => 'Add New Tour',
            'add_new_item' => 'Add New Tour',
            'edit_item' => 'Edit tours',
            'new_item' => 'New tours',
            'view_item' => 'View tours',
            'search_items' => 'Search tours',
            'not_found' => 'No tours found',
            'not_found_in_trash' => 'No tours found in Trash',
            'all_items' => 'All tours',
            'insert_into_item' => 'Insert into tours',
            'uploaded_to_this_item' => 'Uploaded to this tours',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-palmtree',
        'show_in_rest' => true, // Enable Gutenberg block editor
        'has_archive' => true,
        'rewrite' => array('slug' => 'tours'),
        'menu_position' => 2, // Add this line
    );
    register_post_type('tours', $args);
}
add_action('init', 'create_tours_post_type');

// Add custom fields for tours details
function add_tours_meta_boxes() {
    add_meta_box(
        'tours_details_meta_box', 
        'tours Details', 
        'display_tours_meta_box', 
        'tours', 
        'normal', 
        'high' 
    );
}

add_action('add_meta_boxes', 'add_tours_meta_boxes');

// Callback function to display custom fields in the meta box
function display_tours_meta_box($post) {
    // Retrieve existing custom fields values
    $tours_cover_images = get_post_meta($post->ID, '_tours_cover_images', true);
    $tours_name = get_post_meta($post->ID, '_tours_name', true);
    $tours_isbn = get_post_meta($post->ID, '_tours_isbn', true);
    $tours_details = get_post_meta($post->ID, '_tours_details', true);
    $tours_author = get_post_meta($post->ID, '_tours_author', true);
    $tours_publisher = get_post_meta($post->ID, '_tours_publisher', true);
    $tours_publish_date = get_post_meta($post->ID, '_tours_publish_date', true);
    $tours_language = get_post_meta($post->ID, '_tours_language', true);
    $tours_genre = get_post_meta($post->ID, '_tours_genre', true);
    $tours_pages = get_post_meta($post->ID, '_tours_pages', true);
    $tours_cover_type = get_post_meta($post->ID, '_tours_cover_type', true);
    $tours_price = get_post_meta($post->ID, '_tours_price', true);
    $tours_stock = get_post_meta($post->ID, '_tours_stock', true);
    $tours_edition = get_post_meta($post->ID, '_tours_edition', true);
    
    ?>
    <h3>Hola</h3>
    <label for="tours_name">tours Name:</label>
    <input type="text" name="tours_name" value="<?php echo esc_attr($tours_name); ?>" class="widefat" />
    
    <label for="tours_isbn">ISBN:</label>
    <input type="text" name="tours_isbn" value="<?php echo esc_attr($tours_isbn); ?>" class="widefat" />
    
    <label for="tours_details">Details:</label>
    <textarea name="tours_details" class="widefat"><?php echo esc_textarea($tours_details); ?></textarea>
    
    <label for="tours_author">Author:</label>
    <input type="text" name="tours_author" value="<?php echo esc_attr($tours_author); ?>" class="widefat" />
    
    <label for="tours_publisher">Publisher:</label>
    <input type="text" name="tours_publisher" value="<?php echo esc_attr($tours_publisher); ?>" class="widefat" />
    
    <label for="tours_publish_date">Publish Date:</label>
    <input type="date" name="tours_publish_date" value="<?php echo esc_attr($tours_publish_date); ?>" class="widefat" />
    
    <label for="tours_language">Language:</label>
    <input type="text" name="tours_language" value="<?php echo esc_attr($tours_language); ?>" class="widefat" />
    
    <label for="tours_genre">Genre:</label>
    <input type="text" name="tours_genre" value="<?php echo esc_attr($tours_genre); ?>" class="widefat" />
    
    <label for="tours_pages">Pages:</label>
    <input type="number" name="tours_pages" value="<?php echo esc_attr($tours_pages); ?>" class="widefat" />
    
    <label for="tours_cover_type">Cover Type:</label>
    <input type="text" name="tours_cover_type" value="<?php echo esc_attr($tours_cover_type); ?>" class="widefat" />
    
    <label for="tours_price">Price:</label>
    <input type="number" name="tours_price" value="<?php echo esc_attr($tours_price); ?>" class="widefat" />
    
    <label for="tours_stock">Stock:</label>
    <input type="number" name="tours_stock" value="<?php echo esc_attr($tours_stock); ?>" class="widefat" />

    <label for="tours_cover_images">Cover Images:</label>
    <input type="text" name="tours_cover_images" id="tours_cover_images" value="<?php echo esc_attr(implode(',', (array)$tours_cover_images)); ?>" class="widefat" />
    <button type="button" id="tours_cover_images_button" class="button">Select Images</button>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            var mediaUploader;
            $('#tours_cover_images_button').click(function(e) {
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
                    $('#tours_cover_images').val(imageUrls.join(', '));
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}

// Save custom fields values when the post is saved
function save_tours_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Save custom fields values
    if (isset($_POST['tours_cover_images'])) {
        update_post_meta($post_id, '_tours_cover_images', explode(',', sanitize_text_field($_POST['tours_cover_images'])));
    }
    if (isset($_POST['tours_name'])) {
        update_post_meta($post_id, '_tours_name', sanitize_text_field($_POST['tours_name']));
    }
    if (isset($_POST['tours_isbn'])) {
        update_post_meta($post_id, '_tours_isbn', sanitize_text_field($_POST['tours_isbn']));
    }
    if (isset($_POST['tours_details'])) {
        update_post_meta($post_id, '_tours_details', sanitize_textarea_field($_POST['tours_details']));
    }
    if (isset($_POST['tours_author'])) {
        update_post_meta($post_id, '_tours_author', sanitize_text_field($_POST['tours_author']));
    }
    if (isset($_POST['tours_publisher'])) {
        update_post_meta($post_id, '_tours_publisher', sanitize_text_field($_POST['tours_publisher']));
    }
    if (isset($_POST['tours_publish_date'])) {
        update_post_meta($post_id, '_tours_publish_date', sanitize_text_field($_POST['tours_publish_date']));
    }
    if (isset($_POST['tours_language'])) {
        update_post_meta($post_id, '_tours_language', sanitize_text_field($_POST['tours_language']));
    }
    if (isset($_POST['tours_genre'])) {
        update_post_meta($post_id, '_tours_genre', sanitize_text_field($_POST['tours_genre']));
    }
    if (isset($_POST['tours_pages'])) {
        update_post_meta($post_id, '_tours_pages', intval($_POST['tours_pages']));
    }
    if (isset($_POST['tours_cover_type'])) {
        update_post_meta($post_id, '_tours_cover_type', sanitize_text_field($_POST['tours_cover_type']));
    }
    if (isset($_POST['tours_price'])) {
        update_post_meta($post_id, '_tours_price', floatval($_POST['tours_price']));
    }
    if (isset($_POST['tours_stock'])) {
        update_post_meta($post_id, '_tours_stock', intval($_POST['tours_stock']));
    }
    if (isset($_POST['tours_edition'])) {
        update_post_meta($post_id, '_tours_edition', sanitize_text_field($_POST['tours_edition']));
    }
}

add_action('save_post', 'save_tours_meta');

// Optionally, you can add the function to create a custom table (call create_custom_table when needed)
add_action('after_switch_theme', 'create_custom_table');

?>