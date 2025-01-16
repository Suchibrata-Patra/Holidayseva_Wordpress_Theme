<?php
// Include meta box logic
require_once get_template_directory() . '/tour-meta-box.php';

// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Add custom schema for 'tour' post type with Rank Math
add_filter('rank_math/snippet/rich_snippet_data', function($data, $post) {
    if ($post->post_type === 'tour') {
        $data['@type'] = 'TouristAttraction';
        $data['name'] = get_the_title($post);
        $data['description'] = get_the_excerpt($post);
        // Add additional fields as needed
    }
    return $data;
}, 10, 2);

// Register custom post types
function register_custom_post_types() {
    $post_types = [
        'custom_post' => [
            'name' => 'Custom Posts',
            'singular_name' => 'Custom Post',
            'slug' => 'custom-posts',
            'icon' => 'dashicons-admin-post',
        ],
        'tour' => [
            'name' => 'Tours',
            'singular_name' => 'Tour',
            'slug' => 'tours',
            'icon' => 'dashicons-palmtree',
        ],
    ];

    foreach ($post_types as $slug => $type) {
        register_post_type($slug, [
            'labels' => [
                'name' => $type['name'],
                'singular_name' => $type['singular_name'],
                'add_new' => "Add New {$type['singular_name']}",
                'add_new_item' => "Add New {$type['singular_name']}",
                'edit_item' => "Edit {$type['singular_name']}",
                'new_item' => "New {$type['singular_name']}",
                'view_item' => "View {$type['singular_name']}",
                'search_items' => "Search {$type['name']}",
                'not_found' => "No {$type['name']} found",
                'not_found_in_trash' => "No {$type['name']} found in Trash",
                'all_items' => "All {$type['name']}",
            ],
            'public' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
            'menu_icon' => $type['icon'],
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => $type['slug']],
        ]);
    }
}
add_action('init', 'register_custom_post_types');

// Enqueue scripts for media uploader
function enqueue_tour_scripts($hook) {
    global $post;
    if (isset($post->post_type) && $post->post_type === 'tour') {
        wp_enqueue_media();
        wp_enqueue_script(
            'tour-meta-box-script',
            get_template_directory_uri() . '/js/tour-meta-box.js',
            ['jquery'],
            null,
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'enqueue_tour_scripts');

// Add custom meta box for Tour details
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
