<?php
    register_nav_menus(
        array('primary_menu'=>'Top Menu')
    );
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    
?>
<style>
    .current_page_parent a, .current-menu-item a{
        /* Place Custom Styling For Selected Items on Selected Item of Navbar */
    }
</style>