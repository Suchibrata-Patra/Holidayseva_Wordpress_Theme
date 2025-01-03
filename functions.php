<?php
    register_nav_menus(
        array('primary_menu'=>'Top Menu')
    );
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    
?>
<style>
    .current_page_parent a, .current-menu-item a li{
        border-bottom:1px solid red;
        color:grey;
        padding:10px;

    }

</style>