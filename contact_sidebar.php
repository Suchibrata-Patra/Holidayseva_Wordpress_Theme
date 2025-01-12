<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=call" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/Assets/contact_sidebar.css">
<header class="wrapper-modern">
    <div class="header-modern">
        <div class="logo-container-modern">
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const whatsappLinkModern = document.getElementById("whatsapp-link-modern");
                    const currentPageURLModern = window.location.href;
                    const defaultTextModern = `Hello,
  I came across your website and explored this page: ${currentPageURLModern}.
  I'm interested in learning more about the tours you offer. Could you kindly share details about the itinerary, pricing, and any other relevant information?`;
                    const whatsappURLModern = `https://wa.me/8145302135/?text=${encodeURIComponent(defaultTextModern)}`;
                    whatsappLinkModern.href = whatsappURLModern;
                });
            </script>
        </div>
<header class="wrapper-modern">
    <div class="header-modern">
        <div class="logo-container-modern">
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const whatsappLinkModern = document.getElementById("whatsapp-link-modern");
                    const currentPageURLModern = window.location.href;
                    const defaultTextModern = `Hello,
  I came across your website and explored this page: ${currentPageURLModern}.
  I'm interested in learning more about the tours you offer. Could you kindly share details about the itinerary, pricing, and any other relevant information?`;
                    const whatsappURLModern = `https://wa.me/8145302135/?text=${encodeURIComponent(defaultTextModern)}`;

                    whatsappLinkModern.href = whatsappURLModern;
                });
            </script>
        </div>
        <!-- <div class="hamburger-modern">
            <span class="material-symbols-outlined" style="padding: 13px;background-color:#fcefd4;border-radius: 5px !important;">
                call
            </span>
        </div> -->
        <div class="hamburger-modern">
            <!-- <span class="material-symbols-outlined" style="padding: 15px; background-color:#fcefd4; border-radius: 10px !important; color: #FF4545;">call</span> -->
            <img src="<?php echo get_template_directory_uri();?>/Assets/Images/call_icon.svg" alt="call_icon" style="padding: 15px; background-color:#fcefd4; border-radius: 10px !important; color: #FF4545;">
        </div>
        
        <style>
            .hamburger-modern {
                display: inline-block;
                /* box-shadow: -4px 0px 10px 0px rgba(255, 186, 186, 0.6); Shadow on left and bottom */
                border-radius: 10px; /* Smooth edges for the div */
                margin-right: -4px;
            }
        
            .hamburger-modern:hover {
                box-shadow: -6px 6px 12px 0px rgba(255, 190, 190, 0.8); /* Stronger shadow on hover */
            }
        </style>
        
        
    </div>
</header>

<aside class="sidebar-modern">
    <div class="close-btn-modern">&times;</div>
    <ul>
        <div class="logo-modern" style="margin-left: 15% !important;">
            <!-- <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo" loading="lazy"> -->
             <!-- <span style="font-size: 1.2rem;font-weight: 600;">Contact</span> -->
        </div>
        <li>
            <strong style="font-size:1.5rem; color:black; border-left: 5px solid red; border-radius: 0px; padding-left: 5px;">
                Connect &#8594;
            </strong>
        </li>

        <hr>

        <li>
            <span style="font-size: 0.9rem;"><span class="material-symbols-outlined" style="padding:3px; border-radius: 10px !important; color: #000000;font-size: 0.9rem !important;background-color: rgb(244, 244, 244);margin-top: 7px !important;margin-right: 3px;">call</span>Book Tours</span> <br>
            <a href="tel:8145302135" style="font-weight: 500;text-decoration: none;color: black;">+91 - 8145302135</a>
        </li>
        <li>
            <span style="font-size: 0.9rem;"><span class="material-symbols-outlined" style="padding: 3px;border-radius: 10px !important; color: #000000;font-size: 0.9rem !important;background-color: rgb(244, 244, 244);margin-top: 7px !important;margin-right: 3px;">call</span>Book Best Tours</span><br>
            <a href="tel:8583992988" style="font-weight: 500;text-decoration: none;color: black;">+91 - 8583992988</a>
        </li>
        <li>
            <span style="font-size: 0.9rem;"><span class="material-symbols-outlined" style="padding: 3px;border-radius: 10px !important; color: #000000;font-size: 0.9rem !important;background-color: rgb(244, 244, 244);margin-top: 7px !important;margin-right: 3px;">call</span>Quick Connect</span><br>
            <div style="display: flex;gap: 10px;">
                  <button onclick="sendWhatsAppMessage()" class="sidebar_contact_button">
                    Whatsapp
                  </button>
            </div>
              
              <style>
                .sidebar_contact_button {
                  background-color: #000000; /* WhatsApp green */
                  color: white;
                  font-size: 14px;  /* Smaller text for a compact look */
                  font-weight: 500;  /* Slightly bolder text for emphasis */
                  border: none;
                  padding: 8px 20px 9px 20px; /* Smaller padding */
                  border-radius: 3px; /* Slightly rounded corners for a more professional look */
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  gap: 8px; /* Reduced gap for a more compact design */
                  cursor: pointer;
                  transition: background-color 0.3s ease;
                  text-decoration: none;
                }
