const domReady = callback => {
	"use strict";
    if( document.readyState === "interactive" || document.readyState === "complete" ) { callback(); } else { document.addEventListener("DOMContentLoaded", callback); }
};

domReady( () => {
   	"use strict";
	
	const navTrigger = document.querySelector('.nav__trigger');
	const navItems = document.querySelector('.nav__items');

	if( navTrigger ) {
		navTrigger.addEventListener('click', () => {
			navItems.classList.toggle('active');
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
			lazyLoad: true,
			// loop: true
		});
	}

});