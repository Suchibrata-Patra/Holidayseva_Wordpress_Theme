<?php
function display_tour_meta_box($post) {
    // Retrieve existing custom fields values
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
?>
<div class="form-group">
    <label for="tour_cover_images">Slider Images</label>
    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control"
         value="<?php echo esc_attr($tour_cover_images); ?>"
        placeholder="" />
    <button type="button" id="tour_cover_images_button" class="form-button"
        title="Click to select images for the slider">Select Images</button>
    <div id="tour_cover_images_preview"
        style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;">
        <?php
        // Get the saved tour cover images (assuming this is a serialized array of image IDs or URLs)
        $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);

        if ($tour_cover_images) {
            // If tour_cover_images is not empty, loop through the images and display them
            foreach ($tour_cover_images as $image_url) {
                echo '<div class="image-preview">';
                echo '<img src="' . esc_url($image_url) . '" alt="Tour Image" style="max-width: 150px; height: auto;border-radius:6px;border:0.5px solid blue;width:100px;height:auto;" />';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>
<?php
}

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;


    // Save custom fields values
    if (isset($_POST['tour_cover_images'])) {
        update_post_meta($post_id, '_tour_cover_images', explode(',', sanitize_text_field($_POST['tour_cover_images'])));
    }
?>