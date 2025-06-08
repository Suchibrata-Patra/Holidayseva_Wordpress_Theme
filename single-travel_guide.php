 <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/Central_styling.css">
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
    max-width: 800px;
    margin: 80px auto;
    padding: 0 24px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    line-height: 1.8;
    color: #1c1c1e;
    background: #ffffff;
}

.travel-guide-container img {
    max-width: 100%;
    height: auto;
    border-radius: 16px;
    margin: 40px 0;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}
.travel-guide-container img:hover {
    transform: scale(1.015);
}

.travel-guide-container h1 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #000;
    letter-spacing: -1px;
}

.travel-guide-meta {
    text-align: center;
    font-size: 15px;
    color: #888;
    margin-bottom: 50px;
    font-weight: 500;
}

.travel-guide-meta p {
    margin: 5px 0;
}

.travel-guide-section {
    margin-bottom: 64px;
    border-bottom: 1px solid #eee;
    padding-bottom: 48px;
}

.travel-guide-section h2 {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 18px;
    color: #111;
}

.travel-guide-section p {
    font-size: 17px;
    color: #333;
    line-height: 1.9;
    white-space: pre-line;
    margin: 0;
}

.entry-content {
    font-size: 17px;
    color: #2c2c2c;
    line-height: 1.9;
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

    <?php
    $sections = [
        'intro'           => ['✨ Introduction'],
        'overview'        => ['🌍 Destination Overview'],
        'how_to_get'      => ['🚗 How to Get There'],
        'top_attractions' => ['🏞️ Top Attractions'],
        'where_to_stay'   => ['🏨 Where to Stay'],
        'eat_drink'       => ['🍽️ Eat & Drink'],
        'top_reasons'     => ['🌟 Top 5 Reasons to Visit'],
        'cultural_tips'   => ['🧭 Cultural Etiquette'],
        'budget'          => ['💸 Budget Breakdown'],
        'itinerary'       => ['🗺️ Itinerary'],
        'personal_exp'    => ['📸 Personal Experiences'],
        'travel_tips'     => ['🧳 Travel Tips & Safety'],
        'resources'       => ['🔗 Useful Resources'],
        'conclusion'      => ['✍️ Final Thoughts']
    ];

    foreach ($sections as $key => $label) :
        if (!empty($meta[$key])) :
    ?>
        <div class="travel-guide-section">
            <h2><?php echo $label[0]; ?></h2>
            <p><?php echo esc_html($meta[$key]); ?></p>
        </div>
    <?php
        endif;
    endforeach;
    ?>

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
