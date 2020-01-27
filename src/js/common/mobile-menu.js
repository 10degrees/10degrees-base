export default class MobileMenu {
    constructor() {
        this.button = document.querySelector(".toggle");

        this.target = document.querySelector(
            "#" + this.button.getAttribute("aria-controls")
        );

        this.button.onclick = e => this.toggle();
    }

    open() {
        this.button.setAttribute("aria-expanded", "true");
        this.target.classList.add("-open");
    }
    close() {
        this.button.setAttribute("aria-expanded", "false");
        this.target.classList.remove("-open");
    }
    toggle() {
        if (this.button.getAttribute("aria-expanded") == "true") {
            this.close();
        } else {
            this.open();
        }
    }
}
