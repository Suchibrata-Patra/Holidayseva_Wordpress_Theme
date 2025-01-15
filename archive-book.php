<?php
/**
 * Archive template for the "Books" custom post type
 */

get_header();
?>

<div class="container">
    <h1 class="page-title">Our Books</h1>

    <!-- Search Form -->
    <div class="book-search-form">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="hidden" name="post_type" value="book" />
            <input type="search" name="s" placeholder="Search Books..." value="<?php echo get_search_query(); ?>" />
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Book Listings -->
    <div class="book-listing">
        <?php if (have_posts()) : ?>
            <ul class="book-list">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="book-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="book-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/default-thumbnail.jpg'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="book-info">
                                <h2 class="book-title"><?php the_title(); ?></h2>
                                
                                <!-- Custom Fields -->
                                <div class="book-meta">
                                    <p><strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_author', true)); ?></p>
                                    <p><strong>Price:</strong> $<?php echo esc_html(get_post_meta(get_the_ID(), '_book_price', true)); ?></p>
                                    <p><strong>Publisher:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_publisher', true)); ?></p>
                                    <p><strong>Language:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_language', true)); ?></p>
                                    <p><strong>Pages:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_pages', true)); ?></p>
                                </div>
                                
                                <div class="book-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>

            <!-- Pagination -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $wp_query->max_num_pages,
                ));
                ?>
            </div>
        <?php else : ?>
            <p>No books found. Please check back later!</p>
        <?php endif; ?>
    </div>
</div>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}
.page-title {
    text-align: center;
    margin-bottom: 20px;
}
.book-search-form {
    text-align: center;
    margin-bottom: 30px;
}
.book-search-form input[type="search"] {
    width: 60%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.book-search-form button {
    padding: 10px 20px;
    border: none;
    background-color: #0073aa;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}
.book-search-form button:hover {
    background-color: #005177;
}
.book-list {
    list-style: none;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}
.book-item {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}
.book-item:hover {
    transform: scale(1.03);
}
.book-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
}
.book-info {
    padding: 15px;
    text-align: center;
}
.book-title {
    font-size: 1.5em;
    margin: 10px 0;
}
.book-meta p {
    font-size: 0.9em;
    margin: 5px 0;
    color: #555;
}
.book-excerpt {
    font-size: 1em;
    color: #555;
    margin-top: 10px;
}
.pagination {
    text-align: center;
    margin-top: 20px;
}
.pagination a {
    margin: 0 5px;
    padding: 10px 15px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #0073aa;
}
.pagination a:hover {
    background-color: #0073aa;
    color: white;
}
</style>

<?php
get_footer();
?>
