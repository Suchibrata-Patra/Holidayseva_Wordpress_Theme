<?php
get_header();

if (have_posts()) : 
    while (have_posts()) : the_post();
        // Display the tour title
        echo '<h1>' . get_the_title() . '</h1>';

        // Display the featured image
        if (has_post_thumbnail()) {
            the_post_thumbnail('large');
        }

        // Display custom fields (if any)
        $tour_description = get_post_meta(get_the_ID(), '_tour_description', true);
        if ($tour_description) {
            echo '<p>' . esc_html($tour_description) . '</p>';
        }

        // Display other tour details
        $tour_location = get_post_meta(get_the_ID(), '_tour_location', true);
        if ($tour_location) {
            echo '<p>Location: ' . esc_html($tour_location) . '</p>';
        }

        // Add more fields or custom content as needed...

    endwhile;
endif;

get_footer();
