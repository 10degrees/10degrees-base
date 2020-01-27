class MobileNav {
	constructor() {
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

		// Sub menu
		$('.sub-menu .menu-item.menu-item-has-children > a').click(function(e) {
			e.preventDefault();

			$(this).parent().find('> .sub-menu').toggleClass('-open');
			e.stopPropagation();
		});

		// Parent menu
		$("#menu-primary-menu > .menu-item.menu-item-has-children > a").click(function(e) {
			e.preventDefault();

			$('#menu-primary-menu > .menu-item > .sub-menu.-open').removeClass('-open');

			$(this).parent().find('> .sub-menu').addClass('-open')
			e.stopPropagation();


			// let newExpandedAttr = $(this).attr('aria-expanded') == 'true' ? 'false' : 'true';
			// $(this).attr('aria-expanded', newExpandedAttr);
		});

		// Hide menu on clicking anywhere
		$(document).click(function(e) {
			if (!$(e.target).is('#menu-primary-menu > .menu-item.menu-item-has-children > a').length) {
				$('#menu-primary-menu > .menu-item > .sub-menu.-open').removeClass('-open');
			}
		});  

	}
};

export default MobileNav;