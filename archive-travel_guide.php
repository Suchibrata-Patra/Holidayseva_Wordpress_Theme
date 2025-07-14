<!-- This Code is responsible for generating the Travel Blog Page -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/Central_styling.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/single_travel_guide.css">
<title>HolidaySeva - Travel Guide</title>
<?php
get_header();
?>
<br><br>
<div style="display: flex; width: 85%; max-width: 1400px; margin: auto; border: 1px solid #eee; font-family: Arial, sans-serif;">
    
    <!-- Left Image Section (80%) -->
    <div style="flex: 7;">
        <img src="https://blog.uber-cdn.com/cdn-cgi/image/width=1536,quality=80,onerror=redirect,format=auto/wp-content/uploads/2025/07/cover-17514078235579.jpg" alt="Cityscape" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    
    <!-- Right Content Section (20%) -->
    <div style="flex: 3; background-color: #f9f9f9; padding: 40px;">
        <p style="font-size: 12px; color: #666; margin-bottom: 10px;">Engineering, Data / ML, Uber AI</p>
        
        <h2 style="font-size: 24px; margin-bottom: 20px; line-height: 1.3;">
            Reinforcement Learning for Modeling Marketplace Balance
        </h2>
        
        <p style="font-size: 15px; line-height: 1.6; color: #444;">
            Uber uses reinforcement learning to optimize matching and better balance drivers with demand in real time. By considering long-term outcomes, we improve efficiency and increase driver earnings by proactively aligning drivers with demand.
        </p>
        
        <p style="font-size: 13px; color: #999; margin-top: 20px;">2 July / Global</p>
    </div>

</div>

<section class="related-articles">
    <h2 class="section-title">Related articles</h2>
    <div class="travel-guide-grid">
        <?php
        $travel_guides = new WP_Query(array(
            'post_type' => 'travel_guide',
            'posts_per_page' => 15,  // Fetch only 5
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