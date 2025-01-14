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
        'hierarchical' => false, // Tours are not hierarchical
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-palmtree',
        'show_in_rest' => true, // Enable Gutenberg block editor
        'has_archive' => true,
        'rewrite' => array('slug' => 'tours'),
    );
    register_post_type('tour', $args);
}
add_action('init', 'create_tour_post_type');
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

        // Insert the tour as a custom post
        $tour_id = wp_insert_post( array(
            'post_title'   => $tour_name,
            'post_content' => $tour_description,
            'post_status'  => 'publish',
            'post_type'    => 'tour',
            'meta_input'   => array(
                'tour_price' => $tour_price,
            ),
        ) );

        // Redirect with a success message
        wp_redirect( admin_url( 'edit.php?post_type=tour&status=success' ) );
        exit;
    }

    // Redirect back with an error if data is invalid
    wp_redirect( admin_url( 'admin.php?page=tours-admin-page&status=error' ) );
    exit;
}
add_action( 'admin_post_save_tour_data', 'handle_save_tour_data' );
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

        // Store the tour data as an option (for simplicity)
        $tours = get_option( 'saved_tours', array() );
        $tours[] = array(
            'name'        => $tour_name,
            'price'       => $tour_price,
            'description' => $tour_description,
        );
        update_option( 'saved_tours', $tours );

        // Redirect with a success message
        wp_redirect( admin_url( 'admin.php?page=tours-admin-page&status=success' ) );
        exit;
    }

    // Redirect back with an error if data is invalid
    wp_redirect( admin_url( 'admin.php?page=tours-admin-page&status=error' ) );
    exit;
}
add_action( 'admin_post_save_tour_data', 'handle_save_tour_data' );
function display_tours_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Add New Tour', 'textdomain' ); ?></h1>

        <?php if ( isset( $_GET['status'] ) && $_GET['status'] === 'success' ) : ?>
            <div class="updated notice"><p><?php esc_html_e( 'Tour saved successfully!', 'textdomain' ); ?></p></div>
        <?php endif; ?>

        <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
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

        <h2><?php esc_html_e( 'All Tours', 'textdomain' ); ?></h2>

        <?php
        // Retrieve saved tours
        $tours = get_option( 'saved_tours', array() );
        if ( ! empty( $tours ) ) :
        ?>
            <ul>
                <?php foreach ( $tours as $tour ) : ?>
                    <li><strong><?php echo esc_html( $tour['name'] ); ?></strong><br>
                        Price: <?php echo esc_html( $tour['price'] ); ?><br>
                        Description: <?php echo esc_html( $tour['description'] ); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p><?php esc_html_e( 'No tours added yet.', 'textdomain' ); ?></p>
        <?php endif; ?>
    </div>
    <?php
}
    
?>
