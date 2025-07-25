<!-- This Code is responsible for generating the Travel Blog Page -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/Central_styling.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/single_travel_guide.css">
<title>HolidaySeva-Travel Guide</title>
<?php
if (isset($_GET['action']) && $_GET['action'] === 'live_travel_search' && isset($_GET['term'])) {
    header('Content-Type: application/json');
    $search_term = sanitize_text_field($_GET['term']);
    global $wpdb;
    $like = '%' . $wpdb->esc_like($search_term) . '%';
    $results = $wpdb->get_results(
        $wpdb->prepare("
            SELECT ID, post_title
            FROM {$wpdb->prefix}posts
            WHERE post_type = %s
            AND post_status = 'publish'
            AND post_title LIKE %s
            ORDER BY post_date DESC
            LIMIT 10
        ", 'travel_guide', $like)
    );
    $response = [];
    foreach ($results as $post) {
        // Get the custom featured image ID
        $custom_feat_id = get_post_meta($post->ID, '_tg_featured_image', true);
        // Get image URL from attachment ID
        $image_url = $custom_feat_id ? wp_get_attachment_image_url($custom_feat_id, 'medium_large') : null;
        $response[] = [
            'title' => get_the_title($post->ID),
            'link' => get_permalink($post->ID),
            'image' => $image_url ?: get_template_directory_uri() . '/images/default.jpg'
        ];
    }
    echo json_encode($response);
    exit;
}
?>
<?php get_header(); ?>

<!-- Full Width Background Selection -->
<div id="search_bar_background" style="width: 100%; background: url(https://theapplication.in/wp-content/uploads/2024/11/Search-Form-Background-image-for-TheApplication.webp); padding: 100px 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; box-sizing: border-box;">
  <!-- Search Container -->
  <div id="search_container" style="position: relative; width: 88%;">
    <input 
      type="text" 
      id="live-travel-search" 
      placeholder="Search for place, experience, or guide..." 
      style="width: 100%; padding: 20px 60px 20px 24px; font-size: 18px; font-weight: 500; border-radius: 0px; border: none; outline: none; background: #fff; box-shadow: 0 8px 20px rgba(0,0,0,0.1); font-family: 'Segoe UI', sans-serif;"
    />
    <style>
      #live-travel-search::placeholder {color: #aaa;font-weight: 400;}
    </style>
    <!-- Search Icon Button -->
    <button 
      type="button" 
      style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#555" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="10" cy="10" r="7" />
        <line x1="15" y1="15" x2="21" y2="21" />
      </svg>
    </button>
  </div>

  <!-- Search Result Container -->
  <div 
    id="search-results" 
    style="margin-top: -40px; width: 88%;background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); display: none; max-height: 50vh; overflow-y: auto; padding: 55px 24px 24px 24px;">
  </div>
</div>

<!-- LIVE SEARCH BAR (No functions.php needed) -->
<script>
function debounce(func, delay) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('live-travel-search');
    const resultBox = document.getElementById('search-results');

    // Hide results when clicking outside
    document.addEventListener('click', function (e) {
        const isClickInsideInput = input.contains(e.target);
        const isClickInsideResults = resultBox.contains(e.target);
        if (!isClickInsideInput && !isClickInsideResults) {
            resultBox.style.display = 'none';
        }
    });

    input.addEventListener('input', debounce(function () {
        const searchVal = input.value.trim();
        if (searchVal.length < 2) {
            resultBox.innerHTML = '';
            resultBox.style.display = 'none';
            return;
        }

        fetch('<?php echo esc_url(home_url('/wp-json/holidayseva/v1/travel-search')); ?>?term=' + encodeURIComponent(searchVal))
            .then(res => res.json())
            .then(data => {
                if (data.length > 0) {
                    resultBox.innerHTML = data.map(item => `
  <div onclick="window.location.href='${item.link}'"
       style="display: flex; align-items: flex-start; justify-content: space-between; gap: 20px; padding: 20px 10px; border-bottom: 1px solid #eee; cursor: pointer;">
    <div style="flex: 1;">
      <p style="color: #7c7c7c; font-size: 13px; margin: 0 0 6px 0;">Engineering, Backend / 14 July / Global</p>
      <h3 style="font-size: 18px; color: #111; font-weight: 600; margin: 0 0 8px 0;">${item.title}</h3>
      <p style="font-size: 14px; color: #666; margin: 0;">Special Feature</p>
    </div>

    <div style="width: 100px; height: 70px; border-radius: 6px; overflow: hidden; flex-shrink: 0;">
      <img src="${item.image}" alt="thumb" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
  </div>
`).join('');

                    resultBox.style.display = 'block';
                } else {
                    resultBox.innerHTML = '<div style="padding:10px;">No results found</div>';
                    resultBox.style.display = 'block';
                }
            });
    }, 300));
});
</script>

