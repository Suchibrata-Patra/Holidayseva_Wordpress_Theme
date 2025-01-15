<?php
/**
 * Template Name: tour Index
 * Description: A custom template for displaying a list of tours with inline styling and a search bar.
 */
get_header(); ?>

<div class="tour-index" style="padding: 40px; background-color: #f9f9f9; text-align: center;">
    <h1 class="page-title" style="font-size: 2.5em; margin-bottom: 40px; color: #333; text-transform: uppercase; font-weight: bold;">
        Our tours
    </h1>
    
    <!-- Search Bar Form -->
    <form role="search" method="get" class="tour-search-form" action="<?php echo esc_url(home_url('/')); ?>" style="margin-bottom: 40px;">
        <input type="text" name="s" placeholder="Search tours..." value="<?php echo get_search_query(); ?>" 
               style="padding: 10px; font-size: 1em; width: 250px; border: 2px solid #ccc; border-radius: 5px;">
        <input type="hidden" name="post_type" value="tour" /> <!-- Ensure it searches only tours -->
        <button type="submit" style="padding: 10px 15px; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Search
        </button>
    </form>
    
    <?php
    // Define the custom query to get all "tour" posts
    $args = array(
        'post_type' => 'tour', // Custom post type "tour"
        'posts_per_page' => -1, // Show all tours
        's' => get_search_query(), // Search query
    );

    $tour_query = new WP_Query($args);

    if ($tour_query->have_posts()) :
        echo '<div class="tour-list" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">';
        while ($tour_query->have_posts()) : $tour_query->the_post();
            ?>
            <div class="tour-item" style="background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); width: 220px; overflow: hidden;">
                <div class="tour-cover" style="text-align: center; padding: 20px;">
                    <?php 
                    // Check if the tour has a featured image
                    if (has_post_thumbnail()) :
                        the_post_thumbnail('medium', array('style' => 'max-width: 100%; height: auto;'));
                    else :
                        echo '<img src="' . get_template_directory_uri() . '/assets/images/default-tour-cover.jpg" alt="No Cover" style="max-width: 100%; height: auto;">';
                    endif;
                    ?>
                </div>
                <div class="tour-info" style="padding: 15px; text-align: left;">
                    <h2>
                        <a href="<?php the_permalink(); ?>" class="tour-title" style="font-size: 1.2em; color: #0073e6; text-decoration: none; font-weight: bold;">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="tour-excerpt" style="font-size: 1em; color: #555; margin-top: 10px;">
                        <?php the_excerpt(); ?>
                    </p>
                </div>
            </div>
            <?php
        endwhile;
        echo '</div>';
    else :
        echo '<p>No tours found.</p>';
    endif;

    wp_reset_postdata();
    ?>

</div>