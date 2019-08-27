class AjaxForm {

	constructor(){
		this.formClass = '.js-ajax-form';
		this.form = false;
	}

	init() {

		var $this = this;

		$( "body" ).on( "submit", $this.formClass, function(e) {

			e.preventDefault();

			$this.form = $(this);

			$this.submit();
			
		});

		$this.maybeSubmitOnLoad();

	}

	submit() {

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

	}

	success(result) {

		var refresh_target = this.form.attr('data-refresh');

		if (typeof this.form.attr('data-refresh') != 'undefined') {

			$(refresh_target).html(result);

		}

	}

	loadingState() {

		var refresh_target = this.form.attr('data-refresh');

		if (typeof this.form.attr('data-refresh') != 'undefined') {

			$(refresh_target).html('<div class="loading"><i class="fas fa-sync fa-spin"></i></div>');

		}

	}

	maybeSubmitOnLoad() {

		$.each($(this.formClass), function() {

			if (typeof $(this).attr('data-submit-on-load') != 'undefined') {

				$(this).submit();

			}
			
		});

	}

};

export default AjaxForm;