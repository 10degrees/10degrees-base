class DisableAlignment {
    constructor(){
        wp.hooks.addFilter(
            'blocks.registerBlockType',
            'ten-degrees/register-block-type',
            this.disableAlignment
        );
    }

    /**
     * Only allow wide and full alignment in Gutenberg Blocks
     *
     * @param   {object}  settings  The block's settings
     * @param   {string}  name      Name of block
     *
     * @return  {object}            The updated settings
     */
    disableAlignment(settings, name){
        // Image blocks don't use the supports array for alignment
        // This avoids the image block having two alignment icons
        if(name === "core/image" || name === "custom-blocks/link-button" || name === "custom-blocks/spacer"){
            return settings;
        }

        return {
            ...settings,
            supports: {
                ...settings.supports,
                align: ["wide", "full"]
            }
        }
    }
}

export default DisableAlignment;