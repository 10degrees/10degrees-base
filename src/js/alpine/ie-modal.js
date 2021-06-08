window.td_ie_modal = function() {
    return {
        showModal: false,
        checkForIE: function() {
            const ua = window.navigator.userAgent; //Check the userAgent property of the window.navigator object
            const msie = ua.indexOf('MSIE '); // IE 10 or older
            const trident = ua.indexOf('Trident/'); //IE 11
            
            this.showModal = msie > 0 || trident > 0;
        }
    }
}