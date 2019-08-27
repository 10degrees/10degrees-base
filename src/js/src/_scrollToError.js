class ScrollToError {
    init() {
        $(document).ready(function() {
            var formPresent = $(".gform_validation_error").length;
            if (formPresent != "0") {
                var firstError = $(".validation_message").first();
                var target = $(firstError)
                    .parent()
                    .find(".gfield_label");
                $("html, body").animate(
                    {
                        scrollTop: $(target).offset().top - 50
                    },
                    1000
                );
            }
        });
    }
};

export default ScrollToError;
