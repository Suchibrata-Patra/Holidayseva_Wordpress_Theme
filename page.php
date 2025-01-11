<?php 
get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title(); ?>
    </title>
</head>
<body>
    <!-- <h1>
        <?php the_title(); ?>
    </h1> -->
    <div style="display:flex;">
        <?php 
        the_post_thumbnail(array(100, 100)); // Other resolutions (height, width)
        ?>
        <?php
	$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
    ?>
        <div>
            <?php the_content(); ?>
        </div>
    </div>
    <!-- The Following Portion is Completely for Page Speed -->
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
</body>
</html>
page.php

<?php get_sidebar(); ?>