<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Right Click Menu</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
        }

        /* Custom Context Menu */
        .custom-menu {
            position: absolute;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            padding: 10px;
            min-width: 180px;
        }

        .menu-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
            text-align: left;
        }

        .menu-btn:hover {
            background: #0056b3;
        }

        /* Button Icons */
        .menu-btn span {
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="custom-menu" id="contextMenu">
        <button class="menu-btn" onclick="bookTour()">
            <span>📅</span> Book Tours
        </button>
        <button class="menu-btn" onclick="chatWithUs()">
            <span>💬</span> Chat with Us
        </button>
        <button class="menu-btn" onclick="pickRandomSpot()">
            <span>🎯</span> Pick a Random Spot
        </button>
    </div>

    <script>
        const contextMenu = document.getElementById("contextMenu");

        document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
            let x = event.pageX;
            let y = event.pageY;

            // Position menu near click
            contextMenu.style.left = x + "px";
            contextMenu.style.top = y + "px";
            contextMenu.style.display = "block";
        });

        // Hide menu on click anywhere
        document.addEventListener("click", () => {
            contextMenu.style.display = "none";
        });

        function bookTour() {
            alert("Redirecting to Book Tours page...");
        }

        function chatWithUs() {
            alert("Opening chat...");
        }

        function pickRandomSpot() {
            const spots = ["Daringbadi", "Shimla", "Manali", "Goa", "Rishikesh", "Darjeeling"];
            const randomSpot = spots[Math.floor(Math.random() * spots.length)];
            alert("How about visiting: " + randomSpot + " ?");
        }
    </script>

</body>
</html>
