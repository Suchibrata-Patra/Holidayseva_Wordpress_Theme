<?php
// Callback function to display custom fields in the meta box
function display_tour_meta_box($post) {
    // Retrieve existing custom fields values
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_duration = get_post_meta($post->ID, '_tour_duration', true);
    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);

    ?>
    <label for="tour_name">Tour Name:</label>
    <input type="text" name="tour_name" value="<?php echo esc_attr($tour_name); ?>" class="widefat" />
    
    <label for="tour_details">Details:</label>
    <textarea name="tour_details" class="widefat"><?php echo esc_textarea($tour_details); ?></textarea>
    
    <label for="tour_location">Location:</label>
    <input type="text" name="tour_location" value="<?php echo esc_attr($tour_location); ?>" class="widefat" />

    <label for="tour_duration">Duration:</label>
    <input type="text" name="tour_duration" value="<?php echo esc_attr($tour_duration); ?>" class="widefat" />

    <label for="tour_price">Price:</label>
    <input type="number" name="tour_price" value="<?php echo esc_attr($tour_price); ?>" class="widefat" />

    <label for="tour_availability">Availability:</label>
    <input type="text" name="tour_availability" value="<?php echo esc_attr($tour_availability); ?>" class="widefat" />

    <label for="tour_cover_images">Cover Images:</label>
    <input type="text" name="tour_cover_images" id="tour_cover_images" value="<?php echo esc_attr(implode(',', (array)$tour_cover_images)); ?>" class="widefat" />
    <button type="button" id="tour_cover_images_button" class="button">Select Images</button>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            var mediaUploader;
            $('#tour_cover_images_button').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Select Cover Images',
                    button: {
                        text: 'Select Images'
                    },
                    multiple: true // Allow multiple file selection
                });

                mediaUploader.on('select', function() {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    var imageUrls = attachments.map(function(attachment) {
                        return attachment.url;
                    });
                    $('#tour_cover_images').val(imageUrls.join(', '));
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}
