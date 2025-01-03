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

    <div id="stats">
        <h2>Page Load Statistics</h2>
        <p><strong>DOM Content Loaded (DOMContentLoaded):</strong> <span id="dom-content-loaded"></span></p>
        <p><strong>Page Load (load event):</strong> <span id="page-load"></span></p>
        <p><strong>Total Page Load Time:</strong> <span id="total-load-time"></span> ms</p>
    </div>

    <script>
        window.onload = function () {
            // Get performance data using the Performance API
            const performanceData = window.performance.timing;

            // Calculate various times
            const navigationStart = performanceData.navigationStart;
            const domContentLoadedTime = performanceData.domContentLoadedEventEnd - navigationStart;
            const pageLoadTime = performanceData.loadEventEnd - navigationStart;
            const totalLoadTime = pageLoadTime;

            // Display the results on the page
            document.getElementById('dom-content-loaded').textContent = domContentLoadedTime + ' ms';
            document.getElementById('page-load').textContent = pageLoadTime + ' ms';
            document.getElementById('total-load-time').textContent = totalLoadTime + ' ms';
        };
    </script>

</body>
</html>
