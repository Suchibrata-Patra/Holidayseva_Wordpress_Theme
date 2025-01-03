<style>
    * {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
  
    .new-wrapper {
        width: 100%;
        background-color: #fff;
        display: flex;
        justify-content: center;
        padding: 0px 0px 0px 0px;
        position: relative;
    }
  
    .new-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 88%;
        position: relative;
        margin-right: -25px;

    }
  
    .new-logo img {
        max-height: 50px;
        z-index: 100;
    }
  
    /* New social icons for mobile */
    .new-social-icons {
        display: none;
        gap: 10px;
    }
  
    .new-social-icons a {
        text-decoration: none;
    }
  
    .new-social-icons img {
        width: 25px;
        height: 25px;
    }
  
    .new-menu {
        display: flex;
        gap: 20px;
        padding-top:3%;
    }
  
    .new-menu ul {
        list-style-type: none;
        display: flex;
        gap: 7px;
    }
    .new-buttons .inr-btn{
        color: black;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 50px;
    }
  .inr-btn:hover{
        background-color: rgb(225, 225, 225);
    }
  
    .new-menu a {
        text-decoration: none;
        color: #000000;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-weight: 400;
        font-size: 1.2rem;;
        padding:10px 20px;
        border-radius: 50px;
    }
    .new-menu a:hover {
       background-color: rgb(235, 235, 235);
       text-decoration: none;
  
    }
    .new-buttons .new-btn {
        background-color: #000000;
        color: white;
        padding: 8px 20px;
        text-decoration: none;
        border-radius: 25px;
        font-weight: bold;
        margin-left: 10px;
    }
  
    .new-buttons .new-btn:hover {
        background-color: #111111;
    }
  
    /* Hamburger Icon */
    .new-hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        gap: 5px;
    }
  
    .new-hamburger span {
        width: 25px;
        height: 2px;
        background-color: #464646;
    }
  
    /* Sidebar */
    .new-sidebar {
        position: fixed;
        top: 0;
        left: -300px;
        width: 300px;
        height: 100%;
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        transition: 0.3s;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        padding: 20px;
    }
  
    .new-sidebar ul {
        list-style-type: none;
        padding: 0;
    }
  
    .new-sidebar ul li {
        margin: 15px 0;
    }
  
    .new-sidebar ul a {
        text-decoration: none;
        color: rgb(0, 0, 0);
        font-weight: bold;
        font-size: 18px;
    }
  
    .new-sidebar .new-close-btn {
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        align-self: flex-end;
    }
  
    /* New Overlay */
    .new-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgb(255, 255, 255,0);
        display: none;
        z-index: 999;
    }
  
    /* Responsive */
    @media (max-width: 768px) {
        .new-wrapper{
            background-color: rgba(252, 252, 252, 0.8);
        }
        .new-sidebar{
            border-right:1px solid  rgb(232, 232, 232);
        }
        .new-sidebar ul a{
            font-size: 20px;
            color:black
  
        }
        .new-menu, .new-buttons {
            display: none;
        }
  
        .new-hamburger {
            display: flex;
        }
  
        /* Social Icons for Mobile */
        .new-social-icons {
            display: flex;
            gap: 10px;
        }
        .new-logo img {
        max-height: 90px;
        margin-left: -18%;
    }
        .new-logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
    }
    @media (max-width: 1281px) {
        .new-wrapper{
            background-color: white;
        }
        .new-sidebar{
            border-right:1px solid  rgb(232, 232, 232);
        }
        .new-sidebar ul a{
            font-size: 20px;
            color:black
  
        }
        .new-menu, .new-buttons {
            display: none;
        }
  
        .new-hamburger {
            display: flex;
        }
  
        /* Social Icons for Mobile */
        .new-social-icons {
            display: flex;
            gap: 10px;
        }
        .new-logo img {
        max-height: 30px;
        margin-left: -18%;
    }
  
        .new-logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
    }
    @media (min-width: 769px) and (max-width: 1281px){
        .new-wrapper{
            background-color: white;
        }
        .new-sidebar{
            border-right:1px solid  rgb(232, 232, 232);
        }
        .new-sidebar ul a{
            font-size: 20px;
            color:black
  
        }
        .new-menu, .new-buttons {
            display: none;
        }
  
        .new-hamburger {
            display: flex;
        }
  
        /* Social Icons for Mobile */
        .new-social-icons {
            display: flex;
            gap: 10px;
        }
        .new-logo img {
        max-height: 60px;
        z-index: 100;
    }
  
        .new-logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
    }
  </style>
  
  <header class="new-wrapper">
    <div class="new-header">
        <!-- Logo and Social Icons for Mobile -->
        <div class="new-logo-container">
            <div class="new-logo" style="text-decoration: none;">
                <a href="/"><img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo" loading="lazy"></a>
                
            </div>
            
            <!-- Social Icons for Mobile -->
            <div class="new-social-icons" style="margin-right: 15px;">
                <!-- <a href="tel:+918145302135"><img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Call_icon.png" alt="Call"></a> -->
                <a href="#" id="whatsapp-link"><img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/Whatsapp.png" alt="Whatsapp"></a>
                <a href="tel:+918145302135"><img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/phone-call.png" alt="Call" style="border-radius: 50px;"></a>
                <!-- <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/6/69/Instagram_logo_2022.svg" alt="Instagram"></a> -->
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
            <ul>
                <li><a href="https://www.gangasagar-tourism.com/">Home</a></li>
                <li><a href="https://www.gangasagar-tourism.com/tour/">Tour</a></li>
                <li><a href="https://www.gangasagar-tourism.com/about/">Holiday Homes</a></li>
                <li><a href="https://www.gangasagar-tourism.com/about/">About</a></li>
                <li><a href="https://www.gangasagar-tourism.com/contact/">Contact</a></li>
            </ul>
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
    <ul>
        <div class="new-logo" style="margin-left:15% !important;">
            <img src="https://www.gangasagar-tourism.com/wp-content/uploads/2024/12/logo.png" alt="Logo" loading="lazy">
        </div>
        <li><a href="https://www.gangasagar-tourism.com/">Home</a></li>
        <li><a href="https://www.gangasagar-tourism.com/about/">About</a></li>
        <li><a href="https://www.gangasagar-tourism.com/contact/">Contact</a></li>
        <li><a href="#">₹ INR</a></li>
        <li><a href="#">Sign in</a></li>
    </ul>
  </aside>
  
  <div class="new-overlay"></div>
  
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
        newSidebar.style.left = '-300px';
        newOverlay.style.display = 'none';
    });
    
    newOverlay.addEventListener('click', () => {
        newSidebar.style.left = '-300px';
        newOverlay.style.display = 'none';
    });
  </script>