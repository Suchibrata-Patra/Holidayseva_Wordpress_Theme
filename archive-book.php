<?php
/**
 * Archive template for the "Books" custom post type
 */

get_header();
?>

<div class="container">
    <h1 class="page-title">Our Books</h1>

    <div class="content-wrapper">
        <!-- Filter Section -->
        <aside class="filters">
            <h2>Filter Books</h2>
            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="hidden" name="post_type" value="book" />
                
                <!-- Filter by Price -->
                <label for="price_filter">Price (Max):</label>
                <input type="number" name="price_filter" id="price_filter" value="<?php echo esc_attr($_GET['price_filter'] ?? ''); ?>" />

                <!-- Filter by Author -->
                <label for="author_filter">Author:</label>
                <input type="text" name="author_filter" id="author_filter" value="<?php echo esc_attr($_GET['author_filter'] ?? ''); ?>" />

                <!-- Filter by Language -->
                <label for="language_filter">Language:</label>
                <input type="text" name="language_filter" id="language_filter" value="<?php echo esc_attr($_GET['language_filter'] ?? ''); ?>" />

                <button type="submit">Apply Filters</button>
            </form>
        </aside>

        <!-- Main Content Section -->
        <main class="book-listing">
            <?php
            // Handle filters
            $meta_query = array('relation' => 'AND');

            if (!empty($_GET['price_filter'])) {
                $meta_query[] = array(
                    'key' => '_book_price',
                    'value' => intval($_GET['price_filter']),
                    'type' => 'NUMERIC',
                    'compare' => '<=',
                );
            }

            if (!empty($_GET['author_filter'])) {
                $meta_query[] = array(
                    'key' => '_book_author',
                    'value' => sanitize_text_field($_GET['author_filter']),
                    'compare' => 'LIKE',
                );
            }

            if (!empty($_GET['language_filter'])) {
                $meta_query[] = array(
                    'key' => '_book_language',
                    'value' => sanitize_text_field($_GET['language_filter']),
                    'compare' => 'LIKE',
                );
            }

            $args = array(
                'post_type' => 'book',
                'meta_query' => $meta_query,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>
                <ul class="book-list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li class="book-item">
                            <div class="book-card">
                            <div class="book-thumbnail">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('medium'); ?>
    <?php else : ?>
        <div class="skeleton-loader"></div>
    <?php endif; ?>
</div>

                                <div class="book-info">
                                    <h2 class="book-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_author', true)); ?></p>
                                    <p><strong>Price:</strong> $<?php echo esc_html(get_post_meta(get_the_ID(), '_book_price', true)); ?></p>
                                    <p><strong>Publisher:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_publisher', true)); ?></p>
                                    <p><strong>Language:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_language', true)); ?></p>
                                    <p class="book-excerpt"><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                    ));
                    ?>
                </div>
            <?php else : ?>
                <p>No books found matching your filters.</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </main>
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
.content-wrapper {
    display: flex;
    gap: 20px;
}
.skeleton-loader {
    width: 150px; /* Adjust to match the thumbnail size */
    height: 225px; /* Adjust to match the thumbnail size */
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 5px; /* Add rounded corners if desired */
    display: inline-block;
}

@keyframes skeleton-loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

.filters {
    width: 25%;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
}
.filters h2 {
    margin-bottom: 15px;
}
.filters label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}
.filters input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.filters button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #0073aa;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.filters button:hover {
    background-color: #005177;
}
.book-listing {
    flex: 1;
}
.book-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.book-item {
    margin-bottom: 20px;
}
.book-card {
    display: flex;
    gap: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.book-thumbnail img {
    width: 150px;
    height: auto;
    object-fit: cover;
}
.book-info {
    padding: 15px;
}
.book-title {
    font-size: 1.5em;
    margin-bottom: 10px;
}
.book-excerpt {
    font-size: 0.9em;
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