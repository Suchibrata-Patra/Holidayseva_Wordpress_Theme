<?php
// Ensure this runs only within WP admin edit screen context
if (!defined('ABSPATH') || !isset($post)) return;

// Security nonce
wp_nonce_field('travel_guide_nonce_action', 'travel_guide_nonce');

// Retrieve current meta values
$meta = [
    'location'    => get_post_meta($post->ID, '_tg_location', true),
    'duration'    => get_post_meta($post->ID, '_tg_duration', true),
    'best_season' => get_post_meta($post->ID, '_tg_best_season', true),
];
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
