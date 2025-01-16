<?php
// Include meta box logic
require_once get_template_directory() . '/Forms/TourDetailsEntry.php';

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

// Add menu for Global Variables
function add_global_variables_menu() {
    add_menu_page(
        'Global Variables',               // Page title
        'Global Variables',               // Menu title
        'manage_options',                 // Capability
        'global-variables',               // Menu slug
        'display_global_variables_page',  // Callback function
        'dashicons-admin-generic',        // Icon
        20                                // Position
    );
}
add_action('admin_menu', 'add_global_variables_menu');

// Display Global Variables page
function display_global_variables_page() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['global_variable_name'])) {
        // Save the global variable
        $name = sanitize_text_field($_POST['global_variable_name']);
        $value = sanitize_text_field($_POST['global_variable_value']);
        update_option($name, $value);
        echo '<div class="updated"><p>Global variable saved!</p></div>';
    }

    ?>
    <div class="wrap">
        <h1>Manage Global Variables</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th><label for="global_variable_name">Variable Name</label></th>
                    <td><input type="text" id="global_variable_name" name="global_variable_name" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="global_variable_value">Variable Value</label></th>
                    <td><input type="text" id="global_variable_value" name="global_variable_value" class="regular-text" required></td>
                </tr>
            </table>
            <?php submit_button('Save Variable'); ?>
        </form>
        <h2>Existing Variables</h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display all stored global variables
                $all_options = wp_load_alloptions();
                foreach ($all_options as $name => $value) {
                    if (strpos($name, '_') !== 0) { // Exclude internal options
                        echo "<tr><td>{$name}</td><td>{$value}</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}
