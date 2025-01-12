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