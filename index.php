<?php 
    get_header(); 
    get_post(); 
?>
<div class="tour-details">
    <!-- tour Cover Images at the Top -->
    <?php 
        // Retrieve all cover images
        $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true); 
        if (!empty($tour_cover_images) && is_array($tour_cover_images)) : ?>
            <div class="tour-cover-section">
                <h3>tour Covers</h3>
                <div class="tour-cover-gallery">
                    <?php foreach ($tour_cover_images as $tour_cover_image) : ?>
                        <div class="tour-cover">
                            <img src="<?php echo esc_url($tour_cover_image); ?>" alt="Cover Image" class="tour-cover-image" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    <?php endif; ?>

    <!-- tour Title -->
    <h1 class="tour-title"><?php the_title(); ?></h1>

    <div class="tour-content">
        <?php the_content(); ?>
    </div>

    <!-- Custom tour Fields -->
    <div class="tour-meta">
        <h3>tour Details</h3>
        <div class="tour-meta-grid">
            <div class="tour-meta-item">
                <strong>tour Name:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_name', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>ISBN:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_isbn', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Details:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_details', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Author:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_author', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Publisher:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_publisher', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Publish Date:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_publish_date', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Language:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_language', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Genre:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_genre', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Pages:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_pages', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Cover Type:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_cover_type', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Price:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_price', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Stock:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_stock', true)); ?>
            </div>
            <div class="tour-meta-item">
                <strong>Edition:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_tour_edition', true)); ?>
            </div>
        </div>
    </div>

    <!-- Send tour Details Button -->
    <button id="send-tour-details" class="send-tour-details-btn">Send tour Details</button>
</div>

<!-- CSS -->
<style>
    .tour-details {
        font-family: 'Arial', sans-serif;
        color: #333;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .tour-cover-section {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .tour-cover-section h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 20px;
    }
    
    .tour-cover-gallery {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .tour-cover {
        width: 150px;
        height: 200px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .tour-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tour-title {
        font-size: 2rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
        text-align: center;
    }

    .tour-content {
        margin-bottom: 20px;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .tour-meta h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 15px;
    }

    .tour-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .tour-meta-item {
        font-size: 1rem;
        color: #7f8c8d;
    }

    .tour-meta-item strong {
        color: #2c3e50;
    }

    .send-tour-details-btn {
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

    .send-tour-details-btn:hover {
        background-color: #2980b9;
    }
</style>


<script>
    document.getElementById('send-tour-details').addEventListener('click', function() {
        // Retrieve all the custom fields
        var tourName = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_name', true)); ?>';
        var tourIsbn = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_isbn', true)); ?>';
        var tourDetails = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_details', true)); ?>';
        var tourAuthor = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_author', true)); ?>';
        var tourPublisher = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_publisher', true)); ?>';
        var tourPublishDate = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_publish_date', true)); ?>';
        var tourLanguage = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_language', true)); ?>';
        var tourGenre = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_genre', true)); ?>';
        var tourPages = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_pages', true)); ?>';
        var tourCoverType = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_cover_type', true)); ?>';
        var tourPrice = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_price', true)); ?>';
        var tourstock = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_stock', true)); ?>';
        var tourEdition = '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_edition', true)); ?>';

        // Construct the URL with query parameters
        var url = 'https://touring.holidayseva.com/submit-details?' +
                  'tour_name=' + encodeURIComponent(tourName) + '&' +
                  'isbn=' + encodeURIComponent(tourIsbn) + '&' +
                  'details=' + encodeURIComponent(tourDetails) + '&' +
                  'author=' + encodeURIComponent(tourAuthor) + '&' +
                  'publisher=' + encodeURIComponent(tourPublisher) + '&' +
                  'publish_date=' + encodeURIComponent(tourPublishDate) + '&' +
                  'language=' + encodeURIComponent(tourLanguage) + '&' +
                  'genre=' + encodeURIComponent(tourGenre) + '&' +
                  'pages=' + encodeURIComponent(tourPages) + '&' +
                  'cover_type=' + encodeURIComponent(tourCoverType) + '&' +
                  'price=' + encodeURIComponent(tourPrice) + '&' +
                  'stock=' + encodeURIComponent(tourstock) + '&' +
                  'edition=' + encodeURIComponent(tourEdition);

        // Redirect to the URL
        window.location.href = url;
    });
</script>

<?php get_footer(); ?>
