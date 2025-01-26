<div id="reviews-wrapper">
    <h3 class="form-title">Customer Reviews</h3>
    
    <div id="reviews-container">
        <!-- A single name-review pair -->
        <div class="review-pair">
            <div class="form-group">
                <label for="reviewers_name[]">Customer Name</label>
                <input type="text" name="reviewers_name[]" class="form-control" placeholder="Enter Customer Name" />
            </div>
            <div class="form-group">
                <label for="customer_review[]">Customer Review</label>
                <textarea name="customer_review[]" class="form-control" placeholder="Enter Customer Review"></textarea>
            </div>
        </div>
    </div>

    <!-- Add New Review Button -->
    <button type="button" id="add-review" class="button">Add Another Review</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addReviewButton = document.getElementById('add-review');
    const reviewsContainer = document.getElementById('reviews-container');

    addReviewButton.addEventListener('click', function() {
        // Clone the first review-pair and clear its input values
        const reviewPair = document.querySelector('.review-pair').cloneNode(true);
        reviewPair.querySelectorAll('input, textarea').forEach(input => input.value = '');
        reviewsContainer.appendChild(reviewPair);
    });
});
</script>
