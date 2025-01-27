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

            <!-- Hotels -->
            <div class="form-group">
                <label for="day_plans_hotel_<?php echo $i; ?>">Hotel</label>
                <input type="text" id="day_plans_hotel_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][hotel]"
                    value="<?php echo isset($day_plans[$i]['hotel']) ? esc_attr($day_plans[$i]['hotel']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

            <!-- Breakfast -->
            <div class="form-group">
                <label for="day_plans_breakfast_<?php echo $i; ?>">Breakfast</label>
                <input type="text" id="day_plans_breakfast_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][breakfast]"
                    value="<?php echo isset($day_plans[$i]['breakfast']) ? esc_attr($day_plans[$i]['breakfast']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

            <!-- Lunch -->
            <div class="form-group">
                <label for="day_plans_lunch_<?php echo $i; ?>">Lunch</label>
                <input type="text" id="day_plans_lunch_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][lunch]"
                    value="<?php echo isset($day_plans[$i]['lunch']) ? esc_attr($day_plans[$i]['lunch']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

            <!-- Dinner -->
            <div class="form-group">
                <label for="day_plans_dinner_<?php echo $i; ?>">Dinner</label>
                <input type="text" id="day_plans_dinner_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][dinner]"
                    value="<?php echo isset($day_plans[$i]['dinner']) ? esc_attr($day_plans[$i]['dinner']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

            <!-- Cars -->
            <div class="form-group">
                <label for="day_plans_cars_<?php echo $i; ?>">Cars</label>
                <input type="text" id="day_plans_cars_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][cars]"
                    value="<?php echo isset($day_plans[$i]['cars']) ? esc_attr($day_plans[$i]['cars']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

            <!-- Flights -->
            <div class="form-group">
                <label for="day_plans_flights_<?php echo $i; ?>">Flights</label>
                <input type="text" id="day_plans_flights_<?php echo $i; ?>" name="day_plans[<?php echo $i; ?>][flights]"
                    value="<?php echo isset($day_plans[$i]['flights']) ? esc_attr($day_plans[$i]['flights']) : ''; ?>"
                    class="regular-text" style="width: 100%;" />
            </div>

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
</style>

<?php
}

function save_day_plans_meta($post_id) {
    if (isset($_POST['day_plans']) && is_array($_POST['day_plans'])) {
        $sanitized_plans = array_map(function($plan) {
            return [
                'heading' => sanitize_text_field($plan['heading'] ?? ''),
                'hotel' => sanitize_text_field($plan['hotel'] ?? ''),
                'breakfast' => sanitize_text_field($plan['breakfast'] ?? ''),
                'lunch' => sanitize_text_field($plan['lunch'] ?? ''),
                'dinner' => sanitize_text_field($plan['dinner'] ?? ''),
                'cars' => sanitize_text_field($plan['cars'] ?? ''),
                'flights' => sanitize_text_field($plan['flights'] ?? ''),
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