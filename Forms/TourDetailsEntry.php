<?php
function display_tour_meta_box($post) {
    // Retrieve existing custom fields values
    $tour_cover_images = get_post_meta($post->ID, '_tour_cover_images', true);
    $tour_name = get_post_meta($post->ID, '_tour_name', true);
    $tour_description = get_post_meta($post->ID, '_tour_description', true);
    $tour_details = get_post_meta($post->ID, '_tour_details', true);
    $tour_location = get_post_meta($post->ID, '_tour_location', true);
    $tour_duration = get_post_meta($post->ID, '_tour_duration', true);
    $tour_price = get_post_meta($post->ID, '_tour_price', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);

    $tour_highlights = get_post_meta($post->ID, '_tour_highlights', true);
?>
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="tab-link active" data-target="basic_info">Basic Info</a>
        <a href="#" class="tab-link" data-target="highlights">Highlights</a>
        <a href="#" class="tab-link" data-target="itinerary">Itinerary</a>
        <a href="#" class="tab-link" data-target="reviews">Reviews</a>
        <a href="#" class="tab-link" data-target="frequently_asked_questions">Frequenly Asked Questions</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Tour Form -->
        <div id="basic_info">
            <h3 class="form-title">Tour Basic Info</h3>
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
                        value="<?php echo esc_attr($tour_location); ?>" placeholder="Ex: London, USA"/>
                </div>

                <div class="form-group">
                    <label for="tour_duration">Duration:</label>
                    <input type="text" name="tour_duration" id="tour_duration" class="form-control"
                        value="<?php echo esc_attr($tour_duration); ?>" placeholder="7 Night 8 Days" />
                </div>

                <div class="form-group">
                    <label for="tour_price">Price</label>
                    <input type="number" name="tour_price" id="tour_price" class="form-control"
                        value="<?php echo esc_attr($tour_price); ?>" placeholder="in INR"/>
                </div>

                <div class="form-group">
                    <label for="tour_availability">Availability</label>
                    <input type="text" name="tour_availability" id="tour_availability" class="form-control"
                        value="<?php echo esc_attr($tour_availability); ?>" placeholder="Available Immediately"/>
                </div>
 
                <div class="form-group">
                    <label for="tour_cover_images">Slider Images <span style="font-weight:300!important;">[ These Are the Tour Page's Slider Image ]</span></label>
                    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control" style="display: none !important;"
                        value="<?php echo esc_attr($tour_cover_images); ?>" placeholder=""/>
                    <button type="button" id="tour_cover_images_button" class="form-button">Select Images</button>
                    <div id="tour_cover_images_preview" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                </div>
            </form>
        </div>

        <!-- Highlights -->
        <div id="highlights" class="hidden">
            <h3 class="form-title">Itinerary</h3>
            <form method="post" action="" class="styled-form">
            <div class="form-group">
                    <label for="highlights">Availability</label>
                    <input type="text" name="highlights" id="highlights" class="form-control"
                        value="<?php echo esc_attr($highlights); ?>" placeholder="Available Immediately"/>
                </div>
            </div>
            </form>
        </div>
        

        <!--Itinerary -->
        <div id="itinerary" class="hidden">
            <h3 class="form-title">Itinerary</h3>
            <form method="post" action="" class="styled-form">
            <div class="form-group">
                    <label for="tour_cover_images">Cover Images </label>
                    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control"
                        value="<?php echo esc_attr($tour_cover_images); ?>" />
                    <button type="button" id="tour_cover_images_button" class="form-button">Select Images</button>
                </div>
            </form>
        </div>
        <!--Reviews -->
        <div id="reviews" class="hidden">
            <h3 class="form-title">Reviews</h3>
            <form method="post" action="" class="styled-form">
            <div class="form-group">
                    <label for="tour_cover_images">Cover Images </label>
                    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control"
                        value="<?php echo esc_attr($tour_cover_images); ?>" />
                    <button type="button" id="tour_cover_images_button" class="form-button">Select Images</button>
                </div>
            </form>
        </div>
        <!-- Frequently Asked Questions -->
        <div id="frequently_asked_questions" class="hidden">
            <h3 class="form-title">Frequently Asked Questions</h3>
            <form method="post" action="" class="styled-form">
            <div class="form-group">
                    <label for="tour_cover_images">Cover Images </label>
                    <input type="text" name="tour_cover_images" id="tour_cover_images" class="form-control"
                        value="<?php echo esc_attr($tour_cover_images); ?>" />
                    <button type="button" id="tour_cover_images_button" class="form-button">Select Images</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Layout Styling */
    .container {
        display: flex;
        min-height: 100vh;
        background-color:rgb(255, 255, 255);
    }

    /* Sidebar Styling */
    .sidebar {
        width: 20%;
        background-color:rgb(6, 38, 48);
        color: white;
        padding: 10px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
        display: block;
        padding: 6px 15px;
        color: white;
        text-decoration: none;
        margin-bottom: 5px;
        border-radius: 0px;
        transition: background-color 0.3s ease;
    }

    .sidebar a.active {
        background-color: #DDA853;
    }

    .sidebar a:hover {
        background-color:rgb(210, 159, 77);
    }

    /* Main Content Styling */
    .main-content {
        flex-grow: 1;
        padding: 10px;
    }

    .form-title {
        margin-bottom: 20px;
        color: #34495e;
        font-size: 1.5em;
        font-weight: bold;
    }

    /* Form Styling */
    .styled-form {
        background-color: white;
        padding: 10px;
        border-radius:0px;
        /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 2px;
        font-weight: 600;
        color:rgb(0, 0, 0);
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 7px;
        border: 1px solid #bdc3c7;
        border-radius: 0px;
        font-size: 1rem;
        color: #2c3e50;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    .form-button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .form-button:hover {
        background-color: #2980b9;
    }

    .hidden {
        display: none;
    }
</style>

<script>
    document.querySelectorAll('.tab-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('.tab-link').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.main-content > div').forEach(content => content.classList.add('hidden'));

            this.classList.add('active');
            document.getElementById(this.dataset.target).classList.remove('hidden');
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        jQuery(document).ready(function ($) {
            let mediaUploader;

            // Handle media uploader
            $('#tour_cover_images_button').on('click', function (e) {
                e.preventDefault();

                // If the uploader object has already been created, reopen it.
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                // Extend the wp.media object.
                mediaUploader = wp.media({
                    title: 'Choose Cover Images',
                    button: {
                        text: 'Use these images',
                    },
                    multiple: true, // Allow multiple images
                });

                // When an image is selected, run a callback.
                mediaUploader.on('select', function () {
                    const selection = mediaUploader.state().get('selection');
                    const imageUrls = [];
                    $('#tour_cover_images_preview').empty(); // Clear the preview container

                    selection.each(function (attachment) {
                        const url = attachment.toJSON().url;
                        imageUrls.push(url);

                        // Append the image to the preview container
                        $('#tour_cover_images_preview').append(
                            `<img src="${url}" style="width: 100px; height: auto; border: 1px solid #ccc;">`
                        );
                    });

                    // Set the value of the hidden input field
                    $('#tour_cover_images').val(imageUrls.join(','));
                });

                // Open the uploader dialog.
                mediaUploader.open();
            });
        });
    });

