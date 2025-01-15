
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>  
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/Assets/Images/favicon.svg">  
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

<body>
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
            <a href="#" class="new-btn">Sign in</a>
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
    <div id="form-input">
        <div id="search-icon" style="color: #000000;">
            <span class="material-icons">search</span>
        </div>
        <input type="text" placeholder="Dream destination is awaiting for you !" id="searchInput"
            style="width: 80%;height: auto;color: black;">
        <!-- Mic Button -->
        <button id="micButton"
            style="background-color: rgb(234, 234, 234, 0); cursor: pointer; border-radius: 50px; height: 40px; width: 40px; display: flex; align-items: center; justify-content: center; padding: 10px;border:none !important;">
            <span class="material-icons" id="micIcon" style="color:#758694; font-size: 24px;">mic</span>
        </button>
        <!-- Modal -->
        <div id="popup"
            style="display: none !important; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 20px; width: 320px; height: 320px; border-radius: 15px; text-align: center; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); display: flex; align-items: center; justify-content: center; flex-direction: column; animation: fadeIn 0.4s ease-in-out;">
            <!-- Powered By Section -->
            <p style="margin: 0; font-size: 14px; font-weight: 400; color: rgb(120, 120, 120);">Powered By</p>
            <img src="<?php echo $logo_image; ?>" alt="Logo" style="width: auto; height: 40px; margin: 8px 0 16px 0;" loading="lazy">
            <!-- <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo"
                style="width: auto; height: 40px; margin: 8px 0 16px 0;"> -->
            <!-- Mic Button -->
            <button id="modal_microphone_button"
                onmouseover="this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.3)'; this.style.transform='scale(1.1)';"
                onmouseout="this.style.boxShadow='0 6px 15px rgba(0, 0, 0, 0.2)'; this.style.transform='scale(1)';">
                <span class="material-icons">mic</span>
            </button>
            <!-- Google Icon -->
            <!-- <img src="https://storage.googleapis.com/support-kms-prod/yQaqmZKczQG1vU5R8W3Lk5NROfCyU71FHdcm"
                alt="Google Icon" style="width: 60px; height: auto; margin-top: 20px;" loading="lazy"> -->
        </div>
        <!-- Fade-in Animation -->
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translate(-50%, -45%);
                }

                to {
                    opacity: 1;
                    transform: translate(-50%, -50%);
                }
            }
        </style>
    </div>
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
<?php wp_head(); ?>
<?php
if ( function_exists( 'rank_math_the_head' ) ) {
    rank_math_the_head();
} else {
    // Fallback code for meta tags
    echo '<title>' . esc_html( get_the_title() ) . '</title>';
    echo '<meta name="description" content="' . esc_attr( get_the_excerpt() ) . '" />';
    // Add other meta tags manually if needed
}
?>
