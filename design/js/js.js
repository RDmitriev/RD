/*
	RD CSS/JS Framework + Normalize + Blank
	
	Powered by Ruslan Dmitriev
	http://rdmitriev.ru/githab/RD
	https://github.com/RDmitriev/RD
*/

jQuery(window).load(function() {
	jQuery(".rd-menu-open-1").click(function() {
		jQuery(".rd-menu-1").toggleClass("showMenu");
	});
	
	jQuery(".rd-menu-open-2").click(function() {
		jQuery(".rd-menu-2").toggleClass("showMenu");
	});
	
	jQuery('.carousel-1').slick({
		slidesToShow: 1,
		arrows: false,
		dots: true,
		lazyLoad: 'ondemand',
		autoplay: true,
		autoplaySpeed: 7000
		//variableWidth: true
	});
	
	jQuery('.carousel-2').slick({
		slidesToShow: 3,
		arrows: false,
		dots: true,
		lazyLoad: 'ondemand',
		autoplay: true,
		autoplaySpeed: 7000
		//variableWidth: true
	});
});