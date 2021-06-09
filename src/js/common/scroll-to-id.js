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

            let targetID = e.currentTarget.getAttribute('href');

            let target = document.querySelector(targetID);

            if (!target) {
                return;
            }

            let scrollPosition = target.getBoundingClientRect().top + document.body.scrollTop;

            window.scrollTo(0, scrollPosition);
        });
    }
};

export default ScrollToId;