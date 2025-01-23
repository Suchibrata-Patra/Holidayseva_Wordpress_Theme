<?php
function render_tour_highlights_form($post) {
    // Get existing tour highlights from post meta
    $tour_highlights = get_post_meta($post->ID, '_tour_highlights', true);

    // Nonce field for security
    wp_nonce_field('tour_highlights_nonce', 'tour_highlights_nonce_field');
    ?>

    <!-- Highlights -->
    <div id="highlights">
        <form method="post" action="">
            <h3 class="form-title">Highlights</h3>
            <?php for ($i = 1; $i <= 20; $i++) : ?>
                <div class="form-group">
                    <label for="tour_highlight_<?php echo $i; ?>">Highlight <?php echo $i; ?></label>
                    <input type="text" 
                           name="tour_highlights[]" 
                           id="tour_highlight_<?php echo $i; ?>" 
                           class="form-control" 
                           value="<?php echo isset($tour_highlights[$i - 1]) ? esc_attr($tour_highlights[$i - 1]) : ''; ?>" />
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Save Highlights</button>
        </form>
    </div>
    <?php
}

function save_tour_meta($post_id) {
    // Check nonce for security
    if (isset($_POST['tour_highlights_nonce_field']) && !wp_verify_nonce($_POST['tour_highlights_nonce_field'], 'tour_highlights_nonce')) {
        return $post_id; // Nonce is invalid, do not save
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;
    
    // Check if tour_highlights is set and is an array
    if (isset($_POST['tour_highlights']) && is_array($_POST['tour_highlights'])) {
        // Sanitize each highlight
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['tour_highlights']);
        
        // Save as post meta
        update_post_meta($post_id, '_tour_highlights', $sanitized_highlights);
    } else {
        // If highlights are empty, delete the meta to avoid clutter
        delete_post_meta($post_id, '_tour_highlights');
    }
}

add_action('save_post', 'save_tour_meta');
add_action('add_meta_boxes', 'add_tour_highlights_metabox');

function add_tour_highlights_metabox() {
    add_meta_box('tour_highlights', 'Tour Highlights', 'render_tour_highlights_form', 'tour', 'normal', 'default');
}
?>
