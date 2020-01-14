import SubMenu from "./_SubMenu";
import eventPath from "./_eventPath";

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
        /* Clicking of the menu closes all menus */
        this.handleBlur();
    }
    handleEscKey() {
        this.nav.onkeyup = e => {
            if (e.key === "Escape" || e.key === "Esc") {
                let openMenu = document.querySelector('a[aria-expanded="true"]');
                if(openMenu){
                    openMenu.focus(); // Focus on top level menu item
                }

                this.closeAll();
            }
        };
    }
    handleBlur() {
        document.documentElement.addEventListener("click", e => {
            if (!eventPath(e).includes(this.nav)) {
                this.closeAll();
            }
        });
    }
    closeAll() {
        for (let ul of this.subMenus) {
            ul.close();
        }
    }
}
