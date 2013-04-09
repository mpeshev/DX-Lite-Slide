jQuery(document).ready(function($) {
	$("#dx-slideshow > div:gt(0)").hide();

	setInterval(function() { 
	  $('#dx-slideshow > div:first')
	    .fadeOut(1000)
	    .next()
	    .fadeIn(1000)
	    .end()
	    .appendTo('#dx-slideshow');
	},  4000);
});