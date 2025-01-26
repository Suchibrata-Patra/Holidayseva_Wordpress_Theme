<div id="basic_info">
    <h3 class="form-title">Basic Info</h3>
    <form method="post" action="" class="styled-form">
        <div class="form-group">
            <label for="tour_name">Tour Package Name</label>
            <input type="text" name="tour_name" id="tour_name" class="form-control"
                value="<?php echo esc_attr($tour_name); ?>" />
        </div>
        <div class="form-group">
            <label for="tour_price">Price</label>
            <input type="number" name="tour_price" id="tour_price" class="form-control"
                value="<?php echo esc_attr($tour_price); ?>" placeholder="in INR" />
        </div>

        <div id="offers_section">
            <h4>People-Based Offers</h4>
            <div class="offer-group">
                <label>From</label>
                <input type="number" name="offer[from][]" class="form-control" placeholder="Min People" />
                <label>To</label>
                <input type="number" name="offer[to][]" class="form-control" placeholder="Max People" />
                <label>Discount (%)</label>
                <input type="number" name="offer[discount][]" class="form-control" placeholder="Discount" />
                <button type="button" class="remove-offer-btn">Remove</button>
            </div>
        </div>
        <button type="button" id="add_offer_btn" class="btn btn-secondary">Add More Offers</button>
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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