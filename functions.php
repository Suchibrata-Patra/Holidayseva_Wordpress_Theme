<?php

// Function to create the custom table
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
        'hierarchical' => false, // Books are not hierarchical themselves
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
        'book_details_meta_box', // Meta box ID
        'Book Details', // Title of the meta box
        'display_book_meta_box', // Callback function to display the meta box
        'book', // Post type where it will be displayed
        'normal', // Position of the meta box
        'high' // Priority of the meta box
    );
}

add_action('add_meta_boxes', 'add_book_meta_boxes');

// Callback function to display custom fields in the meta box
function display_book_meta_box($post) {
    // Retrieve existing custom fields values
    $book_name = get_post_meta($post->ID, '_book_name', true);
    $book_isbn = get_post_meta($post->ID, '_book_isbn', true);
    $book_details = get_post_meta($post->ID, '_book_details', true);
    $book_author = get_post_meta($post->ID, '_book_author', true);
    $book_publisher = get_post_meta($post->ID, '_book_publisher', true);
    $book_publish_date = get_post_meta($post->ID, '_book_publish_date', true);
    $book_language = get_post_meta($post->ID, '_book_language', true);
    $book_genre = get_post_meta($post->ID, '_book_genre', true);
    $book_pages = get_post_meta($post->ID, '_book_pages', true);
    $book_cover_type = get_post_meta($post->ID, '_book_cover_type', true);
    $book_price = get_post_meta($post->ID, '_book_price', true);
    $book_stock = get_post_meta($post->ID, '_book_stock', true);
    $book_edition = get_post_meta($post->ID, '_book_edition', true);

    // Display custom fields in the meta box
    ?>
    <label for="book_name">Book Name:</label>
    <input type="text" name="book_name" value="<?php echo esc_attr($book_name); ?>" class="widefat" />
    
    <label for="book_isbn">ISBN:</label>
    <input type="text" name="book_isbn" value="<?php echo esc_attr($book_isbn); ?>" class="widefat" />
    
    <label for="book_details">Details:</label>
    <textarea name="book_details" class="widefat"><?php echo esc_textarea($book_details); ?></textarea>
    
    <label for="book_author">Author:</label>
    <input type="text" name="book_author" value="<?php echo esc_attr($book_author); ?>" class="widefat" />
    
    <label for="book_publisher">Publisher:</label>
    <input type="text" name="book_publisher" value="<?php echo esc_attr($book_publisher); ?>" class="widefat" />
    
    <label for="book_publish_date">Publish Date:</label>
    <input type="date" name="book_publish_date" value="<?php echo esc_attr($book_publish_date); ?>" class="widefat" />
    
    <label for="book_language">Language:</label>
    <input type="text" name="book_language" value="<?php echo esc_attr($book_language); ?>" class="widefat" />
    
    <label for="book_genre">Genre:</label>
    <input type="text" name="book_genre" value="<?php echo esc_attr($book_genre); ?>" class="widefat" />
    
    <label for="book_pages">Pages:</label>
    <input type="number" name="book_pages" value="<?php echo esc_attr($book_pages); ?>" class="widefat" />
    
    <label for="book_cover_type">Cover Type:</label>
    <input type="text" name="book_cover_type" value="<?php echo esc_attr($book_cover_type); ?>" class="widefat" />
    
    <label for="book_price">Price:</label>
    <input type="number" name="book_price" value="<?php echo esc_attr($book_price); ?>" class="widefat" />
    
    <label for="book_stock">Stock:</label>
    <input type="number" name="book_stock" value="<?php echo esc_attr($book_stock); ?>" class="widefat" />
    
    <label for="book_edition">Edition:</label>
    <input type="text" name="book_edition" value="<?php echo esc_attr($book_edition); ?>" class="widefat" />
    <?php
}

// Save custom fields values when the post is saved
function save_book_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

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
?>
