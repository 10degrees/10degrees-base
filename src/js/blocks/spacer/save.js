const { createElement: el } = wp.element;

export default function save({ attributes }) {
    const {
        mobileSpacing,
        tabletSpacing,
        desktopSpacing,
        className
    } = attributes;

    return el(
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
    );
};