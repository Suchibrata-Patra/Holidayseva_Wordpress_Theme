<?php
get_header(); // Include the header.php template

// Start the Loop to display the list of 'tour' posts
if (have_posts()) :
    echo '<div class="tour-archive">';
    while (have_posts()) : the_post();
        ?>
        <div class="tour-post">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="tour-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php
    endwhile;
    echo '</div>';
else :
    echo '<p>No tours found.</p>';
endif;

get_footer(); // Include the footer.php template
?>
This is Archive.php