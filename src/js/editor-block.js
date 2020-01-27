
// Custom Gutenberg Blocks
import "./blocks/link-button.js";

// Admin-Specific JS
import DisableAlignment from './admin/DisableAlignment';

// Common JS
import Accordion from "./common/blocks/_accordion";

class BlockEditor {
    constructor(){
        this.init();
    }

    init(){
        new Accordion();
        new DisableAlignment();
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

/**
 * Register Custom Block Styles
 *
 * @return  void  
 */
function registerBlockStyles(){
    wp.blocks.registerBlockStyle("core/button", {
        name: "regular",
        label: "Regular",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "full",
        label: "Full Width"
    });

    wp.blocks.registerBlockStyle("core/heading", {
        name: "default",
        label: "Default",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/heading", {
        name: "underline",
        label: "Underline"
    });

    wp.blocks.registerBlockStyle("core/separator", {
        name: "line",
        label: "Line",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/separator", {
        name: "block",
        label: "Block"
    });

    wp.blocks.registerBlockStyle("core/separator", {
        name: "dots",
        label: "Dots"
    });

    wp.blocks.registerBlockStyle("core/quote", {
        name: "default",
        label: "Default",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/quote", {
        name: "line",
        label: "Line"
    });

    wp.blocks.registerBlockStyle("core/list", {
        name: "default",
        label: "Default",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/list", {
        name: "icon",
        label: "Icon"
    });
}

// DOM is fully loaded
wp.domReady(() => {
    unregisterBlockStyles();
    registerBlockStyles();
});
