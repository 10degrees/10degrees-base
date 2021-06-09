class ScrollToError {
    constructor(){
        let hasError = document.querySelector('.gform_validation_error');
        let firstError = document.querySelector('.validation_message');

        if(!hasError || !firstError){
            return;
        }

        let target = firstError.parentNode.querySelector('.gfield_label');

        let scrollPosition = target.getBoundingClientRect().top + document.body.scrollTop;

        window.scrollTo(0, scrollPosition - 10);
    }
};

export default ScrollToError;
