const domReady = callback => {
	"use strict";
    if( document.readyState === "interactive" || document.readyState === "complete" ) { callback(); } else { document.addEventListener("DOMContentLoaded", callback); }
};

domReady( () => {
   	"use strict";

	const html = document.querySelector('html');
	const body = document.querySelector('body');
	const mobileNavTrigger = document.querySelector('.nav__trigger');
	const closeNavTrigger = document.querySelector('.mobile__close');
	const navItems = document.querySelector('.nav__items');

	const $win = jQuery(window);
	const $winHeight = jQuery($win).height();
	const $scrollArrow = jQuery('.scroll__arrow');

	// lightbox
	const $lightboxContainer = $('.container__owl__carousel');
	const $loadingIndicator = $('.loading__indicator');
	const $lightbox = $('.js-owl-carousel-lightbox');
	const $lightboxTrigger = $('.js-lightbox-trigger');
	const $lightboxCloser = $('.js-lightbox-close');
	let ffDataRequested = false;
	let lightboxContent = '';

	const debounce = function(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	const updateScrollArrow = debounce(function() {
		if( jQuery($win).scrollTop() >= $winHeight * 1.2 ) {
			if( !jQuery($scrollArrow).hasClass('active') ) {
				jQuery($scrollArrow).addClass('active');
			}
		} else {
			if( jQuery($scrollArrow).hasClass('active') ) {
				jQuery($scrollArrow).removeClass('active');
			}
		}
	});

	const scrollToTop = function(scrollDuration) {
		var scrollStep = -window.scrollY / (scrollDuration / 15),
		scrollInterval = setInterval(function() {
			if ( window.scrollY != 0 ) {
				window.scrollBy( 0, scrollStep );
			}
			else clearInterval(scrollInterval); 
		}, 15);
	};


	// API CALLS

	// get feature fridat post details
	const getFFpostImgs = function(callback) {
		let urlOrigin = window.location.origin;
		let postId = $('article').attr('id').split('-')[1];
		var xhr = new XMLHttpRequest();
		xhr.open('GET', urlOrigin+'/wp-json/wp/v2/feature_friday/'+postId);
		xhr.onload = function() {
		    if (xhr.status === 200) {
				return callback(xhr.responseText);
		    }
		    else {
				return callback(xhr.status);
		    }
		};
		xhr.send();
	};


	// INITIAL PAGE LOAD - Events

	jQuery($win).on('scroll', updateScrollArrow);

	if ( $scrollArrow.length ) {
		$scrollArrow.on('click', function() {
			scrollToTop(1000);
		});
	}

	if( mobileNavTrigger ) {
		mobileNavTrigger.addEventListener('click', () => {
			body.classList.add('no__overflow');
			navItems.classList.add('active');
		});
	}

	if( closeNavTrigger ) {
		closeNavTrigger.addEventListener('click', () => {
			body.classList.remove('no__overflow');
			navItems.classList.remove('active');
		});
	}

	if( $lightboxTrigger.length ) {
		$lightboxTrigger.on('click', function(e) {
			e.preventDefault();
			// get image slide number to use for lightbox
			let selectedEl = $(e.target).closest('div[class^="slide"]');
			let selectedSlideNum = parseInt($(selectedEl).attr('class').split('-')[1], 10);

			// hide error message
			$('.lightbox__error').removeClass('active');
			// hide loading state
			$($loadingIndicator).removeClass('active');			
			
			// if data has not been requested (or no error previously requesting data) then get data
			if( ! ffDataRequested ) {
				// show loading state
				$($loadingIndicator).addClass('active');
				// display lightbox
				$($lightboxContainer).addClass('active');

				// make api call
				getFFpostImgs(function(response) {
					// check if 404
					if( response === 404 ) {
						// close lightbox
						$($lightboxContainer).removeClass('active');
						// show error
						$('.lightbox__error').addClass('active');
						return;
						// throw new Error({message: 'Oh no we couldn\'t get the data!'});
					}
					
					// change flag to indicate data fetched - don't need to request it again
					ffDataRequested = true;

					let jsonResponse = JSON.parse(response);
					let acfImages = jsonResponse.acf.images;
					if( acfImages.length ) {
						let slideNum = 1;
						// loop through images and build images out for lightbox
						acfImages.forEach(function(item) {
							let imageSizes = item.image.sizes;
							lightboxContent += `<div class="${slideNum} lightbox__image" style="background-image: url('${imageSizes.medium_large}');"></div>`;
							slideNum++;
						});
					}

					// remove loading state
					$($loadingIndicator).removeClass('active');
					// set carousel images html
					$('#js-owl-carousel-lightbox').html(lightboxContent);
					// add close icon
					$($lightboxCloser).addClass('active');
					// initialize lightbox
					jQuery('#js-owl-carousel-lightbox').owlCarousel({
						items: 1,
						nav: true,
						navText: ['<span class="carousel__prev">&#x2039;</span>', '<span class="carousel__next">&#x203A;</span>'],
						lazyLoad: true,
						dots: false,
						startPosition: selectedSlideNum-1
					});
				});

			} else {
				// take slider to the correct slide
				jQuery('#js-owl-carousel-lightbox').trigger('to.owl.carousel', selectedSlideNum-1);
				// display lightbox
				$($lightboxContainer).addClass('active');
			}
		});
	}

	if( $lightboxCloser.length ) {
		$lightboxCloser.on('click', function() {
			// hide lightbox
			$($lightboxContainer).removeClass('active');
		});
	}

	// homepage only
	if( document.body.classList.contains('home') ) {
    	// JQuery available
    	jQuery("#js-owl-carousel").owlCarousel({
			items: 1,
			nav: true,
			navText: ['<span class="carousel__prev">&#x2039;</span>', '<span class="carousel__next">&#x203A;</span>']
		});
	}

	// single feature fridays page only
	if( document.body.classList.contains('single-feature_friday') ) {
		// JQuery available
    	jQuery("#js-owl-carousel-ff").owlCarousel({
			items: 2,
			nav: true,
			navText: ['<span class="carousel__prev">&#x2039;</span>', '<span class="carousel__next">&#x203A;</span>'],
			lazyLoad: true,
			dots: false,
			responsive : {
				768: {
					items: 4,
				}
			}
		});
	}


	// INITIAL PAGE LOAD - Fire functions

	updateScrollArrow();

});