window.td_social_share = function() {
    return {
        shareSupported: false,
        init() {
            this.shareSupported = navigator.share;
        },
        sharePage() {
            navigator.share({
                title: document.title,
                text: this.getShareContent(),
                url: location.href
            });
        },
        getShareContent(){
            let descriptionElement = document.querySelector('[property="og:description"]');

            if(!descriptionElement) {
                return '';
            }

            return descriptionElement.getAttribute('content');
        }
    }
}