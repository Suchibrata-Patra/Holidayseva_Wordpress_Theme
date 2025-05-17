<main id="primary" class="site-main">
<?php include_once get_template_directory() . '/header.php'; ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/Central_styling.css">

<style>
  .holidayseva_landing_page_hero_section {
    background: url('<?php echo get_template_directory_uri(); ?>/Assets/Images/hero_section_background_doodle.webp') no-repeat center center;
    background-size: cover;
    margin-left: -10%;
    margin-right: -10%;
    display: flex;
    align-items: center; /* vertically center content */
    padding: 2rem;
    color: white; /* so text shows on bg */
  }

  .hero_left_division {
    font-size: 5rem;
    flex: 1;
    color:black;
    font-weight:500;
    line-height:1rem;
    letter-spacing:2px;
  }

  .hero_right_division {
    flex: 1;
  }
</style>

<div class="holidayseva_landing_page_hero_section">
  <div class="hero_left_division">
    Explore <br>The World
  </div>
  <div class="hero_right_division">
    Hello
  </div>
</div>


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
    Flagship Hotel Stores<br>on HolidaySeva <br>
<button id="explore_button" class="mobile-only" style="color:black;text-decoration:none;background-color:black;border:none;color:white;border-radius:50px;padding:4px 10px;">
Explore →
</button>
  
  </div>


  <div class="hotel-store-cards">
    
    <div class="hotel-card" style="background-image: url('https://platforms.makemytrip.com/contents/7300a7ec-9452-4c2b-b2aa-e8b2ebee7f12');">
      <div class="hotel-card-text">CGH Earth Experience Hotels</div>
    </div>
    <div class="hotel-card desktop_only" style="background-image: url('https://platforms.makemytrip.com/contents/7300a7ec-9452-4c2b-b2aa-e8b2ebee7f12');">
      <div class="hotel-card-text">CGH Earth Experience Hotels</div>
    </div>
    <div class="hotel-card desktop_only" style="background-image: url('https://platforms.makemytrip.com/contents/b945fe53-f41e-419a-9718-f36bbb6e23fe');">
      <div class="hotel-card-text">Polo Towers</div>
    </div>
  </div>
</div>
</main>

<style>
    #primary{
    margin:0% 8% 0% 8%;
    }
    /* .mobile-only {
  display: none;
} */
     @media (max-width: 768px) {
      #primary{
        margin:0px;
      }
      .hotel-card{
        width: 170px !important;
        height:100px !important;
      }
      .hotel-store-row{
        gap:0px !important;
        row:0px;
        overflow:hidden;
        padding-left:10px !important;
      }
      .hotel-store-cards{
        margin-left:0px !important;
        gap:0px;
        overflow:hidden;
        margin:0px;
      }
      .hotel-store-heading{
        font-size:10px;
        line-height:0.8rem;
      }
      .hotel-card-text{
        font-size:0.7rem !important;
      }
      .mobile-only {
    display: inline-block;
  }
  .desktop_only{
    display:none;
  }
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
  min-width: 150px;
  margin-right:10px;
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
<br>



<!-- Beginning of the Important Cards Swipes -->
 <style>
    .card_big-section {
      text-align: center;
      padding: 20px;
    }

    .card_big-section h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .card_big-section p {
      color: #666;
      margin-bottom: 20px;
    }

    .card_big-container-wrapper {
      position: relative;
      margin-left: 6%;
      margin-right: 6%;
    }
    .card_big-container {
  display: flex;
  overflow-x: scroll;
  gap: 20px;
  padding: 10px;
  scrollbar-width: none; /* For Firefox */
}

