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
                'name' => 'Tours',  // Changed from 'Books' to 'Tours'
                'singular_name' => 'Tour',  // Changed from 'Book' to 'Tour'
                'add_new' => 'Add New Tour',  // Changed
                'add_new_item' => 'Add New Tour',  // Changed
                'edit_item' => 'Edit Tour',  // Changed
                'new_item' => 'New Tour',  // Changed
                'view_item' => 'View Tour',  // Changed
                'search_items' => 'Search Tours',  // Changed
                'not_found' => 'No Tours found',  // Changed
                'not_found_in_trash' => 'No Tours found in Trash',  // Changed
                'all_items' => 'All Tours',  // Changed
                'insert_into_item' => 'Insert into tour',  // Changed
                'uploaded_to_this_item' => 'Uploaded to this tour',  // Changed
            ),
            'public' => true,
            'hierarchical' => false, // Tours are not hierarchical
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
            'menu_icon' => 'dashicons-book', // Optional: You might want to change the icon to one that represents tours
            'show_in_rest' => true, // Enable Gutenberg block editor
            'has_archive' => true,
            'rewrite' => array('slug' => 'tours'),  // Changed from 'books' to 'tours'
        );
        register_post_type('tour', $args);  // Changed from 'book' to 'tour'
    }
    add_action('init', 'create_book_post_type');
    
    
?>
