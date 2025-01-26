<?php 
function display_tour_meta_box($post) {
$reviews = get_post_meta($post->ID, '_reviews', true);
wp_nonce_field('tour_highlights_nonce', 'tour_highlights_nonce_field');
?>

<div id="reviews" class="hidden">
            <h3 class="form-title">Frequently Asked Questions</h3>
        
            <!-- Profile Picture Section -->
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <div class="custom-dropdown">
                    <div class="dropdown-selected" id="profile_picture_display">
                        <img src="<?php echo esc_url($profile_picture); ?>" alt="Selected Avatar" class="avatar-preview">
                        <span>Select Avatar</span>
                    </div>
                    <div class="dropdown-options" id="profile_picture_options">
                        <div class="dropdown-option" data-value="https://imagedelivery.net/xE-VtsYZUS2Y8MtLMcbXAg/4f1eb366cecf8f69f61c/sm">
                            <img src="https://imagedelivery.net/xE-VtsYZUS2Y8MtLMcbXAg/4f1eb366cecf8f69f61c/sm" alt="Avatar 1" class="avatar-img"> Avatar 1
                        </div>
                        <div class="dropdown-option" data-value="https://static.vecteezy.com/system/resources/previews/002/002/403/non_2x/man-with-beard-avatar-character-isolated-icon-free-vector.jpg">
                            <img src="https://static.vecteezy.com/system/resources/previews/002/002/403/non_2x/man-with-beard-avatar-character-isolated-icon-free-vector.jpg" alt="Avatar 2" class="avatar-img"> Avatar 2
                        </div>
                        <div class="dropdown-option" data-value="https://img.freepik.com/premium-photo/bearded-man-illustration_665280-67047.jpg">
                            <img src="https://img.freepik.com/premium-photo/bearded-man-illustration_665280-67047.jpg" alt="Avatar 3" class="avatar-img"> Avatar 3
                        </div>
                        <!-- Add more avatars as needed -->
                    </div>
                </div>
                <input type="hidden" name="profile_picture" id="profile_picture" value="<?php echo esc_url($profile_picture); ?>" />
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
        
        <!-- Single Script for CSS and JS -->
        <style>
        .custom-dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-selected {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .avatar-preview {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .dropdown-options {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .dropdown-option {
            padding: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        .dropdown-option:hover {
            background-color: #f0f0f0;
        }
        
        .avatar-img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        </style>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownSelected = document.getElementById('profile_picture_display');
            const dropdownOptions = document.getElementById('profile_picture_options');
            const profilePictureInput = document.getElementById('profile_picture');
            
            // Toggle the dropdown
            dropdownSelected.addEventListener('click', function() {
                dropdownOptions.style.display = dropdownOptions.style.display === 'block' ? 'none' : 'block';
            });
        
            // Handle avatar selection
            const options = document.querySelectorAll('.dropdown-option');
            options.forEach(function(option) {
                option.addEventListener('click', function() {
                    const avatarUrl = option.getAttribute('data-value');
                    profilePictureInput.value = avatarUrl; // Set the selected value
                    dropdownSelected.innerHTML = '<img src="' + avatarUrl + '" alt="Selected Avatar" class="avatar-preview"><span>Select Avatar</span>';
                    dropdownOptions.style.display = 'none'; // Close the dropdown
                });
            });
        
            // Close the dropdown if clicked outside
            document.addEventListener('click', function(event) {
                if (!dropdownSelected.contains(event.target)) {
                    dropdownOptions.style.display = 'none';
                }
            });
        });
        </script>


    <?php
     // Saving the Reiews
     if (isset($_POST['reviews']) && is_array($_POST['review'])) {
        // Sanitize each highlight
        $sanitized_highlights = array_map('sanitize_text_field', $_POST['itinerary']);
        
        // Save as post meta
        update_post_meta($post_id, '_reviews', $sanitized_highlights);
    } else {
        // If highlights are empty, delete the meta to avoid clutter
        delete_post_meta($post_id, '_itinerary');
    }
    ?>