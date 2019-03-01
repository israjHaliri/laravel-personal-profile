$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
		type: 'default', 
		width: 'auto', 
		fit: true   
	});

	var a = $('.skills-info .skill-item');

	for( var i = 0; i < a.length; i+=4 ) {
		a.slice(i, i+4).wrapAll('<div class="col-md-6 bar-grids"></div>');
	}
});		


jQuery(function($) {
	$(".swipebox").swipebox();
});

