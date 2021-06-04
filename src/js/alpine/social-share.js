window.td_social_share = function() {
    return {
        shareSupported: false,
        init() {
            this.shareSupported = navigator.share;
        },
        sharePage() {
            navigator.share({
                title: $("head title").text(),
                text: $('[property="og:description"]').prop('content'),
                url: location.href
            });
        }
    }
}