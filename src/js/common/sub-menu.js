import eventPath from "./event-path";

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

        /* Copy top level link into its submenu */
        this.copyParentToSubMenu();
    }
    handleClick() {
        this.a.onclick = e => {
            e.preventDefault();
            this.toggle();
        };
        this.a.onkeydown = e => {
            if (e.key === " " || e.key === "Spacebar" /* Space */) {
                e.stopPropagation();
                e.preventDefault();
            }
        };
        this.a.onkeyup = e => {
            if (e.key === " " || e.key === "Spacebar" /* Space */) {
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
    copyParentToSubMenu(){
        let url = this.a.href;
        let text = this.a.textContent;

        let copiedLink = this.createSubMenuItem({
            url,
            text
        });

        this.ul.prepend(copiedLink);
    }

    createSubMenuItem({url, text}){
        let listItem = document.createElement('li');
        listItem.classList.add('menu-item');

        let linkElement = document.createElement('a');
        linkElement.textContent = text;
        linkElement.setAttribute('href', url);

        listItem.appendChild(linkElement);

        return listItem;
    }
}
