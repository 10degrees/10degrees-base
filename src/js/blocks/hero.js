import Block from "./block";
import {Icon} from '@wordpress/components';
import {InspectorControls, PanelColorSettings, InnerBlocks, useBlockProps, withColors} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';
import {registerBlockType} from '@wordpress/blocks';

class Hero extends Block {
    constructor() {
        super();

        this.name = "theme/hero";
        this.meta = {
            title: __("Hero", "@textdomain"),
            icon: <Icon icon="megaphone" />,
            category: "theme",
            keywords: [__("sidebar", "@textdomain"), __("hero", "@textdomain")],
        };

        this.attributes = {
            backgroundColor: {
                type: 'string'
            }
        };

        this.alignment = 'full';

        this.registerBlock();
    }

    registerBlock(){
        this.setAttributes();

        registerBlockType(this.name, {
            ...this.meta,
            attributes: this.attributes,

            edit: withColors("backgroundColor")(this.edit),
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

    edit({attributes, setBackgroundColor, backgroundColor, className}) { 
        let classes = ((backgroundColor.class || '' ) + ' ' + className ).trim();

        const blockProps = useBlockProps({
            className: classes
        });

        return [
            <InspectorControls>
                <PanelColorSettings
                    title={__("Colour Settings", "@textdomain")}
                    colorSettings={[
                        {
                            value: backgroundColor.color,
                            onChange: setBackgroundColor,
                            label: __("Background Colour", "@textdomain")
                        }
                    ]}
                    disableCustomColors={true}
                />
            </InspectorControls>,
            <div {...blockProps}>
                <InnerBlocks />
            </div>
        ]
    }

    save() {
        const blockProps = useBlockProps.save();

        return (
            <div {...blockProps}>
                <div className="wrapper">
                    <InnerBlocks.Content />
                </div>
            </div>
        )
    }
}

new Hero();