/*
	RD CSS/JS Framework + Normalize + Blank
	
	Powered by Ruslan Dmitriev
	http://rdmitriev.ru/githab/RD
	https://github.com/RDmitriev/RD
*/

$(window).load(function() {
	$(".rd-menu-open-1").click(function() {
		$(".rd-menu-1").toggleClass("showMenu");
	});
	
	$(".rd-menu-open-2").click(function() {
		$(".rd-menu-2").toggleClass("showMenu");
	});
	
	$('.carousel-1').owlCarousel({
		items:1,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		animateOut: 'fadeOut'
	});
	
	$('.carousel-2').owlCarousel({
		items:3,
		loop:false,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		dots:true,
		autoWidth:false,
		margin:10,
		
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				autoWidth:false
			},
			500:{
				items:1
			},
			1000:{
				items:4
			},
			1238:{
				items:4
			}
		}
	});
});