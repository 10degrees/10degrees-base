const { __ } = wp.i18n;
const { createElement: el } = wp.element;

const BLOCK_NAME = "custom-blocks/spacer";

const blockIcon = el(
    "svg",
    { width: 24, height: 24 },
    el("path", {
        d:
            "M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"
    })
);

const blockMeta = {
    title: __("Spacer", "@textdomain"),
    description: __("Add a section of empty space.", "@textdomain"),
    icon: blockIcon,
    category: "custom-blocks",
    keywords: [__("spacer", "@textdomain"), __("empty", "@textdomain")]
};

// Register block
const { registerBlockType } = wp.blocks;


import edit from './edit';
import save from './save';
import attributes from './attributes';

// Register the block
registerBlockType(BLOCK_NAME, {
    ...blockMeta,
    attributes,

    // Render the block components
    edit,

    // Save the attributes and markup
    save,
});
