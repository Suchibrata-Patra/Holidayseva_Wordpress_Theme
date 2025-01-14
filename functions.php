<?php
    register_nav_menus(
        array('primary_menu'=>'Top Menu')
    );
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');


    register_sidebar(
        array(
            'name'=>'sidebar Location',
            'id'=>'sidebar'
        )
    );
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

function wporg_custom_post_type() {
    register_post_type('wporg_product',
        array(
            'labels'      => array(
                'name'          => __('Products', 'textdomain'),
                'singular_name' => __('Product', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'), // Thumbnail support
            'show_in_rest' => true, // Enable REST API support (optional, for Gutenberg)
        )
    );
}
add_action('init', 'wporg_custom_post_type');

// Add meta boxes for additional fields
function wporg_add_meta_boxes() {
    add_meta_box(
        'tour_details_meta_box',       // ID of the meta box
        __('Tour Details', 'textdomain'), // Title of the meta box
        'wporg_render_meta_box_content', // Callback function
        'wporg_product',                // Post type
        'normal',                       // Context
        'high'                          // Priority
    );
}
add_action('add_meta_boxes', 'wporg_add_meta_boxes');

// Render the content for the custom meta box
function wporg_render_meta_box_content($post) {
    // Nonce field for security
    wp_nonce_field('wporg_save_meta_box_data', 'wporg_meta_box_nonce');

    // Tour Name
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    echo '<label for="tour_name">' . __('Tour Name:', 'textdomain') . '</label>';
    echo '<input type="text" id="tour_name" name="tour_name" value="' . esc_attr($tour_name) . '" class="widefat" />';

    // Tour Duration
    $tour_duration = get_post_meta($post->ID, '_tour_duration', true);
    echo '<label for="tour_duration">' . __('Tour Duration:', 'textdomain') . '</label>';
    echo '<input type="text" id="tour_duration" name="tour_duration" value="' . esc_attr($tour_duration) . '" class="widefat" />';

    // Date of Journey
    $date_of_journey = get_post_meta($post->ID, '_date_of_journey', true);
    echo '<label for="date_of_journey">' . __('Date of Journey:', 'textdomain') . '</label>';
    echo '<input type="date" id="date_of_journey" name="date_of_journey" value="' . esc_attr($date_of_journey) . '" class="widefat" />';

    // Pricing
    $pricing = get_post_meta($post->ID, '_pricing', true);
    echo '<label for="pricing">' . __('Pricing:', 'textdomain') . '</label>';
    echo '<input type="text" id="pricing" name="pricing" value="' . esc_attr($pricing) . '" class="widefat" />';
}

// Save the meta box data
function wporg_save_meta_box_data($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['wporg_meta_box_nonce']) || !wp_verify_nonce($_POST['wporg_meta_box_nonce'], 'wporg_save_meta_box_data')) {
        return;
    }

    // Save the Tour Name
    if (isset($_POST['tour_name'])) {
        update_post_meta($post_id, '_tour_name', sanitize_text_field($_POST['tour_name']));
    }

    // Save the Tour Duration
    if (isset($_POST['tour_duration'])) {
        update_post_meta($post_id, '_tour_duration', sanitize_text_field($_POST['tour_duration']));
    }

    // Save the Date of Journey
    if (isset($_POST['date_of_journey'])) {
        update_post_meta($post_id, '_date_of_journey', sanitize_text_field($_POST['date_of_journey']));
    }

    // Save the Pricing
    if (isset($_POST['pricing'])) {
        update_post_meta($post_id, '_pricing', sanitize_text_field($_POST['pricing']));
    }
}
add_action('save_post', 'wporg_save_meta_box_data');

?>
