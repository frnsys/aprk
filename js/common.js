$(function() {

	$('.configure').live( 'click', function() {
		$(this).parent().find('.config').toggle('fast');
		return false;
	});

	$('.config .close').live( 'click', function() {
		$(this).closest('.config').toggle('fast');
		return false;
	});

	$('.menu').live( 'click', function() {
		$(this).find('ul').toggleClass('show-menu');
	});
	$('.show-menu').live( 'mouseleave', function() {
		$(this).toggleClass('show-menu');
	});

});
