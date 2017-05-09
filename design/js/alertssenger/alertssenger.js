	
	/*
		Alertssenger
		https://github.com/RDmitriev/Alertssenger
	*/
	
	(function ( $ ) {
		$.fn.alertplugin = function( options ) {
			var settings = $.extend( {
				'message' : 'Hello!',
				'color' : '#fff',
				'background' : '#37b3d9'
			}, options);
			
			this.append('<div class="alert"><div>' + settings.message + '</div></div>');
			
			jQuery('.alert, .alert a').css('color', settings.color);
			jQuery('.alert').css('position', 'fixed');
			jQuery('.alert').css('top', '0');
			jQuery('.alert').css('width', 'auto');
			jQuery('.alert').css('text-align', 'center');
			jQuery('.alert').css('z-index', '1000');
			jQuery('.alert').css('border', '0');
			jQuery('.alert').css('transform', 'translateX(-50%)');
			jQuery('.alert').css('left', '50%');
			jQuery('.alert>div').css('background', settings.background);
			jQuery('.alert>div').css('display', 'inline-block');
			jQuery('.alert>div').css('padding', '14px');
			jQuery('.alert a').css('text-decoration', 'underline');
			
			jQuery('.alert').hide();
			jQuery('.alert').slideDown();
			
			setTimeout(function() {
				jQuery( ".alert" ).animate({
					opacity: 0,
					top: "-=48"
					}, 5000, function() {
				});
			}, 3000);
		};
	}( jQuery ));