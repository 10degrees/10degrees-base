class Social {

    constructor() {

        var $this = this;

        $(document).ready(function() {

            if (navigator.share) {

                $this.addWebShareButton();

            } else {

                console.log("WebShare API not supported");

                $this.addWebShareButton();

            }

        });
        
    }

    addWebShareButton() {

        console.log("Adding the WebShare");

        const btn = document.querySelector(".webshare-button");

        // Must be triggered some kind of "user activation"
        btn.addEventListener("click", async () => {
            alert('SHARE');
            navigator.share({
                title: $("head title").text(),
                text: $('[property="og:description"]').prop('content'),
                url: location.href
            });
        });
    }
}

export default Social;
