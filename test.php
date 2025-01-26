<div id="frequently_asked_questions" class="hidden">
    <h3 class="form-title">Frequently Asked Questions</h3>

    <!-- Tour Cover Images Section -->
    <div class="form-group">
        <label for="tour_cover_images">Cover Images</label>
        <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control"
            value="<?php echo esc_attr($tour_cover_images); ?>" />
        <button type="button" id="tour_cover_images_button" class="form-button">Select Images</button>
    </div>

    <!-- Profile Picture Section -->
    <div class="form-group">
        <label for="profile_picture">Profile Picture</label>
        <input type="text" name="profile_picture" id="profile_picture" class="form-control"
            value="<?php echo esc_attr($profile_picture); ?>" />
        <button type="button" id="profile_picture_button" class="form-button">Select Profile Picture</button>
    </div>

    <!-- Customer Name Entry Section -->
    <div class="form-group">
        <label for="customer_name">Customer Name</label>
        <input type="text" name="customer_name" id="customer_name" class="form-control"
            value="<?php echo esc_attr($customer_name); ?>" />
    </div>

    <!-- Review Entry Section -->
    <div class="form-group">
        <label for="customer_review">Customer Review</label>
        <textarea name="customer_review" id="customer_review" class="form-control"><?php echo esc_textarea($customer_review); ?></textarea>
    </div>

</div>
