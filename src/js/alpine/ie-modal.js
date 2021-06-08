window.td_ie_modal = function() {
    return {
        showModal: false,
        init: function() {
            // Only show for IE users
            if (!this.isIE()) {
                return;
            }

            // Only show once per session
            if(this.hasSeenModal()){
                return;
            }

            this.showModal = true;
            this.setShownIEModal();
        },
        hasSeenModal: function(){
            return window.sessionStorage.getItem('shownIEModal');
        },
        setShownIEModal: function(){
            window.sessionStorage.setItem('shownIEModal', true);
        },

        /**
         * Is the user using IE?
         * 
         * @link https://stackoverflow.com/a/49986758
         * 
         * @return  {boolean}  True if using IE, else false
         */
        isIE: function() {
            const ua = window.navigator.userAgent; //Check the userAgent property of the window.navigator object
            const msie = ua.indexOf('MSIE '); // IE 10 or older
            const trident = ua.indexOf('Trident/'); //IE 11
            
            return (msie > 0 || trident > 0);
        }
    }
}