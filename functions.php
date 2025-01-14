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


function register_tours_post_type() {
    $labels = array(
        'name'               => 'Tours',
        'singular_name'      => 'Tour',
        'menu_name'          => 'Tours',
        'name_admin_bar'     => 'Tour',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Tour',
        'new_item'           => 'New Tour',
        'edit_item'          => 'Edit Tour',
        'view_item'          => 'View Tour',
        'all_items'          => 'All Tours',
        'search_items'       => 'Search Tours',
        'parent_item_colon'  => 'Parent Tours:',
        'not_found'          => 'No tours found.',
        'not_found_in_trash' => 'No tours found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'tours' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-palmtree', // Choose an appropriate icon from https://developer.wordpress.org/resource/dashicons/
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'tours', $args );
}
add_action( 'init', 'register_tours_post_type' );

    
?>
