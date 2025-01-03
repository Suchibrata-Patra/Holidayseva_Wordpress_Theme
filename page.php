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
    <?php 
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            echo the_title(); // Or just echo get_the_title()
        endwhile;
    endif;
    ?>
</body>
</html>

<?php 
get_footer();
?>
