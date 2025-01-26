<?php
get_header(); // Include the header.php template

// Start the Loop for displaying the "tour" post
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <div class="tour-post">
            <h1><?php the_title(); ?></h1> <!-- Display the title of the tour -->
            <div class="tour-content">
                <?php the_content(); ?> <!-- Display the content of the tour -->
            </div>

            <div class="tour-meta">
                <p><strong>Tour Date:</strong> <?php echo get_post_meta(get_the_ID(), 'tour_date', true); ?></p>
                <!-- Example: Display a custom field for tour date -->
                <p><strong>Tour Location:</strong> <?php echo get_post_meta(get_the_ID(), 'tour_location', true); ?></p>
                <!-- Example: Display a custom field for tour location -->
            </div>
        </div>
        <?php
    endwhile;
else :
    echo '<p>No tours found.</p>'; // If no "tour" posts are found
endif;

get_footer(); // Include the footer.php template
?>
