<?php
/**
 * The template for displaying single Tour posts.
 *
 * @package YourThemeName
 */

get_header(); ?>
<main id="primary" class="site-main">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/Central_styling.css">
<?php
// while (have_posts()) :
//     the_post();

//     // Display the title
//     echo '<h1 class="tour-title">' . get_the_title() . '</h1>';

//     // Display the featured image
//     if (has_post_thumbnail()) {
//         echo '<div class="tour-featured-image">';
//         the_post_thumbnail('large');
//         echo '</div>';
//     }

//     // Display the tour details
//     $tour_details = array(
//         'Location' => get_post_meta(get_the_ID(), '_tour_location', true),
//         'Duration' => get_post_meta(get_the_ID(), '_tour_duration', true),
//         'Price' => get_post_meta(get_the_ID(), '_tour_price', true),
//         'Availability' => get_post_meta(get_the_ID(), '_tour_availability', true),
//     );

//     echo '<div class="tour-details">';
//     foreach ($tour_details as $key => $value) {
//         if (!empty($value)) {
//             echo '<p><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</p>';
//         }
//     }
//     echo '</div>';

//     // Display the tour content
//     echo '<div class="tour-content">';
//     the_content();
//     echo '</div>';

//     // Display the cover images (if any)
//     $tour_cover_images = get_post_meta(get_the_ID(), '_tour_cover_images', true);
    
//     if (!empty($tour_cover_images)) {
//         // Explode the comma-separated string into an array of image URLs
//         $images = is_string($tour_cover_images) ? explode(',', $tour_cover_images) : [];

//         echo '<div class="tour-cover-images">';
//         echo '<h3>Gallery</h3>';

//         // Ensure that $images is an array and loop through it
//         if (is_array($images) && !empty($images)) {
//             foreach ($images as $image_url) {
//                 echo '<img src="' . esc_url(trim($image_url)) . '" alt="Tour Image" class="tour-image" />';
//             }
//         } else {
//             // If no valid images are available, you can display a fallback message
//             echo '<p>No images available for this tour.</p>';
//         }

//         echo '</div>';
//     }

//     // Display navigation to next and previous posts
//     echo '<div class="tour-navigation">';
//     previous_post_link('<span class="prev-link">%link</span>', '&laquo; Previous Tour');
//     next_post_link('<span class="next-link">%link</span>', 'Next Tour &raquo;');
//     echo '</div>';

// endwhile; // End of the loop.
?>
<div class="hotel-store-row">
  <div class="hotel-store-heading">
    Flagship Hotel Stores<br>on MakeMyTrip
  </div>

  <div class="hotel-store-cards">
    
    <div class="hotel-card" style="background-image: url('https://platforms.makemytrip.com/contents/7300a7ec-9452-4c2b-b2aa-e8b2ebee7f12');">
      <div class="hotel-card-text">CGH Earth Experience Hotels</div>
    </div>
    <div class="hotel-card" style="background-image: url('https://platforms.makemytrip.com/contents/7300a7ec-9452-4c2b-b2aa-e8b2ebee7f12');">
      <div class="hotel-card-text">CGH Earth Experience Hotels</div>
    </div>
    <div class="hotel-card" style="background-image: url('https://platforms.makemytrip.com/contents/b945fe53-f41e-419a-9718-f36bbb6e23fe');">
      <div class="hotel-card-text">Polo Towers</div>
    </div>
  </div>
</div>
</main>

<style>
    #primary{
    margin:0% 8% 0% 8%;
    }
.hotel-store-row {
  display: flex;
  align-items: center; /* aligns items vertically center */
  justify-content: space-between; /* spreads text & cards horizontally */
  background: #eaf6ff;
  padding: 20px 30px;
  border-radius: 10px;
  gap: 30px;
  overflow-x: auto;
  white-space: nowrap;
}


.model_of_the_things{
    things_t
}

.hotel-store-heading {
  font-size: 24px;
  font-weight: 700;
  color: #000;
  flex-shrink: 0;
  white-space: normal;
  line-height: 1.4;
  min-width: 240px;
}

.hotel-store-cards {
  display: flex;
  gap: 20px;
  flex-shrink: 0;
  margin:0% 5% 0% 5%;
}

.hotel-card {
  position: relative;
  width: 220px;
  height: 160px;
  border-radius: 10px;
  overflow:auto;
  background-size: cover;
  background-position: center;
  color: #fff;
  flex-shrink: 0;
}

.hotel-card::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
}

.hotel-card-text {
  position: absolute;
  bottom: 10px;
  left: 12px;
  z-index: 2;
  font-weight: bold;
  font-size: 14px;
}
</style>
Model of the thigs to be develoed by the model of the things to be doe by the thing is nothing but 


