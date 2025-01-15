<?php 
// Single Post Template for Custom Post Type "Tours"
get_header(); 
?>

<div class="tour-details">
    <!-- Tour Cover Images -->
    <?php 
    $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);
    if (!empty($tour_cover_images) && is_array($tour_cover_images)) : ?>
        <div class="tour-cover-section">
            <h3>Tour Covers</h3>
            <div class="tour-cover-gallery">
                <?php foreach ($tour_cover_images as $tour_cover_image) : ?>
                    <div class="tour-cover">
                        <img src="<?php echo esc_url($tour_cover_image); ?>" alt="Tour Cover for <?php the_title(); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Tour Title -->
    <h1 class="tour-title"><?php the_title(); ?></h1>

    <!-- Tour Content -->
    <div class="tour-content">
        <?php the_content(); ?>
    </div>

    <!-- Custom Tour Fields -->
    <div class="tour-meta">
        <h3>Tour Details</h3>
        <div class="tour-meta-grid">
            <?php
            // Define the custom fields to display
            $fields = [
                'Tour Name' => '_tour_name',
                'ISBN' => '_tour_isbn',
                'Details' => '_tour_details',
                'Author' => '_tour_author',
                'Publisher' => '_tour_publisher',
                'Publish Date' => '_tour_publish_date',
                'Language' => '_tour_language',
                'Genre' => '_tour_genre',
                'Pages' => '_tour_pages',
                'Cover Type' => '_tour_cover_type',
                'Price' => '_tour_price',
                'Stock' => '_tour_stock',
                'Edition' => '_tour_edition',
            ];

            // Loop through each field and display its value
            foreach ($fields as $label => $meta_key) :
                $value = get_post_meta(get_the_ID(), $meta_key, true) ?: 'N/A';
            ?>
                <div class="tour-meta-item">
                    <strong><?php echo esc_html($label); ?>:</strong> <?php echo esc_html($value); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Send Tour Details Button -->
    <button id="send-tour-details" class="send-tour-details-btn">Send Tour Details</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sendButton = document.getElementById('send-tour-details');
        sendButton.addEventListener('click', function () {
            const data = {
                tour_name: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_name', true)); ?>',
                isbn: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_isbn', true)); ?>',
                details: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_details', true)); ?>',
                author: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_author', true)); ?>',
                publisher: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_publisher', true)); ?>',
                publish_date: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_publish_date', true)); ?>',
                language: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_language', true)); ?>',
                genre: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_genre', true)); ?>',
                pages: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_pages', true)); ?>',
                cover_type: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_cover_type', true)); ?>',
                price: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_price', true)); ?>',
                stock: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_stock', true)); ?>',
                edition: '<?php echo esc_js(get_post_meta(get_the_ID(), '_tour_edition', true)); ?>'
            };

            const queryString = new URLSearchParams(data).toString();
            const url = `https://touring.holidayseva.com/submit-details?${queryString}`;
            window.location.href = url;
        });
    });
</script>

<?php get_footer(); ?>
