import "./blocks/link-button.js";
import Accordion from "./common/blocks/_accordion";
new Accordion();

wp.domReady(() => {
    wp.blocks.unregisterBlockStyle("core/button", "default");
    //wp.blocks.unregisterBlockStyle("core/button", "outline");
    wp.blocks.unregisterBlockStyle("core/button", "squared");
    wp.blocks.unregisterBlockStyle("core/button", "fill");

    wp.blocks.unregisterBlockStyle("core/separator", "default");
    wp.blocks.unregisterBlockStyle("core/separator", "wide");
    wp.blocks.unregisterBlockStyle("core/separator", "dots");

    wp.blocks.unregisterBlockStyle("core/quote", "default");
    wp.blocks.unregisterBlockStyle("core/quote", "large");

    wp.blocks.registerBlockStyle("core/button", {
        name: "regular",
        label: "Regular",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/button", {
        name: "full",
        label: "Full Width"
    });

    wp.blocks.registerBlockStyle("core/heading", {
        name: "default",
        label: "Default",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/heading", {
        name: "underline",
        label: "Underline"
    });

    wp.blocks.registerBlockStyle("core/separator", {
        name: "line",
        label: "Line",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/separator", {
        name: "block",
        label: "Block"
    });

    wp.blocks.registerBlockStyle("core/separator", {
        name: "dots",
        label: "Dots"
    });

    wp.blocks.registerBlockStyle("core/quote", {
        name: "default",
        label: "Default",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/quote", {
        name: "line",
        label: "Line"
    });

    wp.blocks.registerBlockStyle("core/list", {
        name: "default",
        label: "Default",
        isDefault: true
    });

    wp.blocks.registerBlockStyle("core/list", {
        name: "icon",
        label: "Icon"
    });

    // Common Blocks

    // Formatting
    // wp.blocks.unregisterBlockType("core/freeform");
    // wp.blocks.unregisterBlockType("core/preformatted");
    wp.blocks.unregisterBlockType("core/pullquote");
    wp.blocks.unregisterBlockType("core/verse");

    // layout Elements
    //wp.blocks.unregisterBlockType("core/button");
    // wp.blocks.unregisterBlockType("core/more");
    // wp.blocks.unregisterBlockType("core/nextpage");
    // wp.blocks.unregisterBlockType("core/separator");

    // Widgets
    wp.blocks.unregisterBlockType("core/archives");
    wp.blocks.unregisterBlockType("core/latest-posts");
    wp.blocks.unregisterBlockType("core/latest-comments");
    wp.blocks.unregisterBlockType("core/calendar");
    wp.blocks.unregisterBlockType("core/rss");
    wp.blocks.unregisterBlockType("core/search");
    wp.blocks.unregisterBlockType("core/tag-cloud");

    // Embeds
    // wp.blocks.unregisterBlockType("core-embed/wordpress");
    wp.blocks.unregisterBlockType("core-embed/soundcloud");
    wp.blocks.unregisterBlockType("core-embed/spotify");
    wp.blocks.unregisterBlockType("core-embed/flickr");
    wp.blocks.unregisterBlockType("core-embed/vimeo");
    wp.blocks.unregisterBlockType("core-embed/animoto");
    wp.blocks.unregisterBlockType("core-embed/cloudup");
    wp.blocks.unregisterBlockType("core-embed/collegehumor");
    wp.blocks.unregisterBlockType("core-embed/dailymotion");
    wp.blocks.unregisterBlockType("core-embed/funnyordie");
    wp.blocks.unregisterBlockType("core-embed/hulu");
    wp.blocks.unregisterBlockType("core-embed/imgur");
    wp.blocks.unregisterBlockType("core-embed/issuu");
    wp.blocks.unregisterBlockType("core-embed/kickstarter");
    wp.blocks.unregisterBlockType("core-embed/meetup-com");
    wp.blocks.unregisterBlockType("core-embed/mixcloud");
    wp.blocks.unregisterBlockType("core-embed/photobucket");
    wp.blocks.unregisterBlockType("core-embed/polldaddy");
    wp.blocks.unregisterBlockType("core-embed/reddit");
    wp.blocks.unregisterBlockType("core-embed/reverbnation");
    wp.blocks.unregisterBlockType("core-embed/screencast");
    wp.blocks.unregisterBlockType("core-embed/scribd");
    wp.blocks.unregisterBlockType("core-embed/slideshare");
    wp.blocks.unregisterBlockType("core-embed/smugmug");
    wp.blocks.unregisterBlockType("core-embed/speaker");
    wp.blocks.unregisterBlockType("core-embed/ted");
    wp.blocks.unregisterBlockType("core-embed/tumblr");
    wp.blocks.unregisterBlockType("core-embed/videopress");
    wp.blocks.unregisterBlockType("core-embed/wordpress-tv");
    wp.blocks.unregisterBlockType("core-embed/crowdsignal");
    wp.blocks.unregisterBlockType("core-embed/speaker-deck");
    wp.blocks.unregisterBlockType("core-embed/amazon-kindle");

    // Yoast
    wp.blocks.unregisterBlockType("yoast/how-to-block");
    wp.blocks.unregisterBlockType("yoast/faq-block");
});