<style>
 
  .offer_container {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  }

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
  }

  .tab {
    color: #666;
    font-weight: 500;
    cursor: pointer;
  }

  .tab.active {
    color: #007bff;
    border-bottom: 2px solid #007bff;
  }

  .offers {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 10px;
  }

  .offer-card {
    flex: 0 0 auto;
    min-width: 280px;
    max-width: 300px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    scroll-snap-align: start;
    transition: transform 0.2s;
  }

  .offer-card:hover {
    transform: translateY(-5px);
  }

  .offer-image {
    width: 100%;
    height: 140px;
    object-fit: cover;
  }

  .offer-content {
    padding: 15px;
  }

  .offer-type {
    font-size: 12px;
    color: #999;
    margin-bottom: 5px;
  }

  .offer-title {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .offer-description {
    color: #555;
    font-size: 14px;
    margin-bottom: 10px;
  }

  .offer-link {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
  }

  .footer-nav {
    text-align: right;
    margin-top: 10px;
  }

  /* Hide scrollbar (for Webkit & Firefox) */
  .offers::-webkit-scrollbar {
    display: none;
  }

  .offers {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none;    /* Firefox */
  }

</style>

<div class="offer_container">
  <div class="header">
    <h2>Offers</h2>
    <div class="tabs">
      <div class="tab active">All Offers</div>
    </div>
  </div>

  <div class="offers">
    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1517479149777-5f3b1511d5ad?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Akasa Air" class="offer-image">
      <div class="offer-content">
        <div class="offer-type">DOM FLIGHTS</div>
        <div class="offer-title">LIVE NOW: Getaway Sale by Akasa Air</div>
        <div class="offer-description">with flight fares starting @ ₹1,599*</div>
        <a href="#" class="offer-link">BOOK NOW</a>
      </div>
    </div>

    <div class="offer-card">
      <img src="https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?q=80&w=1620&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hotels" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">Hotels in Spotlight</div>
        <div class="offer-description">Luxury Stays Chosen by our Experts for your next relaxing break!</div>
        <a href="#" class="offer-link">EXPLORE NOW</a>
      </div>
    </div>

    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1717326630872-f9b8b65050a4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8VGFqJTIwaG90ZWx8ZW58MHx8MHx8fDA%3D" alt="Taj" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">FOR MEMORABLE STAYS AT THE TAJ:</div>
        <div class="offer-description">Get FLAT 15% Savings* on Stays & More!</div>
        <a href="#" class="offer-link">VIEW DETAILS</a>
      </div>
    </div>
    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1614082813462-d763a404cbb7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fFRhaiUyMGhvdGVsfGVufDB8fDB8fHww" alt="Taj" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">FOR MEMORABLE STAYS AT THE TAJ:</div>
        <div class="offer-description">Get FLAT 15% Savings* on Stays & More!</div>
        <a href="#" class="offer-link">VIEW DETAILS</a>
      </div>
    </div>
    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmF0dXJlfGVufDB8fDB8fHww" alt="Taj" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">FOR MEMORABLE STAYS AT THE TAJ:</div>
        <div class="offer-description">Get FLAT 15% Savings* on Stays & More!</div>
        <a href="#" class="offer-link">VIEW DETAILS</a>
      </div>
    </div>

    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1614082813462-d763a404cbb7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fFRhaiUyMGhvdGVsfGVufDB8fDB8fHww" alt="Axis Bank" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">INTL FLIGHTS</div>
        <div class="offer-title">Up to 25% OFF* + Additional Savings on EMI</div>
        <div class="offer-description">for flights, hotels, holiday packages, cabs & buses.</div>
        <a href="#" class="offer-link">VIEW DETAILS</a>
      </div>
    </div>
  </div>

  <div class="footer-nav">
    <a href="#" class="offer-link">VIEW ALL →</a>
  </div>
</div>









<div style="display: flex; height: 100vh; width: 100vw;">

    <!-- Left: Full Image, Fit Inside -->
    <div style="width: 70%; height: auto; display: flex; align-items: center; justify-content: center; background-color:none;">
        <img src="https://a0.muscache.com/im/pictures/canvas/Canvas-1727297260081/original/e97a2325-f789-49df-b474-25c77476d433.jpeg" 
             alt="Landing Visual" 
             style="max-width: 100%; max-height: 80%; object-fit: contain;">
    </div>

    <!-- Right: Text Centered -->
    <div style="width: 50%; background-color:rgb(255, 255, 255); display: flex; align-items: center; justify-content: left;">
        <div style="font-size: 3rem; font-weight: bold; text-align: left;">
            Comming Soon... 
        </div>
    </div>

</div>
<!-- This is index.php -->
<?php
get_footer();
?>