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

// Register theme activation hook to create the table when the theme is activated
function theme_activation() {
    create_custom_table();  // Create the custom table on theme activation
    // Other theme activation actions, if needed
}
add_action('after_switch_theme', 'theme_activation');

// Register navigation menu
register_nav_menus(
    array('primary_menu' => 'Top Menu')
);

// Add theme support for post thumbnails and custom header
add_theme_support('post-thumbnails');
add_theme_support('custom-header');

// Register sidebar location
register_sidebar(
    array(
        'name' => 'Sidebar Location',
        'id' => 'sidebar',
    )
);

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

// Register the custom post type on 'init' action
add_action('init', 'create_book_post_type');
// Register custom taxonomy for "Destinations"
function create_destination_taxonomy() {
    $labels = array(
        'name'              => 'Destinations',
        'singular_name'     => 'Destination',
        'search_items'      => 'Search Destinations',
        'all_items'         => 'All Destinations',
        'parent_item'       => 'Parent Destination',
        'parent_item_colon' => 'Parent Destination:',
        'edit_item'         => 'Edit Destination',
        'update_item'       => 'Update Destination',
        'add_new_item'      => 'Add New Destination',
        'new_item_name'     => 'New Destination Name',
        'menu_name'         => 'Destinations',
    );

    $args = array(
        'hierarchical'      => true, // Makes it behave like categories
        'show_ui'            => true,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'destination'),
    );

    // Register the taxonomy for the "tour" custom post type
    register_taxonomy('destination', array('tour'), $args);
}

add_action('init', 'create_destination_taxonomy');

?>
