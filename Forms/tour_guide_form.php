<?php
if (!defined('ABSPATH') || !isset($post)) return;

// Security nonce
wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

// Define content sections
$fields = [
   'intro', 'overview', 'how_to_get', 'top_attractions', 'where_to_stay', 'eat_drink',
        'top_reasons', 'cultural_tips', 'budget', 'itinerary', 'personal_exp',
        'travel_tips', 'resources', 'conclusion'
];

// Create image field names
$image_fields = array_map(fn($field) => "{$field}_image", $fields);
$all_fields = array_merge($fields, $image_fields);

// Retrieve meta data
$meta = [];
foreach ($all_fields as $field) {
    $meta[$field] = get_post_meta($post->ID, "_tg_$field", true);
}
?>

<style>
.tg-meta-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}
.tg-main, .tg-sidebar {
    padding: 20px;
    background: #fafafa;
    border: 1px solid #ddd;
    border-radius: 10px;
}
.tg-main {
    flex: 2.5;
    min-width: 450px;
}
.tg-sidebar {
    flex: 1.5;
    min-width: 300px;
    max-width: 500px;
}
.tg-image-wrapper img {
    border: 1px solid #ccc;
    margin-top: 10px;
    border-radius: 6px;
    max-width: 100%;
    height: auto;
}
.tg-sidebar-section {
    margin-bottom: 35px;
}
</style>

<div class="tg-meta-container">

    <!-- TEXT INPUT COLUMN -->
    <div class="tg-main">
        <h1>Travel Guide Content</h1>
        <?php foreach ($fields as $field): ?>
            <?php if ($field === 'featured_image') continue; ?>
            <p>
                <label for="tg_<?php echo $field; ?>"><strong><?php echo ucwords(str_replace('_', ' ', $field)); ?>:</strong></label><br>
                <?php if (in_array($field, ['location', 'duration', 'best_season'])): ?>
                    <input type="text" name="tg_<?php echo $field; ?>" id="tg_<?php echo $field; ?>" class="widefat"
                        value="<?php echo esc_attr($meta[$field]); ?>">
                <?php else: ?>
                    <!-- <textarea name="tg_<?php echo $field; ?>" id="tg_<?php echo $field; ?>" class="widefat" rows="3"><?php echo esc_textarea($meta[$field]); ?></textarea> -->
                     <?php
wp_editor(
    $meta[$field],              // Content
    'tg_' . $field,             // Editor ID
    [
        'textarea_name' => 'tg_' . $field,
        'media_buttons' => true,           // Enables "Add Media" button
        'teeny'         => false,          // Set to true for minimal toolbar
        'textarea_rows' => 8,
        'quicktags'     => true            // Shows HTML view tabs
    ]
);
?>

                <?php endif; ?>
            </p>
        <?php endforeach; ?>
    </div>

    <!-- IMAGE UPLOAD COLUMN -->
    <div class="tg-sidebar">
        <h2 style="font-weight: 600;">Featured Image</h2>
        <?php $feat_id = get_post_meta($post->ID, '_tg_featured_image', true); ?>
        <div class="tg-sidebar-section">
            <input type="hidden" name="tg_featured_image" id="tg_featured_image" value="<?php echo esc_attr($feat_id); ?>">
            <div class="tg-image-wrapper">
                <?php if ($feat_id): ?>
                    <img id="tg_featured_preview" src="<?php echo esc_url(wp_get_attachment_url($feat_id)); ?>">
                <?php else: ?>
                    <img id="tg_featured_preview" style="display:none;">
                    <p><em>No featured image selected yet.</em></p>
                <?php endif; ?>
                <button type="button" class="button upload_image_button" data-target="featured">Upload Featured Image</button>
                <button type="button" class="button remove_image_button" data-target="featured" style="margin-top: 5px;">Remove</button>
            </div>
        </div>

        <?php foreach ($fields as $field): ?>
            <?php $img_id = $meta["{$field}_image"]; ?>
            <div class="tg-sidebar-section">
                <strong><?php echo ucwords(str_replace('_', ' ', $field)); ?> Image:</strong><br>
                <input type="hidden" name="tg_<?php echo $field; ?>_image" id="tg_<?php echo $field; ?>_image" value="<?php echo esc_attr($img_id); ?>">
                <div class="tg-image-wrapper">
                    <?php if ($img_id): ?>
                        <img id="tg_<?php echo $field; ?>_preview" src="<?php echo esc_url(wp_get_attachment_url($img_id)); ?>">
                    <?php else: ?>
                        <img id="tg_<?php echo $field; ?>_preview" style="display:none;">
                        <p><em>No image selected yet.</em></p>
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
        mediaUploader = wp.media({
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
