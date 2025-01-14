<?php
/**
 * Template Name: Book Index
 * Description: A custom template for displaying a list of books with inline styling and a search bar.
 */
get_header(); ?>

<div class="book-index" style="padding: 40px; background-color: #f9f9f9; text-align: center;">
    <h1 class="page-title" style="font-size: 2.5em; margin-bottom: 40px; color: #333; text-transform: uppercase; font-weight: bold;">
        Our Books
    </h1>
    
    <!-- Search Bar Form -->
    <form role="search" method="get" class="book-search-form" action="<?php echo esc_url(home_url('/')); ?>" style="margin-bottom: 40px;">
        <input type="text" name="s" placeholder="Search books..." value="<?php echo get_search_query(); ?>" 
               style="padding: 10px; font-size: 1em; width: 250px; border: 2px solid #ccc; border-radius: 5px;">
        <input type="hidden" name="post_type" value="book" /> <!-- Ensure it searches only books -->
        <button type="submit" style="padding: 10px 15px; background-color: #0073e6; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Search
        </button>
    </form>
    
    <?php
    // Define the custom query to get all "book" posts
    $args = array(
        'post_type' => 'book', // Custom post type "book"
        'posts_per_page' => -1, // Show all books
        's' => get_search_query(), // Search query
    );

    $book_query = new WP_Query($args);

    if ($book_query->have_posts()) :
        echo '<div class="book-list" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">';
        while ($book_query->have_posts()) : $book_query->the_post();
            ?>
            <div class="book-item" style="background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); width: 220px; overflow: hidden;">
                <div class="book-cover" style="text-align: center; padding: 20px;">
                    <?php 
                    // Check if the book has a featured image
                    if (has_post_thumbnail()) :
                        the_post_thumbnail('medium', array('style' => 'max-width: 100%; height: auto;'));
                    else :
                        echo '<img src="' . get_template_directory_uri() . '/assets/images/default-book-cover.jpg" alt="No Cover" style="max-width: 100%; height: auto;">';
                    endif;
                    ?>
                </div>
                <div class="book-info" style="padding: 15px; text-align: left;">
                    <h2>
                        <a href="<?php the_permalink(); ?>" class="book-title" style="font-size: 1.2em; color: #0073e6; text-decoration: none; font-weight: bold;">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="book-excerpt" style="font-size: 1em; color: #555; margin-top: 10px;">
                        <?php the_excerpt(); ?>
                    </p>
                </div>
            </div>
            <?php
        endwhile;
        echo '</div>';
    else :
        echo '<p>No books found.</p>';
    endif;

    wp_reset_postdata();
    ?>

</div>

<?php get_footer(); ?>
fuck