<!-- This Section is Responsible for the Making the Search Bars-->
<div id="ai-tour-section" style="display: flex; width: 85%; max-width: 1400px; margin: auto; border: none; font-family: Arial, sans-serif;">
    <!-- Left Image Section (80%) -->
    <div id="image-section" style="flex: 7;">
        <img id="cityscape-image" src="https://holidayseva.com/wp-content/uploads/2025/07/Screenshot-2025-07-14-at-6.23.24-PM.png" alt="Cityscape" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    
    <!-- Right Content Section (20%) -->
    <div id="content-section" style="flex: 3; background-color: #f9f9f9; padding: 40px;">
        <p id="tech-tagline" style="font-size: 12px; color: #666; margin-bottom: 10px;">inhouse AI, ML developed by Holidayseva</p>
        
        <h2 id="section-title" style="font-size: 24px; margin-bottom: 20px; line-height: 1.3;">
            Reinforcement Learning for Picking Best Tour Destination
        </h2>
        
        <p id="main-description" style="font-size: 15px; line-height: 1.6; color: #444;">
            At HolidaySeva, we leverage cutting-edge advancements in Machine Learning and Artificial Intelligence to intelligently analyze vast datasets, detect travel trends, and craft hyper-personalized travel itineraries. Our systems continuously learn and adapt to ensure you discover not just good plans, but the perfect travel experiences — curated uniquely for your preferences, timing, and lifestyle.
        </p>
        
        <p id="date-location" style="font-size: 13px; color: #999; margin-top: 20px;">14th July / INDIA</p>
        <button id="cta-button" style="padding:15px 40px; background-color:black;border:none;border-radius:50px;color:white;">Know More</button>
    </div>
</div>
<style>
    @media only screen and (max-width: 480px){
        #ai-tour-section{
            width:100% !important;
        }
        #image-section{
            display:none;
        }
        #content-section{
            padding:10px !important;
        }
        #section-title{
            font-size:0.9rem !important;
        }
        #main-description{
            font-size:0.7rem !important;
        }
        #cta-button{
            padding:5px 10px !important;
            font-size:12px !important;
            border-radius:50px !important;
        }
        #date-location{
            font-size:8px !important;
        }
        #search_bar_background{
            background: none !important;
            padding: 0px !important;
        }
        #live-travel-search::placeholder {
        color: #aaa;
        font-weight: 400;
        font-size:0.8rem !important;
      }
      #live-travel-search {
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
        padding: 10px !important;
      }
      #search_container{
        width:100% !important;
      }
      .related_content_card_title{
        font-size:15px !important;
      }
    }
</style>

<section class="related-articles">
    <h1 class="section-title">Best Articles</h1>
    <div class="travel-guide-grid">
        <?php
        $travel_guides = new WP_Query(array(
            'post_type' => 'travel_guide',
            'posts_per_page' => 15,  // Fetch only 15
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
    <div class="related_content_card_image">
        <a href="<?php the_permalink(); ?>" style="text-decoration:none;">
            <?php echo $image_url; ?>
        </a>
    </div>
    <div class="related_content_card_content">
        <span style="color:rgb(107, 107, 107);font-size:0.8rem;font-weight:400;">Holidayseva Travel Guide</span>
        <p class="related_content_card_meta">
            <?php echo esc_html($categories_list); ?>
        </p>
        <h3 class="related_content_card_title">
            <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;">
                <?php
                $title = get_the_title();
                if (mb_strlen($title) > 50) {
                    echo esc_html(mb_substr($title, 0, 48)) . '...';
                } else {
                    echo esc_html($title);
                }
                ?>
            </a>
        </h3>
        <p class="related_content_card_date">
            <?php echo get_the_date(); ?> / Global
        </p>
    </div>
</div>

        <?php endwhile;
            wp_reset_postdata();
        else: ?>
        <p>No travel guides found.</p>
        <?php endif; ?>

        <!-- Manually added 6th card styled like 'Most Popular' layout -->
      
         <div style="display: flex; flex-direction: column; gap: 20px; padding:30px;">
               <span style="font-size:1.3rem; color:black; font-weight:600; border-bottom:0.7px solid rgb(207, 207, 207); padding-bottom:6px; display:inline-block;">Most Popular</span>
    <!-- Card 1 -->
    <div style="display: flex; align-items: flex-start; gap: 15px;">
        <a href="/your-custom-link_1" style="text-decoration: none; display: flex; gap: 15px; flex: 1;">
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
    </div>

    <!-- Card 2 -->
    <div style="display: flex; align-items: flex-start; gap: 15px;">
        <a href="/your-custom-link_2" style="text-decoration: none; display: flex; gap: 15px; flex: 1;">
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
    </div>

    <!-- Card 3 -->
    <div style="display: flex; align-items: flex-start; gap: 15px;">
        <a href="/your-custom-link_3" style="text-decoration: none; display: flex; gap: 15px; flex: 1;">
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
</div>
</div>
        </section>
        <div style="text-align: center; margin: 20px 0;">
    <span style="font-size: 1 rem; border-bottom: 1.2px solid rgb(174, 174, 174); display: inline-block;font-weight:500;">
        View more stories
    </span>
</div>
<?php
get_footer();
?>