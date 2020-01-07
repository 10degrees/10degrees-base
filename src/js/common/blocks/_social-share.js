class SocialShare {
    /**
     * Check for webShare support and add click
     * handler or remove button as approriate.
     */
    constructor() 
    {
        const shareData = {
            title: 'MDN',
            text: 'Learn web development on MDN!',
            url: 'https://developer.mozilla.org',
          }
          
          const btn = document.querySelector('button');
          const resultPara = document.querySelector('.result');
          
          // Must be triggered some kind of "user activation"
          btn.addEventListener('click', async () => {
            try {
              await navigator.share(shareData)
            } catch(err) {
              resultPara.textContent = 'Error: ' + e
            }
            resultPara.textContent = 'MDN shared successfully'
          });
          
        var $this = this;
        $(document).ready(function() {
            if (navigator.share) {
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
        $(".webshare-list-item").remove();
    }
    /**
     * Remove plain share buttons in favor
     * of the WebShare button
     */
    removeSocialSharebuttons() 
    {
        $(".share-links li:not(.webshare-list-item)").each(function(){
            $(this).remove();
        });
    }
}

export default SocialShare;
