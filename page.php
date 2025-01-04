<?php 
get_header();
?>
    
<h1>
    <?php the_title(); ?>
</h1>

<div style="display:flex;">
    <?php 
    the_post_thumbnail(array(100, 100)); // Display the post thumbnail with specific size (height, width)
    ?>

    <?php
    // Get the post's featured image URL
    $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    ?>
    <img src="<?php echo esc_url($imagepath[0]); ?>" width="200">
    
    <div>
        <?php the_content(); ?>
    </div>
</div>

<!-- Page load time for debugging purposes -->
<br><br>
<div id="stats">
    <p><strong>Page Load time</strong> <span id="dom-content-loaded"></span></p>
</div>
<script>
    window.onload = function () {
        const performanceData = window.performance.timing;
        const navigationStart = performanceData.navigationStart;
        const domContentLoadedTime = performanceData.domContentLoadedEventEnd - navigationStart;
        const domContentLoadedTimeInSec = (domContentLoadedTime / 1000).toFixed(3);
        document.getElementById('dom-content-loaded').textContent = domContentLoadedTimeInSec + ' seconds';
    };
</script>

<?php
get_footer();
?>