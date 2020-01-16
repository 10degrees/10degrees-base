class DisableSVGFocus{
    constructor(){
        this.disableFocus();
    }

    disableFocus(){
        let svgs = document.querySelectorAll('svg');

        for (let i = 0; i < svgs.length; ++i) {
            svgs[i].setAttribute('focusable', 'false');
        }
    }
}

export default DisableSVGFocus;