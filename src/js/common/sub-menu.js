import eventPath from "../utils/event-path";

export default class SubMenu {
    constructor(ul) {
        this.ul = ul;
        this.li = ul.parentNode;
        this.a = ul.previousElementSibling;
        this.init();
    }
    init() {
        this.handleBlur();
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
    open() {
        this.a.setAttribute("aria-expanded", "true");
    }
    close() {
        this.a.setAttribute("aria-expanded", "false");
    }
}
