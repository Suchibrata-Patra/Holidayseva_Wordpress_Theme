<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
  }

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

  .footer_second_part > div:last-child {
    flex: 100%;
    justify-content: center;
  }

  .footer_third_part {
    flex-direction: column;
    padding: 20px 5%;
    text-align: center;
    align-items: center;
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
<footer id="site-footer" class="holidayseva_main_footer" role="contentinfo">
  <div class="footer_top">
    <div class="footer_columns_group">
      <div class="footer_column">
        <strong>About Holidayseva</strong>
        <ul>
          <li><a href="<?php echo home_url('/about-us'); ?>" title="About Us">About Us</a></li>
          <li><a href="<?php echo home_url('/trust-and-safety'); ?>" title="Trust and Safety">Trust And Safety</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>" title="Contact Us">Contact Us</a></li>
          <li><a href="<?php echo home_url('/accessibility'); ?>" title="Accessibility Statement">Accessibility Statement</a></li>
        </ul>
      </div>

      <div class="footer_column">
        <strong>Explore</strong>
        <ul>
          <li><a href="<?php echo home_url('/write-review'); ?>" title="Write a Review">Write a Review</a></li>
          <li><a href="<?php echo home_url('/request-package'); ?>" title="Request a Package">Request a Package</a></li>
          <li><a href="<?php echo home_url('/join'); ?>" title="Join Us">Join</a></li>
          <li><a href="<?php echo home_url('/help'); ?>" title="Help Centre">Help Centre</a></li>
          <li><a href="<?php echo home_url('/articles'); ?>" title="Read Articles">Articles</a></li>
        </ul>
      </div>

      <div class="footer_column">
        <strong>Partner With Us</strong>
        <ul>
          <li><a href="<?php echo home_url('/leadership'); ?>" title="Leadership">Leadership</a></li>
          <li><a href="<?php echo home_url('/analytics'); ?>" title="Business and Analytics">Business and Analytics</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>" title="Contact Us">Contact Us</a></li>
          <li><a href="<?php echo home_url('/whitepaper'); ?>" title="Whitepaper">Whitepaper</a></li>
        </ul>
      </div>

      <div class="footer_column">
        <strong>Quick Links</strong>
        <ul>
          <li><a href="<?php echo home_url('/posts'); ?>" title="All Posts">All Posts</a></li>
          <li><a href="<?php echo home_url('/blog'); ?>" title="Read Blog">Blog</a></li>
        </ul>
      </div>
    </div>

    <div class="footer_logo">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/logo.svg" alt="Holidayseva Logo">
    </div>
  </div>

  <div class="footer_second_part">
    <div class="footer_left">
      <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>"><i>Holidayseva</i></a> - All rights reserved.</p>
      <nav class="horizontal_button_bar" aria-label="Footer Navigation">
        <a href="<?php echo home_url('/terms'); ?>">Terms of Use</a>
        <a href="<?php echo home_url('/privacy'); ?>">Privacy & Cookies</a>
        <a href="<?php echo home_url('/cookie-consent'); ?>">Cookie Consent</a>
        <a href="<?php echo home_url('/site-map'); ?>">Site Map</a>
        <a href="<?php echo home_url('/how-it-works'); ?>">How the Site Works</a>
        <a href="<?php echo home_url('/contact'); ?>">Contact Us</a>
      </nav>
    </div>

    <div class="footer_right">
      <button aria-label="Currency: INR">₹ INR</button>
      <button aria-label="Region: India">INDIA</button>
    </div>
  </div>

  <div class="footer_third_part">
    <div class="footer_terms">
      <u>Terms & Conditions:</u><br>
      Holidayseva makes no guarantees for availability of prices advertised. Prices may require a specific stay length, have blackout dates or other conditions. <br><br>
      Holidayseva LLC is not a booking agent or tour operator. Please check partner sites for all applicable fees and disclosures.
    </div>

    <div class="footer_social">
      <a href="#" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/facebook.svg" alt="Facebook Icon" width="20" height="20"></a>
      <a href="#" title="Instagram"><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/instagram.svg" alt="Instagram Icon" width="20" height="20"></a>
      <a href="#" title="Pinterest"><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/pinterest.svg" alt="Pinterest Icon" width="20" height="20"></a>
      <a href="#" title="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/Assets/Images/twitter.svg" alt="Twitter Icon" width="20" height="20"></a>
    </div>
  </div>
</footer>
</body>
</html>