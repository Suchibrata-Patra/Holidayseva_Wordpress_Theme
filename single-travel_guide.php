<!-- This Code is responsible for generating the Travel Blog Page -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/Central_styling.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/single_travel_guide.css">
<?php
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();

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
        $featured_image_url = $meta['featured_image'] ? wp_get_attachment_url($meta['featured_image']) : '';
        // $featured_image_url = 'https://images.unsplash.com/photo-1751013781844-fa6a78089e49?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';

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

<div class="holidayseva_blog_hero_section" style="font-family: Arial;">
    <div class="overlay"></div>
    <div class="holidayseva_hero-content">
        <!-- <div class="holidayseva_tour_guide_breadcrumb">HolidaySeva > Travel Guide > <span>Surprise Me!</span></div> -->
        <h1 class="holidayseva_travel_guide_hero_title">Experience the Soul-Stirring<br> Treasures of Kakadu National
            Park</h1>
        <div class="holidayseva_travel_guide_author-box">
            <div class="holidayseva_travel_guide_author-name">S.Chakraborty 😊 </div>
            <div class="holidayseva_travel_guide_author-date">Last updated: 12th July 2025</div>
            <!-- <div class="holidayseva_travel_guide_author-icon"><center><img src="<?php echo get_template_directory_uri(); ?>/Assets/icons/down_arrow.svg" alt="Get Down to the trip details"></center></div> -->
        </div>
    </div>
</div>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">


<div class="travel-guide-container">
    <span style="font-size:14px;color:#AFAFAF;margin-top:80px !important;line-height:20px;">Engineering <span
            style="color:rgb(94, 94, 94);">, Backend, Data / ML</span></span>
    <h1>
        <!-- <?php the_title(); ?> -->
        Migrating Large-Scale Interactive Compute Workloads to Kubernetes Without Disruption
    </h1>
    <span style="font-size:12px;color:#AFAFAF;margin-top:80px !important;line-height:20px;">Engineering, Backend, Data /
        ML</span>
    <br>
    <!-- <div class="travel-guide-meta">
        <?php if ($meta['location']): ?>
        <p><strong>
                <?php echo esc_html($meta['location']); ?>
            </strong></p>
        <?php endif; ?>
        <?php if ($meta['duration']): ?>
        <p>Duration:
            <?php echo esc_html($meta['duration']); ?>
        </p>
        <?php endif; ?>
        <?php if ($meta['best_season']): ?>
        <p>Best Season:
            <?php echo esc_html($meta['best_season']); ?>
        </p>
        <?php endif; ?>
    </div> -->

    <?php
    $sections = [
        'intro' => '',
        'overview' => 'Destination Overview',
        'how_to_get' => 'How to Get There',
        'top_attractions' => 'Top Attractions',
        'where_to_stay' => 'Where to Stay',
        'eat_drink' => 'Eat & Drink',
        'top_reasons' => 'Top 5 Reasons to Visit',
        'cultural_tips' => 'Cultural Etiquette',
        'budget' => 'Budget Breakdown',
        'itinerary' => 'Itinerary',
        'personal_exp' => 'Personal Experiences',
        'travel_tips' => 'Travel Tips & Safety',
        'resources' => 'Useful Resources',
        'conclusion' => 'Final Thoughts'
    ];

    foreach ($sections as $key => $label):
        if (!empty($meta[$key])):
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
</div>

<!-- Related Article Content  -->
<section class="related-articles">
    <h2 class="section-title">Related articles</h2>
    <div class="travel-guide-grid">
        <?php
        $travel_guides = new WP_Query(array(
            'post_type' => 'travel_guide',
            'posts_per_page' => 5,  // Fetch only 5
            'post_status' => 'publish'
        ));

        if ($travel_guides->have_posts()):
            while ($travel_guides->have_posts()):
                $travel_guides->the_post();
                $categories = get_the_category();
                $category_names = array_map(function ($cat) {
                    return $cat->name;
                }, $categories);
                $categories_list = implode(', ', $category_names);

                // Custom featured image logic
                $custom_feat_id = get_post_meta(get_the_ID(), '_tg_featured_image', true);
                if ($custom_feat_id) {
                    $image_url = wp_get_attachment_image($custom_feat_id, 'medium_large');
                } else {
                    $image_url = '<img src="' . esc_url(get_template_directory_uri() . '/images/default.jpg') . '" alt="Default image">';
                }
                ?>
        <div class="travel-guide-card">
            <a href="<?php the_permalink(); ?>" style="text-decoration:none;">
                <div class="related_content_card_image">
                    <?php echo $image_url; ?>
                </div>
                <div class="related_content_card_content">
                    <span style="color:rgb(107, 107, 107);font-size:0.8rem;font-weight:400;">Holidayseva Travel
                        Guide</span>
                    <p class="related_content_card_meta">
                        <?php echo esc_html($categories_list); ?>
                    </p>
                    <h3 class="related_content_card_title">
                        <?php
                        $title = get_the_title();
                        if (mb_strlen($title) > 50) {
                            echo esc_html(mb_substr($title, 0, 48)) . '...';
                        } else {
                            echo esc_html($title);
                        }
                        ?>
                    </h3>
                    <p class="related_content_card_date">
                        <?php echo get_the_date(); ?> / Global
                    </p>
                </div>
            </a>
        </div>
        <?php endwhile;
            wp_reset_postdata();
        else: ?>
        <p>No travel guides found.</p>
        <?php endif; ?>

        <!-- ✅ Manually added 6th card styled like 'Most Popular' layout -->
