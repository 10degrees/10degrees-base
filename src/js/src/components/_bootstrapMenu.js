class BootstrapMenu {

	constructor() {

	}

	init() {

        var self = this;
        
        try {

            self.main();

        } catch (error) {

            console.error('bootstrapMenu.js error');

            console.error(error);

        }

	}
    
    main() {

        $(".bootstrap-walker-nav-menu ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {

            event.preventDefault();

            event.stopPropagation();

            $(this).siblings().toggleClass("show");
    
            if (!$(this).next().hasClass('show')) {

              $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");

            }
        
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {

              $('.dropdown-submenu .show').removeClass("show");

            });
        
        });
        
    }

};

export default BootstrapMenu;
