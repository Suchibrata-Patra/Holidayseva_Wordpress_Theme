<?php
// Template Name: Contact
get_header();
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
            <?php $imagepath = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
            <img src="<?php echo $imagepath[0]; ?>" alt="<?php the_title(); ?>" />
        <?php endif; ?>

        <!-- Post Title -->
        <h2><?php the_title(); ?></h2>

        <!-- Post Date -->
        <p><?php echo get_the_date(); ?></p>

        <!-- Post Excerpt -->
        <p><?php echo get_the_excerpt(); ?></p>

    <?php endwhile; ?>
<?php else : ?>
    <p>No posts found.</p>
<?php endif; ?>

<?php get_footer(); ?>
