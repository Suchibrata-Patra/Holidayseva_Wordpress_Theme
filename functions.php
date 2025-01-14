<?php

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

// Function to create a custom post type for Books
function create_book_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Books',
            'singular_name' => 'Book',
            'add_new' => 'Add New Book',
            'add_new_item' => 'Add New Book',
            'edit_item' => 'Edit Book',
            'new_item' => 'New Book',
            'view_item' => 'View Book',
            'search_items' => 'Search Books',
            'not_found' => 'No Books found',
            'not_found_in_trash' => 'No Books found in Trash',
            'all_items' => 'All Books',
            'insert_into_item' => 'Insert into book',
            'uploaded_to_this_item' => 'Uploaded to this book',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-book',
        'show_in_rest' => true, // Enable Gutenberg block editor
        'has_archive' => true,
        'rewrite' => array('slug' => 'books'),
    );
    register_post_type('book', $args);
}
add_action('init', 'create_book_post_type');

// Add custom fields for Book details
function add_book_meta_boxes() {
    add_meta_box(
        'book_details_meta_box', 
        'Book Details', 
        'display_book_meta_box', 
        'book', 
        'normal', 
        'high' 
    );
}

add_action('add_meta_boxes', 'add_book_meta_boxes');

// Callback function to display custom fields in the meta box
function display_book_meta_box($post) {
    // Retrieve existing custom fields values
    $book_cover_image = get_post_meta($post->ID, '_book_cover_image', true);

    ?>
    <!-- Other fields go here... -->

    <label for="book_cover_image">Cover Image:</label>
    <input type="text" name="book_cover_image" id="book_cover_image" value="<?php echo esc_attr($book_cover_image); ?>" class="widefat" />
    <button type="button" id="book_cover_image_button" class="button">Select Image</button>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            var mediaUploader;
            $('#book_cover_image_button').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Select Cover Image',
                    button: {
                        text: 'Select Image'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#book_cover_image').val(attachment.url);
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}

// Save custom fields values when the post is saved
function save_book_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Save custom fields values
    if (isset($_POST['book_cover_image'])) {
        update_post_meta($post_id, '_book_cover_image', esc_url_raw($_POST['book_cover_image']));
    }
    if (isset($_POST['book_name'])) {
        update_post_meta($post_id, '_book_name', sanitize_text_field($_POST['book_name']));
    }
    if (isset($_POST['book_isbn'])) {
        update_post_meta($post_id, '_book_isbn', sanitize_text_field($_POST['book_isbn']));
    }
    if (isset($_POST['book_details'])) {
        update_post_meta($post_id, '_book_details', sanitize_textarea_field($_POST['book_details']));
    }
    if (isset($_POST['book_author'])) {
        update_post_meta($post_id, '_book_author', sanitize_text_field($_POST['book_author']));
    }
    if (isset($_POST['book_publisher'])) {
        update_post_meta($post_id, '_book_publisher', sanitize_text_field($_POST['book_publisher']));
    }
    if (isset($_POST['book_publish_date'])) {
        update_post_meta($post_id, '_book_publish_date', sanitize_text_field($_POST['book_publish_date']));
    }
    if (isset($_POST['book_language'])) {
        update_post_meta($post_id, '_book_language', sanitize_text_field($_POST['book_language']));
    }
    if (isset($_POST['book_genre'])) {
        update_post_meta($post_id, '_book_genre', sanitize_text_field($_POST['book_genre']));
    }
    if (isset($_POST['book_pages'])) {
        update_post_meta($post_id, '_book_pages', intval($_POST['book_pages']));
    }
    if (isset($_POST['book_cover_type'])) {
        update_post_meta($post_id, '_book_cover_type', sanitize_text_field($_POST['book_cover_type']));
    }
    if (isset($_POST['book_price'])) {
        update_post_meta($post_id, '_book_price', floatval($_POST['book_price']));
    }
    if (isset($_POST['book_stock'])) {
        update_post_meta($post_id, '_book_stock', intval($_POST['book_stock']));
    }
    if (isset($_POST['book_edition'])) {
        update_post_meta($post_id, '_book_edition', sanitize_text_field($_POST['book_edition']));
    }
}

add_action('save_post', 'save_book_meta');

// Optionally, you can add the function to create a custom table (call create_custom_table when needed)
add_action('after_switch_theme', 'create_custom_table');

?>
