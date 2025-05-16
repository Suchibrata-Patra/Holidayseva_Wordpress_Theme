<style>
  .holidayseva_main_footer {
    padding: 5% 10% 2% 10%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    background-color: #f2f2f2;
    /* border-bottom: 0.5px solid rgb(187, 187, 187); */
  }

  .holidayseva_main_footer a:hover {
    text-decoration: none;
  }

  .footer_columns_group {
    display: flex;
    flex: 0 0 60%;
    gap: 20px;
    /* Reduced gap for tighter layout */
  }

  .footer_column {
    flex: 1;
  }
  .holidayseva_main_footer a{
    color:black
  }

  .footer_column strong {
    display: block;
    margin-bottom: 8px;
    font-size: 1.05rem;
    color: #1a1a1a;
  }

  .footer_column ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer_column li {
    margin-bottom: 4px;
    font-size: 0.9rem;
    color: #000000;
    cursor: pointer;
    font-weight: 300;
  }

  .footer_logo {
    flex: 0 0 40%;
    text-align: right;
  }

  .footer_logo img {
    max-width: 100%;
    height: auto;
    /* max-height: 80px; */
  }

@media (max-width: 768px) {
  body {
    font-size: 14px;
  }

  .holidayseva_main_footer {
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 8% 5% 4% 5%;
  }

  .footer_columns_group {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    gap: 16px;
  }

  .footer_column {
    flex: 1 1 45%;
    min-width: 140px;
    max-width: 250px;
    text-align: left;
  }

  .footer_column strong {
    font-size: 1.1rem;
    margin-bottom: 6px;
    display: block;
  }

  .footer_column li {
    font-size: 0.95rem;
    margin-bottom: 6px;
  }

  .footer_logo {
    margin-top: 25px;
    text-align: center;
    width: 100%;
  }

  .footer_logo img {
    max-width: 90%;
  }

  .footer_second_part {
    flex-direction: column;
    padding: 20px 5%;
    text-align: center;
    align-items: center;
    gap: 16px;
  }

  .footer_second_part > div:first-child {
    flex: 100%;
  }

  .horizontal_button_bar {
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px;
    font-size: 0.85rem;
  }
  .horizontal_button_bar a{
    color:black;
  }

  .footer_second_part > div:last-child {
    flex: 100%;
    justify-content: center;
  }

  .footer_third_part {
    flex-direction: column;
    font-size:0.9rem;
    padding: 20px 5%;
    text-align: left;
    align-items:left;
    gap: 20px;
  }

  .footer_third_part > div:first-child {
    flex: 100%;
    font-size: 0.75rem;
    line-height: 1.5;
  }

  .footer_third_part > div:last-child {
    flex: 100%;
    justify-content: center;
  }

  .footer_third_part button img {
    width: 16px;
    height: 16px;
  }

  button {
    font-size: 0.85rem;
    padding: 6px 14px;
  }
}


</style>
<footer class="holidayseva_main_footer">
  <section class="footer_columns_group">
    <nav class="footer_column" aria-label="About Holidayseva">
      <strong>About Holidayseva</strong>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Trust And Safety</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Accessibility Statement</a></li>
      </ul>
    </nav>
    <nav class="footer_column" aria-label="Explore">
      <strong>Explore</strong>
      <ul>
        <li><a href="#">Write a Review</a></li>
        <li><a href="#">Request a Package</a></li>
        <li><a href="#">Join</a></li>
        <li><a href="#">Help Centre</a></li>
        <li><a href="#">Articles</a></li>
      </ul>
    </nav>
    <nav class="footer_column" aria-label="Partner With Us">
      <strong>Partner With Us</strong>
      <ul>
        <li><a href="#">Leadership</a></li>
        <li><a href="#">Business and Analytics</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Whitepaper</a></li>
      </ul>
    </nav>
    <nav class="footer_column" aria-label="Quick Links">
      <strong>Quick Links</strong>
      <ul>
        <li><a href="#">All Posts</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
    </nav>
  </section>
  <div class="footer_logo">
    <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/gangasagar-tourism.com_logo.svg"
      alt="Gangasagar Tourism Logo">
  </div>
</footer>

<section class="footer_second_part" style="background-color: #f2f2f2; display: flex; padding: 0px 10%; align-items: center; flex-wrap: wrap;">
  <div style="flex: 0 0 70%;">
    <p style="margin: 0;">&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>" style="color:black;text-decoration:none;"><i>Holidayseva</i></a> - All rights reserved.</p>
    <nav class="horizontal_button_bar"
      style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;font-weight:500;text-decoration: underline;" aria-label="Legal Navigation">
      <a href="#">Terms of Use</a>
      <a href="#">Privacy and Cookies Statement</a>
      <a href="#">Cookie Consent</a>
      <a href="#">Site Map</a>
      <a href="#">How the Site Works</a>
      <a href="#">Contact Us</a>
    </nav>
  </div>

  <div style="flex: 0 0 30%; display: flex; justify-content: center; gap: 10px;">
    <button aria-label="Currency: INR" style="padding: 8px 20px; background-color: white; border: 1px solid grey; border-radius: 50px;">₹ INR</button>
    <button aria-label="Location: India" style="padding: 8px 20px; background-color: white; border: 1px solid grey; border-radius: 50px;">INDIA</button>
  </div>
</section>

<section class="footer_third_part"
  style="background-color: #f2f2f2; display: flex; padding: 1% 10% 2% 10%; align-items: left; flex-wrap: wrap;">
  <div style="flex: 0 0 60%;font-weight: 200;font-size:0.9rem">
    <br><br>
    <u>Terms & Conditions:</u><br>
    <a href="<?php echo esc_url(home_url()); ?>" style="color:black;text-decoration:none;"><i>Holidayseva</i></a> makes no guarantees for availability of prices advertised on our sites and applications. Listed prices may require a stay of a particular length or have blackout dates, qualifications or other applicable restrictions. Holidayseva LLC is not responsible for any content on external web sites that are not owned or operated by Holidayseva.
    <br><br>
    <a href="<?php echo esc_url(home_url()); ?>" style="color:black;text-decoration:none;"><i>Holidayseva</i></a> LLC is not a booking agent or tour operator. When you book with one of our partners, please be sure to check their site for a full disclosure of all applicable fees.
  </div>

  <div style="flex: 0 0 40%; display: flex; justify-content: center; gap:10px;">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/facebook.svg" alt="Facebook" style="width:20px;height:20px;">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/instagram.svg" alt="Instagram" style="width:20px;height:20px;">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/pinterest.svg" alt="Pinterest" style="width:20px;height:20px;">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/twitter.svg" alt="Twitter" style="width:20px;height:20px;">
  </div>
</section>
