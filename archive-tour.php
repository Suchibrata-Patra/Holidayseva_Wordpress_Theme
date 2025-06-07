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

       <div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
    <h1 style="text-align: center; font-size: 32px; font-weight: bold; color: #1F2937; margin-bottom: 40px;">
        Explore Our Tours
    </h1>

    <?php while (have_posts()) : the_post(); ?>
        <div style="display: flex; flex-direction: column; margin-bottom: 40px; background-color: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: box-shadow 0.3s ease;">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" style="flex-shrink: 0;">
                    <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 250px; object-fit: cover;">
                </a>
            <?php endif; ?>

            <div style="padding: 20px;">
                <h2 style="font-size: 24px; margin-bottom: 10px; color: #111;">
                    <a href="<?php the_permalink(); ?>" style="color: #2563EB; text-decoration: none;" onmouseover="this.style.color='#1D4ED8'" onmouseout="this.style.color='#2563EB'">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <div style="font-size: 14px; color: #4B5563; margin-bottom: 16px;">
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" style="display: inline-block; background-color: #2563EB; color: white; padding: 10px 16px; border-radius: 8px; text-decoration: none;" onmouseover="this.style.backgroundColor='#1D4ED8'" onmouseout="this.style.backgroundColor='#2563EB'">
                    Read More
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<style>
@media(min-width: 768px){
    .tour-card {
        flex-direction: row !important;
        height: 250px;
    }
    .tour-card img {
        width: 40%;
        height: 100%;
        object-fit: cover;
    }
}
</style>

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
