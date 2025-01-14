<?php 
    get_header(); 
    get_post(); 
?>
<div class="book-details">
    <h1 class="book-title"><?php the_title(); ?></h1>
    <div class="book-content">
        <?php the_content(); ?>
    </div>

    <!-- Custom Book Fields -->
    <div class="book-meta">
        <h3>Book Details</h3>
        <div class="book-meta-grid">
            <div class="book-meta-item">
                <strong>Book Name:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_name', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>ISBN:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_isbn', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Details:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_details', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_author', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Publisher:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_publisher', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Publish Date:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_publish_date', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Language:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_language', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Genre:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_genre', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Pages:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_pages', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Cover Type:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_cover_type', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Price:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_price', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Stock:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_stock', true)); ?>
            </div>
            <div class="book-meta-item">
                <strong>Edition:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_book_edition', true)); ?>
            </div>
        </div>

        <!-- Display All Cover Images -->
        <?php 
            // Retrieve all cover images
            $book_cover_images = get_post_meta(get_the_ID(), '_book_cover_images', true); 
            if (!empty($book_cover_images) && is_array($book_cover_images)) : ?>
                <div class="book-covers">
                    <h3>Cover Images</h3>
                    <div class="book-cover-gallery">
                        <?php foreach ($book_cover_images as $book_cover_image) : ?>
                            <div class="book-cover">
                                <img src="<?php echo esc_url($book_cover_image); ?>" alt="Cover Image" class="book-cover-image" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        <?php endif; ?>

        <!-- Send Book Details via Subdomain Button -->
        <button id="send-book-details" class="send-book-details-btn">Send Book Details</button>
    </div>
</div>

<!-- CSS -->
<style>
    .book-details {
        font-family: 'Arial', sans-serif;
        color: #333;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .book-title {
        font-size: 2rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .book-content {
        margin-bottom: 20px;
    }
    .book-meta {
        margin-top: 30px;
    }
    .book-meta h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 10px;
    }
    .book-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    .book-meta-item {
        font-size: 1rem;
        color: #7f8c8d;
    }
    .book-meta-item strong {
        color: #2c3e50;
    }
    .book-covers {
        margin-top: 20px;
    }
    .book-cover-gallery {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    .book-cover {
        width: 150px;
        height: 200px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .book-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .send-book-details-btn {
        display: inline-block;
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .send-book-details-btn:hover {
        background-color: #2980b9;
    }
</style>


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
