<title> Holidayseva </title>
<!-- <?php require get_template_directory() . '/dropdownmenu.php'; ?> -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/TourDetailsEntry.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/Central_styling.css">
<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Images/favicon.svg">  
<?php get_header(); ?>

<style>
    .travel-guide-container {
        max-width: 90%;
        margin: 0 auto;
        padding: 40px 20px;
        line-height: 1.7;
        color: #333;
    }

    .travel-guide-container h1,
    .travel-guide-container h2,
    .travel-guide-container h3 {
        margin-top: 40px;
        margin-bottom: 20px;
        color: #222;
    }

    .travel-guide-container p {
        margin-bottom: 20px;
        font-size: 18px;
    }

    .travel-guide-container img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 20px 0;
    }

    .travel-guide-container .wp-block-cover {
        margin-bottom: 40px;
    }

    .travel-guide-container .wp-block-columns {
        margin-top: 40px;
        gap: 30px;
    }

    .travel-guide-container .wp-block-gallery {
        margin-top: 40px;
    }

    .travel-guide-container .wp-block-buttons {
        margin-top: 40px;
        text-align: center;
    }

    .travel-guide-container .wp-block-button__link {
        background-color: #f04f23;
        color: #fff;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: bold;
        text-decoration: none;
    }

    .travel-guide-container .wp-block-button__link:hover {
        background-color: #d8431c;
    }
</style>

<div class="travel-guide-container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content(); ?>
            </article>
            <?php
        endwhile;
    else :
        echo '<p>No Travel Guide found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
