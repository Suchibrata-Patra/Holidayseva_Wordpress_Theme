<?php
get_header(); 

// Check if there are any tour
if (have_posts()) :
    ?>
    <header class="archive-header">
        <h1><?php post_type_archive_title(); ?></h1>
        <p><?php echo post_type_archive_description(); ?></p>
    </header>

    <div class="tour-archive-list">
        <?php
        // Start the loop to display tour
        while (have_posts()) : the_post();
            // Get custom fields for each tour
            $tour_name = get_post_meta(get_the_ID(), '_tour_name', true);
            $tour_isbn = get_post_meta(get_the_ID(), '_tour_isbn', true);
            $tour_details = get_post_meta(get_the_ID(), '_tour_details', true);
            $tour_author = get_post_meta(get_the_ID(), '_tour_author', true);
            $tour_publisher = get_post_meta(get_the_ID(), '_tour_publisher', true);
            $tour_price = get_post_meta(get_the_ID(), '_tour_price', true);
            $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);

            // Display each tour in the loop
            ?>
            <article <?php post_class(); ?>>
                <header>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p>Published on: <?php echo esc_html(get_the_date()); ?></p>
                </header>

                <div class="tour-short-details">
                    <?php if ($tour_name) : ?>
                        <p><strong>Tour Name:</strong> <?php echo esc_html($tour_name); ?></p>
                    <?php endif; ?>

                    <?php if ($tour_isbn) : ?>
                        <p><strong>ISBN:</strong> <?php echo esc_html($tour_isbn); ?></p>
                    <?php endif; ?>

                    <?php if ($tour_author) : ?>
                        <p><strong>Author:</strong> <?php echo esc_html($tour_author); ?></p>
                    <?php endif; ?>

                    <?php if ($tour_price) : ?>
                        <p><strong>Price:</strong> $<?php echo esc_html(number_format($tour_price, 2)); ?></p>
                    <?php endif; ?>

                    <?php if ($tour_cover_images) : ?>
                        <div class="tour-cover-images">
                            <?php
                            // Display the cover images
                            $cover_images = explode(',', $tour_cover_images);
                            foreach ($cover_images as $image_url) {
                                echo '<img src="' . esc_url($image_url) . '" alt="Tour Cover" class="tour-cover-image" />';
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>

                <footer>
                    <a href="<?php the_permalink(); ?>">Read More</a>
                </footer>
            </article>
            <?php
        endwhile;
        ?>

    </div>

    <div class="pagination">
        <?php
        // Display pagination if there are multiple pages
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('Previous', 'textdomain'),
            'next_text' => __('Next', 'textdomain'),
        ));
        ?>
    </div>

<?php
else :
    echo '<p>No tour found.</p>';
endif;

get_footer();
?>