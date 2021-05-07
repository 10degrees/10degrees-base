import Block from './block';
import {__} from '@wordpress/i18n';
import {PanelBody, PanelRow, RangeControl} from '@wordpress/components';
import {InspectorControls} from '@wordpress/block-editor';

const blockIcon = <svg width="24" height="24"><path d="M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"></path></svg>
class Spacer extends Block {
    constructor(){
        super();

        this.name = 'custom-blocks/spacer';

        this.meta = {
            title: __("Spacer", "@textdomain"),
            description: __("Add a section of empty space.", "@textdomain"),
            icon: blockIcon,
            category: "custom-blocks",
            keywords: [__("spacer", "@textdomain"), __("empty", "@textdomain")]
        };

        this.attributes = {
            mobileSpacing: {
                type: "number",
                default: 30
            },
            tabletSpacing: {
                type: "number",
                default: 30
            },
            desktopSpacing: {
                type: "number",
                default: 50
            }
        };

        this.registerBlock();
    }

    edit({attributes, setAttributes, className}){
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
        ]
    }

    save({attributes}){
        const {
            mobileSpacing,
            tabletSpacing,
            desktopSpacing,
            className
        } = attributes;
    
        return (
            <div className={className}>
                <div class="spacer -mobile-only" style={{height: mobileSpacing + "px"}}></div>
                <div class="spacer -tablet-only" style={{height: tabletSpacing + "px"}}></div>
                <div class="spacer -desktop-only" style={{height: desktopSpacing + "px"}}></div>
            </div>
        );
    }
}

new Spacer();