</script>

<?php
}

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Save custom fields values
    if (isset($_POST['tour_cover_images'])) {
        update_post_meta($post_id, '_tour_cover_images', explode(',', sanitize_text_field($_POST['tour_cover_images'])));
    }
    if (isset($_POST['tour_name'])) {
        // update_post_meta($post_id, '_tour_name', sanitize_text_field($_POST['tour_name']));
    }
    if (isset($_POST['tour_details'])) {
        // update_post_meta($post_id, '_tour_details', sanitize_textarea_field($_POST['tour_details']));
    }

    if (isset($_POST['tour_name'])) {
        update_post_meta($post_id, '_tour_name', sanitize_text_field($_POST['tour_name']));
    }

    // Save tour description (Visual Editor content)
    if (isset($_POST['tour_description'])) {
        update_post_meta($post_id, '_tour_description', wp_kses_post($_POST['tour_description'])); // Sanitize HTML
    }

    if (isset($_POST['tour_location'])) {
        update_post_meta($post_id, '_tour_location', sanitize_text_field($_POST['tour_location']));
    }
    if (isset($_POST['tour_duration'])) {
        update_post_meta($post_id, '_tour_duration', sanitize_text_field($_POST['tour_duration']));
    }
    if (isset($_POST['tour_price'])) {
        update_post_meta($post_id, '_tour_price', floatval($_POST['tour_price']));
    }
    if (isset($_POST['tour_availability'])) {
        update_post_meta($post_id, '_tour_availability', sanitize_text_field($_POST['tour_availability']));
    }

    // Save Focus Keyword
    if (isset($_POST['rank_math_focus_keyword'])) {
        update_post_meta($post_id, '_rank_math_focus_keyword', sanitize_text_field($_POST['rank_math_focus_keyword']));
    }
    
    if (isset($_POST['tour_highlights']) && is_array($_POST['tour_highlights'])) {
        $sanitized_highlights = array_filter(array_map('sanitize_text_field', $_POST['tour_highlights']));
        update_post_meta($post_id, '_tour_highlights', $sanitized_highlights);
    } else {
        delete_post_meta($post_id, '_tour_highlights'); // Remove meta if no highlights provided
    }
    
}

add_action('save_post', 'save_tour_meta');
error_log(print_r($_POST['tour_highlights'], true));
?>