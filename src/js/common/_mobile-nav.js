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
		$('.menu-item.menu-item-has-children > a').click(function(e) {
			e.preventDefault();

			$(this).parent().find('> .sub-menu').toggleClass('-open');

			let newExpandedAttr = $(this).attr('aria-expanded') == 'true' ? 'false' : 'true';
			$(this).attr('aria-expanded', newExpandedAttr);
		});
	}
};

export default MobileNav;