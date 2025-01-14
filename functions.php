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
    function create_Tour_post_type() {
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
            'insert_into_item' => 'Insert into Tour',
            'uploaded_to_this_item' => 'Uploaded to this Tour',
        ),
        'public' => true,
        'hierarchical' => false, // Tours are not hierarchical themselves
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'menu_icon' => 'dashicons-Tour',
        'show_in_rest' => true, // Enable Gutenberg block editor
        'has_archive' => true,
        'rewrite' => array('slug' => 'Tours'),
    );
    register_post_type('Tour', $args);
}
add_action('init', 'create_Tour_post_type');    
?>
