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

       <div style="max-width: 1200px; margin: 0 auto; padding: 50px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f8;">
    <h1 style="text-align: center; font-size: 36px; font-weight: bold; color: #2c3e50; margin-bottom: 50px;">
        Discover Our Signature Tours
    </h1>

    <?php while (have_posts()) : the_post(); ?>
        <div style="display: flex; flex-direction: column; background-color: white; border-radius: 16px; overflow: hidden; margin-bottom: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
            
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" style="flex-shrink: 0;">
                    <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 220px; object-fit: cover; display: block;">
                </a>
            <?php endif; ?>

            <div style="padding: 30px;">
                <h2 style="font-size: 28px; color: #1a202c; margin-bottom: 12px;">
                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: #2c7be5;" onmouseover="this.style.color='#1e5bbf'" onmouseout="this.style.color='#2c7be5'">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div style="font-size: 16px; color: #4a5568; line-height: 1.6; margin-bottom: 20px;">
                    <?php the_excerpt(); ?>
                </div>

                <a href="<?php the_permalink(); ?>" style="padding: 12px 24px; background-color: #2c7be5; color: white; text-decoration: none; border-radius: 8px; font-size: 14px; font-weight: bold; display: inline-block;" onmouseover="this.style.backgroundColor='#1e5bbf'" onmouseout="this.style.backgroundColor='#2c7be5'">
                    Read More
                </a>
            </div>
        </div>
    <?php endwhile; ?>
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
