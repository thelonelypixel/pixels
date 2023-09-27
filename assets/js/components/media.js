// Plugin imports
// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

document.addEventListener("DOMContentLoaded", function() {

    const playerFrames = document.querySelectorAll('.video'); // Assuming .video is the class of your iframe elements.
    const posters = document.querySelectorAll('.video-poster');
    const svgPlayButtonWrappers = document.querySelectorAll('.media-poster svg');
    
    if (playerFrames.length === 0 || posters.length === 0 || svgPlayButtonWrappers.length === 0) return;
    
    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
    const players = [];
    
    window.onYouTubeIframeAPIReady = function() {
        playerFrames.forEach((frame, index) => {
            players[index] = new YT.Player(frame, {
                events: {
                    'onStateChange': function(event) {
                        onPlayerStateChange(event, index);
                    }
                }
            });
        });
    }
    
    function onPlayerStateChange(event, index) {
        const poster = posters[index];
        const svgPlayButtonWrapper = svgPlayButtonWrappers[index];
    
        switch(event.data) {
            case YT.PlayerState.PAUSED:
                poster.classList.remove('hidden');
                svgPlayButtonWrapper.classList.remove('hidden');
                break;
            case YT.PlayerState.PLAYING:
                poster.classList.add('hidden');
                svgPlayButtonWrapper.classList.add('hidden');
                break;
        }
    }
    
    svgPlayButtonWrappers.forEach((svg, index) => {
        svg.addEventListener('click', function() {
            const poster = posters[index];
    
            poster.classList.add('hidden');
            svg.classList.add('hidden'); 
    
            if (players[index] && players[index].playVideo) {
                players[index].playVideo();
            }
        });
    });    

    // init Swiper:
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoHeight: true, //enable auto height
        calculateHeight:true,
      
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
      
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
        // And if we need scrollbar
        scrollbar: {
          el: '.swiper-scrollbar',
        },
    });

});
