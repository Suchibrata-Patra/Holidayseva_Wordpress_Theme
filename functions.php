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

function custom_enqueue_tinymce_styles() {
    add_editor_style('path-to-your-tinymce-styles.css');
}
add_action('admin_init', 'custom_enqueue_tinymce_styles');

// Register custom post types
function register_custom_post_types() {
    $post_types = [
        'tour' => [
            'name' => 'Tours',
            'singular_name' => 'Tour',
            'slug' => 'tours',
            'icon' => 'dashicons-palmtree',
            'position' => 200, // Position for the "Tours" post type
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



// Setting up Options to Set Custom Global Variables 
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
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['global_variables_form'])) {
        // Save each field
        update_option('primary_whatsapp_number', sanitize_text_field($_POST['primary_whatsapp_number']));
        update_option('secondary_whatsapp_number', sanitize_text_field($_POST['secondary_whatsapp_number']));
        update_option('third_number', sanitize_text_field($_POST['third_number']));

        // Handle image upload for Marketing Banner
        if (!empty($_FILES['marketing_banner']['name'])) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            $uploaded = wp_handle_upload($_FILES['marketing_banner'], ['test_form' => false]);
            if (isset($uploaded['url'])) {
                update_option('marketing_banner', esc_url($uploaded['url']));
            }
        }

        echo '<div class="updated"><p>Global variables updated successfully!</p></div>';
    }

    // Get current values
    $primary_whatsapp_number = get_option('primary_whatsapp_number', '');
    $secondary_whatsapp_number = get_option('secondary_whatsapp_number', '');
    $third_number = get_option('third_number', '');
    $marketing_banner = get_option('marketing_banner', '');

    ?>
    <div class="wrap">
        <h1>Manage Global Variables</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <table class="form-table">
                <tr>
                    <th><label for="primary_whatsapp_number">Primary WhatsApp Number</label></th>
                    <td><input type="text" id="primary_whatsapp_number" name="primary_whatsapp_number" class="regular-text" value="<?php echo esc_attr($primary_whatsapp_number); ?>" required></td>
                </tr>
                <tr>
                    <th><label for="secondary_whatsapp_number">Secondary WhatsApp Number</label></th>
                    <td><input type="text" id="secondary_whatsapp_number" name="secondary_whatsapp_number" class="regular-text" value="<?php echo esc_attr($secondary_whatsapp_number); ?>"></td>
                </tr>
                <tr>
                    <th><label for="third_number">Third Number</label></th>
                    <td><input type="text" id="third_number" name="third_number" class="regular-text" value="<?php echo esc_attr($third_number); ?>"></td>
                </tr>
                <tr>
                    <th><label for="marketing_banner">Marketing Banner</label></th>
                    <td>
                        <?php if ($marketing_banner): ?>
                            <img src="<?php echo esc_url($marketing_banner); ?>" alt="Marketing Banner" style="max-width: 300px; display: block; margin-bottom: 10px;">
                        <?php endif; ?>
                        <input type="file" id="marketing_banner" name="marketing_banner">
                    </td>
                </tr>
            </table>
            <?php wp_nonce_field('save_global_variables', 'global_variables_form'); ?>
            <?php submit_button('Save Changes'); ?>
        </form>
    </div>
    <?php
}
