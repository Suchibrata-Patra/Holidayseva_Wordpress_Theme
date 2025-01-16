<?php
// Include meta box logic
require_once get_template_directory() . '/Forms/TourDetailsEntry.php';

// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Add custom schema for 'tour' post type with Rank Math
add_filter('rank_math/snippet/rich_snippet_data', function ($data, $post) {
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

// Add Administration Details Page
function add_admin_details_page() {
    add_menu_page(
        'Administration Details',
        'Administration Details',
        'manage_options',
        'admin-details',
        'display_admin_details_page',
        'dashicons-admin-generic',
        90
    );
}
add_action('admin_menu', 'add_admin_details_page');

// Display the Administration Details Page
function display_admin_details_page() {
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['global_variable'])) {
        // Update the global variable
        update_option('my_global_variable', sanitize_text_field($_POST['global_variable']));
        echo '<div class="updated"><p>Global variable updated successfully.</p></div>';
    }

    // Get the current value of the global variable
    $global_variable = get_option('my_global_variable', 'Default Value');

    // Display the form
    ?>
    <div class="wrap">
        <h1>Administration Details</h1>
        <form method="POST" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="global_variable">Global Variable</label>
                    </th>
                    <td>
                        <input
                            type="text"
                            id="global_variable"
                            name="global_variable"
                            value="<?php echo esc_attr($global_variable); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Changes'); ?>
        </form>
    </div>
    <?php
}

// Access the global variable anywhere in the code
function get_my_global_variable() {
    return get_option('my_global_variable', 'Default Value');
}
?>
