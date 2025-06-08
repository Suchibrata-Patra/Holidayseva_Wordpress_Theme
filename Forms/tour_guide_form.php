<?php
// Ensure this runs only within WP admin edit screen context
if (!defined('ABSPATH') || !isset($post)) return;

// Security nonce
wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

// Retrieve saved meta values
$fields = [
    'location', 'duration', 'best_season', 'where_to_stay', 'top_reasons', 'featured_image',
    'intro', 'overview', 'how_to_get', 'eat_drink', 'cultural_tips', 'budget', 'itinerary',
    'personal_exp', 'travel_tips', 'resources', 'conclusion', 'top_attractions'
];

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
.tg-image-wrapper img {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    border-radius: 6px;
}
</style>

<div class="tg-meta-container">
    <div class="tg-main">

        <!-- Existing Meta Fields -->
        <p><label for="tg_location"><strong>Location:</strong></label><br>
        <input type="text" name="tg_location" id="tg_location" class="widefat"
            value="<?php echo esc_attr($meta['location']); ?>" placeholder="e.g., Darjeeling, Rajasthan"></p>

        <p><label for="tg_duration"><strong>Duration:</strong></label><br>
        <input type="text" name="tg_duration" id="tg_duration" class="widefat"
            value="<?php echo esc_attr($meta['duration']); ?>" placeholder="e.g., 3 days, 1 week"></p>

        <p><label for="tg_best_season"><strong>Best Season to Visit:</strong></label><br>
        <input type="text" name="tg_best_season" id="tg_best_season" class="widefat"
            value="<?php echo esc_attr($meta['best_season']); ?>" placeholder="e.g., October - March"></p>

        <p><label for="tg_top_reasons"><strong>Top 5 Reasons to Visit:</strong></label><br>
        <textarea name="tg_top_reasons" id="tg_top_reasons" class="widefat" rows="4"
            placeholder="Nature, Culture, Adventure..."><?php echo esc_textarea($meta['top_reasons']); ?></textarea></p>

        <!-- New Fields -->
        <p><label for="tg_intro"><strong>Introduction / Hook:</strong></label><br>
        <textarea name="tg_intro" id="tg_intro" class="widefat" rows="3"><?php echo esc_textarea($meta['intro']); ?></textarea></p>

        <p><label for="tg_overview"><strong>Destination Overview:</strong></label><br>
        <textarea name="tg_overview" id="tg_overview" class="widefat" rows="3"><?php echo esc_textarea($meta['overview']); ?></textarea></p>

        <p><label for="tg_how_to_get"><strong>How to Get There:</strong></label><br>
        <textarea name="tg_how_to_get" id="tg_how_to_get" class="widefat" rows="3"><?php echo esc_textarea($meta['how_to_get']); ?></textarea></p>

        <p><label for="tg_top_attractions"><strong>Top Attractions / Things to Do:</strong></label><br>
        <textarea name="tg_top_attractions" id="tg_top_attractions" class="widefat" rows="4"><?php echo esc_textarea($meta['top_attractions']); ?></textarea></p>

        <p><label for="tg_where_to_stay"><strong>Where to Stay:</strong></label><br>
        <textarea name="tg_where_to_stay" id="tg_where_to_stay" class="widefat" rows="3"><?php echo esc_textarea($meta['where_to_stay']); ?></textarea></p>

        <p><label for="tg_eat_drink"><strong>Where to Eat & Drink:</strong></label><br>
        <textarea name="tg_eat_drink" id="tg_eat_drink" class="widefat" rows="3"><?php echo esc_textarea($meta['eat_drink']); ?></textarea></p>

        <p><label for="tg_cultural_tips"><strong>Cultural Etiquette / Local Tips:</strong></label><br>
        <textarea name="tg_cultural_tips" id="tg_cultural_tips" class="widefat" rows="3"><?php echo esc_textarea($meta['cultural_tips']); ?></textarea></p>

        <p><label for="tg_budget"><strong>Budget Breakdown:</strong></label><br>
        <textarea name="tg_budget" id="tg_budget" class="widefat" rows="3"><?php echo esc_textarea($meta['budget']); ?></textarea></p>

        <p><label for="tg_itinerary"><strong>Itinerary Suggestions:</strong></label><br>
        <textarea name="tg_itinerary" id="tg_itinerary" class="widefat" rows="3"><?php echo esc_textarea($meta['itinerary']); ?></textarea></p>

        <p><label for="tg_personal_exp"><strong>Personal Experiences & Photos:</strong></label><br>
        <textarea name="tg_personal_exp" id="tg_personal_exp" class="widefat" rows="3"><?php echo esc_textarea($meta['personal_exp']); ?></textarea></p>

        <p><label for="tg_travel_tips"><strong>Travel Tips & Safety Notes:</strong></label><br>
        <textarea name="tg_travel_tips" id="tg_travel_tips" class="widefat" rows="3"><?php echo esc_textarea($meta['travel_tips']); ?></textarea></p>

        <p><label for="tg_resources"><strong>Useful Resources / Links:</strong></label><br>
        <textarea name="tg_resources" id="tg_resources" class="widefat" rows="3"><?php echo esc_textarea($meta['resources']); ?></textarea></p>

        <p><label for="tg_conclusion"><strong>Conclusion / Final Thoughts:</strong></label><br>
        <textarea name="tg_conclusion" id="tg_conclusion" class="widefat" rows="3"><?php echo esc_textarea($meta['conclusion']); ?></textarea></p>

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
        if (mediaUploader) { mediaUploader.open(); return; }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Featured Image',
            button: { text: 'Choose Image' }, multiple: false
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