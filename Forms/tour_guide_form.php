<?php
// Ensure this runs only within WP admin edit screen context
if (!defined('ABSPATH') || !isset($post)) return;

// Security nonce
wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

// Meta fields to retrieve
$fields = [
    'location', 'duration', 'best_season', 'where_to_stay', 'top_reasons', 'featured_image',
    'intro', 'overview', 'how_to_get', 'eat_drink', 'cultural_tips', 'budget', 'itinerary',
    'personal_exp', 'travel_tips', 'resources', 'conclusion', 'top_attractions'
];

// Load all saved meta
$meta = [];
foreach ($fields as $field) {
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
.tg-main textarea,
.tg-main input[type="text"] {
    margin-bottom: 20px;
}
.tg-image-wrapper img {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    border-radius: 6px;
}
</style>

<div class="tg-meta-container">
    <div class="tg-main">
        <?php
        $textarea_fields = [
            'intro'         => 'Introduction / Hook',
            'overview'      => 'Destination Overview',
            'how_to_get'    => 'How to Get There',
            'top_attractions'=> 'Top Attractions / Things to Do',
            'where_to_stay' => 'Where to Stay',
            'eat_drink'     => 'Where to Eat & Drink',
            'cultural_tips' => 'Cultural Etiquette / Local Tips',
            'budget'        => 'Budget Breakdown',
            'itinerary'     => 'Itinerary Suggestions',
            'personal_exp'  => 'Personal Experiences & Photos',
            'travel_tips'   => 'Travel Tips & Safety Notes',
            'resources'     => 'Useful Resources / Links',
            'conclusion'    => 'Conclusion / Final Thoughts',
            'top_reasons'   => 'Top 5 Reasons to Visit',
        ];

        $text_fields = [
            'location'      => 'Location (e.g., Darjeeling, Rajasthan)',
            'duration'      => 'Duration (e.g., 3 days, 1 week)',
            'best_season'   => 'Best Season (e.g., Oct - Mar)'
        ];

        foreach ($text_fields as $key => $label) {
            ?>
            <p>
                <label for="tg_<?php echo $key; ?>"><strong><?php echo $label; ?>:</strong></label><br>
                <input type="text" name="tg_<?php echo $key; ?>" id="tg_<?php echo $key; ?>" class="widefat"
                       value="<?php echo esc_attr($meta[$key]); ?>">
            </p>
            <?php
        }

        foreach ($textarea_fields as $key => $label) {
            ?>
            <p>
                <label for="tg_<?php echo $key; ?>"><strong><?php echo $label; ?>:</strong></label><br>
                <textarea name="tg_<?php echo $key; ?>" id="tg_<?php echo $key; ?>" class="widefat" rows="3"><?php echo esc_textarea($meta[$key]); ?></textarea>
            </p>
            <?php
        }
        ?>
    </div>

    <div class="tg-sidebar">
        <p><strong>Upload Featured Image:</strong></p>
        <div class="tg-image-wrapper">
            <input type="hidden" name="tg_featured_image" id="tg_featured_image" value="<?php echo esc_attr($meta['featured_image']); ?>">
            <?php if ($meta['featured_image']) : ?>
                <img id="tg_image_preview" src="<?php echo esc_url(wp_get_attachment_url($meta['featured_image'])); ?>" style="max-width: 100%; height: auto;">
            <?php else : ?>
                <img id="tg_image_preview" style="max-width: 100%; height: auto; display: none;">
                <p><em>No image selected yet.</em></p>
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
            button: { text: 'Choose Image' },
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