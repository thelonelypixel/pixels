// Wrap all Youtube & Vimeo videos in a div
document.addEventListener('DOMContentLoaded', () => {
    // Select all iframes on the page
    const iframes = document.querySelectorAll('iframe');
    
    iframes.forEach(iframe => {
        const src = iframe.src;

        // Check if the iframe src contains "youtube" or "vimeo"
        if (src.includes('youtube') || src.includes('vimeo')) {
            // Create a new div with a class of "embed"
            const embedDiv = document.createElement('div');
            embedDiv.classList.add('embed');
            
            // Insert the new div before the iframe
            iframe.parentElement.insertBefore(embedDiv, iframe);

            // Move the iframe into the new div
            embedDiv.appendChild(iframe);
        }
    });

    // Back to top

    // Get the button
    var mybutton = document.getElementById("backToTopBtn");

    // When the user scrolls down 300px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    mybutton.onclick = () => {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    };
});