<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Hook to add meta box on admin init
add_action('add_meta_boxes', 'tg_add_tour_details_meta_box');
function tg_add_tour_details_meta_box() {
    add_meta_box(
        'tg_tour_details',         // ID
        'Tour Details & Blog',     // Title
        'tg_render_tour_details',  // Callback
        'travel_guide',            // Post type — change if needed
        'normal',                  // Context (normal = main column)
        'high'                     // Priority
    );
}

// Render the meta box form with all fields, styles, and scripts inline
function tg_render_tour_details($post) {
    // Security nonce for verification
    wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

    // Load saved meta values
    $meta = [
        'location'       => get_post_meta($post->ID, '_tg_location', true),
        'duration'       => get_post_meta($post->ID, '_tg_duration', true),
        'best_season'    => get_post_meta($post->ID, '_tg_best_season', true),
        'where_to_stay'  => get_post_meta($post->ID, '_tg_where_to_stay', true),
        'top_reasons'    => get_post_meta($post->ID, '_tg_top_reasons', true),
        'featured_image' => get_post_meta($post->ID, '_tg_featured_image', true),
        'blog_content'   => get_post_meta($post->ID, '_tg_blog_content', true),
    ];
    ?>
    <style>
    .tg-meta-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }
    .tg-main {
        flex: 3;
        min-width: 400px;
        background: #fff;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }
    .tg-sidebar {
        flex: 1.2;
        min-width: 280px;
        background: #f9f9f9;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        height: fit-content;
    }
    .tg-sidebar p {
        margin-bottom: 1em;
    }
    .tg-image-wrapper img {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        border-radius: 6px;
        max-width: 100%;
        height: auto;
    }
    </style>

    <div class="tg-meta-container">
        <div class="tg-main">
            <label for="tg_blog_content"><strong>Blog Post Content:</strong></label>
            <?php
            wp_editor(
                wp_kses_post($meta['blog_content']),
                'tg_blog_content',
                [
                    'textarea_name' => 'tg_blog_content',
                    'media_buttons' => true,
                    'textarea_rows' => 15,
                    'teeny' => false,
                    'quicktags' => true,
                ]
            );
            ?>
        </div>

        <div class="tg-sidebar">
            <p>
                <label for="tg_location"><strong>Location:</strong></label><br>
                <input type="text" name="tg_location" id="tg_location"
                    value="<?php echo esc_attr($meta['location']); ?>"
                    placeholder="e.g., Darjeeling, Rajasthan" class="widefat">
            </p>

            <p>
                <label for="tg_duration"><strong>Duration:</strong></label><br>
                <input type="text" name="tg_duration" id="tg_duration"
                    value="<?php echo esc_attr($meta['duration']); ?>"
                    placeholder="e.g., 3 days, 1 week" class="widefat">
            </p>

            <p>
                <label for="tg_best_season"><strong>Best Season to Visit:</strong></label><br>
                <input type="text" name="tg_best_season" id="tg_best_season"
                    value="<?php echo esc_attr($meta['best_season']); ?>"
                    placeholder="e.g., October - March" class="widefat">
            </p>

            <p>
                <label for="tg_where_to_stay"><strong>Where to Stay:</strong></label><br>
                <textarea name="tg_where_to_stay" id="tg_where_to_stay"
                    placeholder="Recommended hotels, homestays, etc." class="widefat" rows="4"><?php echo esc_textarea($meta['where_to_stay']); ?></textarea>
            </p>

            <p>
                <label for="tg_top_reasons"><strong>Top 5 Reasons to Visit:</strong></label><br>
                <textarea name="tg_top_reasons" id="tg_top_reasons"
                    placeholder="Breathtaking views, culture, food, history..." class="widefat" rows="5"><?php echo esc_textarea($meta['top_reasons']); ?></textarea>
            </p>

            <p><strong>Upload Featured Image:</strong></p>
            <div class="tg-image-wrapper">
                <input type="hidden" name="tg_featured_image" id="tg_featured_image" value="<?php echo esc_attr($meta['featured_image']); ?>">

                <?php if ($meta['featured_image']) : ?>
                    <img id="tg_image_preview" src="<?php echo esc_url(wp_get_attachment_url($meta['featured_image'])); ?>" >
                <?php else : ?>
                    <p><em>No image selected yet.</em></p>
                    <img id="tg_image_preview" style="display:none;">
                <?php endif; ?>

                <button type="button" class="button" id="upload_tg_image_button">Upload Image</button>
                <button type="button" class="button" id="remove_tg_image_button" style="margin-top: 5px;">Remove Image</button>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        var mediaUploader;

        $('#upload_tg_image_button').click(function(e) {
            e.preventDefault();

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Featured Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });

            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#tg_featured_image').val(attachment.id);
                $('#tg_image_preview').attr('src', attachment.url).show();
            });

            mediaUploader.open();
        });

        $('#remove_tg_image_button').click(function() {
            $('#tg_featured_image').val('');
            $('#tg_image_preview').hide();
        });
    });
    </script>
    <?php
}

// Save meta on post save
add_action('save_post_travel_guide', 'tg_save_tour_details_meta');
function tg_save_tour_details_meta($post_id) {
    if (
        !isset($_POST['travel_guide_nonce']) ||
        !wp_verify_nonce($_POST['travel_guide_nonce'], 'travel_guide_nonce_action')
    ) {
        return;
    }

    // Prevent autosave override
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Sanitize & save fields
    $fields = [
        '_tg_location'       => sanitize_text_field($_POST['tg_location'] ?? ''),
        '_tg_duration'       => sanitize_text_field($_POST['tg_duration'] ?? ''),
        '_tg_best_season'    => sanitize_text_field($_POST['tg_best_season'] ?? ''),
        '_tg_where_to_stay'  => sanitize_textarea_field($_POST['tg_where_to_stay'] ?? ''),
        '_tg_top_reasons'    => sanitize_textarea_field($_POST['tg_top_reasons'] ?? ''),
        '_tg_featured_image' => intval($_POST['tg_featured_image'] ?? 0),
        '_tg_blog_content'   => wp_kses_post($_POST['tg_blog_content'] ?? ''),
    ];

    foreach ($fields as $key => $value) {
        update_post_meta($post_id, $key, $value);
    }
}