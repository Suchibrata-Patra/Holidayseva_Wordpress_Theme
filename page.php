<?php get_header(); ?>
    <h1> <?php the_title(); ?> </h1>
    <div style="display:flex;">
        <?php the_post_thumbnail(array(100, 100)); // Other resolutions (height, width)?>
        <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');?>
        <div> <?php the_content(); ?> </div>
    </div>
    <!-- The Following Portion is Completely for Page Speed -->
    <br><br>
    <div id="stats"><p><strong>Page Load time</strong> <span id="dom-content-loaded"></span></p></div>
    <script src="<?php echo get_template_directory_uri();?>/Assets/javascript/PageSpeed.js" defer></script>
</body>
</html>
<h1>Images will load after the page is fully loaded</h1>
    <img data-src="https://via.placeholder.com/300x200" alt="Skeleton Loader" class="delayed-image">
    <img data-src="https://via.placeholder.com/300x200/ff0000" alt="Skeleton Loader" class="delayed-image">
    <img data-src="https://via.placeholder.com/300x200/00ff00" alt="Skeleton Loader" class="delayed-image">

    <script>
        window.addEventListener('load', () => {
            // Select all images with the "delayed-image" class
            const images = document.querySelectorAll('.delayed-image');
            
            images.forEach(img => {
                // Set the actual source from the data-src attribute
                const dataSrc = img.getAttribute('data-src');
                if (dataSrc) {
                    img.src = dataSrc;
                }
            });
        });
    </script>
<?php get_sidebar(); ?>