class MobileNav {
	init() {
		this.addNavigationToggle();
		this.addDropdownToggle();
	}

	addNavigationToggle(){
		$('.header .toggle').click(function() {
			$('#nav-primary').toggleClass('-open');
		});
	}

	addDropdownToggle(){
		$('.menu-item.dropdown').click(function(e) {
			e.preventDefault();

			$(this).find('> .dropdown-menu').toggleClass('-open');
			let link = $(this).find('> .nav-link');
			if(link.attr('aria-expanded') == "true"){
				link.attr('aria-expanded', "false");
			} else {
				link.attr('aria-expanded', "true");
			}
		});
	}
};

export default MobileNav;