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
        // alert('Speech Recognition API is not supported in your browser.');
    }



    /// Modified Fuzzy Logic
    