<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Right Click Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* General Styles */
        body {
            margin: 0px;
            font-family: 'Arial', sans-serif;
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
            background: white;
            color: rgb(0, 0, 0);
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
            background: rgb(238, 238, 238);
        }

        /* Button Icons */
        .menu-btn .material-icons {
            font-size: 20px;
        }
    </style>
</head>
<body>

    <div class="custom-menu" id="contextMenu">
        <button class="menu-btn" onclick="bookTour()">
            <span class="material-icons">event</span> Book Tours
        </button>
        <button class="menu-btn" onclick="chatWithUs()">
            <span class="material-icons">chat</span> Chat with Us
        </button>
        <button class="menu-btn" onclick="pickRandomSpot()">
            <span class="material-icons">place</span> Pick a Random Spot
        </button>
    </div>

    <script>
        const contextMenu = document.getElementById("contextMenu");

        document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
            let x = event.pageX;
            let y = event.pageY;

            contextMenu.style.left = x + "px";
            contextMenu.style.top = y + "px";
            contextMenu.style.display = "block";
        });

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
