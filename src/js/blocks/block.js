import {registerBlockType, registerBlockStyle} from '@wordpress/blocks';
class Block {
    registerBlock(){

        // Add attribute for alignment if we don't have one
        if(!this.attributes['align']) {
            this.attributes['align'] = {
                type: "string",
                default: ''
            };
        }

        registerBlockType(this.name, {
            ...this.meta,
            attributes: this.attributes,

            edit: this.edit,
            save: this.save,

            // Set alignment when the editor is loaded
            getEditWrapperProps( attributes ) {
                const { align } = attributes;
                if ( 'left' === align || 'right' === align || 'wide' === align || 'full' === align ) {
                    return { 'data-align': align };
                }
            }
        });
    }

    registerStyles(){
        this.styles.forEach(style => {
            registerBlockStyle(this.name, style);
        });
    }
}

export default Block;