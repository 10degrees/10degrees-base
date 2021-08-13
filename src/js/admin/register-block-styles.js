/**
 * Register custom block styles to Gutenberg blocks
 */
class RegisterBlockStyles {
    constructor(){
        this.registerStyles();
    }

    registerStyles(){    
        wp.blocks.registerBlockStyle("core/heading", {
            name: "default",
            label: "Default",
            isDefault: true
        });
    
        wp.blocks.registerBlockStyle("core/heading", {
            name: "underline",
            label: "Underline"
        });
    }
}

export default RegisterBlockStyles;