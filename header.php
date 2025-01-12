
<?php
    $logo_image = get_header_image();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/header.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/conact_sidebar.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/holidayseva_colors.css">
<header class="new-wrapper">
    <div class="new-header">
        <!-- Logo and Social Icons for Mobile -->
        <div class="new-logo-container">
            <div class="new-logo" style="text-decoration: none;">
                <a href="/"><img src="<?php echo $logo_image; ?>" alt="Logo"
                        loading="lazy"></a>
            </div>
            <!-- Social Icons for Mobile -->
            <div class="new-social-icons" style="margin-right: 15px;">
                <a href="#" id="whatsapp-link"><img
                        src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Whatsapp.png"
                        alt="Whatsapp"></a>
                <a href="tel:+918145302135"><img
                        src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/phone-call.png" alt="Call"
                        style="border-radius: 50px;"></a>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const whatsappLink = document.getElementById("whatsapp-link");
                    // Fetch the URL of the current page
                    const currentPageURL = window.location.href;
                    // Generate the WhatsApp link with the default text
                    const defaultText = `Hello,
  I came across your website and explored this page : ${currentPageURL}.
  I'm interested in learning more about the tours you offer, Could You kindly share details about the itenary,pricing and any other relevant information ?`;
                    const whatsappURL = `https://wa.me/8145302135/?text=${encodeURIComponent(defaultText)}`;
                    // Update the anchor tag's href attribute
                    whatsappLink.href = whatsappURL;
                });
            </script>
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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<center>
    <div id="form-input">
        <!-- <div id="search-icon">
            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                </path>
            </svg>
        </div> -->
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
            <img src="<?php echo $logo_image; ?>" alt="Logo"
                style="width: auto; height: 40px; margin: 8px 0 16px 0;">
            <!-- <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo"
                style="width: auto; height: 40px; margin: 8px 0 16px 0;"> -->

            <!-- Mic Button -->
            <button
                style="background-color: rgb(0, 0, 0); color: white; border: none; width: 80px; height: 80px; font-size: 36px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); transition: transform 0.2s ease, box-shadow 0.2s ease;"
                onmouseover="this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.3)'; this.style.transform='scale(1.1)';"
                onmouseout="this.style.boxShadow='0 6px 15px rgba(0, 0, 0, 0.2)'; this.style.transform='scale(1)';">
                <span class="material-icons">mic</span>
            </button>

            <!-- Google Icon -->
            <img src="https://storage.googleapis.com/support-kms-prod/yQaqmZKczQG1vU5R8W3Lk5NROfCyU71FHdcm"
                alt="Google Icon" style="width: 60px; height: auto; margin-top: 20px;">
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
        <script>
            // Ensure popup is hidden on page load
            document.addEventListener("DOMContentLoaded", function () {
                var popup = document.getElementById("popup");
                popup.style.display = "none"; // Explicitly set display to none on load
            });

            document.getElementById("micButton").addEventListener("click", function () {
                var popup = document.getElementById("popup");

                // Display the popup
                popup.style.display = "flex";

                // Hide the popup after 4 seconds
                setTimeout(function () {
                    popup.style.display = "none";
                }, 5000);
            });
        </script>


    </div>
</center>
<script>
    const placeholders = [
        "'Gangasagar'",
        "'Mayapur'",
        "'Iskon'",
        "'Puri'",
        "'Kolkata'",
        "'Vrindavan'",
        "'Haridwar'",
        "'Rishikesh'",
        "'Ayodhya'",
        "'Mathura'",
        "'Dwaraka'",
        "'Tirupati'",
        "'Badrinath'",
        "'Kedarnath'",
        "'Varanasi'",
        "'Ramnagar'",
        "'Shimla'",
        "'Nainital'",
        "'Ujjain'",
        "'Jammu'"
    ];


    let placeholderIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typeEffect() {
        const inputField = document.getElementById('searchInput');
        const baseText = "Search for ";
        const currentText = placeholders[placeholderIndex];

        if (isDeleting) {
            // Remove characters one by one from the name part
            inputField.placeholder = baseText + currentText.substring(0, charIndex);
            charIndex--;

            if (charIndex < 0) {
                isDeleting = false;
                placeholderIndex = (placeholderIndex + 1) % placeholders.length; // Move to the next text
                setTimeout(typeEffect, 500); // Pause before typing the next placeholder
                return;
            }
        } else {
            // Add characters one by one to the name part
            inputField.placeholder = baseText + currentText.substring(0, charIndex);
            charIndex++;

            if (charIndex > currentText.length) {
                isDeleting = true;
                setTimeout(typeEffect, 1000); // Pause before deleting starts
                return;
            }
        }

        // Adjust typing/backspacing speed
        const speed = isDeleting ? 80 : 100;
        setTimeout(typeEffect, speed);
    }

    // Start the typing effect
    typeEffect();
</script>


<script>
    // Redirect to Search Page
    function redirectToSearch() {
        const searchInput = document.getElementById('searchInput').value.trim();
        if (searchInput) {
            // Example URL redirection, customize with your search endpoint
            const searchURL = `https://www.gangasagar-tourism.com/search-result/?query=${encodeURIComponent(searchInput)}`;
            window.location.href = searchURL;
        } else {
            alert('Please enter a search term!');
        }
    }

    // Add event listener to handle "Enter" key press
    document.getElementById('searchInput').addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            redirectToSearch();
        }
    });


    // Voice Search Functionality
    const searchInput = document.getElementById('searchInput');
    const micButton = document.getElementById('micButton');

    if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();

        recognition.continuous = false; // Stop after one input
        recognition.lang = 'en-US'; // Set the language

        // Start speech recognition on button click
        micButton.addEventListener('click', () => {
            try {
                recognition.start();
            } catch (err) {
                console.error("Error starting speech recognition:", err);
                alert("Speech recognition error. Please check your browser settings.");
            }
        });

        // Populate input with recognized text
        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            searchInput.value = transcript; // Set the input value
            redirectToSearch(); // Automatically redirect after speech
        };

        recognition.onerror = (event) => {
            console.error("Speech recognition error:", event.error);
            alert(`Speech recognition error: ${event.error}`);
        };

    } else {
        micButton.disabled = true;
        micButton.title = "Your browser doesn't support Speech Recognition.";
        alert('Speech Recognition API is not supported in your browser.');
    }
</script>

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
<?php require('contact_sidebar.php'); ?>