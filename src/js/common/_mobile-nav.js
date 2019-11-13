class MobileNav {
	init() {
		$('.header .toggle').click(function() {
			$('#nav-primary').toggleClass('-open');
		});
	}
};

export default MobileNav;