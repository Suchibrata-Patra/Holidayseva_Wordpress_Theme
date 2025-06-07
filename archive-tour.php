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

       <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Explore Our Tours</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()) : the_post(); ?>
                <article class="bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-2xl overflow-hidden flex flex-col">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-52 object-cover">
                        </a>
                    <?php endif; ?>

                    <div class="p-5 flex-1 flex flex-col">
                        <h2 class="text-2xl font-semibold mb-2 text-gray-900">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="text-gray-600 text-sm mb-4 flex-grow">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="mt-auto">
                            <a href="<?php the_permalink(); ?>" class="inline-block bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                Read More
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
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
