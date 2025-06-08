<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/Central_styling.css">
<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

    // Meta Text Fields
    $meta_keys = [
        'location', 'duration', 'best_season', 'where_to_stay', 'top_reasons', 'featured_image',
        'intro', 'overview', 'how_to_get', 'eat_drink', 'cultural_tips', 'budget',
        'itinerary', 'personal_exp', 'travel_tips', 'resources', 'conclusion', 'top_attractions'
    ];
    $meta = [];
    foreach ($meta_keys as $key) {
        $meta[$key] = get_post_meta(get_the_ID(), "_tg_$key", true);
    }

    // Main Featured Image
    $image_url = $meta['featured_image'] ? wp_get_attachment_url($meta['featured_image']) : '';

    // Section-specific images
    $image_fields = [
        'intro', 'overview', 'how_to_get', 'top_attractions', 'where_to_stay', 'eat_drink',
        'top_reasons', 'cultural_tips', 'budget', 'itinerary', 'personal_exp',
        'travel_tips', 'resources', 'conclusion'
    ];
    foreach ($image_fields as $field) {
        $meta["{$field}_image"] = get_post_meta(get_the_ID(), "_tg_{$field}_image", true);
    }
?>
<div class="hero-section">
    <div class="overlay"></div>
    <div class="hero-content">
        <div class="breadcrumb">HolidaySeva > Travel Guide > <span>Surprise Me!</span></div>
        <h1 class="hero-title">Experience the Soul-Stirring<br> Treasures of Kakadu National Park</h1>
        <div class="author-box">
            <div class="author-name">Swechchha Roy</div>
            <div class="author-date">Last updated: May 26, 2025</div>
        </div>
    </div>
</div>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
<div class="travel-guide-container">
    <h1>
        <?php the_title(); ?>
    </h1>

    <div class="travel-guide-meta">
        <?php if ($meta['location']) : ?>
        <p><strong>
                <?php echo esc_html($meta['location']); ?>
            </strong></p>
        <?php endif; ?>
        <?php if ($meta['duration']) : ?>
        <p>Duration:
            <?php echo esc_html($meta['duration']); ?>
        </p>
        <?php endif; ?>
        <?php if ($meta['best_season']) : ?>
        <p>Best Season:
            <?php echo esc_html($meta['best_season']); ?>
        </p>
        <?php endif; ?>
    </div>

    <?php
    $sections = [
        'intro'           => '✨ Introduction',
        'overview'        => '🌍 Destination Overview',
        'how_to_get'      => '🚗 How to Get There',
        'top_attractions' => '🏞️ Top Attractions',
        'where_to_stay'   => '🏨 Where to Stay',
        'eat_drink'       => '🍽️ Eat & Drink',
        'top_reasons'     => '🌟 Top 5 Reasons to Visit',
        'cultural_tips'   => '🧭 Cultural Etiquette',
        'budget'          => '💸 Budget Breakdown',
        'itinerary'       => '🗺️ Itinerary',
        'personal_exp'    => '📸 Personal Experiences',
        'travel_tips'     => '🧳 Travel Tips & Safety',
        'resources'       => '🔗 Useful Resources',
        'conclusion'      => '✍️ Final Thoughts'
    ];

    foreach ($sections as $key => $label) :
        if (!empty($meta[$key])) :
    ?>
    <div class="travel-guide-section">
        <h2>
            <?php echo esc_html($label); ?>
        </h2>
        <?php
                $img_id = $meta["{$key}_image"];
                if ($img_id) {
                    $img_url = wp_get_attachment_url($img_id);
                    if ($img_url) {
                        echo '<div class="section-img"><img src="' . esc_url($img_url) . '" alt="' . esc_attr($label) . ' Image"></div>';
                    }
                }
            ?>
        <p>
            <?php echo esc_html($meta[$key]); ?>
        </p>
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
<style>
    * {
        margin: 0px;
        font-family: Roboto;
    }

    .hero-section {
        position: relative;
        height: 100vh;
        background: url('<?php echo esc_url($image_url); ?>') no-repeat center center / cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
        font-family: Georgia, serif;
        padding: 0 20px;
        /* mobile breathing space */
        overflow: hidden;
        /* just in case of absolute children */
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        padding: 0 1px;
    }

    .breadcrumb {
        font-size: 14px;
        color: #ddd;
        margin-bottom: 10px;
    }

    .breadcrumb span {
        font-weight: bold;
        color: #f55;
    }

    .hero-title {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .author-box {
        font-size: 16px;
        margin-top: 20px;
    }

    .author-name {
        font-weight: bold;
    }

    .author-date {
        font-style: italic;
        font-size: 14px;
        color: #ccc;
    }
</style>
<style>
    .travel-guide-container {
        margin: 80px auto;
        padding: 0 2px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        color: #1c1c1e;
        background: #ffffff;
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
        white-space: pre-line;
        margin: 0;
    }

    .entry-content {
        font-size: 17px;
        color: #2c2c2c;
    }

    .section-img {
        margin: 30px 0;
        text-align: center;
    }

    .section-img img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .section-img img:hover {
        transform: scale(1.0001);
    }

    .featured-img {
        max-width: 100%;
        height: auto;
        border-radius: 16px;
        margin: 40px 0;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>