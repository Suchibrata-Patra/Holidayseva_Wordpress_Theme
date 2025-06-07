<?php get_header(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            // This outputs the entire block content (your cover, columns, gallery, buttons, etc)
            the_content();
            ?>
        </article>
        <?php
    endwhile;
else :
    echo '<p>No Travel Guide found.</p>';
endif;
?>

<?php get_footer(); ?>
