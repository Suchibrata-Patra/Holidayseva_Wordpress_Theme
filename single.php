<?php get_header(); ?>

<?php
// Start the loop
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

    <div class="tour-post">
        <h1><?php the_title(); ?></h1>
        <div class="tour-content">
            <?php the_content(); // Display the post content ?>
        </div>

        <div class="tour-images">
            <h3>Tour Images</h3>
            
            <?php
            // Retrieve and display the images from custom fields
            $tour_image_1 = get_post_meta( get_the_ID(), '_tour_image_1', true );
            $tour_image_2 = get_post_meta( get_the_ID(), '_tour_image_2', true );
            $tour_image_3 = get_post_meta( get_the_ID(), '_tour_image_3', true );
            $tour_image_4 = get_post_meta( get_the_ID(), '_tour_image_4', true );

            // Check if the images exist and display them
            if ( ! empty( $tour_image_1 ) ) {
                echo '<div class="tour-image"><img src="' . esc_url( $tour_image_1 ) . '" alt="Tour Image 1" /></div>';
            }

            if ( ! empty( $tour_image_2 ) ) {
                echo '<div class="tour-image"><img src="' . esc_url( $tour_image_2 ) . '" alt="Tour Image 2" /></div>';
            }

            if ( ! empty( $tour_image_3 ) ) {
                echo '<div class="tour-image"><img src="' . esc_url( $tour_image_3 ) . '" alt="Tour Image 3" /></div>';
            }

            if ( ! empty( $tour_image_4 ) ) {
                echo '<div class="tour-image"><img src="' . esc_url( $tour_image_4 ) . '" alt="Tour Image 4" /></div>';
            }
            ?>
        </div>
    </div>

<?php
    endwhile;
else :
    echo '<p>No tours found</p>';
endif;
?>

<?php get_footer(); ?>
