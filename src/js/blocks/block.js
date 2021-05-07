import {registerBlockType, registerBlockStyle} from '@wordpress/blocks';
class Block {
    registerBlock(){
        this.setAttributes();

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

    setAttributes() {
        if(!this.attributes) {
            this.attributes = {};
        }

        let alignment = {
            type: 'string',
            default: this.alignment ? this.alignment : ''
        };

        // Add attribute for alignment if we don't have one
        if(!this.attributes['align']) {
            this.attributes['align'] = alignment;
        }
    }

    registerStyles(){
        this.styles.forEach(style => {
            registerBlockStyle(this.name, style);
        });
    }
}

export default Block;