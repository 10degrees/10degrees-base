const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;
const { RichText } = wp.editor;

registerBlockType("ten-degrees/button", {
    title: "Button 2",
    icon: "universal-access-alt",
    category: "layout",
    attributes: {
        content: {
            type: "array",
            source: "children",
            selector: "a"
        },
        href: {
            type: "string"
        }
    },
    example: {
        attributes: {
            content: "Hello World"
        }
    },
    edit(props) {
        return createElement(RichText, {
            className: "button",
            onChange: newContent =>
                props.setAttributes({ content: newContent }),
            value: props.attributes.content
        });
    },
    save(props) {
        return createElement(RichText.Content, {
            className: "button",
            tagName: "a",
            value: props.attributes.content
        });
    }
});
