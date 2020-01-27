
// Custom Gutenberg Blocks
import "./blocks/link-button.js";

// Admin-Specific JS
import DisableAlignment from './admin/DisableAlignment';
import RegisterBlockStyles from './admin/RegisterBlockStyles';

// Common JS
import Accordion from "./common/blocks/_accordion";

class BlockEditor {
    constructor(){
        this.init();
        
        wp.domReady(this.domReady)
    }

    init(){
        new Accordion();
        new DisableAlignment();
    }

    domReady(){
        new RegisterBlockStyles();
    }
}

new BlockEditor();

/**
 * Unregister block styles
 *
 * @return  void 
 */
function unregisterBlockStyles(){
    wp.blocks.unregisterBlockStyle("core/button", "default");
    //wp.blocks.unregisterBlockStyle("core/button", "outline");
    wp.blocks.unregisterBlockStyle("core/button", "squared");
    wp.blocks.unregisterBlockStyle("core/button", "fill");

    wp.blocks.unregisterBlockStyle("core/separator", "default");
    wp.blocks.unregisterBlockStyle("core/separator", "wide");
    wp.blocks.unregisterBlockStyle("core/separator", "dots");

    wp.blocks.unregisterBlockStyle("core/quote", "default");
    wp.blocks.unregisterBlockStyle("core/quote", "large");
}

// DOM is fully loaded
wp.domReady(() => {
    unregisterBlockStyles();
});
