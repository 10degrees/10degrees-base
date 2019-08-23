var mobileNav = {
	init: function() {
		$('.nav-control').click(function() {
			$('#menu-primary-navigation').toggleClass('nav-open');
			$('.nav-control').toggleClass('x close');
		});
	}
};