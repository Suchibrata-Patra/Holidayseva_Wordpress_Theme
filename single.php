<?php 
    get_header(); 
    get_post(); 
?>
<div class="book-details">
    <h1><?php the_title(); ?></h1>
    <div class="book-content">
        <?php the_content(); ?>
    </div>

    <!-- Custom Book Fields -->
    <div class="book-meta">
        <strong>Book Name:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_name', true)); ?><br>
        <strong>ISBN:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_isbn', true)); ?><br>
        <strong>Details:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_details', true)); ?><br>
        <strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_author', true)); ?><br>
        <strong>Publisher:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_publisher', true)); ?><br>
        <strong>Publish Date:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_publish_date', true)); ?><br>
        <strong>Language:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_language', true)); ?><br>
        <strong>Genre:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_genre', true)); ?><br>
        <strong>Pages:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_pages', true)); ?><br>
        <strong>Cover Type:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_cover_type', true)); ?><br>
        <strong>Price:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_price', true)); ?><br>
        <strong>Stock:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_stock', true)); ?><br>
        <strong>Edition:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_edition', true)); ?><br>
    </div>
</div>

<?php get_footer(); ?>
