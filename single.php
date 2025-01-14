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

        <!-- Display All Cover Images -->
        <?php 
            // Retrieve all cover images
            $book_cover_images = get_post_meta(get_the_ID(), '_book_cover_images', true); 

            if (!empty($book_cover_images) && is_array($book_cover_images)) : ?>
                <div class="book-covers">
                    <?php foreach ($book_cover_images as $book_cover_image) : ?>
                        <div class="book-cover">
                            <img src="<?php echo esc_url($book_cover_image); ?>" alt="Cover Image" class="book-cover-image" />
                        </div>
                    <?php endforeach; ?>
                </div>
        <?php endif; ?>

        <!-- Send Book Details via Subdomain Button -->
        <button id="send-book-details" class="send-book-details-btn">Send Book Details</button>
    </div>
</div>

<script>
    document.getElementById('send-book-details').addEventListener('click', function() {
        // Retrieve all the custom fields
        var bookName = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_name', true)); ?>';
        var bookIsbn = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_isbn', true)); ?>';
        var bookDetails = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_details', true)); ?>';
        var bookAuthor = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_author', true)); ?>';
        var bookPublisher = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_publisher', true)); ?>';
        var bookPublishDate = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_publish_date', true)); ?>';
        var bookLanguage = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_language', true)); ?>';
        var bookGenre = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_genre', true)); ?>';
        var bookPages = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_pages', true)); ?>';
        var bookCoverType = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_cover_type', true)); ?>';
        var bookPrice = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_price', true)); ?>';
        var bookStock = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_stock', true)); ?>';
        var bookEdition = '<?php echo esc_js(get_post_meta(get_the_ID(), '_book_edition', true)); ?>';

        // Construct the URL with query parameters
        var url = 'https://booking.holidayseva.com/submit-details?' +
                  'book_name=' + encodeURIComponent(bookName) + '&' +
                  'isbn=' + encodeURIComponent(bookIsbn) + '&' +
                  'details=' + encodeURIComponent(bookDetails) + '&' +
                  'author=' + encodeURIComponent(bookAuthor) + '&' +
                  'publisher=' + encodeURIComponent(bookPublisher) + '&' +
                  'publish_date=' + encodeURIComponent(bookPublishDate) + '&' +
                  'language=' + encodeURIComponent(bookLanguage) + '&' +
                  'genre=' + encodeURIComponent(bookGenre) + '&' +
                  'pages=' + encodeURIComponent(bookPages) + '&' +
                  'cover_type=' + encodeURIComponent(bookCoverType) + '&' +
                  'price=' + encodeURIComponent(bookPrice) + '&' +
                  'stock=' + encodeURIComponent(bookStock) + '&' +
                  'edition=' + encodeURIComponent(bookEdition);

        // Redirect to the URL
        window.location.href = url;
    });
</script>

<?php get_footer(); ?>
