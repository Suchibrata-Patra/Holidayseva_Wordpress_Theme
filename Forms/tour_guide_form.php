<?php
// Ensure this runs only within WP admin edit screen context
if (!defined('ABSPATH') || !isset($post)) return;

// Security nonce
wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

// Define section fields
$fields = [
    'location', 'duration', 'best_season', 'where_to_stay', 'top_reasons', 'featured_image',
    'intro', 'overview', 'how_to_get', 'eat_drink', 'cultural_tips', 'budget', 'itinerary',
    'personal_exp', 'travel_tips', 'resources', 'conclusion', 'top_attractions'
];

// Add image fields dynamically
$image_fields = array_map(fn($field) => "{$field}_image", $fields);
$all_fields = array_merge($fields, $image_fields);

// Retrieve all meta values
$meta = [];
foreach ($all_fields as $field) {
    $meta[$field] = get_post_meta($post->ID, "_tg_$field", true);
}
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
        <?php foreach ($fields as $field): ?>
            <?php if ($field === 'featured_image') continue; ?>
            <p>
                <label for="tg_<?php echo $field; ?>"><strong><?php echo ucwords(str_replace('_', ' ', $field)); ?>:</strong></label><br>
                <?php if (in_array($field, ['location', 'duration', 'best_season'])): ?>
                    <input type="text" name="tg_<?php echo $field; ?>" id="tg_<?php echo $field; ?>" class="widefat"
                        value="<?php echo esc_attr($meta[$field]); ?>">
                <?php else: ?>
                    <textarea name="tg_<?php echo $field; ?>" id="tg_<?php echo $field; ?>" class="widefat" rows="3"><?php echo esc_textarea($meta[$field]); ?></textarea>
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
        
        <hr><h2>Section-wise Image Uploads</h2>
        <?php foreach ($fields as $field): ?>
            <div style="margin-bottom: 25px;">
                <p><strong><?php echo ucwords(str_replace('_', ' ', $field)); ?> Image:</strong></p>
                <input type="hidden" name="tg_<?php echo $field; ?>_image" id="tg_<?php echo $field; ?>_image" value="<?php echo esc_attr($meta["{$field}_image"]); ?>">
                <div class="tg-image-wrapper">
                    <?php if ($meta["{$field}_image"]) : ?>
                        <img id="tg_<?php echo $field; ?>_preview" src="<?php echo esc_url(wp_get_attachment_url($meta["{$field}_image"])); ?>" style="max-width: 100%; height: auto;">
                    <?php else : ?>
                        <p><em>No image selected yet.</em></p>
                        <img id="tg_<?php echo $field; ?>_preview" style="max-width: 100%; height: auto; display: none;">
                    <?php endif; ?>
                    <button type="button" class="button upload_image_button" data-target="<?php echo $field; ?>">Upload Image</button>
                    <button type="button" class="button remove_image_button" data-target="<?php echo $field; ?>" style="margin-top: 5px;">Remove</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
jQuery(document).ready(function($){
    let mediaUploader;

    function openMediaUploader(target) {
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Select Image for ' + target.replace(/_/g, ' '),
            button: { text: 'Use this image' },
            multiple: false
        });
        mediaUploader.on('select', function() {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            $(`#tg_${target}_image`).val(attachment.id);
            $(`#tg_${target}_preview`).attr('src', attachment.url).show();
        });
        mediaUploader.open();
    }

    $('.upload_image_button').click(function(e) {
        e.preventDefault();
        const target = $(this).data('target');
        openMediaUploader(target);
    });

    $('.remove_image_button').click(function(e) {
        e.preventDefault();
        const target = $(this).data('target');
        $(`#tg_${target}_image`).val('');
        $(`#tg_${target}_preview`).hide();
    });
});
</script>
