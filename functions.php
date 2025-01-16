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

// Add MasterSettings Page
function add_admin_details_page() {
    add_menu_page(
        'MasterSettings',
        'MasterSettings',
        'manage_options',
        'admin-details',
        'display_admin_details_page',
        'dashicons-admin-generic',
        90
    );
}
add_action('admin_menu', 'add_admin_details_page');

// Display the MasterSettings Page
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
        <h1>MasterSettings</h1>
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
