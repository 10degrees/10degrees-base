/**
 * Unregister default block styles from the Gutenberg editor
 */
class UnregisterBlockStyles {
    constructor(){
        this.unregisterStyles();
    }

    unregisterStyles(){
        wp.blocks.unregisterBlockStyle("core/button", "default");
        wp.blocks.unregisterBlockStyle("core/button", "squared");
        wp.blocks.unregisterBlockStyle("core/button", "fill");

        wp.blocks.unregisterBlockStyle("core/separator", "default");
        wp.blocks.unregisterBlockStyle("core/separator", "wide");
        wp.blocks.unregisterBlockStyle("core/separator", "dots");

        wp.blocks.unregisterBlockStyle("core/quote", "default");
        wp.blocks.unregisterBlockStyle("core/quote", "large");
    }
}

export default UnregisterBlockStyles;