<?php
if (have_rows('travel_guide_builder')) :
    while (have_rows('travel_guide_builder')) : the_row();

        if (get_row_layout() == 'hero_section') :
            // Your markup
            the_sub_field('heading');
            echo wp_get_attachment_image(get_sub_field('image'), 'large');

        elseif (get_row_layout() == 'itinerary_section') :
            // Itinerary UI

        elseif (get_row_layout() == 'gallery_section') :
            // Gallery

        endif;

    endwhile;
endif;
?>

<?php
$sections = get_post_meta(get_the_ID(), '_travel_guide_sections', true) ?: [];

foreach ($sections as $section) {
    get_template_part("travel-blocks/{$section}");
}
?>
