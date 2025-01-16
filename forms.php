<?php
function display_tour_meta_box($post) {
    // Retrieve existing custom fields values
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_duration = get_post_meta($post->ID, '_tour_duration', true);
    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);

    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#tour_form" class="list-group-item list-group-item-action active" data-toggle="collapse" aria-expanded="true">
                        Tour Details
                    </a>
                    <a href="#seo_form" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false">
                        SEO Settings
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div id="tour_form" class="collapse show">
                    <h3>Tour Details</h3>
                    <form method="post">
                        <?php wp_nonce_field('save_tour_meta', 'tour_meta_nonce'); ?>
                        <div class="form-group">
                            <label for="tour_name">Tour Name:</label>
                            <input type="text" name="tour_name" value="<?php echo esc_attr($tour_name); ?>" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="tour_details">Details:</label>
                            <textarea name="tour_details" class="form-control"><?php echo esc_textarea($tour_details); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tour_location">Location:</label>
                            <input type="text" name="tour_location" value="<?php echo esc_attr($tour_location); ?>" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="tour_duration">Duration:</label>
                            <input type="text" name="tour_duration" value="<?php echo esc_attr($tour_duration); ?>" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="tour_price">Price:</label>
                            <input type="number" name="tour_price" value="<?php echo esc_attr($tour_price); ?>" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="tour_availability">Availability:</label>
                            <input type="text" name="tour_availability" value="<?php echo esc_attr($tour_availability); ?>" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="tour_cover_images">Cover Images:</label>
                            <input type="text" name="tour_cover_images" id="tour_cover_images" value="<?php echo esc_attr(implode(',', (array)$tour_cover_images)); ?>" class="form-control" />
                            <button type="button" id="tour_cover_images_button" class="btn btn-primary mt-2">Select Images</button>
                        </div>
                    </form>
                </div>

                <div id="seo_form" class="collapse">
                    <h3>SEO Settings</h3>
                    <div class="form-group">
                        <label for="rank_math_focus_keyword">Focus Keyword:</label>
                        <input type="text" name="rank_math_focus_keyword" id="rank_math_focus_keyword" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