<div class="travel-guide-card" id="sixth_related_card" style="display: flex; justify-content: space-between; gap: 15px; margin-bottom: 20px;padding:24px;background:none;">
    <span style="font-size:1.2rem;color:black;font-weight:600;border-bottom:0.5px solid rgb(203, 203, 203);">Most Popular</span>
    <a href="/your-custom-link" style="text-decoration: none; display: flex; flex: 1; gap: 7px;">
        <div class="related_content_card_text" style="flex: 1;">
            <span style="color: rgb(107, 107, 107); font-size: 0.8rem; font-weight: 500;">
                Engineering, Backend / 14 July / Global
            </span>
            <h3 style="font-size: 1rem; font-weight: 500; color: black; margin: 5px 0;">
                Reinventing Travel Systems for Scalable Performance
            </h3>
            <p style="font-size: 0.8rem; color: rgb(100, 100, 100); margin-top: 2px;">
                Special Feature
            </p>
        </div>
        <div class="related_content_card_image" style="width: 80px; min-width: 80px; height: 60px; overflow: hidden;">
            <img src="https://blog.uber-cdn.com/cdn-cgi/image/width=300,quality=80,onerror=redirect,format=auto/wp-content/uploads/2025/05/cover-photo-17466478352548.png" 
                 alt="Special Feature" 
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;">
        </div>
    </a>
    <a href="/your-custom-link" style="text-decoration: none; display: flex; flex: 1; gap: 15px;">
        <div class="related_content_card_text" style="flex: 1;">
            <span style="color: rgb(107, 107, 107); font-size: 0.8rem; font-weight: 500;">
                Engineering, Backend / 14 July / Global
            </span>
            <h3 style="font-size: 1rem; font-weight: 500; color: black; margin: 5px 0;">
                Reinventing Travel Systems for Scalable Performance
            </h3>
            <p style="font-size: 0.8rem; color: rgb(100, 100, 100); margin-top: 2px;">
                Special Feature
            </p>
        </div>
        <div class="related_content_card_image" style="width: 80px; min-width: 80px; height: 60px; overflow: hidden;">
            <img src="https://blog.uber-cdn.com/cdn-cgi/image/width=300,quality=80,onerror=redirect,format=auto/wp-content/uploads/2025/05/cover-photo-17478702183017.png" 
                 alt="Special Feature" 
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;">
        </div>
    </a>
    <a href="/your-custom-link" style="text-decoration: none; display: flex; flex: 1; gap: 15px;">
        <div class="related_content_card_text" style="flex: 1;">
            <span style="color: rgb(107, 107, 107); font-size: 0.8rem; font-weight: 500;">
                Engineering, Backend / 14 July / Global
            </span>
            <h3 style="font-size: 1rem; font-weight: 500; color: black; margin: 5px 0;">
                Reinventing Travel Systems for Scalable Performance
            </h3>
            <p style="font-size: 0.8rem; color: rgb(100, 100, 100); margin-top: 2px;">
                Special Feature
            </p>
        </div>
        <div class="related_content_card_image" style="width: 80px; min-width: 80px; height: 60px; overflow: hidden;">
            <img src="https://blog.uber-cdn.com/cdn-cgi/image/width=300,quality=80,onerror=redirect,format=auto/wp-content/uploads/2025/05/cover-17484716129443.jpg" 
                 alt="Special Feature" 
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;">
        </div>
    </a>
</div>


    </div>

<div style="text-align: center; margin: 20px 0;">
    <span style="font-size: 1 rem; border-bottom: 1px solid black; display: inline-block;font-weight:500;">
        View more stories
    </span>
</div>
</section>

<div
    style="display: flex; justify-content: center; align-items: center;background-color: rgb(229, 229, 229); padding: 20px; ">
    <!-- <label for="email-subscribe" style="font-size: 18px; font-weight: 500;">Stay up to date</label> -->

    <input type="email" id="email-subscribe" placeholder="Enter your email"
        style="padding: 15px 20px; font-size: 18px; border: 1px solid #ccc; border-radius: 50px 0px 0px 50px; width: 300px;"
        required />

    <button
        style="border: none; padding: 15px 30px; background-color: black; color: white; border-radius:0px 50px 50px 0px; font-size: 18px; cursor: pointer;border-color:black;border:black;">
        Subscribe
    </button>
</div>


<?php
    endwhile;
endif;
get_footer();
?>
<style>
    .holidayseva_blog_hero_section {
        position: relative;
        height: 70vh;
        background: url('<?php echo esc_url($featured_image_url); ?>') no-repeat center center / cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
        overflow: hidden;
    }
</style>