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
        // $featured_image_url = $meta['featured_image'] ? wp_get_attachment_url($meta['featured_image']) : '';
        $featured_image_url = 'https://images.unsplash.com/photo-1751013781844-fa6a78089e49?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';

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



<div class="travel-guide-wrapper" style="display: flex;">
    <!-- Sticky Sidebar -->
    <nav class="travel-sidebar">
        <ul id="scrollspy-nav">
            <li><a href="#intro">Introduction</a></li>
            <li><a href="#overview">Destination Overview</a></li>
            <li><a href="#how_to_get">How to Get There</a></li>
            <li><a href="#top_attractions">Top Attractions</a></li>
            <li><a href="#where_to_stay">Where to Stay</a></li>
            <li><a href="#eat_drink">Eat & Drink</a></li>
            <li><a href="#top_reasons">Top 5 Reasons to Visit</a></li>
            <li><a href="#cultural_tips">Cultural Etiquette</a></li>
            <li><a href="#budget">Budget Breakdown</a></li>
            <li><a href="#itinerary">Itinerary</a></li>
            <li><a href="#personal_exp">Personal Experiences</a></li>
            <li><a href="#travel_tips">Travel Tips & Safety</a></li>
            <li><a href="#resources">Useful Resources</a></li>
            <li><a href="#conclusion">Final Thoughts</a></li>
        </ul>
    </nav>

    <!-- Travel Guide Main Content -->
    <div class="travel-guide-container">
        <!-- Your Existing PHP Content Goes Here -->
    </div>
</div>






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
        'intro' => 'Introduction',
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
            'post_type'      => 'travel_guide',
            'posts_per_page' => 6,
            'post_status'    => 'publish'
        ));

        if ($travel_guides->have_posts()):
            while ($travel_guides->have_posts()):
                $travel_guides->the_post();
                $categories = get_the_category();
                $category_names = array_map(function ($cat) {
                    return $cat->name;
                }, $categories);
                $categories_list = implode(', ', $category_names);

                // Check if the post has thumbnail
                $image_html = '';
                if (has_post_thumbnail()) {
                    $image_html = get_the_post_thumbnail(null, 'medium_large');
                } else {
                    $image_html = '<img src="' . esc_url($featured_image_url) . '" alt="Default image">';
                }
                ?>
        <div class="travel-guide-card">
            <a href="<?php the_permalink(); ?>" style="text-decoration:none;">
                <div class="related_content_card_image">
                    <?php echo $image_html; ?>
                </div>
                <div class="related_content_card_content">
                    <span style="color:rgb(107, 107, 107);font-size:0.8rem;font-weight:400;">Holidayseva Travel
                        Guide</span>
                    <p class="related_content_card_meta">
                        <?php echo esc_html($categories_list); ?>
                    </p>
                    <h3 class="related_content_card_title">
                        <?php the_title(); ?>
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
    </div>
</section>

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

<div style="display: flex; align-items: center; gap: 20px; background-color: rgb(229, 229, 229); padding: 20px;">
    <div>Stay up to date with the latest from Uber Engineering</div>
    <div>
        <button
            style="border: none; padding: 20px 30px; background-color: black; color: white; border-radius: 10px; font-size: 20px;">
            Follow on LinkedIn
        </button>
    </div>
    <div style="margin-left: auto; cursor: pointer; font-weight: bold;">X</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".travel-guide-section");
    const navLinks = document.querySelectorAll("#scrollspy-nav a");

    window.addEventListener("scroll", () => {
        let fromTop = window.scrollY + 120; // offset

        sections.forEach(section => {
            const id = section.getAttribute("id");
            if (!id) return;

            if (
                section.offsetTop <= fromTop &&
                section.offsetTop + section.offsetHeight > fromTop
            ) {
                navLinks.forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === "#" + id) {
                        link.classList.add("active");
                    }
                });
            }
        });
    });
});
</script>
