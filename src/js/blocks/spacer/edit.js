// Register components
const {
    PanelBody,
    PanelRow,
    RangeControl
} = wp.components;

// Register editor components
const {
    InspectorControls,
} = wp.editor;

const { createElement: el } = wp.element;

const { __ } = wp.i18n;

export default function edit({
    attributes,
    setAttributes,
    className
}) {
    const {
        mobileSpacing,
        tabletSpacing,
        desktopSpacing
    } = attributes;

    return [
        el(
            InspectorControls,
            {},
            el(
                PanelBody,
                { title: __("Spacer settings", "@textdomain") },
                el(
                    PanelRow,
                    {},
                    el(
                        RangeControl,
                        {
                            label: __("Mobile Spacing", "@textdomain"),
                            value: mobileSpacing,
                            onChange: (mobileSpacing) => setAttributes({mobileSpacing}),
                            min: 0,
                            max: 1000,
                            initialPosition : 30,
                            separatorType: "fullWidth",
                        }
                    )
                ),
                el(
                    PanelRow,
                    {},
                    el(
                        RangeControl,
                        {
                            label: __("Tablet Spacing", "@textdomain"),
                            value: tabletSpacing,
                            onChange: (tabletSpacing) => setAttributes({tabletSpacing}),
                            min: 0,
                            max: 1000,
                            initialPosition : 30,
                            separatorType: "fullWidth",
                        }
                    )
                ),
                el(
                    PanelRow,
                    {},
                    el(
                        RangeControl,
                        {
                            label: __("Desktop Spacing", "@textdomain"),
                            value: desktopSpacing,
                            onChange: (desktopSpacing) => setAttributes({desktopSpacing}),
                            min: 0,
                            max: 1000,
                            initialPosition : 50,
                            separatorType: "fullWidth",
                        }
                    )
                ),
            )
        ),
        el(
            "div",
            {
                className: className
            },
            [
                el(
                    "div",
                    {
                        style: {
                            height: mobileSpacing+ "px"
                        },
                        className: "spacer -mobile-only"
                    }
                ),
                el(
                    "div",
                    {
                        style: {
                            height: tabletSpacing+ "px",
                        },
                        className: "spacer -tablet-only"
                    }
                ),
                el(
                    "div",
                    {
                        style: {
                            height: desktopSpacing+ "px",
                        },
                        className: "spacer -desktop-only"
                    }
                )
            ]
        )
    ];
};