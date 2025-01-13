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

    <h1>Images will load after the page is fully loaded</h1>
    <div class="image-container">
        <img data-src="https://s0.2mdn.net/simgad/602049988sdsd9114613682" alt="Skeleton Loader" class="delayed-image">
        <img data-src="https://s0.2mdn.net/simgad/6020499889114613682" alt="Skeleton Loader" class="delayed-image">
        <img data-src="https://s0.2mdn.net/simgad/60204998891sds14613682" alt="Skeleton Loader" class="delayed-image">
    </div>

    <style>
        /* Placeholder styling for images */
        .delayed-image {
            width: 300px;
            height: 200px;
            background-color: #e0e0e0; /* Grey placeholder color */
            display: inline-block;
        }

        /* Optional: Add a smooth transition effect when the image loads */
        .delayed-image[src] {
            background-color: transparent; /* Remove placeholder background */
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .delayed-image:not([src]) {
            opacity: 0;
        }
    </style>

    <script>
        window.addEventListener('load', () => {
            // Select all images with the "delayed-image" class
            const images = document.querySelectorAll('.delayed-image');
            
            images.forEach(img => {
                const dataSrc = img.getAttribute('data-src');
                if (dataSrc) {
                    img.src = dataSrc;
                }
            });
        });
    </script>
<?php get_sidebar(); ?>