.card_big-container::-webkit-scrollbar {
  display: none; /* For Chrome, Safari, and Edge */
}

    .card_big {
      flex: 0 0 auto;
      width: 300px;
      border-radius: 8px;
      overflow: hidden;
      position: relative;
      background-color: #fff;
      text-align: left;
    }

    .card_big img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .card_big-content {
      position: absolute;
      bottom: 0;
      width: 100%;
      padding: 10px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
      color: #fff;
    }

    .card_big h3 {
      margin: 10px 0 0;
      font-size: 30px;
    }

    .award {
      background-color: #ffcc00;
      color: #000;
      font-size: 12px;
      font-weight: bold;
      padding: 5px;
      border-radius: 3px;
      position: absolute;
      top: -10px;
      left: 10px;
    }

    .card_big-container::-webkit-scrollbar {
      height: 8px;
    }

    .card_big-container::-webkit-scrollbar-thumb {
      background-color: #ccc;
      border-radius: 4px;
    }

    
    .card_big-container::-webkit-scrollbar-track {
      background-color: #f1f1f1;
    }

    /* Arrows */
    .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
      border: 1px solid #ddd;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      z-index: 1000;
    }

    .arrow-left {
      left: -20px;
    }

    .arrow-right {
      right: -20px;
    }

    .arrow svg {
      width: 20px;
      height: 20px;
      fill: #000;
    }
    .scrollbar-header-text{
        color: black;
    }
    @media (max-width: 768px) {
  .card_big-container-wrapper {
    margin-left: 0;
    margin-right: 0;
  }

  .card_big {
    width: 250px; /* Slightly smaller card_bigs */
  }

  .card_big img {
    height: 250px; /* Adjusted height */
  }

  .arrow {
    display: none;
  }

  .scrollbar-header-text {
    font-size: 18px; /* Adjust font size for smaller screens */
  }

  .scroll-bar-main-text {
    font-size: 10px;
  }
}

  </style>
  <section class="card_big-section">
    <div class="card_big-container-wrapper">
        <h1 style="text-align: left;" class="scrollbar-header-text">Treat yourself an award-winning trip</h1>
        <p style="text-align: left;">2024's Top' Choice Awards Best of the Best Tour Packages</p>    
      <div class="arrow arrow-left" onclick="scrollLeft()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"></path>
        </svg>
      </div>
      <div class="card_big-container" id="card_bigContainer">
        <div class="card_big">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/6d/e6/26/caption.jpg?w=300&h=-1&s=1" alt="Gangasagar Tour Packages">
          <div class="card_big-content">
            <span class="award">2024</span>
            <h3 class="scroll-bar-main-text">Gangasagar</h3>
          </div>
        </div>
        <div class="card_big">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/6d/e6/06/caption.jpg?w=300&h=-1&s=1" alt="Kolkata Tour Packages">
          <div class="card_big-content">
            <span class="award">2024</span>
            <h3 class="scroll-bar-main-text">Kolkata</h3>
          </div>
        </div>
        <div class="card_big">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/6d/e6/5e/caption.jpg?w=300&h=-1&s=1" alt="Mayapur Tour Packages">
          <div class="card_big-content">
            <span class="award">2024</span>
            <h3 class="scroll-bar-main-text">Mayapur</h3>
          </div>
        </div>
        <div class="card_big">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/6d/e6/df/caption.jpg?w=300&h=-1&s=1" alt="Puri tour Packages">
          <div class="card_big-content">
            <span class="award">2024</span>
            <h3 class="scroll-bar-main-text">Puri</h3>
          </div>
        </div>
        <div class="card_big">
          <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/6d/e7/3c/caption.jpg?w=300&h=-1&s=1" alt="Darjeeling Tour Packages">
          <div class="card_big-content">
            <span class="award">2024</span>
            <h3 class="scroll-bar-main-text">Darjeeling</h3>
          </div>
        </div>
      </div>
      <div class="arrow arrow-right" onclick="scrollRight()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M8.59 16.59L13.17 12l-4.58-4.59L10 6l6 6-6 6z"></path>
        </svg>
      </div>
    </div>
  </section>
  <script>
    const card_bigContainer = document.getElementById("card_bigContainer");
  
    function scrollLeft() {
      // Ensure scrolling to the left works by using a larger negative value
      card_bigContainer.scrollBy({
        left: -300, // Scroll left by 300px
        behavior: "smooth",
      });
    }
  
    function scrollRight() {
      card_bigContainer.scrollBy({
        left: 300, // Scroll right by 300px
        behavior: "smooth",
      });
    }
  </script>

