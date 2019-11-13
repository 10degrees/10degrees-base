class MobileNav {
	init() {
		this.addNavigationToggle();
		this.addDropdownToggle();
	}

	addNavigationToggle(){
		$('.header .toggle').click(function() {
			$('#nav-primary').toggleClass('-open');

			let newText = $(this).find('.icon').text() == 'Open' ? 'Close' : 'Open';
			$(this).find('.icon').text(newText);
		});
	}

	addDropdownToggle(){
		$('.menu-item.dropdown').click(function(e) {
			e.preventDefault();

			$(this).find('> .dropdown-menu').toggleClass('-open');

			let link = $(this).find('> .nav-link');
			let newExpandedAttr = link.attr('aria-expanded') == 'true' ? 'false' : 'true';
			link.attr('aria-expanded', newExpandedAttr);
		});
	}
};

export default MobileNav;