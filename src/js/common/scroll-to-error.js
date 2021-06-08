class ScrollToError {
    constructor(){
        let hasError = document.querySelector('.gform_validation_error');
        let firstError = document.querySelector('.validation_message');

        if(!hasError || !firstError){
            return;
        }

        let target = firstError.parentNode.querySelector('.gfield_label');

        $("html, body").animate({
            scrollTop: $(target).offset().top - 10
        }, 1000);
    }
};

export default ScrollToError;
