<?php
function display_tour_meta_box($post) {
    $day_plans = get_post_meta($post->ID, '_day_plans', true) ?: [];
?>

<!-- Day Plans -->
<div id="day_plans">
    <h3 class="form-title">Day Plans</h3>
    <?php for ($i = 0; $i < $tour_duration_days; $i++) : ?>
        <div class="form-group">
            <label for="day_plans<?php echo $i; ?>">Highlight for Day <?php echo $i; ?></label>
            <?php
            $content = isset($day_plans[$i - 1]) ? $day_plans[$i - 1] : ''; // Content for each day's highlight
            $editor_id = 'day_plans' . $i; // Unique ID for each editor
            
            // Add TinyMCE editor for each day
            wp_editor(
                $content,
                $editor_id,
                [
                    'textarea_name' => 'day_plans[]',
                    'media_buttons' => true, // Enable media buttons
                    'textarea_rows' => 5,    // Adjust height
                    'editor_class' => 'form-control', // Add custom classes if needed
                ]
            );
            ?>
        </div>
    <?php endfor; ?>
</div>

<?php
}

function save_day_plans_meta($post_id) {
    if (isset($_POST['day_plans']) && is_array($_POST['day_plans'])) {
        // Sanitize each day plan's content before saving
        $sanitized_plans = array_map('wp_kses_post', $_POST['day_plans']);
        update_post_meta($post_id, '_day_plans', $sanitized_plans);
    }else{
        delete_post_meta($post_id, '_day_plans');
    }
}
add_action('save_post', 'save_day_plans_meta');
?>