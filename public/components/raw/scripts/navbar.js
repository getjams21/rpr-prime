jQuery(document).ready(function($) {
	$('#change-arrow').click(function(event) {
		/* Act on the event */
		if ($('.change-arrow').hasClass('fa-angle-down')){
			$('.change-arrow').removeClass('fa-angle-down')
				   .addClass('fa-angle-up');
		}
		else {
			$('.change-arrow').removeClass('fa-angle-up')
				   .addClass('fa-angle-down');
		}
	});
	$('#change-arrow-2').click(function(event) {
		/* Act on the event */
		if ($('.change-arrow-2').hasClass('fa-angle-down')){
			$('.change-arrow-2').removeClass('fa-angle-down')
				   .addClass('fa-angle-up');
		}
		else {
			$('.change-arrow-2').removeClass('fa-angle-up')
				   .addClass('fa-angle-down');
		}
	});	
});