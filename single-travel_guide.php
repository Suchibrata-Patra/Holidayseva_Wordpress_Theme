<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

    // Fetching all fields individually
    $meta = [];
    $meta['location']       = get_post_meta(get_the_ID(), '_tg_location', true);
    $meta['duration']       = get_post_meta(get_the_ID(), '_tg_duration', true);
    $meta['best_season']    = get_post_meta(get_the_ID(), '_tg_best_season', true);
    $meta['where_to_stay']  = get_post_meta(get_the_ID(), '_tg_where_to_stay', true);
    $meta['top_reasons']    = get_post_meta(get_the_ID(), '_tg_top_reasons', true);
    $meta['featured_image'] = get_post_meta(get_the_ID(), '_tg_featured_image', true);
    $meta['intro']          = get_post_meta(get_the_ID(), '_tg_intro', true);
    $meta['overview']       = get_post_meta(get_the_ID(), '_tg_overview', true);
    $meta['how_to_get']     = get_post_meta(get_the_ID(), '_tg_how_to_get', true);
    $meta['eat_drink']      = get_post_meta(get_the_ID(), '_tg_eat_drink', true);
    $meta['cultural_tips']  = get_post_meta(get_the_ID(), '_tg_cultural_tips', true);
    $meta['budget']         = get_post_meta(get_the_ID(), '_tg_budget', true);
    $meta['itinerary']      = get_post_meta(get_the_ID(), '_tg_itinerary', true);
    $meta['personal_exp']   = get_post_meta(get_the_ID(), '_tg_personal_exp', true);
    $meta['travel_tips']    = get_post_meta(get_the_ID(), '_tg_travel_tips', true);
    $meta['resources']      = get_post_meta(get_the_ID(), '_tg_resources', true);
    $meta['conclusion']     = get_post_meta(get_the_ID(), '_tg_conclusion', true);
    $meta['top_attractions']= get_post_meta(get_the_ID(), '_tg_top_attractions', true);

    $image_url = $meta['featured_image'] ? wp_get_attachment_url($meta['featured_image']) : '';
?>

<style>
.travel-guide-container {
    /* max-width: 850px; */
    margin: 50px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', sans-serif;
    line-height: 1.7;
}
.travel-guide-container img {
    max-width: 100%;
    border-radius: 12px;
    margin: 30px 0;
}
.travel-guide-container h1 {
    font-size: 38px;
    margin-bottom: 5px;
}
.travel-guide-meta {
    text-align: center;
    margin-bottom: 40px;
    color: #666;
}
.travel-guide-section {
    margin-bottom: 40px;
}
.travel-guide-section h2 {
    font-size: 24px;
    border-bottom: 2px solid #eee;
    padding-bottom: 8px;
    margin-bottom: 15px;
}
.travel-guide-section p {
    white-space: pre-line;
}
</style>

<div class="travel-guide-container">

    <?php if ($image_url): ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="Featured Image">
    <?php endif; ?>

    <h1><?php the_title(); ?></h1>

    <div class="travel-guide-meta">
        <?php if ($meta['location']) : ?><p>📍 <strong><?php echo esc_html($meta['location']); ?></strong></p><?php endif; ?>
        <?php if ($meta['duration']) : ?><p>⏳ Duration: <?php echo esc_html($meta['duration']); ?></p><?php endif; ?>
        <?php if ($meta['best_season']) : ?><p>🌤️ Best Season: <?php echo esc_html($meta['best_season']); ?></p><?php endif; ?>
    </div>

    <?php if ($meta['intro']) : ?>
        <div class="travel-guide-section">
            <h2>✨ Introduction</h2>
            <p><?php echo esc_html($meta['intro']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['overview']) : ?>
        <div class="travel-guide-section">
            <h2>🌍 Destination Overview</h2>
            <p><?php echo esc_html($meta['overview']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['how_to_get']) : ?>
        <div class="travel-guide-section">
            <h2>🚗 How to Get There</h2>
            <p><?php echo esc_html($meta['how_to_get']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['top_attractions']) : ?>
        <div class="travel-guide-section">
            <h2>🏞️ Top Attractions</h2>
            <p><?php echo esc_html($meta['top_attractions']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['where_to_stay']) : ?>
        <div class="travel-guide-section">
            <h2>🏨 Where to Stay</h2>
            <p><?php echo esc_html($meta['where_to_stay']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['eat_drink']) : ?>
        <div class="travel-guide-section">
            <h2>🍽️ Eat & Drink</h2>
            <p><?php echo esc_html($meta['eat_drink']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['top_reasons']) : ?>
        <div class="travel-guide-section">
            <h2>🌟 Top 5 Reasons to Visit</h2>
            <p><?php echo esc_html($meta['top_reasons']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['cultural_tips']) : ?>
        <div class="travel-guide-section">
            <h2>🧭 Cultural Etiquette</h2>
            <p><?php echo esc_html($meta['cultural_tips']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['budget']) : ?>
        <div class="travel-guide-section">
            <h2>💸 Budget Breakdown</h2>
            <p><?php echo esc_html($meta['budget']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['itinerary']) : ?>
        <div class="travel-guide-section">
            <h2>🗺️ Itinerary</h2>
            <p><?php echo esc_html($meta['itinerary']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['personal_exp']) : ?>
        <div class="travel-guide-section">
            <h2>📸 Personal Experiences</h2>
            <p><?php echo esc_html($meta['personal_exp']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['travel_tips']) : ?>
        <div class="travel-guide-section">
            <h2>🧳 Travel Tips & Safety</h2>
            <p><?php echo esc_html($meta['travel_tips']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['resources']) : ?>
        <div class="travel-guide-section">
            <h2>🔗 Useful Resources</h2>
            <p><?php echo esc_html($meta['resources']); ?></p>
        </div>
    <?php endif; ?>

    <?php if ($meta['conclusion']) : ?>
        <div class="travel-guide-section">
            <h2>✍️ Final Thoughts</h2>
            <p><?php echo esc_html($meta['conclusion']); ?></p>
        </div>
    <?php endif; ?>

    <div class="travel-guide-section">
        <h2>📜 Full Travel Story</h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>

</div>

<?php
    endwhile;
endif;

get_footer();
?>
