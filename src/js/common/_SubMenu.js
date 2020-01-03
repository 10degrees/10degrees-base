import eventPath from "./_eventPath";

export default class SubMenu {
    constructor(ul) {
        this.ul = ul;
        this.li = ul.parentNode;
        this.a = ul.previousElementSibling;
        this.init();
    }
    init() {
        this.handleClick();
        this.handleBlur();
        this.a.classList.add("dropdown");
        this.a.setAttribute("role", "button");
        this.a.setAttribute("aria-haspopup", "true");
        this.close();
    }
    handleClick() {
        this.a.onclick = e => {
            e.preventDefault();
            this.toggle();
        };
        this.a.onkeyup = e => {
            if (e.code === "Space") {
                this.toggle();
            }
        };
    }
    handleBlur() {
        const closeOnBlur = e => {
            if (
                !eventPath(e).includes(this.ul) &&
                !eventPath(e).includes(this.a)
            ) {
                this.close();
            }
        };
        document.documentElement.addEventListener("click", closeOnBlur, false);
        document.documentElement.addEventListener("keyup", closeOnBlur, false);
    }
    toggle() {
        if (this.a.getAttribute("aria-expanded") == "false") {
            this.open();
        } else {
            this.close();
        }
    }
    open() {
        this.a.setAttribute("aria-expanded", "true");
    }
    close() {
        this.a.setAttribute("aria-expanded", "false");
    }
}
