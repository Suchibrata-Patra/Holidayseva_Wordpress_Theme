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

function add_tours_admin_page() {
    add_menu_page(
        'Tours',                // Page title
        'Tours',                // Menu title
        'manage_options',       // Capability
        'tours-admin-page',     // Menu slug
        'display_tours_page',   // Callback function to display the page
        'dashicons-palmtree',   // Icon URL or Dashicon class
        5                       // Position in the admin menu
    );
}
add_action( 'admin_menu', 'add_tours_admin_page' );

function display_tours_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Add New Tour', 'textdomain' ); ?></h1>
        <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
            <!-- Hidden field to specify the action -->
            <input type="hidden" name="action" value="save_tour_data">
            
            <table class="form-table">
                <tr>
                    <th><label for="tour_name"><?php esc_html_e( 'Tour Name', 'textdomain' ); ?></label></th>
                    <td><input type="text" name="tour_name" id="tour_name" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="tour_price"><?php esc_html_e( 'Tour Price', 'textdomain' ); ?></label></th>
                    <td><input type="number" name="tour_price" id="tour_price" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="tour_description"><?php esc_html_e( 'Description', 'textdomain' ); ?></label></th>
                    <td><textarea name="tour_description" id="tour_description" rows="5" class="large-text" required></textarea></td>
                </tr>
            </table>
            <?php submit_button( __( 'Save Tour', 'textdomain' ) ); ?>
        </form>
    </div>
    <?php
}
function handle_save_tour_data() {
    // Check if the current user has permission
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( __( 'You do not have sufficient permissions to access this page.', 'textdomain' ) );
    }

    // Validate and sanitize the input fields
    if ( isset( $_POST['tour_name'], $_POST['tour_price'], $_POST['tour_description'] ) ) {
        $tour_name = sanitize_text_field( $_POST['tour_name'] );
        $tour_price = floatval( $_POST['tour_price'] );
        $tour_description = sanitize_textarea_field( $_POST['tour_description'] );

        // Save data to the database (e.g., as an option or in a custom table)
        $tour_data = [
            'name'        => $tour_name,
            'price'       => $tour_price,
            'description' => $tour_description,
        ];
        add_option( 'last_saved_tour', $tour_data ); // Save as an option for simplicity

        // Redirect with a success message
        wp_redirect( admin_url( 'admin.php?page=tours-admin-page&status=success' ) );
        exit;
    }

    // Redirect back with an error if data is invalid
    wp_redirect( admin_url( 'admin.php?page=tours-admin-page&status=error' ) );
    exit;
}
add_action( 'admin_post_save_tour_data', 'handle_save_tour_data' );

if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] === 'success' ) {
        echo '<div class="updated notice"><p>' . esc_html__( 'Tour saved successfully!', 'textdomain' ) . '</p></div>';
    } elseif ( $_GET['status'] === 'error' ) {
        echo '<div class="error notice"><p>' . esc_html__( 'There was an error saving the tour.', 'textdomain' ) . '</p></div>';
    }
}

    
?>
