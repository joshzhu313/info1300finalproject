$(document).ready(function() {
	// Sticky Header Scroll
	$(window).on('scroll', function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 50) {
			$('#header').addClass('fixed');
		} else {
			$('#header').removeClass('fixed');
		}
	});

});

//Menu button for mobile view
function myFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
}