/*               
                .sidebar_contact_button:hover {
                  background-color: #e80000; /* Darker green on hover */
                }
               */
                .whatsapp-icon {
                  width: 18px;  /* Smaller icon size */
                  height: 18px;
                }
              </style>
              
              <script>
                function sendWhatsAppMessage() {
                  var pageURL = window.location.href;
                  var phoneNumber = "8145302135";
                  var message = "Hello GangaSagar Tourism, I was exploring the following page: " + encodeURIComponent(pageURL) + ". I have some inquiries and would appreciate the to connect. Looking forward to hearing from you.";
                  window.open(`https://wa.me/${phoneNumber}?text=${message}`, '_blank');
                }
              </script>
                      </li>
        <hr>
        <div style="display: flex; align-items: center; margin-top: 20px;">
            <a href="https://g.co/kgs/s3BVNNu" style="text-decoration: none; font-weight: 400; font-size: 15px; display: flex; align-items: center;">
                <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Location.png" alt="" style="width: 20px; height: auto; margin-right: 8px;"> 
                Locate Nearby Branch
            </a>
        </div>
        
    </ul>
    <center><img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Download-gangasagarTourism-APps.webp" alt="" style="width: 90%; height: auto;"></center>
    <!-- Image at the bottom -->
    <!-- <img class="bottom-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrHb2cUZS-zk0eL7VFL_FDcovL82BvsfZuPA&s" alt="Bottom Image"> -->
    <img class="bottom-image" src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Gangasagar-Tour-Packages.jpg" alt="Bottom Image">
</aside>


<div class="overlay-modern"></div>

<script>
    const hamburgerModern = document.querySelector('.hamburger-modern');
    const sidebarModern = document.querySelector('.sidebar-modern');
    const closeBtnModern = document.querySelector('.sidebar-modern .close-btn-modern');
    const overlayModern = document.querySelector('.overlay-modern');

    hamburgerModern.addEventListener('click', () => {
        sidebarModern.style.right = '0';
        overlayModern.style.display = 'block';
    });

    closeBtnModern.addEventListener('click', () => {
        sidebarModern.style.right = '-300px';
        overlayModern.style.display = 'none';
    });

    overlayModern.addEventListener('click', () => {
        sidebarModern.style.right = '-300px';
        overlayModern.style.display = 'none';
    });
</script>
            </span>
        </div>
        
    </div>
</header>

<aside class="sidebar-modern">
    <div class="close-btn-modern">&times;</div>
    <ul>
        <div class="logo-modern" style="margin-left: 15% !important;">
            <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo" loading="lazy">
        </div>
        <li><a href="https://www.gangasagar-tourism.com/" style="font-weight: 300;">+91 - 8145302135</a></li>
        <li><a href="https://www.gangasagar-tourism.com/contact/" style="padding-top: -20px;">Contact</a></li>
    </ul>
    <center><img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Download-gangasagarTourism-APps.webp" alt="" style="width: 90%; height: auto;"></center>
    <!-- Image at the bottom -->
    <img class="bottom-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrHb2cUZS-zk0eL7VFL_FDcovL82BvsfZuPA&s" alt="Bottom Image">
</aside>


<div class="overlay-modern"></div>

<script>
    const hamburgerModern = document.querySelector('.hamburger-modern');
    const sidebarModern = document.querySelector('.sidebar-modern');
    const closeBtnModern = document.querySelector('.sidebar-modern .close-btn-modern');
    const overlayModern = document.querySelector('.overlay-modern');

    hamburgerModern.addEventListener('click', () => {
        sidebarModern.style.right = '0';
        overlayModern.style.display = 'block';
    });

    closeBtnModern.addEventListener('click', () => {
        sidebarModern.style.right = '-300px';
        overlayModern.style.display = 'none';
    });

    overlayModern.addEventListener('click', () => {
        sidebarModern.style.right = '-300px';
        overlayModern.style.display = 'none';
    });
</script>