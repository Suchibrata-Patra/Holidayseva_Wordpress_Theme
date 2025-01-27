<?php
function display_tour_meta_box($post) {
    $day_plans = get_post_meta($post->ID, '_day_plans', true) ?: [];
    $tour_duration_days = get_post_meta($post->ID, '_tour_duration_days', true) ?: 1; // Ensure the number of days is defined
?>

<div id="day_plans">
    <h3 class="form-title">Day Plans</h3>
    <?php for ($i = 0; $i < $tour_duration_days; $i++) : ?>
        <div class="day-plan" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <h4 style="color: black;">Day <?php echo $i + 1; ?></h4>

            <!-- Heading/Tagline -->
            <div class="form-group">
                <label for="day_plans_heading_<?php echo $i; ?>">Heading/Tagline</label>
                <input type="text" id="day_plans_heading_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][heading]"
                    value="<?php echo isset($day_plans[$i]['heading']) ? esc_attr($day_plans[$i]['heading']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

            <!-- Checkboxes -->
            <?php $checkbox_fields = ['hotel' => 'Hotel', 'breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner', 'cars' => 'Cars', 'flights' => 'Flights']; ?>
            <?php foreach ($checkbox_fields as $field_key => $field_label) : ?>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="day_plans_<?php echo $field_key; ?>_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][<?php echo $field_key; ?>]"
                            value="yes" <?php checked(isset($day_plans[$i][$field_key]) && $day_plans[$i][$field_key] === 'yes'); ?> />
                        <?php echo $field_label; ?>
                    </label>
                </div>
            <?php endforeach; ?>

            <!-- Special Note -->
            <div class="form-group">
                <label for="day_plans_note_<?php echo $i; ?>">Special Note</label>
                <textarea id="day_plans_note_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][note]"
                    class="regular-text" style="width: 100%; height: 80px;"><?php echo isset($day_plans[$i]['note']) ? esc_textarea($day_plans[$i]['note']) : ''; ?></textarea>
            </div>
        </div>
    <?php endfor; ?>
</div>

<style>
    #day_plans .day-plan {
        background-color: #f9f9f9;
    }

    #day_plans .form-group label {
        font-weight: bold;
    }

    #day_plans input[type="text"],
    #day_plans textarea {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
        font-size: 14px;
        background-color: white;
        color: black;
    }

    #day_plans input[type="checkbox"] {
        margin-right: 8px;
    }
</style>

<?php
}

function save_day_plans_meta($post_id) {
    if (isset($_POST['day_plans']) && is_array($_POST['day_plans'])) {
        $sanitized_plans = array_map(function($plan) {
            return [
                'heading' => sanitize_text_field($plan['heading'] ?? ''),
                'hotel' => isset($plan['hotel']) && $plan['hotel'] === 'yes' ? 'yes' : 'no',
                'breakfast' => isset($plan['breakfast']) && $plan['breakfast'] === 'yes' ? 'yes' : 'no',
                'lunch' => isset($plan['lunch']) && $plan['lunch'] === 'yes' ? 'yes' : 'no',
                'dinner' => isset($plan['dinner']) && $plan['dinner'] === 'yes' ? 'yes' : 'no',
                'cars' => isset($plan['cars']) && $plan['cars'] === 'yes' ? 'yes' : 'no',
                'flights' => isset($plan['flights']) && $plan['flights'] === 'yes' ? 'yes' : 'no',
                'note' => wp_kses_post($plan['note'] ?? ''),
            ];
        }, $_POST['day_plans']);

        update_post_meta($post_id, '_day_plans', $sanitized_plans);
    } else {
        delete_post_meta($post_id, '_day_plans');
    }
}
add_action('save_post', 'save_day_plans_meta');
?>