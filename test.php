<div id="basic_info">
            <h3 class="form-title">Basic Info</h3>
            <form method="post" action="" class="styled-form">
                <div class="form-group">
                    <label for="tour_name">Tour Package Name</label>
                    <input type="text" name="tour_name" id="tour_name" class="form-control"
                        value="<?php echo esc_attr($tour_name); ?>" />
                </div>

                <div class="form-group">
                    <label for="tour_description">Tour Description</label>
                    <?php
                        $tour_description = isset($tour_description) ? $tour_description : ''; // Get existing value if exists
                        wp_editor($tour_description, 'tour_description', array(
                            'textarea_name' => 'tour_description',
                            'textarea_rows' => 5,
                            'media_buttons' => true, // Enable media buttons (images, etc.)
                        ));
                    ?>
                </div>

                <div class="form-group">
                    <label for="tour_location">Location</label>
                    <input type="text" name="tour_location" id="tour_location" class="form-control"
                        value="<?php echo esc_attr($tour_location); ?>" placeholder="Ex: London, USA" />
                </div>

                <div class="form-group">
                    <label for="tour_duration">Duration:</label>
                    <input type="text" name="tour_duration" id="tour_duration" class="form-control"
                        value="<?php echo esc_attr($tour_duration); ?>" placeholder="7 Night 8 Days" />
                </div>

                <div class="form-group">
                    <label for="tour_price">Price</label>
                    <input type="number" name="tour_price" id="tour_price" class="form-control"
                        value="<?php echo esc_attr($tour_price); ?>" placeholder="in INR" />
                </div>

                <div class="form-group">
                    <label for="tour_availability">Availability</label>
                    <input type="text" name="tour_availability" id="tour_availability" class="form-control"
                        value="<?php echo esc_attr($tour_availability); ?>" placeholder="Available Immediately" />
                </div>

                <div class="form-group">
                    <label for="tour_cover_images">Slider Images</label>
                    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control"
                        style="display: none !important;" value="<?php echo esc_attr($tour_cover_images); ?>"
                        placeholder="" />
                    <button type="button" id="tour_cover_images_button" class="form-button"
                        title="Click to select images for the slider">Select Images</button>
                    <div id="tour_cover_images_preview"
                        style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                </div>

        </div>