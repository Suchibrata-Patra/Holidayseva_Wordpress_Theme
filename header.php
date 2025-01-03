<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri(); ?>/style.css">
    <title>Holidayseva</title>
</head>
<?php wp_nav_menu(array('theme_location'=>'primary_menu',
    'menu_class'=>'nav'
    ));
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .clearfix::after {
        display: block;
        content: "";
        clear: both;
    }

    #form-input {
        margin-top: 6px;
        width: 100%;
        max-width: 584px;
        border: 2px solid #e0e0e0;
        border-radius: 50px;
        display: flex;
        padding: 0 8px 0 14px;
    }

    #search-icon {
        width: 33px;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #micButton {
        width: 33px;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0px !important;
        margin-left: 15%;
    }

    #search-icon svg {
        width: 20px;
        height: 20px;
        fill: #000000;
    }

    #form-input input {
        border: none;
        outline: none;
        font-size: 0.7rem;
        flex-grow: 1;
        min-width: 50px;
        border-radius: 50px;
    }

    #searchInput::placeholder {
        color: #656565;
        /* Change this to your desired color */
        font-family: Roboto;
        font-weight: 400;
        font-size: 0.7 rem;
        opacity: 0.7;
        /* Adjust if needed (1 = fully visible, 0 = transparent) */
    }

    @media all and (min-width: 0px) and (max-width: 479px) {
        main {
            padding-top: 20px;
        }

        #form-input {
            width: 90%;
            /* Reduce width on mobile */
            height: 2.3rem;
            max-width: 400px;
            /* Further restrict maximum size */
            padding: 0 6px 0 10px;
            /* Adjust padding */
            border-radius: 50px;
            /* Slightly smaller border radius */
            border: 1px solid #959595;
        }

        #search-icon {
            width: 40px;
            /* Slightly smaller icon area */
            height: 40px;
            justify-content: center;
            /* Align center horizontally */
            align-items: center;
            /* Align center vertically */
        }

        #search-icon svg {
            width: 18px;
            /* Reduce SVG icon size */
            height: 18px;
        }

        #form-input input {
            font-size: 0.9rem;
            /* Slightly smaller font */
        }
    }

    @media (min-width: 769px) and (max-width: 1281px) {
        main {
            padding-top: 20px;
        }

        #form-input {
            width: 90%;
            /* Reduce width on mobile */
            height: 2.3rem;
            max-width: 400px;
            /* Further restrict maximum size */
            padding: 0 10px 0 10px;
            /* Adjust padding */
            border-radius: 50px;
            /* Slightly smaller border radius */
            border: 1px solid #b1b1b1;
        }

        #search-icon {
            width: 40px;
            /* Slightly smaller icon area */
            height: 40px;
            justify-content: center;
            /* Align center horizontally */
            align-items: center;
            /* Align center vertically */
        }

        #search-icon svg {
            width: 18px;
            /* Reduce SVG icon size */
            height: auto;
        }

        #form-input input {
            /* font-size: 0.9rem; Slightly smaller font */
        }

        #searchInput {
            padding: 1rem 2;
        }

    }
</style>


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
            style="background-color: rgb(234, 234, 234, 0); cursor: pointer; border-radius: 50px; height: 40px; width: 40px; display: flex; align-items: center; justify-content: center; padding: 10px;">
            <span class="material-icons" id="micIcon" style="color:#758694; font-size: 24px;">mic</span>
        </button>

        <!-- Modal -->
        <div id="popup"
            style="display: none !important; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 20px; width: 320px; height: 320px; border-radius: 15px; text-align: center; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); display: flex; align-items: center; justify-content: center; flex-direction: column; animation: fadeIn 0.4s ease-in-out;">

            <!-- Powered By Section -->
            <p style="margin: 0; font-size: 14px; font-weight: 400; color: rgb(120, 120, 120);">Powered By</p>
            <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo"
                style="width: auto; height: 40px; margin: 8px 0 16px 0;">

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