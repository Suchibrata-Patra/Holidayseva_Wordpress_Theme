
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

// // Register custom post types
// function register_custom_post_types() {
//     $post_types = [
//         'tour' => [
//             'name' => 'Tours',
//             'singular_name' => 'Tour',
//             'slug' => 'tours',
//             'icon' => 'dashicons-palmtree',
//             'position' => 200, // Position for the "Tours" post type
//         ],
//     ];

//     foreach ($post_types as $slug => $type) {
//         register_post_type($slug, [
//             'labels' => [
//                 'name' => $type['name'],
//                 'singular_name' => $type['singular_name'],
//                 'add_new' => "Add New {$type['singular_name']}",
//                 'add_new_item' => "Add New {$type['singular_name']}",
//                 'edit_item' => "Edit {$type['singular_name']}",
//                 'new_item' => "New {$type['singular_name']}",
//                 'view_item' => "View {$type['singular_name']}",
//                 'search_items' => "Search {$type['name']}",
//                 'not_found' => "No {$type['name']} found",
//                 'not_found_in_trash' => "No {$type['name']} found in Trash",
//                 'all_items' => "All {$type['name']}",
//             ],
//             'public' => true,
//             'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
//             'menu_icon' => $type['icon'],
//             'show_in_rest' => true,
//             'has_archive' => true,
//             'rewrite' => ['slug' => $type['slug']],
//         ]);
//     }
// }
// add_action('init', 'register_custom_post_types');
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

// function travel_guide_block_template() {
//     $post_type_object = get_post_type_object('travel_guide');
//     if (!$post_type_object) {
//         return;
//     }

//     $post_type_object->template = [
//         // Hero Cover Section
//         [
//             'core/cover',
//             [
//                 'dimRatio'     => 60,
//                 'overlayColor' => 'black',
//                 'minHeight'    => 450,
//                 'align'        => 'full',
//             ],
//             [
//                 [
//                     'core/heading',
//                     [
//                         'placeholder' => 'Your breathtaking title here...',
//                         'textAlign'   => 'center',
//                         'level'       => 1,
//                     ]
//                 ],
//                 [
//                     'core/paragraph',
//                     [
//                         'placeholder' => 'One-liner teaser or quote that captures the essence of your journey...',
//                         'align'       => 'center',
//                         'fontSize'    => 'medium',
//                     ]
//                 ],
//             ]
//         ],

//         // Intro Text
//         [
//             'core/paragraph',
//             [
//                 'placeholder' => 'Write a captivating intro to your travel story...',
//                 'align'       => 'left',
//                 'fontSize'    => 'large',
//             ]
//         ],

//         // Day-by-Day Itinerary
//         [
//             'core/heading',
//             [
//                 'content' => 'Itinerary Overview',
//                 'level'   => 2,
//             ]
//         ],
//         [
//             'core/columns',
//             [],
//             [
//                 [
//                     'core/column',
//                     [],
//                     [
//                         [
//                             'core/heading',
//                             [ 'placeholder' => 'Day 1: Arrival' ]
//                         ],
//                         [
//                             'core/paragraph',
//                             [ 'placeholder' => 'Describe Day 1 activities...' ]
//                         ],
//                     ]
//                 ],
//                 [
//                     'core/column',
//                     [],
//                     [
//                         [
//                             'core/heading',
//                             [ 'placeholder' => 'Day 2: Exploration' ]
//                         ],
//                         [
//                             'core/paragraph',
//                             [ 'placeholder' => 'Describe Day 2 fun...' ]
//                         ],
//                     ]
//                 ],
//             ]
//         ],

//         // Full Width Image Gallery
//         [
//             'core/heading',
//             [
//                 'content' => 'Photo Diary',
//                 'level'   => 2,
//             ]
//         ],
//         [
//             'core/gallery',
//             [
//                 'columns' => 3,
//                 'align'   => 'wide',
//             ]
//         ],

//         // Call to Action
//         [
//             'core/separator',
//             [
//                 'align' => 'wide'
//             ]
//         ],
//         [
//             'core/heading',
//             [
//                 'content' => 'Ready to explore it yourself?',
//                 'level'   => 3,
//                 'align'   => 'center'
//             ]
//         ],
//         [
//             'core/buttons',
//             [
//                 'align' => 'center'
//             ],
//             [
//                 [
//                     'core/button',
//                     [
//                         'text'       => 'Book This Trip',
//                         'url'        => '#',
//                         'className'  => 'is-style-fill',
//                         'backgroundColor' => 'primary',
//                         'textColor'  => 'white',
//                     ]
//                 ]
//             ]
//         ],
//     ];

//     $post_type_object->template_lock = false; // Let editors add/remove freely
// }
// add_action('init', 'travel_guide_block_template');


// function travel_guide_custom_styles() {
//     if (is_singular('travel_guide')) {
//         wp_enqueue_style('travel-guide-style', get_template_directory_uri() . '/css/travel-guide.css');
//     }
// }
// add_action('wp_enqueue_scripts', 'travel_guide_custom_styles');

// function travel_guide_editor_style() {
//     add_editor_style('css/travel-guide-editor.css');
// }
// add_action('admin_init', 'travel_guide_editor_style');
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
    include __DIR__ . '/Forms/tour_form.php';
}

add_action('save_post_travel_guide', function($post_id) {
    if (!isset($_POST['travel_guide_nonce']) || 
        !wp_verify_nonce($_POST['travel_guide_nonce'], 'travel_guide_nonce_action')) return;

    $fields = [
        '_tg_location'        => sanitize_text_field($_POST['tg_location'] ?? ''),
        '_tg_duration'        => sanitize_text_field($_POST['tg_duration'] ?? ''),
        '_tg_best_season'     => sanitize_text_field($_POST['tg_best_season'] ?? ''),
        '_tg_where_to_stay'   => sanitize_textarea_field($_POST['tg_where_to_stay'] ?? ''),
        '_tg_top_reasons'     => sanitize_textarea_field($_POST['tg_top_reasons'] ?? ''),
        '_tg_featured_image'  => intval($_POST['tg_featured_image'] ?? 0),
    ];

    foreach ($fields as $key => $value) {
        update_post_meta($post_id, $key, $value);
    }
});

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


