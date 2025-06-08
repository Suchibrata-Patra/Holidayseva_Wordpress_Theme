<!-- This file only renders the form inside the meta box -->

<p>
    <label for="tg_location">Location:</label><br>
    <input type="text" id="tg_location" name="tg_location" value="<?php echo esc_attr($meta['location']); ?>" size="30" />
</p>
<p>
    <label for="tg_duration">Trip Duration:</label><br>
    <input type="text" id="tg_duration" name="tg_duration" value="<?php echo esc_attr($meta['duration']); ?>" size="30" />
</p>
<p>
    <label for="tg_best_season">Best Season to Visit:</label><br>
    <input type="text" id="tg_best_season" name="tg_best_season" value="<?php echo esc_attr($meta['best_season']); ?>" size="30" />
</p>
