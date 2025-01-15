<?php
get_header(); 

if (have_posts()) :
    while (have_posts()) : the_post(); 
        // Get custom fields
        $tour_name = get_post_meta(get_the_ID(), '_tour_name', true);
        $tour_isbn = get_post_meta(get_the_ID(), '_tour_isbn', true);
        $tour_details = get_post_meta(get_the_ID(), '_tour_details', true);
        $tour_author = get_post_meta(get_the_ID(), '_tour_author', true);
        $tour_publisher = get_post_meta(get_the_ID(), '_tour_publisher', true);
        $tour_publish_date = get_post_meta(get_the_ID(), '_tour_publish_date', true);
        $tour_language = get_post_meta(get_the_ID(), '_tour_language', true);
        $tour_genre = get_post_meta(get_the_ID(), '_tour_genre', true);
        $tour_pages = get_post_meta(get_the_ID(), '_tour_pages', true);
        $tour_cover_type = get_post_meta(get_the_ID(), '_tour_cover_type', true);
        $tour_price = get_post_meta(get_the_ID(), '_tour_price', true);
        $tour_stock = get_post_meta(get_the_ID(), '_tour_stock', true);
        $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);

        // Display the content
        ?>
        <article <?php post_class(); ?>>
            <header>
                <h1><?php the_title(); ?></h1>
                <p>Published on: <?php echo esc_html(get_the_date()); ?></p>
            </header>

            <div class="tour-details">
                <p><strong>Tour Name:</strong> <?php echo esc_html($tour_name); ?></p>
                <p><strong>ISBN:</strong> <?php echo esc_html($tour_isbn); ?></p>
                <p><strong>Author:</strong> <?php echo esc_html($tour_author); ?></p>
                <p><strong>Publisher:</strong> <?php echo esc_html($tour_publisher); ?></p>
                <p><strong>Publish Date:</strong> <?php echo esc_html($tour_publish_date); ?></p>
                <p><strong>Language:</strong> <?php echo esc_html($tour_language); ?></p>
                <p><strong>Genre:</strong> <?php echo esc_html($tour_genre); ?></p>
                <p><strong>Pages:</strong> <?php echo esc_html($tour_pages); ?></p>
                <p><strong>Cover Type:</strong> <?php echo esc_html($tour_cover_type); ?></p>
                <p><strong>Price:</strong> $<?php echo esc_html(number_format($tour_price, 2)); ?></p>
                <p><strong>Stock:</strong> <?php echo esc_html($tour_stock); ?></p>
                
                <?php if ($tour_details) : ?>
                    <h3>Details:</h3>
                    <p><?php echo esc_textarea($tour_details); ?></p>
                <?php endif; ?>

                <?php if ($tour_cover_images) : ?>
                    <h3>Cover Images:</h3>
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
                <p>Posted by: <?php the_author(); ?></p>
            </footer>
        </article>

        <div class="comments-section">
            <?php comments_template(); ?>
        </div>

    <?php endwhile; 
endif;

get_footer();
