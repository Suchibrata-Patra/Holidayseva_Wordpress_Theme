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