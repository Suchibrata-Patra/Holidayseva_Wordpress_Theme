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
    function create_custom_post_type() {
        $args = array(
            'labels' => array(
                'name' => 'Tour',
                'singular_name' => 'Book',
                'add_new' => 'Add New Book',
                'add_new_item' => 'Add New Book',
                'edit_item' => 'Edit Book',
                'new_item' => 'New Book',
                'view_item' => 'View Book',
                'search_items' => 'Search Tour',
                'not_found' => 'No Tour found',
                'not_found_in_trash' => 'No Tour found in Trash',
                'all_items' => 'All Tour',
                'archives' => 'Tour Archives',
                'insert_into_item' => 'Insert into book',
                'uploaded_to_this_item' => 'Uploaded to this book',
            ),
            'public' => true,  // Make the post type public
            'has_archive' => true, // Enable archive page
            'show_in_rest' => true, // Enable block editor
            'rewrite' => array('slug' => 'Tour'), // URL structure (optional)
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'), // Features supported
            'menu_icon' => 'dashicons-book',  // Icon for the menu (optional)
            'show_ui' => true,  // Show in WordPress admin
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
        );
    
        register_post_type('book', $args);
    }
    add_action('init', 'create_custom_post_type');
    
    
?>
