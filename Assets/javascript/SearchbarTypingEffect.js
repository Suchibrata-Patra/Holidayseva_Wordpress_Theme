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

    // model = function(){
        // const Modular_fucntion ="Const";
    // }