    <style>
        /* Hide default right-click menu */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Custom Right Click Menu */
        .custom-menu {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            min-width: 150px;
        }

        .custom-menu ul {
            list-style: none;
            margin: 0;
            padding: 5px 0;
        }

        .custom-menu ul li {
            padding: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .custom-menu ul li:hover {
            background: #f0f0f0;
        }
    </style>
    <div class="custom-menu" id="contextMenu">
        <ul>
            <li onclick="alert('Home Clicked')">🏠 Home</li>
            <li onclick="alert('Settings Clicked')">⚙️ Settings</li>
            <li onclick="alert('Logout Clicked')">🚪 Logout</li>
        </ul>
    </div>

    <script>
        const contextMenu = document.getElementById("contextMenu");

        // Show custom menu on right-click
        document.addEventListener("contextmenu", (event) => {
            event.preventDefault(); // Prevent default right-click menu
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
    </script>