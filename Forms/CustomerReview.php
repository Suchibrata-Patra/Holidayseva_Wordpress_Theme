<?php
function display_tour_meta_box($post) {
    $reviews = get_post_meta($post->ID, '_reviews', true);
    $reviews = is_array($reviews) ? $reviews : [];
?>
<div id="reviews">
            <div style="display:flex;">
                <h3 class="form-title">Reviews</h3>
                <button type="button" id="add-review" style="border-radius:50px;background-color:green;color:white;border:none;margin-top:5%;margin-bottom:5%;margin-left:20px;padding:5px 10px;">Add +</button>
            </div>
            <div id="reviews-container">
                <?php foreach ($reviews as $index => $review) : ?>
                <div class="review-set" data-index="<?php echo $index; ?>" style="border:2px solid #2980b9;margin-top:10px;border-radius:4px;padding:5px;background-color:#FBFBFB;">
                    <h4 style="margin-bottom:3px;">Review No - <?php echo $index + 1; ?>
                    </h4>
                    <div style="display:flex;">
                        <div class="form-group">
                            <label for="reviewer_name_<?php echo $index; ?>">Name</label>
                            <input type="text" name="reviews[<?php echo $index; ?>][name]"
                                id="reviewer_name_<?php echo $index; ?>" class="form-control" style="border-radius:5px;"
                                value="<?php echo esc_attr($review['name'] ?? ''); ?>" />
                        </div>

                        <div class="form-group" style="margin-left:10px;">
                            <label for="review_score_<?php echo $index; ?>">Rating</label>
                            <select name="reviews[<?php echo $index; ?>][score]" id="review_score_<?php echo $index; ?>"
                                class="form-control" style="padding:10px 10px;border-radius:5px;">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <option value="<?php echo $i; ?>" <?php selected($review['score'] ?? '' , $i); ?>>
                                    <?php echo str_repeat('&#x2B50;', $i); ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="form-group" style="margin-left:10px;width:80%;">
                            <label for="review_content_<?php echo $index; ?>">Review</label>
                            <textarea name="reviews[<?php echo $index; ?>][content]"
                            id="review_content_<?php echo $index; ?>"
                            style="border-radius:5px;"
                            class="form-control"><?php echo esc_textarea($review['content'] ?? ''); ?></textarea>
                        </div>

                    </div>
                    
                    <button type="button" class="remove-review" style="border-radius:50px;background-color:red;color:white;border:none;padding:5px 8px;">Remove</button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const container = document.getElementById('reviews-container');
                const addReviewButton = document.getElementById('add-review');

                addReviewButton.addEventListener('click', function () {
                    const index = container.children.length;
                    const reviewHTML = `
            <div class=\"review-set\" data-index=\"${index}\" style=\"border:2px solid #2980b9;margin-top:10px;border-radius:4px;padding:5px;background-color:#FBFBFB;\">
                <h4>Review ${index + 1}</h4>
                <div style=\"display:flex;\">
                <div class=\"form-group\" style=\"margin-left:10px;\">
                    <label for=\"reviewer_name_${index}\">Name</label>
                    <input type=\"text\" name=\"reviews[${index}][name]\" id=\"reviewer_name_${index}\" class=\"form-control\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"review_score_${index}\">Rating</label>
                    
                    <select name=\"reviews[${index}][score]\" id=\"review_score_${index}\"
                                class="form-control" style="padding:10px 10px;border-radius:5px;">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <option value="<?php echo $i; ?>" <?php selected($review['score'] ?? '' , $i); ?>>
                                    <?php echo str_repeat('&#x2B50;', $i); ?>
                                </option>
                                <?php endfor; ?>
                    </select>

                   

                </div>
                <div class=\"form-group\">
                    <label for=\"review_content_${index}\" style=\"width:80%;\">Review</label>
                    <textarea name=\"reviews[${index}][content]\" id=\"review_content_${index}\" class=\"form-control\"></textarea>
                </div>
                </div>
                <button type=\"button\" class=\"remove-review\" style=\"border-radius:50px;background-color:red;color:white;border:none;padding:5px 8px;\">Remove</button>
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

<?php
}

// Save custom fields values when the post is saved
function save_tour_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!current_user_can('edit_post', $post_id)) return $post_id;

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

}

add_action('save_post', 'save_tour_meta');

?>