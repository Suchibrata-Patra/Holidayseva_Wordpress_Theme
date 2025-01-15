<?php

// Register Custom Post Type for Tours
function create_tour_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Tours',
            'singular_name' => 'Tour',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Tour',
            'edit_item' => 'Edit Tour',
            'new_item' => 'New Tour',
            'view_item' => 'View Tour',
            'all_items' => 'All Tours',
            'search_items' => 'Search Tours',
            'not_found' => 'No tours found',
            'not_found_in_trash' => 'No tours found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Tours'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'tours' ),
        'show_in_rest' => true,
    );
    register_post_type( 'tour', $args );
}
add_action( 'init', 'create_tour_post_type' );

// Add custom fields (meta boxes) for Tour images
function add_tour_meta_boxes() {
    add_meta_box(
        'tour_images',
        'Tour Images',
        'tour_images_callback',
        'tour',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_tour_meta_boxes' );

// Callback function for Tour images meta box
function tour_images_callback( $post ) {
    wp_nonce_field( 'tour_images_nonce', 'tour_images_nonce_field' );

    // Get stored values
    $image1 = get_post_meta( $post->ID, '_tour_image_1', true );
    $image2 = get_post_meta( $post->ID, '_tour_image_2', true );
    $image3 = get_post_meta( $post->ID, '_tour_image_3', true );
    $image4 = get_post_meta( $post->ID, '_tour_image_4', true );

    ?>
    <p>
        <label for="tour_image_1">Tour Image 1</label><br>
        <input type="text" name="tour_image_1" id="tour_image_1" value="<?php echo esc_attr( $image1 ); ?>" class="regular-text" />
        <button type="button" class="upload_image_button button">Choose Image</button>
    </p>
    <p>
        <label for="tour_image_2">Tour Image 2</label><br>
        <input type="text" name="tour_image_2" id="tour_image_2" value="<?php echo esc_attr( $image2 ); ?>" class="regular-text" />
        <button type="button" class="upload_image_button button">Choose Image</button>
    </p>
    <p>
        <label for="tour_image_3">Tour Image 3</label><br>
        <input type="text" name="tour_image_3" id="tour_image_3" value="<?php echo esc_attr( $image3 ); ?>" class="regular-text" />
        <button type="button" class="upload_image_button button">Choose Image</button>
    </p>
    <p>
        <label for="tour_image_4">Tour Image 4</label><br>
        <input type="text" name="tour_image_4" id="tour_image_4" value="<?php echo esc_attr( $image4 ); ?>" class="regular-text" />
        <button type="button" class="upload_image_button button">Choose Image</button>
    </p>

    <?php
    // Add 10 related forms
    for ($i = 1; $i <= 10; $i++) {
        ?>
        <p>
            <label for="tour_related_form_<?php echo $i; ?>">Related Form <?php echo $i; ?></label><br>
            <input type="text" name="tour_related_form_<?php echo $i; ?>" id="tour_related_form_<?php echo $i; ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, '_tour_related_form_' . $i, true ) ); ?>" class="regular-text" />
        </p>
        <?php
    }
}

// Save the custom meta data (Tour Images and Related Forms)
function save_tour_meta_data( $post_id ) {
    if ( ! isset( $_POST['tour_images_nonce_field'] ) || ! wp_verify_nonce( $_POST['tour_images_nonce_field'], 'tour_images_nonce' ) ) {
        return;
    }

    // Save Tour Images
    if ( isset( $_POST['tour_image_1'] ) ) {
        update_post_meta( $post_id, '_tour_image_1', sanitize_text_field( $_POST['tour_image_1'] ) );
    }
    if ( isset( $_POST['tour_image_2'] ) ) {
        update_post_meta( $post_id, '_tour_image_2', sanitize_text_field( $_POST['tour_image_2'] ) );
    }
    if ( isset( $_POST['tour_image_3'] ) ) {
        update_post_meta( $post_id, '_tour_image_3', sanitize_text_field( $_POST['tour_image_3'] ) );
    }
    if ( isset( $_POST['tour_image_4'] ) ) {
        update_post_meta( $post_id, '_tour_image_4', sanitize_text_field( $_POST['tour_image_4'] ) );
    }

    // Save Related Forms
    for ($i = 1; $i <= 10; $i++) {
        if ( isset( $_POST['tour_related_form_' . $i] ) ) {
            update_post_meta( $post_id, '_tour_related_form_' . $i, sanitize_text_field( $_POST['tour_related_form_' . $i] ) );
        }
    }
}
add_action( 'save_post', 'save_tour_meta_data' );

// Enqueue media uploader scripts
function enqueue_media_uploader() {
    wp_enqueue_media();
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.upload_image_button').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var custom_uploader = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    button.prev('input').val(attachment.url);
                }).open();
            });
        });
    </script>
    <?php
}
add_action( 'admin_enqueue_scripts', 'enqueue_media_uploader' );

?>