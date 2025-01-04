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
    function create_chapter_post_type() {
        $args = array(
            'labels' => array(
                'name' => 'Chapters',
                'singular_name' => 'Chapter',
                'add_new' => 'Add New Chapter',
                'add_new_item' => 'Add New Chapter',
                'edit_item' => 'Edit Chapter',
                'new_item' => 'New Chapter',
                'view_item' => 'View Chapter',
                'search_items' => 'Search Chapters',
                'not_found' => 'No Chapters found',
                'not_found_in_trash' => 'No Chapters found in Trash',
                'all_items' => 'All Chapters',
                'insert_into_item' => 'Insert into chapter',
                'uploaded_to_this_item' => 'Uploaded to this chapter',
            ),
            'public' => true,
            'hierarchical' => true,  // Allow parent-child relationships
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
            'menu_icon' => 'dashicons-format-aside',
            'show_in_rest' => true, // Enable Gutenberg block editor
            'has_archive' => true,
            'rewrite' => array('slug' => 'chapters'),
        );
        register_post_type('chapter', $args);
    }
    add_action('init', 'create_chapter_post_type');
        
    
?>
