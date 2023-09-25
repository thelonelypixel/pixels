document.addEventListener("DOMContentLoaded", function() {
    const playerFrame = document.querySelector('#your-video-id'); 
    const poster = document.querySelector('.video-poster');
    const svgPlayButtonWrapper = document.querySelector('.media-poster svg'); // We'll use the wrapper so we can hide everything, including the play button.

    if (!playerFrame || !poster || !svgPlayButtonWrapper) return;

    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    let player;

    window.onYouTubeIframeAPIReady = function() {
        player = new YT.Player(playerFrame, {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {
        switch(event.data) {
            case YT.PlayerState.PAUSED:
                // Show poster with fade-in
                poster.classList.remove('hidden');
                // Show the play button
                svgPlayButtonWrapper.classList.remove('hidden');
                break;
            case YT.PlayerState.PLAYING:
                // Hide poster with fade-out
                poster.classList.add('hidden');
                // Hide the play button
                svgPlayButtonWrapper.classList.add('hidden');
                break;
        }
    }

    svgPlayButtonWrapper.addEventListener('click', function() {
        poster.classList.add('hidden');
        svgPlayButtonWrapper.classList.add('hidden'); // Hide the play button when clicked
        if (player && player.playVideo) {
            player.playVideo();
        }
    });
});
