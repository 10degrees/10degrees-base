var ajaxForm = {

	formClass: '.js-ajax-form',

	form: false,

	init: function() {

		var $this = this;

		$( "body" ).on( "submit", $this.formClass, function(e) {

			e.preventDefault();

			$this.form = $(this);

			$this.submit();
			
		});

		$this.maybeSubmitOnLoad();

	},

	submit: function() {

		this.loadingState();

		var $this = this;

		$.ajax({
		    type: "POST",
		    url: this.form.attr('action'),
		    data: {
				action : this.form.find('input[name="_action"]').val(),
				data : this.form.serialize()
		    },
		    success: function(result) {
		
		    	$this.success(result);
		
		    },
		    error: function(data){
		
		    	console.log("error");
		    	console.log(data);
		
			},
		});

	},

	success: function(result) {

		var refresh_target = this.form.attr('data-refresh');

		if (typeof this.form.attr('data-refresh') != 'undefined') {

			$(refresh_target).html(result);

		}

	},

	loadingState: function() {

		var refresh_target = this.form.attr('data-refresh');

		if (typeof this.form.attr('data-refresh') != 'undefined') {

			$(refresh_target).html('<div class="loading"><i class="fas fa-sync fa-spin"></i></div>');

		}

	},

	maybeSubmitOnLoad: function() {

		$.each($(this.formClass), function() {

			if (typeof $(this).attr('data-submit-on-load') != 'undefined') {

				$(this).submit();

			}
			
		});

	}

};