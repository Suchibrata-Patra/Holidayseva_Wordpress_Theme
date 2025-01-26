<?php
get_header(); // Include the header.php template

// Check if there are any posts
if (have_posts()) :
    ?>
    <section class="tour-archive container mx-auto py-8">
        <header class="text-center mb-6">
            <h1 class="text-4xl font-bold">Explore Our Tours</h1>
            <p class="text-gray-600 mt-2">Discover a variety of tours designed to create unforgettable experiences.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            while (have_posts()) : the_post();
                ?>
                <article class="tour-post bg-white shadow-md rounded-2xl overflow-hidden">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-48 object-cover">
                        </a>
                    <?php endif; ?>

                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="tour-excerpt text-gray-700 text-sm mb-4">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                            Read More
                        </a>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>
    </section>
    <?php
else :
    ?>
    <section class="no-tours text-center py-16">
        <h2 class="text-2xl font-bold mb-4">No Tours Available</h2>
        <p class="text-gray-600">We're sorry, but no tours are available at the moment. Please check back later.</p>
    </section>
    <?php
endif;

get_footer(); // Include the footer.php template
?>