<!-- Beginning Of the Offer Section -->
<style>
 
  .offer_container {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow:0 3px 30px 0 rgb(0 0 0 / 10%);
    margin:0% 8% 0% 8%;
  }

 @media (max-width: 600px) {
  .offer_container {
    margin: 0;
  }
 }

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
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
  min-width: 250px;
  max-width: 280px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 10px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  scroll-snap-align: start;
  transition: transform 0.2s;
  box-shadow:0 3px 10px 0 rgb(0 0 0 / 10%);
}

  .offer-card:hover {
    transform: translateY(-0.5px);
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
    font-weight: 700;
    font-size: 0.8rem;
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
    <div style="display:flex;">
      <h2 style="margin-top:0px; margin-bottom:0px;font-size:1.2rem;">Offers</h2>
    <a href="#" class="offer-link" style="font-size:1rem !important;right"><span style="justify-content:end;">VIEW ALL →</span></a>
    </div>
    <div class="tabs">
      <!-- <div class="tab active">All Offers</div> -->
    </div>
  </div>

  <div class="offers" style="border-radius:10px;">
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
        <a href="#" class="offer-link">EXPLORE →</a>
      </div>
    </div>

    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1717326630872-f9b8b65050a4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8VGFqJTIwaG90ZWx8ZW58MHx8MHx8fDA%3D" alt="Taj" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">FOR MEMORABLE STAYS AT THE TAJ:</div>
        <div class="offer-description">Get FLAT 15% Savings* on Stays & More!</div>
        <a href="#" class="offer-link">VIEW DETAILS  →</a>
      </div>
    </div>
    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1614082813462-d763a404cbb7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fFRhaiUyMGhvdGVsfGVufDB8fDB8fHww" alt="Taj" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">FOR MEMORABLE STAYS AT THE TAJ:</div>
        <div class="offer-description">Get FLAT 15% Savings* on Stays & More!</div>
        <a href="#" class="offer-link">VIEW DETAILS  →</a>
      </div>
    </div>
    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmF0dXJlfGVufDB8fDB8fHww" alt="Taj" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">DOM HOTELS</div>
        <div class="offer-title">FOR MEMORABLE STAYS AT THE TAJ:</div>
        <div class="offer-description">Get FLAT 15% Savings* on Stays & More!</div>
        <a href="#" class="offer-link" style="margin-left:10px;">VIEWdd DETAILS  →</a>
      </div>
    </div>

    <div class="offer-card">
      <img src="https://images.unsplash.com/photo-1614082813462-d763a404cbb7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fFRhaiUyMGhvdGVsfGVufDB8fDB8fHww" alt="Axis Bank" class="offer-image" />
      <div class="offer-content">
        <div class="offer-type">INTL FLIGHTS</div>
        <div class="offer-title">Up to 25% OFF* + Additional Savings on EMI</div>
        <div class="offer-description">for flights, hotels, holiday packages, cabs & buses.</div>
        <a href="#" class="offer-link">VIEW DETAILS  →</a>
      </div>
    </div>
  </div>

  <!-- <div class="footer-nav"> -->
    <a href="#" class="offer-link" style="font-size:1rem !important;">VIEW ALL →</a>
  <!-- </div> -->
</div>









<div style="display: flex; height: 100vh; width: 100vw;">

    <!-- Left: Full Image, Fit Inside -->
    <div style="width: 70%; height: auto; display: flex; align-items: center; justify-content: center; background-color:none;">
        <img src="https://a0.muscache.com/im/pictures/canvas/Canvas-1727297260081/original/e97a2325-f789-49df-b474-25c77476d433.jpeg" 
             alt="Landing Visual" 
             style="max-width: 100%; max-height: 80%; object-fit: contain;">
    </div>

    <!-- Right: Text Centered -->
    <!-- <div style="width: 50%; background-color:rgb(255, 255, 255); display: flex; align-items: center; justify-content: left;">
        <div style="font-size: 3rem; font-weight: bold; text-align: left;">
            Comming Soon... 
        </div>
    </div> -->

</div>
<!-- This is index.php -->
<?php
get_footer();
?>