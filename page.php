<?php get_header(); ?>
    <h1> <?php the_title(); ?> </h1>
    <div style="display:flex;">
        <?php the_post_thumbnail(array(100, 100)); // Other resolutions (height, width) ?>
        <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
        <div> <?php the_content(); ?> </div>
    </div>
    <!-- The Following Portion is Completely for Page Speed -->
    <br><br>
    <div id="stats"><p><strong>Page Load time</strong> <span id="dom-content-loaded"></span></p></div>
    <script src="<?php echo get_template_directory_uri(); ?>/Assets/javascript/PageSpeed.js" defer></script>

    <h1>Images will load after the page is fully loaded</h1>
    <div class="image-container">
        <img data-src="https://s0.2mdn.net/simgad/60204998891146136ss82" alt="Skeleton Loader" class="delayed-image" style="background-color:grey;">
        <img data-src="https://s0.2mdn.net/simgad/6020499889114613682" alt="Skeleton Loader" class="delayed-image">
        <img data-src="https://s0.2mdn.net/simgad/6020499889114613682" alt="Skeleton Loader" class="delayed-image">
    </div>
    <style>
        /* Skeleton animation styling */
        .delayed-image {
            width: 300px; /* Set a fixed width */
            height: auto; /* Set a fixed height */
            background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            display: inline-block; /* Ensures it occupies space */
            object-fit: cover; /* Ensures proper image scaling */
        }

        /* Stop animation once the image loads */
        .delayed-image[src] {
            background: transparent; /* Remove skeleton animation */
            animation: none; /* Stop the animation */
            transition: opacity 0.5s ease-in-out; /* Smooth transition */
            opacity: 1; /* Make the image fully visible */
        }

        .delayed-image:not([src]) {
            opacity: 1; /* Ensure the skeleton is visible */
        }

        /* Skeleton shimmer animation */
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
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