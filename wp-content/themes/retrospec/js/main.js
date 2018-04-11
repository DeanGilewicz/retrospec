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
    	$(".owl-carousel").owlCarousel({
			items: 1,
			nav: true
		});
	}

});