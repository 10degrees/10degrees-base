import 'magnific-popup';

class Magnific {

	init() {
		$('.js-popup').magnificPopup({type:'inline'});
		
		$('.js-popup-video').magnificPopup({type:'iframe'});
	}

};

export default Magnific;