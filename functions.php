<?php
// Register a theme menu (for front-end navigation)
function custom_theme_menus() {
    register_nav_menus(
        array(
            'primary_menu' => 'Top Menu'
        )
    );
}

add_action('after_setup_theme', 'custom_theme_menus'); // Hook to run after theme setup

// Register a custom menu in the WordPress admin
function custom_admin_menu() {
    // Add a top-level menu page with a Dashicon or custom icon
    add_menu_page(
        'Custom Dashboard',       // Page title
        'Holiday Seva',           // Menu title (the text shown in the sidebar)
        'manage_options',         // Required capability (who can see this menu)
        'custom-dashboard',       // Menu slug (URL part)
        'custom_dashboard_page',  // Callback function for the page content
        'dashicons-calendar',     // Icon (using Dashicon)
        2                         // Position of the menu item (optional)
    );

    // Add a submenu item under the 'Holiday Seva' menu
    add_submenu_page(
        'custom-dashboard',       // Parent menu slug (the menu where this will appear)
        'Submenu Page Title',     // Submenu page title (appears in the browser title)
        'Submenu Item',           // Submenu item text (the text shown in the sidebar)
        'manage_options',         // Required capability
        'custom-submenu',         // Submenu slug (URL part)
        'custom_submenu_page'     // Callback function for the submenu content
    );
}

add_action('admin_menu', 'custom_admin_menu'); // Hook to register the custom admin menu

// Callback function for the custom admin page content (for the parent menu)
function custom_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Welcome to the Custom Dashboard</h1>
        <p>Here is where you can manage your custom settings for the Holiday Seva menu.</p>
    </div>
    <?php
}

// Callback function for the custom submenu content
function custom_submenu_page() {
    ?>
    <div class="wrap">
        <h1>Welcome to the Submenu Page</h1>
        <p>This is the content for the submenu under the "Holiday Seva" menu.</p>
        <img src="" alt="">
    </div>
    <?php
}
?>
