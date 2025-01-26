<?php
function display_tour_meta_box($post) {
    $reviews = get_post_meta($post->ID, '_reviews', true);
?>

 <!--Reviews -->
 <div id="reviews" class="hidden">
            <h3 class="form-title">Reviews</h3>
            <?php for ($i = 1; $i <= 5; $i++) : ?>
            <div class="form-group">
                <label for="reviews_<?php echo $i; ?>">Review Item
                    <?php echo $i; ?>
                </label>
                <input type="text" name="reviews[]" id="reviews_<?php echo $i; ?>" class="form-control"
                    value="<?php echo isset($reviews[$i - 1]) ? esc_attr($reviews[$i - 1]) : ''; ?>" />
            </div>
            <?php endfor; ?>
</div>


<?php
}

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;

    if (isset($_POST['reviews']) && is_array($_POST['reviews'])) {
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['reviews']);
        
        update_post_meta($post_id, '_reviews', $sanitized_highlights);
    } else {
        delete_post_meta($post_id, '_reviews');
    }
}
add_action('save_post', 'save_tour_meta');
?>