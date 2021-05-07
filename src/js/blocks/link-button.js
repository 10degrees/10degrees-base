import Block from "./block";
import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import {InspectorControls, PanelColorSettings, BlockControls, RichText, URLInput, AlignmentToolbar, getColorClassName, withColors} from '@wordpress/block-editor';
import {PanelBody, PanelRow, ToggleControl, TextControl, BaseControl, Icon} from '@wordpress/components';

const classNames = (...args) =>
    [...new Set([...args].filter(i => typeof i == "string"))].join(" ");

class LinkButton extends Block {
    constructor(){
        super();

        this.name = "custom-blocks/link-button";
        this.meta = {
            title: __("Link Button", "@textdomain"),
            description: __("Add a customizable link button.", "@textdomain"),
            icon: <Icon icon="button" />,
            category: "custom-blocks",
            keywords: [__("button", "@textdomain"), __("link", "@textdomain")],
        };

        this.attributes = {
            buttonText: {
                type: "string"
            },
            buttonUrl: {
                type: "string",
                source: "attribute",
                selector: "a",
                attribute: "href"
            },
            buttonTarget: {
                type: "boolean",
                default: false
            },
            buttonRel: {
                type: "string",
                default: null
            },
            buttonAlignment: {
                type: "string",
                default: "left"
            },
            buttonColor: {
                type: "string"
            }
        };

        this.styles = [
            {
                name: "outline",
                label: "Outline"
            },
            {
                name: "full",
                label: "Full width"
            },
        ];

        this.registerBlock();
        this.registerStyles();
    }

    registerBlock(){
        registerBlockType(this.name, {
            ...this.meta,
            attributes: this.attributes,

            edit: withColors("buttonColor")(this.edit),
            save: this.save,
        });
    }

    edit({
        attributes,
        setAttributes,
        isSelected,
        setButtonColor,
        buttonColor
    }){
        const {
            buttonText,
            buttonUrl,
            buttonAlignment,
            buttonTarget,
            buttonRel,
            className
        } = attributes;

        return [
            <InspectorControls>
                <PanelColorSettings
                    title={__("Button colours", "@textdomain")}
                    colorSettings={[
                        {
                            value: buttonColor.color,
                            onChange: setButtonColor,
                            label: __("Choose a colour", "@textdomain")
                        }
                    ]}
                />
                <PanelBody title={ __("Link settings", "@textdomain") }>
                    <PanelRow>
                        <ToggleControl
                            label={__("Open in new tab", "@textdomain")}
                            checked={buttonTarget}
                            onChange={value => {
                                const attr = "noreferrer noopener";
                                setAttributes({ buttonTarget: value });

                                if (value) {
                                    if (!attributes.buttonRel) {
                                        setAttributes({
                                            buttonRel: attr
                                        });
                                    }
                                } else {
                                    if (attributes.buttonRel == attr) {
                                        setAttributes({
                                            buttonRel: ""
                                        });
                                    }
                                }
                            }}
                        />
                    </PanelRow>
                    <PanelRow>
                        <TextControl
                            label={__("Link rel", "@textdomain")}
                            value={buttonRel}
                            onChange={value => setAttributes({ buttonRel: value })}
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>,
            <BlockControls>
                <AlignmentToolbar
                    value={buttonAlignment}
                    onChange={value => setAttributes({buttonAlignment: value})}
                />
            </BlockControls>,
            <div className={`has-text-align-${buttonAlignment}`}>
                <RichText
                    tagName="span"
                    placeholder={__("Button text...", "@textdomain")}
                    value={buttonText}
                    allowedFormats={[]}
                    className={classNames("link-button", buttonColor.class, className)}
                    onChange={value => setAttributes({buttonText: value})}
                />
            </div>,
            isSelected &&
                <BaseControl label={__("Link", "@textdomain")} id="link-button-1" className="wp-block-button__inline-link">
                    <URLInput
                        id="link-button-1"
                        className="wp-block-button__inline-link-input is-full-width has-border"
                        value={buttonUrl}
                        onChange={value => setAttributes({buttonUrl: value})}
                    />
                </BaseControl>
        ];
    }

    save({attributes}) {
        const {
            buttonText,
            buttonUrl,
            buttonTarget,
            buttonRel,
            buttonAlignment,
            buttonColor,
            className
        } = attributes;

        const buttonColorClass =
            getColorClassName("button-color", buttonColor) || "";

        return (
            <div className={buttonAlignment ? `has-text-align-${buttonAlignment}` : ''}>
                <a
                    href={buttonUrl}
                    target={buttonTarget ? "_blank" : null}
                    rel={buttonRel}
                    className={classNames("link-button", buttonColorClass, className)}
                >
                    {buttonText}
                </a>
            </div>
        );
    }
}

new LinkButton();