<?php
function display_tour_meta_box($post) {
    $service_availability = get_post_meta($post->ID, '_service_availability', true);
?>
<div class="form-group">
                    <label for="service_availability">Click On the Service Availability</label>
                    <select name="" id="">
                        <option value="">Hotel</option>
                        <option value="">Sightseeing</option>
                        <option value="">Transfer</option>
                        <option value="">Meal</option>
                    </select>
                    <!-- <input type="text" name="service_availability" id="service_availability" class="form-control"
                        value="<?php echo esc_attr($service_availability); ?>" placeholder="Available Immediately" /> -->
</div>


<?php
}

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;

    // Save tour description (Visual Editor content)
    if (isset($_POST['service_avialbility'])) {
        update_post_meta($post_id, '_service_avialbility', wp_kses_post($_POST['service_avialbility'])); // Sanitize HTML
    }
    

}


?>