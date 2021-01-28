// Register components
const {
    PanelBody,
    PanelRow,
    RangeControl
} = wp.components;

// Register editor components
const {
    InspectorControls,
} = wp.blockEditor;

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
        <InspectorControls>
            <PanelBody title={__("Spacer settings", "@textdomain")}>
                <PanelRow>
                    <RangeControl
                        label={__("Mobile Spacing", "@textdomain")}
                        value={mobileSpacing}
                        min="0"
                        max="1000"
                        onChange={mobileSpacing => setAttributes({mobileSpacing})}
                        initialPosition="30"
                        separatorType="fullWidth"
                    />
                </PanelRow>
                <PanelRow>
                    <RangeControl
                        label={__("Tablet Spacing", "@textdomain")}
                        value={tabletSpacing}
                        min="0"
                        max="1000"
                        onChange={tabletSpacing => setAttributes({tabletSpacing})}
                        initialPosition="30"
                        separatorType="fullWidth"
                    />
                </PanelRow>
                <PanelRow>
                    <RangeControl
                        label={__("Desktop Spacing", "@textdomain")}
                        value={desktopSpacing}
                        min="0"
                        max="1000"
                        onChange={desktopSpacing => setAttributes({desktopSpacing})}
                        initialPosition="50"
                        separatorType="fullWidth"
                    />
                </PanelRow>
            </PanelBody>
        </InspectorControls>,
        <div className={className}>
            <div class="spacer -mobile-only" style={{height: mobileSpacing + "px"}}></div>
            <div class="spacer -tablet-only" style={{height: tabletSpacing + "px"}}></div>
            <div class="spacer -desktop-only" style={{height: desktopSpacing + "px"}}></div>
        </div>
    ];
};