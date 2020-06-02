// Put your JS here

/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {
	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var mirai = {
		// All pages
		common: {
			init: function () {
				// Hide Sub Menu when clicking outside
				$(document).click(function (e) {
					if (document.documentElement.clientWidth > 900) {
						e.stopPropagation();
						var container = $('.nav-primary');

						//check if the clicked area is dropDown or not
						if (container.has(e.target).length === 0) {
							$('.nav-primary li, .sub-menu').removeClass('menu-active');
						}
					}
				});

				// Reset nav on window resize
				$(window).resize(function () {
					var width = $(document).width();
					if (width < 900) {
						$('body, .nav-mobile, .mobile-trigger span').removeClass('mobile-menu-active');
					}
				});

				// Submenu Functionality
				$('.nav-primary > li').click(function () {
					var $this = $(this),
						$ul = $('> ul', this);

					if (!$ul.hasClass('menu-active')) {
						// Add class to current list item
						$this.addClass('menu-active');

						// Slide down used for mobiles
						$ul.toggleClass('menu-active').slideDown();
					} else {
						$this.removeClass('menu-active');

						$ul.removeClass('menu-active');
					}
				});

				// Mobile Trigger to open Mobile Menu
				$('.mobile-trigger').click(function () {
					$(this)
						.find('span')
						.toggleClass('mobile-menu-active');
					$('body, .nav-mobile').toggleClass('mobile-menu-active');
				});

				$('.profile__read-more').click(function () {
					$(this).closest('.profile-grid__profile').addClass('open');
				});

				$('.profile__close').click(function () {
					$(this).closest('.profile-grid__profile').removeClass('open');
				})

				// Slider Slick
				$('.module__slider').slick({
					dots: true,
				});

				// Testimonials Slick
				$('.module__testimonials').slick({
					dots: true,
				});

				if ('IntersectionObserver' in window) {
	   				// Intersection Observer Callback Function
	   				blockObserverCallback = function (entries, observer) {
	   					entries.forEach(function (entry) {
	   						if (entry.isIntersecting) {
	   							entry.target.classList.add('in-view');
	   							observer.unobserve(entry.target);
	   						}
	   					});
	   				};

					// Intersection Observer Options
	   				var blockObserverOptions = {
	   					root: null,
	   					rootMargin: '0% 0% -30% 0%',
	   					threshold: 0,
	   				}

					// Creation of Intersection Observer
	   				var blockObserver = new IntersectionObserver(blockObserverCallback, blockObserverOptions);
	   				// Intersection Observer Elements to observe
	   				blockObserverElements = document.querySelectorAll('.block');
	   				// Pass Elements to Observer
	   				blockObserverElements.forEach(function (blockObserverElement) {
	   					blockObserver.observe(blockObserverElement);
	   				});

				} else {
	   				blockObserverElements = document.querySelectorAll('.block');
	   				blockObserverElements.forEach(function (blockObserverElement) {
	   					blockObserverElement.classList.add('in-view');
	   				});
	   			}

				// wrap embeds in div
				$('iframe[src^="https://www.youtube.com/embed/"]').wrap('<div class="embed"></div>');
				$('iframe[src^="https://player.vimeo.com/video"]').wrap('<div class="embed"></div>');

				// Accordions
				$('.toggle').click(function(e) {
		          e.preventDefault();
		          var $this = $(this);
		          if ($this.next().hasClass('show')) {
		            $this.next().removeClass('show');
		            $this.removeClass('active');
		            $this.next().slideUp(350);
		          }
		          else {
		            $this.parent().parent().find('li .inner').removeClass('show');
		            $this.parent().parent().find('li .inner').slideUp(350);
		            $this.next().toggleClass('show');
		            $this.addClass('active');
		            $this.next().slideToggle(350);
		          }
		        });

				// Google Map
				function new_map($el) {
					// var
					var $markers = $el.find('.marker');

					// vars
					var args = {
						zoom: 16,
						center: new google.maps.LatLng(0, 0),
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						scrollwheel: false,
						navigationControl: false,
						mapTypeControl: false,
						scaleControl: false,
						draggable: false,
					};

					// create map
					var map = new google.maps.Map($el[0], args);

					// add a markers reference
					map.markers = [];

					// add markers
					$markers.each(function () {
						add_marker($(this), map);
					});

					// center map
					center_map(map);

					// return
					return map;
				}

				function add_marker($marker, map) {
					// var
					var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

					var icon = $marker.attr('data-icon');

					// create marker
					var marker = new google.maps.Marker({
						position: latlng,
						map: map,
						icon: icon,
					});

					// add to array
					map.markers.push(marker);

					// if marker contains HTML, add it to an infoWindow
					if ($marker.html()) {
						// create info window
						var infowindow = new google.maps.InfoWindow({
							content: $marker.html(),
						});

						// show info window when marker is clicked
						google.maps.event.addListener(marker, 'click', function () {
							infowindow.open(map, marker);
						});
					}
				}

				function center_map(map) {
					// vars
					var bounds = new google.maps.LatLngBounds();

					// loop through all markers and create bounds
					$.each(map.markers, function (i, marker) {
						var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

						bounds.extend(latlng);
					});

					// only 1 marker?
					if (map.markers.length == 1) {
						// set center of map
						map.setCenter(bounds.getCenter());
						map.setZoom(16);
					} else {
						// fit to bounds
						map.fitBounds(bounds);
					}
				}

				// global var
				var map = null;

				$('.acf-map').each(function () {
					// create map
					map = new_map($(this));
				});
			},
			finalize: function () {
				// JavaScript to be fired on all pages, after page specific JS is fired
			},
		},
		// Home page
		home: {
			init: function () {
				// JavaScript to be fired on the home page
			},
			finalize: function () {
				// JavaScript to be fired on the home page, after the init JS
			},
		},
		// About us page, note the change from about-us to about_us.
		about_us: {
			init: function () {
				// JavaScript to be fired on the about us page
			},
		},
		contact: {
			init: function () {},
		},
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function (func, funcname, args) {
			var fire;
			var namespace = mirai;
			funcname = funcname === undefined ? 'init' : funcname;
			fire = func !== '';
			fire = fire && namespace[func];
			fire = fire && typeof namespace[func][funcname] === 'function';

			if (fire) {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function () {
			// Fire common init JS
			UTIL.fire('common');

			// Fire page-specific init JS, and then finalize JS
			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, 'finalize');
			});

			// Fire common finalize JS
			UTIL.fire('common', 'finalize');
		},
	};

	// Load Events
	$(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.

//@prepros-prepend ./vendor/*.js
