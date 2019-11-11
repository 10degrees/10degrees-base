'use strict';

wp.domReady(() => {
  //   wp.blocks.unregisterBlockStyle("core/button", "default");
  wp.blocks.unregisterBlockStyle("core/button", "outline");
  wp.blocks.unregisterBlockStyle("core/button", "squared");
  wp.blocks.unregisterBlockStyle("core/separator", "default");
  wp.blocks.unregisterBlockStyle("core/separator", "wide");
  wp.blocks.unregisterBlockStyle("core/separator", "dots");
  wp.blocks.unregisterBlockStyle("core/quote", "default");
  wp.blocks.unregisterBlockStyle("core/quote", "large");
  wp.blocks.registerBlockStyle("core/button", {
    name: "default",
    label: "Default",
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
});
