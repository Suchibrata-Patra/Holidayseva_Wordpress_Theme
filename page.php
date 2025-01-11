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
<pre id="loader-details">Loading...</pre>

  <script>
    // Function to format performance entries
    function displayLoaderDetails() {
      const details = [];
      const performanceEntries = performance.getEntries();

      performanceEntries.forEach(entry => {
        details.push({
          name: entry.name,
          entryType: entry.entryType,
          startTime: entry.startTime.toFixed(2),
          duration: entry.duration.toFixed(2)
        });
      });

      const navigationTiming = performance.getEntriesByType('navigation')[0];
      const timingDetails = {
        DNSLookup: (navigationTiming.domainLookupEnd - navigationTiming.domainLookupStart).toFixed(2),
        TCPHandshake: (navigationTiming.connectEnd - navigationTiming.connectStart).toFixed(2),
        ResponseTime: (navigationTiming.responseEnd - navigationTiming.responseStart).toFixed(2),
        DOMContentLoaded: navigationTiming.domContentLoadedEventEnd.toFixed(2),
        PageLoad: navigationTiming.loadEventEnd.toFixed(2)
      };

      // Display collected metrics
      const loaderDetailsElement = document.getElementById('loader-details');
      loaderDetailsElement.innerText = JSON.stringify(
        { performanceEntries: details, timingDetails },
        null,
        2
      );
    }

    // Ensure metrics are shown after the page is fully loaded
    window.onload = () => {
      setTimeout(displayLoaderDetails, 100); // Allow some buffer for metrics to populate
    };
  </script>
<?php get_sidebar(); ?>