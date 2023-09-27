// Plugin imports
// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

document.addEventListener("DOMContentLoaded", function() {

    // YouTube and Vimeo video players
    const playerFrames = document.querySelectorAll('.video');
    const posters = document.querySelectorAll('.video-poster');
    const playButtons = document.querySelectorAll('.play-video-btn'); // targeting the play button instead of the svg

    if (!playerFrames.length || !posters.length || !playButtons.length) return;

    // Initialize YouTube API
    function loadYouTubeAPI() {
        // Check if the API script is already added
        if(document.querySelector('script[src="https://www.youtube.com/iframe_api"]')) {
            return; // Exit if the script is already added
        }

        const tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }

    const players = [];

    window.onYouTubeIframeAPIReady = function() {
        playerFrames.forEach((frame, index) => {
            if (frame.src.includes('youtube')) {
                players[index] = {
                    type: 'youtube',
                    player: new YT.Player(frame, {
                        events: {
                            'onStateChange': function(event) {
                                onYouTubePlayerStateChange(event, index);
                            }
                        }
                    })
                };
            } else if (frame.src.includes('vimeo')) {
                players[index] = {
                    type: 'vimeo',
                    player: new Vimeo.Player(frame)
                };
                players[index].player.on('play', function() {
                    hideElements(index);
                });
                players[index].player.on('pause', function() {
                    showElements(index);
                });
            }
        });
    };

    function onYouTubePlayerStateChange(event, index) {
        switch (event.data) {
            case YT.PlayerState.PAUSED:
                showElements(index);
                break;
            case YT.PlayerState.PLAYING:
                hideElements(index);
                break;
        }
    }

    function hideElements(index) {
        posters[index].classList.add('hidden');
        playButtons[index].classList.add('hidden'); // hiding the play button
    }

    function showElements(index) {
        posters[index].classList.remove('hidden');
        playButtons[index].classList.remove('hidden'); // showing the play button
    }

    playButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const playerType = players[index].type;

            if (playerType === 'youtube') {
                players[index].player.playVideo();
            } else if (playerType === 'vimeo') {
                players[index].player.play();
            }

            hideElements(index); // Hide elements when the video is played
        });
    });

    loadYouTubeAPI();

    
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

        // Accessibility
        a11y: {
            prevSlideMessage: 'Previous slide',
            nextSlideMessage: 'Next slide',
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
