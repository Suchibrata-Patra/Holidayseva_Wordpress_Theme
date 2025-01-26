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
    $tour_offers = get_post_meta($post->ID, '_tour_offers', true);
    $tour_availability = get_post_meta($post->ID, '_tour_availability', true);
    $tour_highlights = get_post_meta($post->ID, '_tour_highlights', true);

    $itinerary = get_post_meta($post->ID, '_itinerary', true);
    $included = get_post_meta($post->ID, '_included', true);
    $excluded = get_post_meta($post->ID, '_excluded', true);
    // Fetch the saved Google Maps iframe
    $google_map_link = get_post_meta(get_the_ID(), '_google_map_link', true);
    $reviews = get_post_meta($post->ID, '_reviews', true);
    $reviews = is_array($reviews) ? $reviews : [];

    wp_nonce_field('tour_highlights_nonce', 'tour_highlights_nonce_field');
    var_dump($tour_highlights); // This should display the value of `_tour_highlights`.
?>
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <span>
            <hr>Fundamenatal Details
            <hr>
        </span>
        <a href="#" class="tab-link active" data-target="basic_info">Basic Info</a>
        <a href="#" class="tab-link" data-target="highlights">Highlights</a>
        <a href="#" class="tab-link" data-target="itinerary">Itinerary</a>
        <a href="#" class="tab-link" data-target="included">Included (New)</a>
        <a href="#" class="tab-link" data-target="excluded">Excluded (New)</a>
        <a href="#" class="tab-link" data-target="pricing"> <strong style="font-weight:600!important;">Price
                Settings</strong>
        </a>
        <a href="#" class="tab-link" data-target="reviews">Reviews</a>
        <a href="#" class="tab-link" data-target="google_map_iframe">Google Map Iframe</a>
        <a href="#" class="tab-link" data-target="frequently_asked_questions">FAQ</a>
        <span>
            <hr> Dynamic Contents
            <hr>
        </span>
        <a href="#" class="tab-link" data-target="recommendation">Recommendation ENGINE</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Tour Form -->
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

        <!-- Highlights -->
        <div id="highlights" class="hidden">
            <h3 class="form-title">Highlights</h3>
            <?php for ($i = 1; $i <= 20; $i++) : ?>
            <div class="form-group">
                <label for="tour_highlight_<?php echo $i; ?>">Highlight
                    <?php echo $i; ?>
                </label>
                <input type="text" name="tour_highlights[]" id="tour_highlight_<?php echo $i; ?>" class="form-control"
                    value="<?php echo isset($tour_highlights[$i - 1]) ? esc_attr($tour_highlights[$i - 1]) : ''; ?>" />
            </div>
            <?php endfor; ?>
        </div>



        <!--Itinerary -->
        <div id="itinerary" class="hidden">
            <h3 class="form-title">itinerary</h3>
            <?php for ($i = 1; $i <= 20; $i++) : ?>
            <div class="form-group">
                <label for="itinerary_<?php echo $i; ?>">Itinerary Item
                    <?php echo $i; ?>
                </label>
                <input type="text" name="itinerary[]" id="itinerary_<?php echo $i; ?>" class="form-control"
                    value="<?php echo isset($itinerary[$i - 1]) ? esc_attr($itinerary[$i - 1]) : ''; ?>" />
            </div>
            <?php endfor; ?>
        </div>

        <!--Included -->
        <div id="included" class="hidden">
            <h3 class="form-title">included</h3>
            <?php for ($i = 1; $i <= 20; $i++) : ?>
            <div class="form-group">
                <label for="included_<?php echo $i; ?>">Included Item
                    <?php echo $i; ?>
                </label>
                <input type="text" name="included[]" id="included_<?php echo $i; ?>" class="form-control"
                    value="<?php echo isset($included[$i - 1]) ? esc_attr($included[$i - 1]) : ''; ?>" />
            </div>
            <?php endfor; ?>
        </div>

        <!--Excluded -->
        <div id="excluded" class="hidden">
            <h3 class="form-title">excluded</h3>
            <?php for ($i = 1; $i <= 20; $i++) : ?>
            <div class="form-group">
                <label for="excluded_<?php echo $i; ?>">Excluded Item
                    <?php echo $i; ?>
                </label>
                <input type="text" name="excluded[]" id="excluded_<?php echo $i; ?>" class="form-control"
                    value="<?php echo isset($excluded[$i - 1]) ? esc_attr($excluded[$i - 1]) : ''; ?>" />
            </div>
            <?php endfor; ?>
        </div>



        <!-- Reviews -->
        <div id="reviews">
            <h3 class="form-title">Reviews</h3>
            <div id="reviews-container">
                <?php foreach ($reviews as $index => $review) : ?>
                <div class="review-set" data-index="<?php echo $index; ?>">
                    <h4>Review
                        <?php echo $index + 1; ?>
                    </h4>
                    <div style="display:flex;">
                        <div class="form-group">
                            <label for="reviewer_name_<?php echo $index; ?>">Name</label>
                            <input type="text" name="reviews[<?php echo $index; ?>][name]"
                                id="reviewer_name_<?php echo $index; ?>" class="form-control"
                                value="<?php echo esc_attr($review['name'] ?? ''); ?>" />
                        </div>
                        <div class="form-group" style="margin-left:30px;border-radius:50px;">
                            <label for="review_score_<?php echo $index; ?>">Rating</label>
                            <select name="reviews[<?php echo $index; ?>][score]" id="review_score_<?php echo $index; ?>"
                                class="form-control" style="padding:10px 10px;">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <option value="<?php echo $i; ?>" <?php selected($review['score'] ?? '' , $i); ?>>
                                    <?php echo str_repeat('&#9733;', $i); ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="form-group" style="margin-left:30px;width:80%;">
                        <label for="review_content_<?php echo $index; ?>">Review</label>
                        <textarea name="reviews[<?php echo $index; ?>][content]"
                            id="review_content_<?php echo $index; ?>"
                            class="form-control"><?php echo esc_textarea($review['content'] ?? ''); ?></textarea>
                    </div>

                    </div>
                    
                    <button type="button" class="remove-review">Remove</button>
                </div>
                <?php endforeach; ?>
            </div>
            <button type="button" id="add-review">Add Review</button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const container = document.getElementById('reviews-container');
                const addReviewButton = document.getElementById('add-review');

                addReviewButton.addEventListener('click', function () {
                    const index = container.children.length;
                    const reviewHTML = `
            <div class=\"review-set\" data-index=\"${index}\">
                <h4>Review ${index + 1}</h4>
                <div class=\"form-group\">
                    <label for=\"reviewer_name_${index}\">Reviewer Name</label>
                    <input type=\"text\" name=\"reviews[${index}][name]\" id=\"reviewer_name_${index}\" class=\"form-control\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"review_score_${index}\">Review Score</label>
                    <select name=\"reviews[${index}][score]\" id=\"review_score_${index}\" class=\"form-control\">
                        ${[1, 2, 3, 4, 5].map(i => `<option value=\"${i}\">${i}</option>`).join('')}
                    </select>
                </div>
                <div class=\"form-group\">
                    <label for=\"review_content_${index}\">Review Content</label>
                    <textarea name=\"reviews[${index}][content]\" id=\"review_content_${index}\" class=\"form-control\"></textarea>
                </div>
                <button type=\"button\" class=\"remove-review\">Remove</button>
            </div>`;

                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = reviewHTML.trim();
                    container.appendChild(tempDiv.firstChild);
                });

                container.addEventListener('click', function (event) {
                    if (event.target.classList.contains('remove-review')) {
                        event.target.closest('.review-set').remove();
                    }
                });
            });
        </script>



        <!-- Recommendation ENGINE -->
        <div id="recommendation" class="hidden">
            <h3 class="form-title">Recommended Tours</h3>
            <span>Choose the Tour Pages [Maximum - 10, Min - 4] Such that the returning users can get to know about our
                top selling tour packages...</span>
            <span>
                <h4>under Development</h4>
            </span>
        </div>



        <!-- pricing Strategy -->
        <div id="pricing" class="hidden">
            <h3 class="form-title">Basic Info</h3>
            <div class="form-group">
                <label for="tour_price">Price (Per Adult)</label>
                <input type="number" name="tour_price" id="tour_price" class="form-control"
                    value="<?php echo esc_attr($tour_price); ?>" placeholder="in INR" />
            </div>

            <div id="offers_section">
                <h4>Discount by adult number booking</h4>
                <?php if (!empty($tour_offers)) : ?>
                <?php foreach ($tour_offers as $offer) : ?>
                <div class="offer-group">
                    <label>From</label>
                    <input type="number" name="offer[from][]" class="form-control"
                        value="<?php echo esc_attr($offer['from']); ?>" />
                    <label>To</label>
                    <input type="number" name="offer[to][]" class="form-control"
                        value="<?php echo esc_attr($offer['to']); ?>" />
                    <label>Discount (%)</label>
                    <input type="number" name="offer[discount][]" class="form-control"
                        value="<?php echo esc_attr($offer['discount']); ?>" />
                    <button type="button" class="remove-offer-btn">Remove</button>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="button" id="add_offer_btn" class="btn btn-secondary">Add More Offers</button>
            <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <script>
            document.getElementById('add_offer_btn').addEventListener('click', function () {
                const offersSection = document.getElementById('offers_section');
                const newOfferGroup = document.createElement('div');
                newOfferGroup.classList.add('offer-group');

                newOfferGroup.innerHTML = `
        <label>From</label>
        <input type="number" name="offer[from][]" class="form-control" placeholder="Min People" />
        <label>To</label>
        <input type="number" name="offer[to][]" class="form-control" placeholder="Max People" />
        <label>Discount (%)</label>
        <input type="number" name="offer[discount][]" class="form-control" placeholder="Discount" />
        <button type="button" class="remove-offer-btn">Remove</button>
    `;

                offersSection.appendChild(newOfferGroup);

                newOfferGroup.querySelector('.remove-offer-btn').addEventListener('click', function () {
                    newOfferGroup.remove();
                });
            });

            document.querySelectorAll('.remove-offer-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    btn.parentElement.remove();
                });
            });
        </script>

        <style>
            .offer-group {
                margin-bottom: 10px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .remove-offer-btn {
                background-color: #ff4d4d;
                color: white;
                border: none;
                padding: 5px 10px;
                border-radius: 5px;
                cursor: pointer;
            }

            .remove-offer-btn:hover {
                background-color: #ff1a1a;
            }
        </style>


        <!-- Google Maps iframes -->
        <div id="google_map_iframe">
            <h3 class="form-title">Google Maps Iframe Input</h3>
            <div class="form-group">
                <label for="google_map_link">Google Maps iframe Link</label>
                <textarea name="google_map_link" id="google_map_link" class="form-control"
                    placeholder="Paste your Google Maps iframe embed link here"
                    rows="4"><?php echo esc_textarea($google_map_link); ?></textarea>
            </div>
            <div class="map-preview">
                <h4>Map Preview</h4>
                <div id="iframe_preview" style="border: 1px solid #ddd; padding: 10px; height:auto;">
                    <!-- The iframe will load here -->
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const googleMapInput = document.getElementById('google_map_link');
                const iframePreview = document.getElementById('iframe_preview');

                // Check if there's an iframe link saved in localStorage
                const savedIframeCode = localStorage.getItem('googleMapIframe');
                if (savedIframeCode) {
                    googleMapInput.value = savedIframeCode; // Load the saved value back into the textarea
                    iframePreview.innerHTML = savedIframeCode; // Show the saved iframe preview
                }

                // Event listener for changes in the textarea
                googleMapInput.addEventListener('input', function () {
                    const iframeCode = googleMapInput.value.trim();
                    // Check if the input contains an iframe tag
                    if (iframeCode.startsWith('<iframe') && iframeCode.endsWith('</iframe>')) {
                        iframePreview.innerHTML = iframeCode; // Update the preview with the iframe
                        localStorage.setItem('googleMapIframe', iframeCode); // Save the iframe code in localStorage
                    } else {
                        iframePreview.innerHTML = '<p style="color: red;">Invalid iframe code. Please paste a valid Google Maps iframe embed link.</p>';
                        localStorage.removeItem('googleMapIframe'); // Clear the saved iframe if it's invalid
                    }
                });
            });
        </script>
        <!-- End Google Maps iframe -->











    </div>
</div>





<style>
    /* Layout Styling */
    .container {
        display: flex;
        min-height: 100vh;
        background-color: rgb(255, 255, 255);
    }

    /* Sidebar Styling */
    .sidebar {
        width: 20%;
        background-color: #16404D;
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
        background-color: rgb(210, 159, 77);
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
        border-radius: 0px;
        /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 2px;
        font-weight: 600;
        color: rgb(0, 0, 0);
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
    if (!current_user_can('edit_post', $post_id)) return $post_id;


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
    if (isset($_POST['tour_highlights_nonce_field']) && !wp_verify_nonce($_POST['tour_highlights_nonce_field'], 'tour_highlights_nonce')) {
        return $post_id; // Nonce is invalid, do not save
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;
    
    // Savig these for Tour ighlights
    if (isset($_POST['tour_highlights']) && is_array($_POST['tour_highlights'])) {
        // Sanitize each highlight
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['tour_highlights']);
        
        // Save as post meta
        update_post_meta($post_id, '_tour_highlights', $sanitized_highlights);
    } else {
        // If highlights are empty, delete the meta to avoid clutter
        delete_post_meta($post_id, '_tour_highlights');
    }


    // Saving the Posts for the Tour Itinery
    if (isset($_POST['itinerary']) && is_array($_POST['itinerary'])) {
        // Sanitize each highlight
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['itinerary']);
        
        // Save as post meta
        update_post_meta($post_id, '_itinerary', $sanitized_highlights);
    } else {
        // If highlights are empty, delete the meta to avoid clutter
        delete_post_meta($post_id, '_itinerary');
    }


    // Saving the Review Data
    if (isset($_POST['reviews']) && is_array($_POST['reviews'])) {
        $sanitized_reviews = array_map(function($review) {
            return [
                'name' => sanitize_text_field($review['name'] ?? ''),
                'score' => intval($review['score'] ?? 0),
                'content' => sanitize_textarea_field($review['content'] ?? '')
            ];
        }, $_POST['reviews']);

        update_post_meta($post_id, '_reviews', $sanitized_reviews);
    } else {
        delete_post_meta($post_id, '_reviews');
    }



    // Saving the Included
    if (isset($_POST['included']) && is_array($_POST['included'])) {
        // Sanitize each highlight
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['included']);
        
        // Save as post meta
        update_post_meta($post_id, '_included', $sanitized_highlights);
    } else {
        // If highlights are empty, delete the meta to avoid clutter
        delete_post_meta($post_id, '_included');
    }
    // Saving the Excluded
    if (isset($_POST['excluded']) && is_array($_POST['excluded'])) {
        // Sanitize each highlight
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['excluded']);
        
        // Save as post meta
        update_post_meta($post_id, '_excluded', $sanitized_highlights);
    } else {
        // If highlights are empty, delete the meta to avoid clutter
        delete_post_meta($post_id, '_excluded');
    } 

    

}


add_action('save_post', 'save_tour_meta');


function save_tour_pricing_data($post_id) {
    // Verify the nonce for security
    if (!isset($_POST['tour_highlights_nonce_field']) || !wp_verify_nonce($_POST['tour_highlights_nonce_field'], 'tour_highlights_nonce')) {
        return;
    }

    // Check for autosave and user permissions
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Save pricing data (People-Based Offers)
    if (isset($_POST['offer']['from'], $_POST['offer']['to'], $_POST['offer']['discount'])) {
        $offers = [];
        $from = $_POST['offer']['from'];
        $to = $_POST['offer']['to'];
        $discount = $_POST['offer']['discount'];

        foreach ($from as $index => $value) {
            if (!empty($value) && !empty($to[$index]) && !empty($discount[$index])) {
                $offers[] = [
                    'from' => sanitize_text_field($value),
                    'to' => sanitize_text_field($to[$index]),
                    'discount' => sanitize_text_field($discount[$index]),
                ];
            }
        }

        // Save offers array as JSON in post meta
        update_post_meta($post_id, '_tour_offers', $offers);
    }
}
add_action('save_post', 'save_tour_pricing_data');


// Save Google Map iframe and Tour Price when the post is saved
function save_google_map_and_tour_price($post_id) {
    // Ensure that we're not autosaving
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    
    // Only proceed if it's a valid post type (e.g., 'tour')
    if ('tour' === get_post_type($post_id)) {
        // Check if the google_map_link field is set and store it as is
        if (isset($_POST['google_map_link'])) {
            $google_map_link = $_POST['google_map_link']; // No sanitization, storing raw input
            update_post_meta($post_id, '_google_map_link', $google_map_link);
        }
        
    }

    return $post_id;
}
add_action('save_post', 'save_google_map_and_tour_price');


?>