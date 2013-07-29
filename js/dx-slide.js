function setSliderInterval( interval ) {
	
	var slideInterval = interval;

	// Check if Slider Interval is number
	if ( isNaN( slideInterval ) ) {
		var slideInterval = 4000;
	}
	
	if ( jQuery( '.dx-slideshow img ' ).length > 1 ) {
		jQuery( '.dx-slideshow > div:gt(0)' ).hide();

		setInterval( function() {
			jQuery( '.dx-slideshow > div:first' )
				.fadeOut( 1000 )
				.next()
				.fadeIn( 1000 )
				.end()
				.appendTo( '.dx-slideshow' );
			}, slideInterval
		);
	}
}


function setWidgetSliderInterval( interval ) {
	
	var slideInterval = interval;

	// Check if Slider Interval is number
	if ( isNaN( slideInterval ) ) {
		var slideInterval = 4000;
	}

	if ( jQuery( '.dx-widget-slideshow img ' ).length > 1 ) {
		jQuery( '.dx-widget-slideshow > div:gt(0)' ).hide();
	
		setInterval( function() {
			jQuery( '.dx-widget-slideshow > div:first' )
				.fadeOut( 1000 )
				.next()
				.fadeIn( 1000 )
				.end()
				.appendTo( '.dx-widget-slideshow' );
			}, slideInterval
		);
	}
}