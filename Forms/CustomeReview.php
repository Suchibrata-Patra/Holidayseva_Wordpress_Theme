<?php
// Display the Reviews Meta Box
function display_tour_meta_box($post) {
    // Retrieve existing reviews
    $reviews = get_post_meta($post->ID, '_reviews', true);
    $reviews = is_array($reviews) ? $reviews : []; // Ensure it's an array

    wp_nonce_field('tour_reviews_nonce', 'tour_reviews_nonce_field');
    ?>
    <div class="reviews" class="hidden">
    <div id="reviews-container">
        <h3 class="form-title">Customer Reviews</h3>

        <div id="reviews-list">
            <?php foreach ($reviews as $index => $review) : ?>
                <div class="review-item" data-index="<?php echo $index; ?>">
                    <h4>Review <?php echo $index + 1; ?></h4>
                    <label>Profile Picture:</label>
                    <input type="hidden" name="reviews[<?php echo $index; ?>][profile_picture]" value="<?php echo esc_url($review['profile_picture']); ?>" class="profile_picture">
                    <img src="<?php echo esc_url($review['profile_picture']); ?>" class="avatar-preview" alt="Selected Avatar">
                    <button type="button" class="change-avatar">Change Avatar</button>

                    <label>Customer Name:</label>
                    <input type="text" name="reviews[<?php echo $index; ?>][customer_name]" value="<?php echo esc_attr($review['customer_name']); ?>" class="customer_name">

                    <label>Customer Review:</label>
                    <textarea name="reviews[<?php echo $index; ?>][customer_review]" class="customer_review"><?php echo esc_textarea($review['customer_review']); ?></textarea>

                    <button type="button" class="remove-review">Remove Review</button>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" id="add-review">Add New Review</button>
    </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const reviewsContainer = document.getElementById('reviews-list');
        const addReviewButton = document.getElementById('add-review');

        addReviewButton.addEventListener('click', function () {
            const index = reviewsContainer.children.length;
            const template = `
                <div class="review-item" data-index="${index}">
                    <h4>Review ${index + 1}</h4>
                    <label>Profile Picture:</label>
                    <input type="hidden" name="reviews[${index}][profile_picture]" class="profile_picture">
                    <img src="" class="avatar-preview" alt="Selected Avatar">
                    <button type="button" class="change-avatar">Change Avatar</button>

                    <label>Customer Name:</label>
                    <input type="text" name="reviews[${index}][customer_name]" class="customer_name">

                    <label>Customer Review:</label>
                    <textarea name="reviews[${index}][customer_review]" class="customer_review"></textarea>

                    <button type="button" class="remove-review">Remove Review</button>
                </div>
            `;
            reviewsContainer.insertAdjacentHTML('beforeend', template);
        });

        reviewsContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-review')) {
                event.target.closest('.review-item').remove();
            }
        });
    });
    </script>

    <style>
        .review-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .avatar-preview {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .remove-review {
            color: red;
            cursor: pointer;
        }
    </style>
    <?php
}

// Save the Reviews
function save_tour_reviews($post_id) {
    // Check if the nonce is valid
    if (!isset($_POST['tour_reviews_nonce_field']) || 
        !check_admin_referer('tour_reviews_nonce', 'tour_reviews_nonce_field')) {
        return;
    }

    // Check if reviews are set
    if (isset($_POST['reviews']) && is_array($_POST['reviews'])) {
        $reviews = [];

        foreach ($_POST['reviews'] as $review) {
            $reviews[] = [
                'profile_picture' => isset($review['profile_picture']) ? esc_url_raw($review['profile_picture']) : '',
                'customer_name' => isset($review['customer_name']) ? sanitize_text_field($review['customer_name']) : '',
                'customer_review' => isset($review['customer_review']) ? sanitize_textarea_field($review['customer_review']) : '',
            ];
        }

        // Save reviews as serialized data
        update_post_meta($post_id, '_reviews', $reviews);
    } else {
        // If no reviews, delete the meta
        delete_post_meta($post_id, '_reviews');
    }
}

// Attach to WordPress hooks
function setup_reviews_meta_box() {
    add_meta_box(
        'tour_reviews_meta',          // Meta box ID
        'Tour Reviews',               // Title
        'display_tour_meta_box',      // Callback function
        'tour',                       // Post type
        'normal',                     // Context
        'default'                     // Priority
    );
}
add_action('add_meta_boxes', 'setup_reviews_meta_box');
add_action('save_post', 'save_tour_reviews');
