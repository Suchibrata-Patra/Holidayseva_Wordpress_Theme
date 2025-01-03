<?php 
get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
</head>
<body>
    <h1><?php the_title(); ?></h1>
    <div>
        <?php the_content(); ?>
    </div>

    <br><br>

    <div id="stats" style='font-size:10px !important;'>
        <h2>Page Load Statistics</h2>
        <p><strong>DOM Content Loaded (DOMContentLoaded):</strong> <span id="dom-content-loaded"></span></p>
        <p><strong>Page Load (load event):</strong> <span id="page-load"></span></p>
        <p><strong>Total Page Load Time:</strong> <span id="total-load-time"></span> ms</p>
    </div>

    <script>
       window.onload = function () {
    // Get performance data using the Performance API
    const performanceData = window.performance.timing;

    // Calculate various times in milliseconds
    const navigationStart = performanceData.navigationStart;
    const domContentLoadedTime = performanceData.domContentLoadedEventEnd - navigationStart;
    const pageLoadTime = performanceData.loadEventEnd - navigationStart;
    const totalLoadTime = pageLoadTime;

    // Convert times to seconds (divide by 1000)
    const domContentLoadedTimeInSec = (domContentLoadedTime / 1000).toFixed(3); // Show up to 3 decimal places
    const pageLoadTimeInSec = (pageLoadTime / 1000).toFixed(3); // Show up to 3 decimal places
    const totalLoadTimeInSec = (totalLoadTime / 1000).toFixed(3); // Show up to 3 decimal places

    // Display the results on the page
    document.getElementById('dom-content-loaded').textContent = domContentLoadedTimeInSec + ' seconds';
    document.getElementById('page-load').textContent = pageLoadTimeInSec + ' seconds';
    document.getElementById('total-load-time').textContent = totalLoadTimeInSec + ' seconds';
};

    </script>

</body>
</html>
