<?php
// Add custom post type for Books
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

// Add custom menu under the 'Bookings' section in the admin
function custom_bookings_menu() {
    add_submenu_page(
        'edit.php?post_type=booking', // Add this under the 'Bookings' menu
        'Manage Books',               // Page title
        'Manage Books',               // Menu title
        'manage_options',             // Capability
        'manage_books',               // Menu slug
        'manage_books_page'           // Function to display the page
    );
}
add_action('admin_menu', 'custom_bookings_menu');

// Function to display the custom admin page
function manage_books_page() {
    // Check if the user is allowed to manage books
    if (!current_user_can('manage_options')) {
        return;
    }

    // Handle form submission
    if (isset($_POST['submit_book_form'])) {
        $post_data = array(
            'post_title'   => sanitize_text_field($_POST['book_name']),
            'post_content' => sanitize_textarea_field($_POST['book_details']),
            'post_type'    => 'book',
            'post_status'  => 'publish',
        );

        // Handle existing book (if editing)
        if (!empty($_POST['book_id'])) {
            $post_data['ID'] = $_POST['book_id'];
            $post_id = wp_update_post($post_data);
        } else {
            $post_id = wp_insert_post($post_data);
        }

        // Save custom fields
        update_post_meta($post_id, '_book_name', sanitize_text_field($_POST['book_name']));
        update_post_meta($post_id, '_book_isbn', sanitize_text_field($_POST['book_isbn']));
        update_post_meta($post_id, '_book_details', sanitize_textarea_field($_POST['book_details']));
        update_post_meta($post_id, '_book_author', sanitize_text_field($_POST['book_author']));
        update_post_meta($post_id, '_book_publisher', sanitize_text_field($_POST['book_publisher']));
        update_post_meta($post_id, '_book_publish_date', sanitize_text_field($_POST['book_publish_date']));
        update_post_meta($post_id, '_book_language', sanitize_text_field($_POST['book_language']));
        update_post_meta($post_id, '_book_genre', sanitize_text_field($_POST['book_genre']));
        update_post_meta($post_id, '_book_pages', intval($_POST['book_pages']));
        update_post_meta($post_id, '_book_cover_type', sanitize_text_field($_POST['book_cover_type']));
        update_post_meta($post_id, '_book_price', floatval($_POST['book_price']));
        update_post_meta($post_id, '_book_stock', intval($_POST['book_stock']));
        update_post_meta($post_id, '_book_edition', sanitize_text_field($_POST['book_edition']));

        // Redirect to avoid form resubmission
        wp_redirect(admin_url('edit.php?post_type=book'));
        exit;
    }

    // Display the form
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Manage Books</h1>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th><label for="book_name">Book Name:</label></th>
                    <td><input type="text" name="book_name" id="book_name" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_isbn">ISBN:</label></th>
                    <td><input type="text" name="book_isbn" id="book_isbn" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_details">Details:</label></th>
                    <td><textarea name="book_details" id="book_details" class="large-text" required></textarea></td>
                </tr>
                <tr>
                    <th><label for="book_author">Author:</label></th>
                    <td><input type="text" name="book_author" id="book_author" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_publisher">Publisher:</label></th>
                    <td><input type="text" name="book_publisher" id="book_publisher" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_publish_date">Publish Date:</label></th>
                    <td><input type="date" name="book_publish_date" id="book_publish_date" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_language">Language:</label></th>
                    <td><input type="text" name="book_language" id="book_language" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_genre">Genre:</label></th>
                    <td><input type="text" name="book_genre" id="book_genre" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_pages">Pages:</label></th>
                    <td><input type="number" name="book_pages" id="book_pages" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_cover_type">Cover Type:</label></th>
                    <td><input type="text" name="book_cover_type" id="book_cover_type" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_price">Price:</label></th>
                    <td><input type="number" name="book_price" id="book_price" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_stock">Stock:</label></th>
                    <td><input type="number" name="book_stock" id="book_stock" class="regular-text" required /></td>
                </tr>
                <tr>
                    <th><label for="book_edition">Edition:</label></th>
                    <td><input type="text" name="book_edition" id="book_edition" class="regular-text" required /></td>
                </tr>
            </table>
            
            <input type="submit" name="submit_book_form" value="Save Book" class="button button-primary" />
        </form>
    </div>
    <?php
}
?>
