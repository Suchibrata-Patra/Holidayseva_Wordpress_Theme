<?php 
    get_header(); 
    get_post(); 
?>
this is Singletour
<div class="tours-details">
    <!-- tours Cover Images at the Top -->
    <?php 
        // Retrieve all cover images
        $tours_cover_images = get_post_meta(get_the_ID(), '_tours_cover_images', true); 
        if (!empty($tours_cover_images) && is_array($tours_cover_images)) : ?>
            <div class="tours-cover-section">
                <h3>tours Covers</h3>
                <div class="tours-cover-gallery">
                    <?php foreach ($tours_cover_images as $tours_cover_image) : ?>
                        <div class="tours-cover">
                            <img src="<?php echo esc_url($tours_cover_image); ?>" alt="Cover Image" class="tours-cover-image" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    <?php endif; ?>

    <!-- tours Title -->
    <h1 class="tours-title"><?php the_title(); ?></h1>

    <div class="tours-content">
        <?php the_content(); ?>
    </div>

    <!-- Custom tours Fields -->
    <div class="tours-meta">
        <h3>tours Details</h3>
        <div class="tours-meta-grid">
            <div class="tours-meta-item">
                <strong>tours Name:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_name', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>ISBN:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_isbn', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Details:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_details', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_author', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Publisher:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_publisher', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Publish Date:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_publish_date', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Language:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_language', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Genre:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_genre', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Pages:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_pages', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Cover Type:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_cover_type', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Price:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_price', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Stock:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_stock', true)); ?>
            </div>
            <div class="tours-meta-item">
                <strong>Edition:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tours_edition', true)); ?>
            </div>
        </div>
    </div>

    <!-- Send tours Details Button -->
    <button id="send-tours-details" class="send-tours-details-btn">Send tours Details</button>
</div>

<!-- CSS -->
<style>
    .tours-details {
        font-family: 'Arial', sans-serif;
        color: #333;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .tours-cover-section {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .tours-cover-section h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 20px;
    }
    
    .tours-cover-gallery {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .tours-cover {
        width: 150px;
        height: 200px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .tours-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tours-title {
        font-size: 2rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
        text-align: center;
    }

    .tours-content {
        margin-bottom: 20px;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .tours-meta h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 15px;
    }

    .tours-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .tours-meta-item {
        font-size: 1rem;
        color: #7f8c8d;
    }

    .tours-meta-item strong {
        color: #2c3e50;
    }

    .send-tours-details-btn {
        display: inline-block;
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 0 auto;
        display: block;
    }

    .send-tours-details-btn:hover {
        background-color: #2980b9;
    }
</style>


<script>
    document.getElementById('send-tours-details').addEventListener('click', function() {
        // Retrieve all the custom fields
        var toursName = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_name', true)); ?>';
        var toursIsbn = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_isbn', true)); ?>';
        var toursDetails = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_details', true)); ?>';
        var toursAuthor = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_author', true)); ?>';
        var toursPublisher = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_publisher', true)); ?>';
        var toursPublishDate = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_publish_date', true)); ?>';
        var toursLanguage = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_language', true)); ?>';
        var toursGenre = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_genre', true)); ?>';
        var toursPages = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_pages', true)); ?>';
        var toursCoverType = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_cover_type', true)); ?>';
        var toursPrice = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_price', true)); ?>';
        var toursStock = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_stock', true)); ?>';
        var toursEdition = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tours_edition', true)); ?>';

        // Construct the URL with query parameters
        var url = 'https://toursing.holidayseva.com/submit-details?' +
                  'tours_name=' + encodeURIComponent(toursName) + '&' +
                  'isbn=' + encodeURIComponent(toursIsbn) + '&' +
                  'details=' + encodeURIComponent(toursDetails) + '&' +
                  'author=' + encodeURIComponent(toursAuthor) + '&' +
                  'publisher=' + encodeURIComponent(toursPublisher) + '&' +
                  'publish_date=' + encodeURIComponent(toursPublishDate) + '&' +
                  'language=' + encodeURIComponent(toursLanguage) + '&' +
                  'genre=' + encodeURIComponent(toursGenre) + '&' +
                  'pages=' + encodeURIComponent(toursPages) + '&' +
                  'cover_type=' + encodeURIComponent(toursCoverType) + '&' +
                  'price=' + encodeURIComponent(toursPrice) + '&' +
                  'stock=' + encodeURIComponent(toursStock) + '&' +
                  'edition=' + encodeURIComponent(toursEdition);

        // Redirect to the URL
        window.location.href = url;
    });
</script>

<?php get_footer(); ?>