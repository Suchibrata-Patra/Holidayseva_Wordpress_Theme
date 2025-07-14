
<?php
function holidayseva_register_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu'),
    ));
}
add_action('after_setup_theme', 'holidayseva_register_menus');
add_theme_support('menus'); // Fallback support

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_editor(); // Ensures TinyMCE, quicktags, media buttons, etc. load
});

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

// // Register custom post types
function register_custom_post_types() {
    $post_types = [
        'tour' => [
            'name' => 'Holidays',
            'singular_name' => 'Holiday',
            'slug' => 'holidays', // Change slug from 'tours' to 'holidays'
            'icon' => 'dashicons-palmtree',
            'position' => 200, // Position in the admin menu
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
            'rewrite' => ['slug' => $type['slug']], // Updated slug to 'holidays'
        ]);
    }
}
add_action('init', 'register_custom_post_types');



function register_travel_guide_cpt() {
    $labels = [
        'name'               => _x('Travel Guides', 'post type general name', 'your-textdomain'),
        'singular_name'      => _x('Travel Guide', 'post type singular name', 'your-textdomain'),
        'menu_name'          => _x('Travel Guides', 'admin menu', 'your-textdomain'),
        'name_admin_bar'     => _x('Travel Guide', 'add new on admin bar', 'your-textdomain'),
        'add_new'            => _x('Add New', 'travel guide', 'your-textdomain'),
        'add_new_item'       => __('Add New Travel Guide', 'your-textdomain'),
        'new_item'           => __('New Travel Guide', 'your-textdomain'),
        'edit_item'          => __('Edit Travel Guide', 'your-textdomain'),
        'view_item'          => __('View Travel Guide', 'your-textdomain'),
        'all_items'          => __('All Travel Guides', 'your-textdomain'),
        'search_items'       => __('Search Travel Guides', 'your-textdomain'),
        'parent_item_colon'  => __('Parent Travel Guides:', 'your-textdomain'),
        'not_found'          => __('No travel guides found.', 'your-textdomain'),
        'not_found_in_trash' => __('No travel guides found in Trash.', 'your-textdomain'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true, // this adds to WP admin sidebar
        'menu_icon'          => 'dashicons-location-alt', // nice icon for travel
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'], 
        'show_in_rest'       => true, // Gutenberg support
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'travel-guide'], // your SEO-friendly slug
        'menu_position'      => 25, // tweak position if needed
    ];

    register_post_type('travel_guide', $args);
}
add_action('init', 'register_travel_guide_cpt');



//  Section To add Custom template for the Writting of the Blogs Posts
add_action('save_post_travel_guide', function($post_id) {
    if (!isset($_POST['travel_guide_nonce']) || !wp_verify_nonce($_POST['travel_guide_nonce'], 'travel_guide_nonce_action')) return;

    $fields = [
        'location', 'duration', 'best_season', 'where_to_stay', 'top_reasons','things_to_do' ,'featured_image',
        'intro', 'overview', 'how_to_get', 'eat_drink', 'cultural_tips', 'budget', 'itinerary',
        'personal_exp', 'travel_tips', 'resources', 'conclusion', 'top_attractions'
    ];

    foreach ($fields as $field) {
        if (isset($_POST["tg_$field"])) {
            // update_post_meta($post_id, "_tg_$field", sanitize_text_field($_POST["tg_$field"]));
            update_post_meta($post_id, '_tg_' . $field, wp_kses_post($_POST['tg_' . $field]));

        }
        $image_field = "tg_{$field}_image";
        if (isset($_POST[$image_field])) {
            update_post_meta($post_id, "_$image_field", intval($_POST[$image_field]));
        }
    }
});




add_action('add_meta_boxes', 'add_travel_guide_meta_box');
function add_travel_guide_meta_box() {
    add_meta_box(
        'travel_guide_details',
        'Travel Guide Details',
        'render_travel_guide_meta_form',
        'travel_guide',
        'normal',
        'default'
    );
}

function render_travel_guide_meta_form($post) {
    include __DIR__ . '/Forms/tour_guide_form.php';
}


//  End of the Section To add Custom template for the Writting of the Blogs Posts



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



// Code to add search Feature 
add_action('rest_api_init', function () {
    register_rest_route('holidayseva/v1', '/travel-search', [
        'methods' => 'GET',
        'callback' => 'holidayseva_live_travel_search',
        'permission_callback' => '__return_true'
    ]);
});

function holidayseva_live_travel_search($request) {
    $term = sanitize_text_field($request->get_param('term'));
    global $wpdb;

    $like = '%' . $wpdb->esc_like($term) . '%';

    $results = $wpdb->get_results(
        $wpdb->prepare("
            SELECT ID, post_title
            FROM {$wpdb->prefix}posts
            WHERE post_type = %s
            AND post_status = 'publish'
            AND post_title LIKE %s
            ORDER BY post_date DESC
            LIMIT 10
        ", 'travel_guide', $like)
    );

    $response = [];

    foreach ($results as $post) {
        $custom_feat_id = get_post_meta($post->ID, '_tg_featured_image', true);
$image = $custom_feat_id 
    ? wp_get_attachment_image_url($custom_feat_id, 'medium_large') 
    : get_the_post_thumbnail_url($post->ID, 'medium_large');

$response[] = [
    'title' => get_the_title($post->ID),
    'link'  => get_permalink($post->ID),
    'image' => $image ?: get_template_directory_uri() . '/images/default.jpg'
];

    }

    return $response;
}
