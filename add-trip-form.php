<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function display_add_trip_form() {
    ?>
    <div class="wrap">
        <h1>Add a New Trip</h1>
        <form method="post" action="">
            <?php
            // Check if the form has been submitted
            if (isset($_POST['add_trip_submit'])) {
                // Get the data from the form and sanitize it
                $tour_name = sanitize_text_field($_POST['tour_name']);
                $tour_details = sanitize_textarea_field($_POST['tour_details']);
                $tour_location = sanitize_text_field($_POST['tour_location']);
                $tour_duration = sanitize_text_field($_POST['tour_duration']);
                $tour_price = floatval($_POST['tour_price']);
                $tour_availability = sanitize_text_field($_POST['tour_availability']);
                $tour_cover_images = sanitize_text_field($_POST['tour_cover_images']);
                $focus_keyword = sanitize_text_field($_POST['rank_math_focus_keyword']);

                // Create a new post of type 'tour'
                $tour_post = array(
                    'post_title' => $tour_name,
                    'post_content' => $tour_details,
                    'post_status' => 'publish',
                    'post_type' => 'tour',
                    'meta_input' => array(
                        '_tour_name' => $tour_name,
                        '_tour_details' => $tour_details,
                        '_tour_location' => $tour_location,
                        '_tour_duration' => $tour_duration,
                        '_tour_price' => $tour_price,
                        '_tour_availability' => $tour_availability,
                        '_tour_cover_images' => explode(',', $tour_cover_images),
                        '_rank_math_focus_keyword' => $focus_keyword,
                    ),
                );

                // Insert the post into the database
                $post_id = wp_insert_post($tour_post);

                if ($post_id) {
                    echo '<div class="updated"><p>Tour added successfully!</p></div>';
                } else {
                    echo '<div class="error"><p>Failed to add tour. Please try again.</p></div>';
                }
            }
            ?>
            <table class="form-table">
                Lorem
                <tr valign="top">
                    <th scope="row"><label for="tour_name">Tour Name:</label></th>
                    <td><input type="text" name="tour_name" id="tour_name" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_details">Details:</label></th>
                    <td><textarea name="tour_details" id="tour_details" rows="5" class="large-text" required></textarea></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_location">Location:</label></th>
                    <td><input type="text" name="tour_location" id="tour_location" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_duration">Duration:</label></th>
                    <td><input type="text" name="tour_duration" id="tour_duration" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_price">Price:</label></th>
                    <td><input type="number" name="tour_price" id="tour_price" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_availability">Availability:</label></th>
                    <td><input type="text" name="tour_availability" id="tour_availability" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="tour_cover_images">Cover Images (comma-separated URLs):</label></th>
                    <td><input type="text" name="tour_cover_images" id="tour_cover_images" class="regular-text" required /></td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label for="rank_math_focus_keyword">Focus Keyword:</label></th>
                    <td><input type="text" name="rank_math_focus_keyword" id="rank_math_focus_keyword" class="regular-text" /></td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="add_trip_submit" id="add_trip_submit" class="button-primary" value="Add Trip" />
            </p>
        </form>
    </div>
    <?php
}
