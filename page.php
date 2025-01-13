<?php get_header(); ?>
    <h1> <?php the_title(); ?> </h1>
    <div style="display:flex;">
        <?php the_post_thumbnail(array(100, 100), ['class' => 'skeleton_loader']); // Add skeleton_loader class ?>
        <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
        <div> <?php the_content(); ?> </div>
    </div>
    <!-- The Following Portion is Completely for Page Speed -->
    <br><br>
    <div id="stats"><p><strong>Page Load time</strong> <span id="dom-content-loaded"></span></p></div>
    <script src="<?php echo get_template_directory_uri(); ?>/Assets/javascript/PageSpeed.js" defer></script>

    <h1>Images will load after the page is fully loaded</h1>
    <div class="image-container" style="display: flex;">
        <img data-src="https://s0.2mdn.net/simgad/60204998891146136sss82" alt="Skeleton Loader" class="delayed-image skeleton_loader" style="background-color:rgb(248, 248, 248);border-radius: 10px;">
        <img data-src="https://s0.2mdn.net/simgad/6020499889114613682" alt="Skeleton Loader" class="delayed-image skeleton_loader">
        <img data-src="https://s0.2mdn.net/simgad/6020499889114613682" alt="Skeleton Loader" class="delayed-image skeleton_loader">
    </div>
    <style>
        /* Skeleton animation styling */
        .skeleton_loader {
            width: 300px; /* Default width */
            height: auto; /* Default height */
            background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 5px;
            display: inline-block;
        }

        /* Stop animation once the content is loaded */
        .skeleton_loader.loaded {
            background: transparent;
            animation: none;
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
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
            // Handle delayed loading of images with skeleton loader
            const images = document.querySelectorAll('.delayed-image.skeleton_loader');

            images.forEach(img => {
                const dataSrc = img.getAttribute('data-src');
                if (dataSrc) {
                    const tempImg = new Image();
                    tempImg.src = dataSrc;

                    // When the image is fully loaded
                    tempImg.onload = () => {
                        img.src = dataSrc; // Set actual image
                        img.classList.add('loaded'); // Add loaded class
                        img.classList.remove('skeleton_loader'); // Remove skeleton loader class
                    };
                }
            });
        });
    </script>
<?php get_sidebar(); ?>