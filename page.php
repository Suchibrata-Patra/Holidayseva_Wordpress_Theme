<?php 
get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
</head>
<body>
    <?php echo the_title(); ?>
    <?php the_content(); ?>

   <?php require('analytics.php') ?>
   
</body>
</html>