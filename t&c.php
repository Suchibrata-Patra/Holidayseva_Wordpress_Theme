<?php
/**
 * Template Name: Terms and Conditions Page
 */
get_header(); ?>
<!-- This Code is responsible for generating the Travel Blog Page -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Assets/Central_styling.css">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Agreement – MakeMyTrip</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }
    header {
      background: #ff5a5f;
      color: white;
      padding: 20px;
      text-align: center;
    }
    header h1 {
      margin: 0;
      font-size: 1.8em;
    }
    main {
      max-width: 900px;
      margin: 20px auto;
      background: white;
      padding: 30px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    main h2 {
      border-bottom: 2px solid #eee;
      padding-bottom: 5px;
      margin-top: 30px;
    }
    p, ul {
      margin-bottom: 1em;
    }
    ul {
      padding-left: 1.2em;
      list-style-type: disc;
    }
    footer {
      text-align: center;
      padding: 15px;
      font-size: 0.9em;
      color: #777;
    }
    @media (max-width: 600px) {
      main { padding: 15px; }
      header h1 { font-size: 1.5em; }
    }
  </style>
</head>
<body>

  <header>
    <h1>MakeMyTrip User Agreement</h1>
  </header>

  <main>
    <h2>1. Acceptance of Terms</h2>
    <p>Welcome to MakeMyTrip.com (“MakeMyTrip”, “we”, “us”, “our”). By accessing or using our site and services, you agree to be bound by this Agreement and our Privacy Policy.</p>

    <h2>2. Services</h2>
    <p>We provide booking services for travel, flights, hotels, bus and train tickets, and travel packages (“Services”). We act as an intermediary between you and third-party service providers.</p>

    <h2>3. Registration & Account</h2>
    <ul>
      <li>Users must register with accurate information and update it as needed.</li>
      <li>You are responsible for safeguarding your account credentials.</li>
      <li>MakeMyTrip may suspend or terminate accounts that violate terms or are suspected of misuse.</li>
    </ul>

    <h2>4. Bookings & Payments</h2>
    <ul>
      <li>All bookings are subject to availability and confirmation from providers.</li>
      <li>Payment must be made through supported modes as specified during booking.</li>
      <li>Refunds, cancellations, and amendments follow provider-specific policies.</li>
    </ul>

    <h2>5. User Conduct</h2>
    <p>You agree not to use the Service fraudulently, in violation of laws, or in a manner that harms others.</p>

    <h2>6. Intellectual Property</h2>
    <p>All content is owned or licensed to MakeMyTrip. You agree not to reproduce or exploit our materials without written consent.</p>

    <h2>7. Disclaimers & Limitations of Liability</h2>
    <p>We are not responsible for delays, damages, or losses caused by third-party providers. Our liability is limited as permitted by law.</p>

    <h2>8. Indemnification</h2>
    <p>You will indemnify MakeMyTrip against any claims or damages arising from your misuse of the Services.</p>

    <h2>9. Modifications</h2>
    <p>We may update this agreement at any time. Continued use after updates means you accept revised terms.</p>

    <h2>10. Governing Law</h2>
    <p>This Agreement is governed by the laws of India. Any disputes are subject to the courts of New Delhi.</p>
  </main>

  <footer>
    <p>Last updated: July 15, 2025</p>
  </footer>
  
</body>
</html>

<!-- YOUR CUSTOM CONTENT ENDS HERE -->

<?php get_footer(); ?>
