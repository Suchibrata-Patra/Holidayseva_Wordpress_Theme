<?php
add_theme_support('post-thumbnails');

function create_tour_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Tours',
            'singular_name' => 'Tours',
            'add_new' => 'Add New Tour',
            'add_new_item' => 'Add New Tour',
            'edit_item' => 'Edit Tour',
            'new_item' => 'New Tour',
            'view_item' => 'View Tour',
            'search_items' => 'Search Tour',
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
        'menu_position' => 2, // Add this line
    );
    register_post_type('tour', $args);
}
add_action('init', 'create_tour_post_type');

// Add custom fields for Book details
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
    $tour_isbn = get_post_meta($post->ID, '_tour_isbn', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_author = get_post_meta($post->ID, '_tour_author', true);
    $tour_publisher = get_post_meta($post->ID, '_tour_publisher', true);
    $tour_publish_date = get_post_meta($post->ID, '_tour_publish_date', true);
    $tour_language = get_post_meta($post->ID, '_tour_language', true);
    $tour_genre = get_post_meta($post->ID, '_tour_genre', true);
    $tour_pages = get_post_meta($post->ID, '_tour_pages', true);
    $tour_cover_type = get_post_meta($post->ID, '_tour_cover_type', true);
    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_stock = get_post_meta($post->ID, '_tour_stock', true);
    $tour_edition = get_post_meta($post->ID, '_tour_edition', true);
    
    ?>
    <label for="tour_name">Tour Name:</label>
    <input type="text" name="tour_name" value="<?php echo esc_attr($tour_name); ?>" class="widefat" />
    
    <label for="tour_isbn">ISBN:</label>
    <input type="text" name="tour_isbn" value="<?php echo esc_attr($tour_isbn); ?>" class="widefat" />
    
    <label for="tour_details">Details:</label>
    <textarea name="tour_details" class="widefat"><?php echo esc_textarea($tour_details); ?></textarea>
    
    <label for="tour_author">Author:</label>
    <input type="text" name="tour_author" value="<?php echo esc_attr($tour_author); ?>" class="widefat" />
    
    <label for="tour_publisher">Publisher:</label>
    <input type="text" name="tour_publisher" value="<?php echo esc_attr($tour_publisher); ?>" class="widefat" />
    
    <label for="tour_publish_date">Publish Date:</label>
    <input type="date" name="tour_publish_date" value="<?php echo esc_attr($tour_publish_date); ?>" class="widefat" />
    
    <label for="tour_language">Language:</label>
    <input type="text" name="tour_language" value="<?php echo esc_attr($tour_language); ?>" class="widefat" />
    
    <label for="tour_genre">Genre:</label>
    <input type="text" name="tour_genre" value="<?php echo esc_attr($tour_genre); ?>" class="widefat" />
    
    <label for="tour_pages">Pages:</label>
    <input type="number" name="tour_pages" value="<?php echo esc_attr($tour_pages); ?>" class="widefat" />
    
    <label for="tour_cover_type">Cover Type:</label>
    <input type="text" name="tour_cover_type" value="<?php echo esc_attr($tour_cover_type); ?>" class="widefat" />
    
    <label for="tour_price">Price:</label>
    <input type="number" name="tour_price" value="<?php echo esc_attr($tour_price); ?>" class="widefat" />
    
    <label for="tour_stock">Stock:</label>
    <input type="number" name="tour_stock" value="<?php echo esc_attr($tour_stock); ?>" class="widefat" />

    <label for="tour_cover_images">Cover Images:</label>
    <input type="text" name="tour_cover_images" id="tour_cover_images" value="<?php echo esc_attr(implode(',', (array)$tour_cover_images)); ?>" class="widefat" />
    <button type="button" id="tour_cover_images_button" class="button">Select Images</button>

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
    if (isset($_POST['tour_isbn'])) {
        update_post_meta($post_id, '_tour_isbn', sanitize_text_field($_POST['tour_isbn']));
    }
    if (isset($_POST['tour_details'])) {
        update_post_meta($post_id, '_tour_details', sanitize_textarea_field($_POST['tour_details']));
    }
    if (isset($_POST['tour_author'])) {
        update_post_meta($post_id, '_tour_author', sanitize_text_field($_POST['tour_author']));
    }
    if (isset($_POST['tour_publisher'])) {
        update_post_meta($post_id, '_tour_publisher', sanitize_text_field($_POST['tour_publisher']));
    }
    if (isset($_POST['tour_publish_date'])) {
        update_post_meta($post_id, '_tour_publish_date', sanitize_text_field($_POST['tour_publish_date']));
    }
    if (isset($_POST['tour_language'])) {
        update_post_meta($post_id, '_tour_language', sanitize_text_field($_POST['tour_language']));
    }
    if (isset($_POST['tour_genre'])) {
        update_post_meta($post_id, '_tour_genre', sanitize_text_field($_POST['tour_genre']));
    }
    if (isset($_POST['tour_pages'])) {
        update_post_meta($post_id, '_tour_pages', intval($_POST['tour_pages']));
    }
    if (isset($_POST['tour_cover_type'])) {
        update_post_meta($post_id, '_tour_cover_type', sanitize_text_field($_POST['tour_cover_type']));
    }
    if (isset($_POST['tour_price'])) {
        update_post_meta($post_id, '_tour_price', floatval($_POST['tour_price']));
    }
    if (isset($_POST['tour_stock'])) {
        update_post_meta($post_id, '_tour_stock', intval($_POST['tour_stock']));
    }
    if (isset($_POST['tour_edition'])) {
        update_post_meta($post_id, '_tour_edition', sanitize_text_field($_POST['tour_edition']));
    }
}

add_action('save_post', 'save_tour_meta');
?>