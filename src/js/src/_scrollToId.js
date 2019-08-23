var scrollToId = {
    init: function() {
        $(".scrollToId").click(function(e) {
            e.preventDefault();

            var target = $(this).attr("href");

            $("html, body").animate(
                {
                    scrollTop: $(target).offset().top
                },
                1000
            );
        });
    }
};
