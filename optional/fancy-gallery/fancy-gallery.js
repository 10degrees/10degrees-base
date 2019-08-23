function fancyGallery() {
	$(".gallery-slider").flexslider({
		controlNav: false,
		directionNav: true
	});

	jQuery(".gallery-slider, .gallery-slider li.slide").css({width: jQuery(".gallery-container").width()-20});

	$(".gallery-fullscreen").click(function() {
			//var old_left = 0;
			//var old_top = 0;
		if($(this).hasClass("active")) {
			
			$(this).removeClass("active");

			$('.gallery-slider').removeClass('full-screen--active');

			$(".gallery-slider li.slide").animate({width: $(".gallery-container").width()-20});
			$(".gallery-slider").animate({left: old_left, margin: '0px 10px', width: jQuery(".gallery-container").width()-20, height: $(".gallery-container").height(), top: old_top}, function() {
					$(".gallery-slider").css({left: 'auto', top: 'auto', right: 'auto', bottom: 'auto'}); 
			});

		} else{

			$(this).addClass("active");
			$('.gallery-slider').addClass('full-screen--active');
			old_left = $(".gallery-slider").position().left;
			old_top = $(".gallery-slider").position().top;
			$(".gallery-slider").css({left: old_left, top: old_top}); 
			$(".gallery-slider").animate({left: 0, margin: 0, width: '100%', height: '100%', right: 0, top: 0, bottom: 0});
			$(".gallery-slider li.slide").animate({width: $(window).width()});

		}
	});
	$(".gallery-thumbs").click(function() {
		$(".gallery-thumbnails").toggle();
		$(this).toggleClass("active");
		$('.gallery-container').toggleClass('js-thumbnails--active');
	});
	$(".gallery-thumbnails .thumb").click(function() {
		$(".gallery-slider").flexslider($(this).index());
	});
	$("#scroll-thumbs-right").on("click" ,function(){
		var position = $('.gallery-thumbnails__inner').scrollLeft();
		
		$(".gallery-thumbnails__inner").animate({
				scrollLeft:  position + 400
		});
	});
	$("#scroll-thumbs-left").on("click" ,function(){
		var position = $('.gallery-thumbnails__inner').scrollLeft();
	
		$(".gallery-thumbnails__inner").animate({
				scrollLeft:  position - 400
		});
	});
}