var slider = {

	init: function() {

		var $this = this;

		$(".js-slider").each(function() {

			var instance = $(this);

			$(this).slick({
				arrows: $this.arrows(instance),
			    dots: $this.dots(instance),
			    autoplay: $this.autoplay(instance),
			    autoplaySpeed: $this.speed(instance),
			    pauseOnHover: $this.pauseOnHover(instance),
				nextArrow: $this.nextArrow(instance),
				prevArrow: $this.prevArrow(instance),
			});

		});
		
	},

	/**	
	 * Defaults to true
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	autoplay: function(instance) {

		if ($(instance).attr('data-autoplay') == 'false') {

			return false;

		}

		return true;

	},

	/**	
	 * Defaults to 5000
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	speed: function(instance) {

		if ($(instance).attr('data-speed')) {

			return $(instance).attr('data-speed');

		}

		return 5000;

	},

	/**	
	 * Defaults to false
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	arrows: function(instance) {

		if ($(instance).attr('data-has-arrows') == 'true') {

			return true;

		}

		return false;

	},

	/**	
	 * Defaults to false
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	dots: function(instance) {

		if ($(instance).attr('data-has-dots') == 'true') {

			return true;

		}

		return false;

	},

	/**	
	 * Defaults to true
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	pauseOnHover: function(instance) {

		if ($(instance).attr('data-pause-on-hover') == 'false') {

			return false;

		}

		return true;

	},

	/**
	 * Default to a nice svg arrow
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	nextArrow: function(instance) {

		if ($(instance).attr('data-next-arrow')) {

			return $(instance).attr('data-next-arrow');

		}

		return '<div class="slick-next"><i class="fas fa-arrow-right"></i></div>';

	},

	/**
	 * Default to a nice svg arrow
	 * 
	 * @param  slick slider instance
	 * @return bool
	 */
	prevArrow: function(instance) {

		if ($(instance).attr('data-prev-arrow')) {

			return $(instance).attr('data-prev-arrow');

		}

		return '<div class="slick-prev"><i class="fas fa-arrow-left"></i></div>';

	}

};