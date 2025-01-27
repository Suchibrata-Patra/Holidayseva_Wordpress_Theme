<?php
function display_tour_meta_box($post) {
    $service_availability = get_post_meta($post->ID, '_service_availability', true);
    $services = ['Hotel', 'Sightseeing', 'Transfer', 'Meal'];

?>
<div class="form-group" style="margin-bottom: 15px;">
    <label for="service_availability" style="display: block; font-weight: bold; margin-bottom: 8px;">Select Service Availability</label>
    <?php foreach ($services as $service) : ?>
        <div style="margin-bottom: 5px;display:flex;">
            <input 
                type="checkbox" 
                id="service_availability_<?php echo esc_attr($service); ?>" 
                name="service_availability[<?php echo esc_attr($service); ?>]" 
                value="yes" 
                style="width: 20px; height: 20px; margin-right: 10px; cursor: pointer;display:flex;" 
                <?php echo isset($service_availability[$service]) && $service_availability[$service] === 'yes' ? 'checked' : ''; ?> 
            />
            <label 
                for="service_availability_<?php echo esc_attr($service); ?>" 
                style="font-size: 16px; cursor: pointer;">
                <?php echo esc_html($service); ?>
            </label>
        </div>
    <?php endforeach; ?>
</div>



<?php
}

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;
    if (isset($_POST['service_availability'])) {
        $service_availability = array_map(function ($value) {
            return $value === 'yes' ? 'yes' : 'no';
        }, $_POST['service_availability']);

        update_post_meta($post_id, '_service_availability', $service_availability);
    } else {
        delete_post_meta($post_id, '_service_availability'); // Delete if none are selected
    }

}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'tour_meta_box', // ID
        'Tour Services', // Title
        'display_tour_meta_box', // Callback
        'tour', // Post type
        'normal', // Context
        'default' // Priority
    );
});
add_action('save_post', 'save_tour_meta');
?>