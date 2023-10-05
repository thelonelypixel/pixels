document.addEventListener("DOMContentLoaded", function() {
    // Check for saved settings and apply them
    applySettings();

    // Event listeners for your toggles

    // Text size toggle
    document.getElementById("largeTextToggle").addEventListener("change", function() {
        document.documentElement.style.fontSize = this.checked ? "14px" : ""; // Adjust default size as needed
        localStorage.setItem('largeText', this.checked);
        updateSliderText(this);
    });

    // High contrast toggle
    document.getElementById("highContrastToggle").addEventListener("change", function() {
        document.body.classList.toggle('high-contrast', this.checked);
        localStorage.setItem('highContrast', this.checked);
        updateSliderText(this);
    });

    // Disable animations toggle
    document.getElementById("disableAnimationsToggle").addEventListener("change", function() {
        document.body.classList.toggle('disable-animations', this.checked);
        localStorage.setItem('disableAnimations', this.checked);
        updateSliderText(this);
    });

    // ADHD focus toggle
    document.getElementById("adhdFocusToggle").addEventListener("change", function() {
        document.body.classList.toggle('adhd-focus', this.checked);
        localStorage.setItem('adhdFocus', this.checked);
        updateSliderText(this);
    });
});

function applySettings() {
    // large text toggle
    if (localStorage.getItem('largeText') === 'true') {
        document.documentElement.style.fontSize = "14px";
        document.getElementById("largeTextToggle").checked = true;
    }

    // high contrast toggle
    if (localStorage.getItem('highContrast') === 'true') {
        document.body.classList.add('high-contrast');
        document.getElementById("highContrastToggle").checked = true;
    }

    // disable animations toggle
    if (localStorage.getItem('disableAnimations') === 'true') {
        document.body.classList.add('disable-animations');
        document.getElementById("disableAnimationsToggle").checked = true;
    }

    // adhd focus toggle
    if (localStorage.getItem('adhdFocus') === 'true') {
        document.body.classList.add('adhd-focus');
        document.getElementById("adhdFocusToggle").checked = true;
    }

    // Initialize slider text based on the initial toggle state
    updateSliderText(document.getElementById("largeTextToggle"));
    updateSliderText(document.getElementById("highContrastToggle"));
    updateSliderText(document.getElementById("disableAnimationsToggle"));
    updateSliderText(document.getElementById("adhdFocusToggle"));

    document.addEventListener("mousemove", function(e) {
        const focusBar = document.querySelector(".focus-bar");
        const overlay = document.querySelector(".focus-overlay");
        
        // Using clientY to get cursor position within the viewport
        const barMiddlePosition = e.clientY - focusBar.offsetHeight / 2;
        
        focusBar.style.top = barMiddlePosition + "px";
        
        // Update ::before and ::after heights based on focus bar position
        overlay.style.setProperty("--beforeHeight", barMiddlePosition + "px");
        overlay.style.setProperty("--afterHeight", (window.innerHeight - barMiddlePosition - focusBar.offsetHeight) + "px");
    });
}


function updateSliderText(checkboxElement) {
    const sliderSpan = checkboxElement.nextElementSibling.querySelector(".slider");
    sliderSpan.textContent = checkboxElement.checked ? "On" : "Off";
}

function updateFocusBarPosition(e) {
    const focusBar = document.querySelector('.focus-bar');
    focusBar.style.top = e.clientY + "px";
}
