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
            navigator.share({
                title: $(".piece-title > h1").text(),
                text: $(".piece-standfirst > p").text(),
                url: location.href
            });
        });
    }
}

export default Social;
