const domReady = callback => {
	"use strict";
    if( document.readyState === "interactive" || document.readyState === "complete" ) { callback(); } else { document.addEventListener("DOMContentLoaded", callback); }
};

domReady( () => {
   	"use strict";

   	// let isMobile = true;
	const html = document.querySelector('html');
	const body = document.querySelector('body');
	const mobileNavTrigger = document.querySelector('.nav__trigger');
	const closeNavTrigger = document.querySelector('.mobile__close');
	const navItems = document.querySelector('.nav__items');

	const $win = $(window);
	const $winHeight = $($win).height();
	const $scrollArrow = $('.scroll__arrow');
	// const $mobileNavTriggerContainer = $('.nav__mobile');
	// const $offsetTopMobileNavTriggerContainer = $($mobileNavTriggerContainer).offset().top;
	
	const updateScrollArrow = function() {
		if( $($win).scrollTop() >= $winHeight * 1.5 ) {
			if( !$($scrollArrow).hasClass('active') ) {
				$($scrollArrow).addClass('active');
			}
		} else {
			if( $($scrollArrow).hasClass('active') ) {
				$($scrollArrow).removeClass('active');
			}
		}
	};

	// run on initial page load
	updateScrollArrow();

	// run when browser is scrolled
	$($win).on('scroll', updateScrollArrow);


	// const isMobileViewport = function() {
	// 	if( $(window).width() < 768 ) {
	// 		isMobile = true;
	// 	} else {
	// 		isMobile = false; 
	// 	}
	// }

	// // run on initial page load
	// isMobileViewport();
	// // run when browser size is changed
	// $(window).on('resize', isMobileViewport);

	// if( isMobile ) {
	// 	$(window).on('scroll', function() {
	// 		console.log($(window).scrollTop());
	// 		console.log($offsetTopMobileNavTriggerContainer);
	// 		if( $(window).scrollTop() >= $offsetTopMobileNavTriggerContainer ) {
	// 			if( !$($mobileNavTriggerContainer).hasClass('fixed') ) {
	// 				$($mobileNavTriggerContainer).addClass('fixed');
	// 			}
	// 		} else {
	// 			if( $($mobileNavTriggerContainer).hasClass('fixed') ) {
	// 				$($mobileNavTriggerContainer).removeClass('fixed');
	// 			}
	// 		}
	// 	});
	// }

	function scrollToTop(scrollDuration) {
		var scrollStep = -window.scrollY / (scrollDuration / 15),
		scrollInterval = setInterval(function() {
			if ( window.scrollY != 0 ) {
				window.scrollBy( 0, scrollStep );
			}
			else clearInterval(scrollInterval); 
		}, 15);
	}

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

	// homepage only

	if( document.body.classList.contains('home') ) {
    	// JQuery available
    	$("#js-owl-carousel").owlCarousel({
			items: 1,
			nav: true,
			navText: ['<span class="carousel__prev">&#x2039;</span>', '<span class="carousel__next">&#x203A;</span>']
		});
	}

	if( document.body.classList.contains('single-feature_friday') ) {
		// JQuery available
    	$("#js-owl-carousel-ff").owlCarousel({
			items: 4,
			nav: true,
			navText: ['<span class="carousel__prev">&#x2039;</span>', '<span class="carousel__next">&#x203A;</span>'],
			lazyLoad: true,
			dots: false
		});
	}

});