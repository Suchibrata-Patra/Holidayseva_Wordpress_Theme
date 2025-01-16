jQuery(document).ready(function($){
    var mediaUploader;
    $('#tour_cover_images_button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Select Cover Images',
            button: {
                text: 'Select Images'
            },
            multiple: true // Allow multiple file selection
        });

        mediaUploader.on('select', function() {
            var attachments = mediaUploader.state().get('selection').toJSON();
            var imageUrls = attachments.map(function(attachment) {
                return attachment.url;
            });
            $('#tour_cover_images').val(imageUrls.join(', '));
        });

        mediaUploader.open();
    });
});
