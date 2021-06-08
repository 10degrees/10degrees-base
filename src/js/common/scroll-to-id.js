class ScrollToId {
    constructor(){
        let links = document.querySelectorAll('.scrollToId');

        for(let link of links){
            this.addScrollEventListener(link);
        }
    }

    addScrollEventListener(element)
    {
        element.addEventListener('click', e => {
            e.preventDefault();

            let target = e.currentTarget.getAttribute('href');

            $("html, body").animate({
                scrollTop: $(target).offset().top
            }, 1000);
        });
    }
};

export default ScrollToId;