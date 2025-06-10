
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>  
    
    <?php wp_head(); ?> <!-- Place wp_head() here -->

    <?php if ( is_front_page() && !is_paged() ) : ?>
    <meta name="description" content="Your homepage description here" />
    <meta name="title" content="Your homepage title here" />
    <?php endif; ?>

    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/Assets/Images/favicon.svg">  
    <?php
    $template_uri = get_template_directory_uri();
    $logo_image = get_header_image();
    ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Stylesheet Integration -->
    <link rel="stylesheet" href="<?php echo $template_uri; ?>/Assets/header.css">
    <link rel="stylesheet" href="<?php echo $template_uri; ?>/Assets/conact_sidebar.css">
    <!-- For getting Access of centralised Colour Scheme -->
    <link rel="stylesheet" href="<?php echo $template_uri; ?>/Assets/holidayseva_colors.css">
</head>


<body style="margin:0px !important;">
<!-- Main Header Content -->
<header class="new-wrapper">
    <div class="new-header">
        <!-- Logo and Social Icons for Mobile -->
        <div class="new-logo-container">
            <div class="new-logo" style="text-decoration: none;">
                <a href="/"><img rel="preload" src="<?php echo $logo_image; ?>" alt="Logo" loading="lazy"></a>
            </div>
            <!-- Social Icons for Mobile -->
            <div class="new-social-icons" style="margin-right: 15px;">
                <a href="#" id="whatsapp-link"><img rel="preload"
                        src="<?php echo $template_uri; ?>/Assets/Images/favicon.svg"
                        alt="Whatsapp" loading="lazy"></a>
                <a href="tel:+918145302135"><img rel="preload"
                        src="<?php echo $template_uri; ?>/Assets/Images/CallButton.png"
                        alt="Call" style="border-radius: 50px;" loading="lazy"></a>
            </div>
        </div>
        <!-- Navigation Menu -->
        <nav class="new-menu">
            <!-- <ul>
                <li><a href="https://www.gangasagar-tourism.com/">Home</a></li>
                <li><a href="https://www.gangasagar-tourism.com/tour/">Tour</a></li>
                <li><a href="https://www.gangasagar-tourism.com/about/">Holiday Homes</a></li>
                <li><a href="https://www.gangasagar-tourism.com/about/">About</a></li>
                <li><a href="https://www.gangasagar-tourism.com/contact/">Contact</a></li>
            </ul> -->
            <?php wp_nav_menu(array('theme_location'=>'primary_menu',
    'menu_class'=>'new-menu'
    ));
    ?>
        </nav>
        <!-- Currency and Sign-In Buttons -->
        <div class="new-buttons">
            <a href="#" class="inr-btn">₹ INR</a>
            <a href="#" class="new-btn">Signs in</a>
        </div>
        <!-- Hamburger Icon -->
        <div class="new-hamburger">
            <span></span>
            <span></span>
            <span style="width: 15px !important;"></span>
        </div>
    </div>
</header>
<!-- New Sidebar -->
<aside class="new-sidebar">
    <div class="new-close-btn">&times;</div>
    <!-- <ul>
       
        <li><a href="https://www.gangasagar-tourism.com/">Home</a></li>
        <li><a href="https://www.gangasagar-tourism.com/about/">About</a></li>
        <li><a href="https://www.gangasagar-tourism.com/contact/">Contact</a></li>
        <li><a href="#">₹ INR</a></li>
        <li><a href="#">Sign in</a></li>
    </ul> -->
    <div class="new-logo" style="margin-left:14% !important;">
        <img src="<?php echo $logo_image; ?>" alt="Logo" loading="lazy">
    </div>
    <?php 
    wp_nav_menu(array('theme_location'=>'primary_menu'));
?>
</aside>
<div class="new-overlay"></div>
<center>
   
</center>
<!-- Deferred Javascript To Load Javascript After the Rendering is Over -->
<?php
    // $template_uri = get_template_directory_uri();
    // This Above Code iS fetched in above Portion
?>
<script src="<?php echo $template_uri; ?>/Assets/javascript/SearchbarTypingEffect.js" defer></script>
<script src="<?php echo $template_uri; ?>/Assets/javascript/SearchPageRedirect.js" defer></script>
<script src="<?php echo $template_uri; ?>/Assets/javascript/MicButtonModal.js" defer></script>
<script src="<?php echo $template_uri; ?>/Assets/javascript/HeaderWhatsappButton.js" defer></script>
<script>
    const newHamburger = document.querySelector('.new-hamburger');
    const newSidebar = document.querySelector('.new-sidebar');
    const newCloseBtn = document.querySelector('.new-sidebar .new-close-btn');
    const newOverlay = document.querySelector('.new-overlay');
    // Open Sidebar
    newHamburger.addEventListener('click', () => {
        newSidebar.style.left = '0';
        newOverlay.style.display = 'block';
    });
    // Close Sidebar
    newCloseBtn.addEventListener('click', () => {
        newSidebar.style.left = '-900px';
        newOverlay.style.display = 'none';
    });
    newOverlay.addEventListener('click', () => {
        newSidebar.style.left = '-900px';
        newOverlay.style.display = 'none';
    });
</script>
<?php include_once('CallButttonSidebar.php');?>
