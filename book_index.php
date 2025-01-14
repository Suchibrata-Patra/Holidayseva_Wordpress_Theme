<?php
/**
 * Template Name: Book Index
 * Description: A custom template for displaying a list of books.
 */
get_header(); ?>

<div class="book-index">
    <h1>Our Books</h1>
    
    <?php
    // Define the custom query to get all "book" posts
    $args = array(
        'post_type' => 'book', // Custom post type "book"
        'posts_per_page' => -1, // Show all books
    );

    $book_query = new WP_Query($args);

    if ($book_query->have_posts()) :
        echo '<ul class="book-list">';
        while ($book_query->have_posts()) : $book_query->the_post();
            ?>
            <li class="book-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="book-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </li>
            <?php
        endwhile;
        echo '</ul>';
    else :
        echo '<p>No books found.</p>';
    endif;

    wp_reset_postdata();
    ?>

</div>

<?php get_footer(); ?>
