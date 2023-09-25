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
});