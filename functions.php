<?php
require_once get_template_directory() . '/tour-meta-box.php';
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

function enqueue_media_uploader_scripts($hook) {
    // Check if the current post type is 'tour'
    global $post;
    if (isset($post->post_type) && $post->post_type === 'tour') {
        wp_enqueue_media(); // Enqueue WordPress media uploader
        wp_enqueue_script('tour-meta-box-script', get_template_directory_uri() . '/js/tour-meta-box.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_media_uploader_scripts');

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
