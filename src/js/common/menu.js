import SubMenu from "./sub-menu";
import eventPath from "../utils/event-path";

export default class Menu {
    constructor(id) {
        this.nav = document.querySelector(id);
        /* For each sub-menu in the menu, create a new instance of SubMenu */
        this.subMenus = [...this.nav.querySelectorAll(".sub-menu")].map(
            e => new SubMenu(e)
        );
        this.init();
    }
    init() {
        /* Escape key closes all menus */
        this.handleEscKey();
    }
    handleEscKey() {
        this.nav.onkeyup = (e) => {
            if (e.key === "Escape" || e.key === "Esc") {
                let openMenu = document.querySelector(
                    'a[aria-expanded="true"]'
                );
                if (openMenu) {
                    openMenu.focus(); // Focus on top level menu item
                }

                this.closeAll();
            }
        };
    }
    closeAll() {
        for (let ul of this.subMenus) {
            ul.close();
        }
    }
}
