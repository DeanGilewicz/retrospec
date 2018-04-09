const domReady = callback => {
	"use strict";
    if( document.readyState === "interactive" || document.readyState === "complete" ) { callback(); } else { document.addEventListener("DOMContentLoaded", callback); }
};

domReady( () => {
   	"use strict";
	
	const navTrigger = document.querySelector('.nav__trigger');
	const navItems = document.querySelector('.nav__items');

	navTrigger.addEventListener('click', () => {
		navItems.classList.toggle('active');
	});

	// jQuery

	// homepage only

	if( $('body').hasClass('home') ) {
		$(".owl-carousel").owlCarousel({
			items: 1,
			nav: true
		});
	}

});