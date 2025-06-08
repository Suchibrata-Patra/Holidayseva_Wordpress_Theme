<?php
// single-travel_guide.php

get_header(); // Include the site header

if (have_posts()) :
    while (have_posts()) : the_post();

    // Get the meta values
    $meta = [
        'location'       => get_post_meta(get_the_ID(), '_tg_location', true),
        'duration'       => get_post_meta(get_the_ID(), '_tg_duration', true),
        'best_season'    => get_post_meta(get_the_ID(), '_tg_best_season', true),
        'where_to_stay'  => get_post_meta(get_the_ID(), '_tg_where_to_stay', true),
        'top_reasons'    => get_post_meta(get_the_ID(), '_tg_top_reasons', true),
        'featured_image' => get_post_meta(get_the_ID(), '_tg_featured_image', true),
    ];

    $image_url = $meta['featured_image'] ? wp_get_attachment_url($meta['featured_image']) : '';
?>

<style>
.travel-guide-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 40px 20px;
    font-family: 'Segoe UI', sans-serif;
}
.travel-guide-header {
    text-align: center;
    margin-bottom: 30px;
}
.travel-guide-header img {
    max-width: 100%;
    border-radius: 12px;
    margin-bottom: 20px;
}
.travel-guide-meta {
    background: #f9f9f9;
    padding: 25px;
    border-radius: 10px;
    border: 1px solid #ddd;
}
.travel-guide-meta h2 {
    font-size: 28px;
    margin-bottom: 10px;
}
.travel-guide-meta p {
    margin: 10px 0;
    font-size: 16px;
}
.travel-guide-section {
    margin-top: 30px;
}
.travel-guide-section h3 {
    font-size: 22px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 5px;
    margin-bottom: 10px;
}
</style>

<div class="travel-guide-container">

    <div class="travel-guide-header">
        <?php if ($image_url): ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Featured Image">
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
    </div>

    <div class="travel-guide-meta">
        <?php if ($meta['location']) : ?>
            <p><strong>📍 Location:</strong> <?php echo esc_html($meta['location']); ?></p>
        <?php endif; ?>
        <?php if ($meta['duration']) : ?>
            <p><strong>⏳ Duration:</strong> <?php echo esc_html($meta['duration']); ?></p>
        <?php endif; ?>
        <?php if ($meta['best_season']) : ?>
            <p><strong>🌤️ Best Season to Visit:</strong> <?php echo esc_html($meta['best_season']); ?></p>
        <?php endif; ?>
    </div>

    <?php if ($meta['where_to_stay']) : ?>
    <div class="travel-guide-section">
        <h3>🏨 Where to Stay</h3>
        <p><?php echo nl2br(esc_html($meta['where_to_stay'])); ?></p>
    </div>
    <?php endif; ?>

    <?php if ($meta['top_reasons']) : ?>
    <div class="travel-guide-section">
        <h3>🌟 Top 5 Reasons to Visit</h3>
        <p><?php echo nl2br(esc_html($meta['top_reasons'])); ?></p>
    </div>
    <?php endif; ?>

    <div class="travel-guide-section">
        <h3>📝 Full Travel Guide</h3>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>

</div>
<?php if ($meta['intro']) : ?>
    <div class="travel-guide-section">
        <h3>✨ Introduction</h3>
        <p><?php echo nl2br(esc_html($meta['intro'])); ?></p>
    </div>
<?php endif; ?>

<?php
    endwhile;
endif;

get_footer(); // Include the site footer
?>
