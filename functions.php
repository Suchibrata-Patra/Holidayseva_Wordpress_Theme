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

    // Example of using a custom icon (uncomment to use this):
    // add_menu_page(
    //     'Custom Dashboard',       // Page title
    //     'Holiday Seva',           // Menu title (the text shown in the sidebar)
    //     'manage_options',         // Required capability
    //     'custom-dashboard',       // Menu slug (URL part)
    //     'custom_dashboard_page',  // Callback function for the page content
    //     get_template_directory_uri() . '/images/custom-icon.png', // Custom icon URL
    //     2                         // Position of the menu item (optional)
    // );
}

add_action('admin_menu', 'custom_admin_menu'); // Hook to register the custom admin menu

// Callback function for the custom admin page content
function custom_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Welcome to the Custom Dashboard</h1>
        <p>Here is where you can manage your custom settings.</p>
        <img src="https://media.tenor.com/3IYpyDhud_YAAAAM/cat-dancing-gif-dancing-cat.gif" alt="">
    </div>
    <?php
}
?>
