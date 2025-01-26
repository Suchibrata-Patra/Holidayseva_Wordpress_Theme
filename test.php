<div id="google_map_iframe">
    <h3 class="form-title">Google Maps Iframe Input</h3>
    <div class="form-group">
        <label for="google_map_link">Google Maps Iframe Link</label>
        <textarea 
            name="google_map_link" 
            id="google_map_link" 
            class="form-control" 
            placeholder="Paste your Google Maps iframe embed link here" 
            rows="4"><?php echo esc_textarea($google_map_link); ?></textarea>
    </div>
    <div class="form-group">
        <label for="tour_price">Price</label>
        <input 
            type="number" 
            name="tour_price" 
            id="tour_price" 
            class="form-control" 
            value="<?php echo esc_attr($tour_price); ?>" 
            placeholder="in INR" />
    </div>
    <div class="map-preview">
        <h4>Map Preview</h4>
        <div id="iframe_preview" style="border: 1px solid #ddd; padding: 10px; height: 400px;">
            <!-- The iframe will load here -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const googleMapInput = document.getElementById('google_map_link');
        const iframePreview = document.getElementById('iframe_preview');

        // Event listener for changes in the textarea
        googleMapInput.addEventListener('input', function () {
            const iframeCode = googleMapInput.value.trim();

            // Check if the input contains an iframe tag
            if (iframeCode.startsWith('<iframe') && iframeCode.endsWith('</iframe>')) {
                iframePreview.innerHTML = iframeCode; // Update the preview with the iframe
            } else {
                iframePreview.innerHTML = '<p style="color: red;">Invalid iframe code. Please paste a valid Google Maps iframe embed link.</p>';
            }
        });
    });
</script>

