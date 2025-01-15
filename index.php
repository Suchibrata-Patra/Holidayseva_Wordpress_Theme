<?php
get_header(); // Load the header

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="tour-detail">
            <h1><?php the_title(); ?></h1>
            <p><strong>Price:</strong> <?php echo get_post_meta( get_the_ID(), 'tour_price', true ); ?></p>
            <div class="tour-description">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile;
else :
    echo '<p>' . esc_html__( 'Sorry, no tour found.', 'textdomain' ) . '</p>';
endif;

get_footer(); // Load the footer
?>