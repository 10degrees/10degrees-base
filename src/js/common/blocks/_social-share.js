class SocialShare {
    /**
     * Check for webShare support and add click
     * handler or remove button as approriate.
     */
    constructor() 
    {
        var $this = this;
        $(document).ready(function() {
            if (!navigator.share) {
                $this.addWebShareButtonClickHandler();
                $this.removeSocialSharebuttons();
            } else {
                $this.removeWebSharebutton();
            }
        });
    }

    /**
     * Share on click
     */
    addWebShareButtonClickHandler() 
    {
        const btn = document.querySelector(".webshare-button");
        btn.addEventListener("click", function() {
            navigator.share({
                title: $("head title").text(),
                text: $('[property="og:description"]').prop('content'),
                url: location.href
            });
        });
    }
    /**
     * Remove share button if not supported
     */
    removeWebSharebutton() 
    {
        let item = document.querySelector(".webshare-list-item");
        item.parentElement.removeChild(item);
    }
    /**
     * Remove plain share buttons in favor
     * of the WebShare button
     */
    removeSocialSharebuttons() 
    {
        document.querySelectorAll(".share-links li:not(.webshare-list-item)").forEach(function(item){
            item.parentElement.removeChild(item);
        });
    }
}

export default SocialShare;
