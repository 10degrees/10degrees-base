const { __ } = wp.i18n;

// Register block
const { registerBlockType } = wp.blocks;

// Register block
const { createElement } = wp.element;

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
const { IconButton, Dashicon, PanelBody, PanelRow } = wp.components;

// Register the block
registerBlockType("ten-degrees/button", {
    title: __("Button 2", "@textdomain"),
    description: __("Add a customizable button.", "@textdomain"),
    icon: "admin-links",
    category: "common",
    keywords: [__("button", "@textdomain"), __("link", "@textdomain")],
    attributes: {
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
        buttonAlignment: {
            type: "string",
            default: "left"
        },
        buttonColor: {
            type: "string"
        }
    },

    // Render the block components
    edit: withColors("buttonColor")(function({
        attributes,
        setAttributes,
        isSelected,
        setButtonColor,
        buttonColor
    }) {
        const { buttonText, buttonUrl, buttonAlignment } = attributes;

        return [
            createElement(
                InspectorControls,
                {},
                createElement(
                    PanelBody,
                    {},
                    createElement(PanelColorSettings, {
                        title: __("Button colours", "@textdomain"),
                        colorSettings: [
                            {
                                value: buttonColor.color,
                                onChange: setButtonColor,
                                label: __("Choose a colour", "@textdomain")
                            }
                        ]
                    })
                )
            ),
            createElement(
                BlockControls,
                {},
                createElement(AlignmentToolbar, {
                    value: buttonAlignment,
                    onChange: value => setAttributes({ buttonAlignment: value })
                })
            ),
            createElement(
                "div",
                {
                    className: `has-text-align-${buttonAlignment}`
                },
                createElement(RichText, {
                    tagName: "span",
                    placeholder: __("Button text...", "@textdomain"),
                    value: buttonText,
                    formattingControls: [],
                    className: `link-button ${buttonColor.class || ""}`,
                    onChange: value => setAttributes({ buttonText: value })
                }),
                isSelected &&
                    createElement(
                        "form",
                        {
                            onSubmit: e => e.preventDefault()
                        },
                        createElement(Dashicon, {
                            icon: "admin-links"
                        }),
                        createElement(URLInput, {
                            value: buttonUrl,
                            onChange: value =>
                                setAttributes({ buttonUrl: value })
                        }),
                        createElement(IconButton, {
                            icon: "editor-break",
                            label: __("Apply", "@textdomain"),
                            type: "submit"
                        })
                    )
            )
        ];
    }),

    // Save the attributes and markup
    save({ attributes }) {
        const {
            buttonText,
            buttonUrl,
            buttonTarget,
            buttonAlignment,
            buttonColor
        } = attributes;

        const buttonColorClass =
            getColorClassName("button-color", buttonColor) || "";

        return createElement(
            "div",
            { className: `has-text-align-${buttonAlignment}` },
            createElement(
                "a",
                {
                    href: buttonUrl,
                    target: buttonTarget ? "_blank" : null,
                    rel: buttonTarget ? "noopener noreferrer" : null,
                    className: `link-button ${buttonColorClass}`
                },
                createElement(RichText.Content, { value: buttonText })
            )
        );
    }
});
