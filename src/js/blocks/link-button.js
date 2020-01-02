const { __ } = wp.i18n;
const { createElement: el } = wp.element;

const BLOCK_NAME = "custom-blocks/link-button";

const blockIcon = el(
    "svg",
    { width: 24, height: 24 },
    el("path", {
        d:
            "M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"
    })
);

const blockMeta = {
    title: __("Link Button", "@textdomain"),
    description: __("Add a customizable link button.", "@textdomain"),
    icon: blockIcon,
    category: "custom-blocks",
    keywords: [__("button", "@textdomain"), __("link", "@textdomain")]
};

// Register block
const { registerBlockType, registerBlockStyle } = wp.blocks;

const classNames = (...args) =>
    [...new Set([...args].filter(i => typeof i == "string"))].join(" ");

// Register editor components
const {
    AlignmentToolbar,
    BlockControls,
    RichText,
    URLInput,
    InspectorControls,
    PanelColorSettings,
    getColorClassName,
    withColors
} = wp.editor;

// Register components
const {
    IconButton,
    Dashicon,
    PanelBody,
    PanelRow,
    ToggleControl,
    TextControl,
    BaseControl
} = wp.components;

const blockAttributes = {
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

// Register the block
registerBlockType(BLOCK_NAME, {
    ...blockMeta,
    attributes: blockAttributes,

    // Render the block components
    edit: withColors("buttonColor")(function({
        attributes,
        setAttributes,
        isSelected,
        setButtonColor,
        buttonColor
    }) {
        const {
            buttonText,
            buttonUrl,
            buttonAlignment,
            buttonTarget,
            buttonRel,
            className
        } = attributes;

        return [
            el(
                InspectorControls,
                {},
                el(PanelColorSettings, {
                    title: __("Button colours", "@textdomain"),
                    colorSettings: [
                        {
                            value: buttonColor.color,
                            onChange: setButtonColor,
                            label: __("Choose a colour", "@textdomain")
                        }
                    ]
                }),
                el(
                    PanelBody,
                    { title: __("Link settings", "@textdomain") },
                    el(
                        PanelRow,
                        {},
                        el(ToggleControl, {
                            label: __("Open in new tab", "@textdomain"),
                            checked: buttonTarget,
                            onChange: value => {
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
                            }
                        })
                    ),
                    el(
                        PanelRow,
                        {},
                        el(TextControl, {
                            label: __("Link rel", "@textdomain"),
                            value: buttonRel,
                            onChange: value =>
                                setAttributes({ buttonRel: value })
                        })
                    )
                )
            ),
            el(
                BlockControls,
                {},
                el(AlignmentToolbar, {
                    value: buttonAlignment,
                    onChange: value => setAttributes({ buttonAlignment: value })
                })
            ),
            el(
                "div",
                {
                    className: `has-text-align-${buttonAlignment}`
                },
                el(RichText, {
                    tagName: "span",
                    placeholder: __("Button text...", "@textdomain"),
                    value: buttonText,
                    formattingControls: [],
                    className: classNames(
                        "link-button",
                        buttonColor.class,
                        className
                    ),
                    onChange: value => setAttributes({ buttonText: value })
                })
            ),
            isSelected &&
                el(
                    BaseControl,
                    {
                        label: __("Link", "@textdomain"),
                        id: "link-button-1",
                        className: "wp-block-button__inline-link"
                    },
                    el(URLInput, {
                        id: "link-button-1",
                        className:
                            "wp-block-button__inline-link-input is-full-width has-border",
                        value: buttonUrl,
                        onChange: value => setAttributes({ buttonUrl: value })
                    })
                )
        ];
    }),

    // Save the attributes and markup
    save({ attributes }) {
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

        return el(
            "div",
            {
                className: buttonAlignment
                    ? `has-text-align-${buttonAlignment}`
                    : ""
            },
            el(
                "a",
                {
                    href: buttonUrl,
                    target: buttonTarget ? "_blank" : null,
                    rel: buttonRel,
                    className: classNames(
                        "link-button",
                        buttonColorClass,
                        className
                    )
                },
                el(RichText.Content, { value: buttonText })
            )
        );
    }
});

registerBlockStyle(BLOCK_NAME, {
    name: "full",
    label: "Full Width"
});

registerBlockStyle(BLOCK_NAME, {
    name: "outline",
    label: "Outline"
});
