
// Custom Gutenberg Blocks
import "./blocks/link-button.js";

// Admin-Specific JS
import DisableAlignment from './admin/DisableAlignment';
import RegisterBlockStyles from './admin/RegisterBlockStyles';
import UnregisterBlockStyles from "./admin/UnregisterBlockStyles.js";

// Common JS
import Accordion from "./common/blocks/_accordion";

class BlockEditor {
    constructor(){
        this.initBlocks();
        
        wp.domReady(this.domReady)
    }

    initBlocks(){
        new DisableAlignment();

        new Accordion();
    }

    domReady(){
        new UnregisterBlockStyles();
        new RegisterBlockStyles();
    }
}

new BlockEditor();