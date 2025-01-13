<?php get_header(); ?>
    <h1> <?php the_title(); ?> </h1>
    <div style="display:flex;">
        <?php the_post_thumbnail(array(100, 100)); ?>
        <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
        <div> <?php the_content(); ?> </div>
    </div>

    <h1>Images will load after the page is fully loaded</h1>
    <div class="image-container">
        <div class="placeholder delayed-image" data-src="https://s0.2mdn.net/simgad/6020499889114613682"></div>
        <div class="placeholder delayed-image" data-src="https://s0.2mdn.net/simgad/6020499889114613682"></div>
        <div class="placeholder delayed-image" data-src="https://s0.2mdn.net/simgad/6020499889114613682"></div>
    </div>

    <style>
        /* Placeholder styling */
        .placeholder {
            width: 300px; /* Set a fixed width */
            height: 200px; /* Set a fixed height */
            background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .placeholder img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .placeholder img.loaded {
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
            // Fetch all placeholders
            const placeholders = document.querySelectorAll('.placeholder.delayed-image');

            placeholders.forEach(placeholder => {
                const dataSrc = placeholder.getAttribute('data-src');
                const img = document.createElement('img');

                img.src = dataSrc;
                img.onload = () => {
                    img.classList.add('loaded'); // Mark the image as loaded
                    placeholder.appendChild(img); // Add image to placeholder
                };

                img.onerror = () => {
                    console.error(`Image failed to load: ${dataSrc}`);
                    // Leave the placeholder visible
                };
            });
        });
    </script>
<?php get_sidebar(); ?>
