function render_travel_guide_meta_form($post) {
    wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

    $meta = [
        'location'       => get_post_meta($post->ID, '_tg_location', true),
        'duration'       => get_post_meta($post->ID, '_tg_duration', true),
        'best_season'    => get_post_meta($post->ID, '_tg_best_season', true),
        'where_to_stay'  => get_post_meta($post->ID, '_tg_where_to_stay', true),
        'top_reasons'    => get_post_meta($post->ID, '_tg_top_reasons', true),
        'featured_image' => get_post_meta($post->ID, '_tg_featured_image', true),
    ];
    ?>
    
    <div class="tg-meta-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <div class="tg-main" style="flex: 3; min-width: 400px; padding: 15px; background: #f9f9f9; border: 1px solid #ccc; border-radius: 8px;">
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
                <textarea name="tg_where_to_stay" id="tg_where_to_stay" class="widefat" rows="4"
                          placeholder="Recommended hotels, homestays, etc."><?php echo esc_textarea($meta['where_to_stay']); ?></textarea>
            </p>

            <p>
                <label for="tg_top_reasons"><strong>Top 5 Reasons to Visit:</strong></label><br>
                <textarea name="tg_top_reasons" id="tg_top_reasons" class="widefat" rows="5"
                          placeholder="Breathtaking views, culture, food, history..."><?php echo esc_textarea($meta['top_reasons']); ?></textarea>
            </p>
        </div>

        <div class="tg-sidebar" style="flex: 1.2; min-width: 280px; padding: 15px; background: #f9f9f9; border: 1px solid #ccc; border-radius: 8px;">
            <p><strong>Upload Featured Image:</strong></p>
            <input type="hidden" name="tg_featured_image" id="tg_featured_image" value="<?php echo esc_attr($meta['featured_image']); ?>">

            <div class="tg-image-wrapper">
                <?php if ($meta['featured_image']) : ?>
                    <img id="tg_image_preview" src="<?php echo esc_url(wp_get_attachment_url($meta['featured_image'])); ?>" style="max-width: 100%; height: auto;">
                <?php else : ?>
                    <p><em>No image selected yet.</em></p>
                    <img id="tg_image_preview" style="max-width: 100%; height: auto; display: none;">
                <?php endif; ?>
            </div>

            <button type="button" class="button" id="upload_tg_image_button">Upload Image</button>
            <button type="button" class="button" id="remove_tg_image_button" style="margin-top: 5px;">Remove Image</button>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($){
            let mediaUploader;

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
                    const attachment = mediaUploader.state().get('selection').first().toJSON();
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
