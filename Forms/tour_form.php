<?php
// tour_form.php

// Access $meta['location'], $meta['duration'], $meta['best_season']
// Optionally access $current_post

?>
<p>
    <label for="tg_location"><strong>Location:</strong></label><br>
    <input type="text" name="tg_location" id="tg_location" value="<?php echo esc_attr($meta['location'] ?? ''); ?>" class="widefat">
</p>

<p>
    <label for="tg_duration"><strong>Duration:</strong></label><br>
    <input type="text" name="tg_duration" id="tg_duration" value="<?php echo esc_attr($meta['duration'] ?? ''); ?>" class="widefat">
</p>

<p>
    <label for="tg_best_season"><strong>Best Season to Visit:</strong></label><br>
    <input type="text" name="tg_best_season" id="tg_best_season" value="<?php echo esc_attr($meta['best_season'] ?? ''); ?>" class="widefat">
</p>
