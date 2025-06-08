<?php
// Ensure this runs only within WP admin edit screen context
if (!defined('ABSPATH') || !isset($post)) return;

// Security nonce
wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

add_action('save_post_travel_guide', 'tg_save_meta_fields');
function tg_save_meta_fields($post_id) {
    // Verify nonce
    if (
        !isset($_POST['travel_guide_nonce']) || 
        !wp_verify_nonce($_POST['travel_guide_nonce'], 'travel_guide_nonce_action')
    ) {
        return;
    }

    // Autosave check
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Permissions check
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Sanitize and save each field
    $fields = [
        '_tg_location'       => sanitize_text_field($_POST['tg_location'] ?? ''),
        '_tg_duration'       => sanitize_text_field($_POST['tg_duration'] ?? ''),
        '_tg_best_season'    => sanitize_text_field($_POST['tg_best_season'] ?? ''),
        '_tg_where_to_stay'  => sanitize_textarea_field($_POST['tg_where_to_stay'] ?? ''),
        '_tg_top_reasons'    => sanitize_textarea_field($_POST['tg_top_reasons'] ?? ''),
        '_tg_featured_image' => intval($_POST['tg_featured_image'] ?? 0),
    ];

    foreach ($fields as $key => $value) {
        update_post_meta($post_id, $key, $value);
    }
}


// Retrieve saved meta values
$meta = [
    'location'         => get_post_meta($post->ID, '_tg_location', true),
    'duration'         => get_post_meta($post->ID, '_tg_duration', true),
    'best_season'      => get_post_meta($post->ID, '_tg_best_season', true),
    'where_to_stay'    => get_post_meta($post->ID, '_tg_where_to_stay', true),
    'top_reasons'      => get_post_meta($post->ID, '_tg_top_reasons', true),
    'featured_image'   => get_post_meta($post->ID, '_tg_featured_image', true),
];
?>

<style>
.tg-meta-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.tg-main, .tg-sidebar {
    padding: 15px;
    background: #fdfdfd;
    border: 1px solid #ccc;
    border-radius: 8px;
}
.tg-main {
    flex: 3;
    min-width: 400px;
}
.tg-sidebar {
    flex: 1.2;
    min-width: 280px;
}
.tg-image-wrapper img {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    border-radius: 6px;
}
</style>

<div class="tg-meta-container">
    <div class="tg-main">
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
    </div>

    <div class="tg-sidebar">
        <p><strong>Upload Featured Image:</strong></p>
        <div class="tg-image-wrapper">
            <input type="hidden" name="tg_featured_image" id="tg_featured_image" value="<?php echo esc_attr($meta['featured_image']); ?>">

            <?php if ($meta['featured_image']) : ?>
                <img id="tg_image_preview" src="<?php echo esc_url(wp_get_attachment_url($meta['featured_image'])); ?>" style="max-width: 100%; height: auto;">
            <?php else : ?>
                <p><em>No image selected yet.</em></p>
                <img id="tg_image_preview" style="max-width: 100%; height: auto; display: none;">
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