<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri(); ?>/style.css">
    <title>Holidayseva</title>
</head>
<?php wp_nav_menu(array('theme_location'=>'primary_menu',
    'menu_class'=>'nav'
    ));
?>
