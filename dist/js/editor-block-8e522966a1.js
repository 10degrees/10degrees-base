!function(){"use strict";function e(e,t,o){return t in e?Object.defineProperty(e,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):e[t]=o,e}function t(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,r)}return o}function o(e){return function(e){if(Array.isArray(e)){for(var t=0,o=new Array(e.length);t<e.length;t++)o[t]=e[t];return o}}(e)||function(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}var r=wp.i18n.__,l=wp.element.createElement,c="custom-blocks/link-button",n=l("svg",{width:24,height:24},l("path",{d:"M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"})),s={title:r("Link Button","@textdomain"),description:r("Add a customizable link button.","@textdomain"),icon:n,category:"custom-blocks",keywords:[r("button","@textdomain"),r("link","@textdomain")]},i=wp.blocks,u=i.registerBlockType,a=i.registerBlockStyle,b=function(){for(var e=arguments.length,t=new Array(e),r=0;r<e;r++)t[r]=arguments[r];return o(new Set([].concat(t).filter((function(e){return"string"==typeof e})))).join(" ")},p=wp.editor,k=p.AlignmentToolbar,g=p.BlockControls,y=p.RichText,d=p.URLInput,m=p.InspectorControls,w=p.PanelColorSettings,B=p.getColorClassName,f=p.withColors,T=wp.components,h=T.IconButton,v=T.Dashicon,S=T.PanelBody;T.PanelRow;u(c,function(o){for(var r=1;r<arguments.length;r++){var l=null!=arguments[r]?arguments[r]:{};r%2?t(Object(l),!0).forEach((function(t){e(o,t,l[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(o,Object.getOwnPropertyDescriptors(l)):t(Object(l)).forEach((function(e){Object.defineProperty(o,e,Object.getOwnPropertyDescriptor(l,e))}))}return o}({},s,{attributes:{buttonText:{type:"string"},buttonUrl:{type:"string",source:"attribute",selector:"a",attribute:"href"},buttonTarget:{type:"boolean",default:!1},buttonAlignment:{type:"string",default:"left"},buttonColor:{type:"string"}},edit:f("buttonColor")((function(e){var t=e.attributes,o=e.setAttributes,c=e.isSelected,n=e.setButtonColor,s=e.buttonColor,i=t.buttonText,u=t.buttonUrl,a=t.buttonAlignment,p=t.className;return[l(m,{},l(S,{},l(w,{title:r("Button colours","@textdomain"),colorSettings:[{value:s.color,onChange:n,label:r("Choose a colour","@textdomain")}]}))),l(g,{},l(k,{value:a,onChange:function(e){return o({buttonAlignment:e})}})),l("div",{className:"has-text-align-".concat(a)},l(y,{tagName:"span",placeholder:r("Button text...","@textdomain"),value:i,formattingControls:[],className:b("link-button",s.class,p),onChange:function(e){return o({buttonText:e})}}),c&&l("form",{onSubmit:function(e){return e.preventDefault()}},l(v,{icon:"admin-links"}),l(d,{value:u,onChange:function(e){return o({buttonUrl:e})}}),l(h,{icon:"editor-break",label:r("Apply","@textdomain"),type:"submit"})))]})),save:function(e){var t=e.attributes,o=t.buttonText,r=t.buttonUrl,c=t.buttonTarget,n=t.buttonAlignment,s=t.buttonColor,i=t.className,u=B("button-color",s)||"";return l("div",{className:n?"has-text-align-".concat(n):""},l("a",{href:r,target:c?"_blank":null,rel:c?"noopener noreferrer":null,className:b("link-button",u,i)},l(y.Content,{value:o})))}})),a(c,{name:"full",label:"Full Width"}),a(c,{name:"outline",label:"Outline"}),wp.domReady((function(){wp.blocks.unregisterBlockStyle("core/button","default"),wp.blocks.unregisterBlockStyle("core/button","squared"),wp.blocks.unregisterBlockStyle("core/button","fill"),wp.blocks.unregisterBlockStyle("core/separator","default"),wp.blocks.unregisterBlockStyle("core/separator","wide"),wp.blocks.unregisterBlockStyle("core/separator","dots"),wp.blocks.unregisterBlockStyle("core/quote","default"),wp.blocks.unregisterBlockStyle("core/quote","large"),wp.blocks.registerBlockStyle("core/button",{name:"regular",label:"Regular",isDefault:!0}),wp.blocks.registerBlockStyle("core/button",{name:"full",label:"Full Width"}),wp.blocks.registerBlockStyle("core/heading",{name:"default",label:"Default",isDefault:!0}),wp.blocks.registerBlockStyle("core/heading",{name:"underline",label:"Underline"}),wp.blocks.registerBlockStyle("core/separator",{name:"line",label:"Line",isDefault:!0}),wp.blocks.registerBlockStyle("core/separator",{name:"block",label:"Block"}),wp.blocks.registerBlockStyle("core/separator",{name:"dots",label:"Dots"}),wp.blocks.registerBlockStyle("core/quote",{name:"default",label:"Default",isDefault:!0}),wp.blocks.registerBlockStyle("core/quote",{name:"line",label:"Line"}),wp.blocks.registerBlockStyle("core/list",{name:"default",label:"Default",isDefault:!0}),wp.blocks.registerBlockStyle("core/list",{name:"icon",label:"Icon"}),wp.blocks.unregisterBlockType("core/pullquote"),wp.blocks.unregisterBlockType("core/verse"),wp.blocks.unregisterBlockType("core/archives"),wp.blocks.unregisterBlockType("core/latest-posts"),wp.blocks.unregisterBlockType("core/latest-comments"),wp.blocks.unregisterBlockType("core/calendar"),wp.blocks.unregisterBlockType("core/rss"),wp.blocks.unregisterBlockType("core/search"),wp.blocks.unregisterBlockType("core/tag-cloud"),wp.blocks.unregisterBlockType("core-embed/soundcloud"),wp.blocks.unregisterBlockType("core-embed/spotify"),wp.blocks.unregisterBlockType("core-embed/flickr"),wp.blocks.unregisterBlockType("core-embed/vimeo"),wp.blocks.unregisterBlockType("core-embed/animoto"),wp.blocks.unregisterBlockType("core-embed/cloudup"),wp.blocks.unregisterBlockType("core-embed/collegehumor"),wp.blocks.unregisterBlockType("core-embed/dailymotion"),wp.blocks.unregisterBlockType("core-embed/funnyordie"),wp.blocks.unregisterBlockType("core-embed/hulu"),wp.blocks.unregisterBlockType("core-embed/imgur"),wp.blocks.unregisterBlockType("core-embed/issuu"),wp.blocks.unregisterBlockType("core-embed/kickstarter"),wp.blocks.unregisterBlockType("core-embed/meetup-com"),wp.blocks.unregisterBlockType("core-embed/mixcloud"),wp.blocks.unregisterBlockType("core-embed/photobucket"),wp.blocks.unregisterBlockType("core-embed/polldaddy"),wp.blocks.unregisterBlockType("core-embed/reddit"),wp.blocks.unregisterBlockType("core-embed/reverbnation"),wp.blocks.unregisterBlockType("core-embed/screencast"),wp.blocks.unregisterBlockType("core-embed/scribd"),wp.blocks.unregisterBlockType("core-embed/slideshare"),wp.blocks.unregisterBlockType("core-embed/smugmug"),wp.blocks.unregisterBlockType("core-embed/speaker"),wp.blocks.unregisterBlockType("core-embed/ted"),wp.blocks.unregisterBlockType("core-embed/tumblr"),wp.blocks.unregisterBlockType("core-embed/videopress"),wp.blocks.unregisterBlockType("core-embed/wordpress-tv"),wp.blocks.unregisterBlockType("core-embed/crowdsignal"),wp.blocks.unregisterBlockType("core-embed/speaker-deck"),wp.blocks.unregisterBlockType("core-embed/amazon-kindle"),wp.blocks.unregisterBlockType("yoast/how-to-block"),wp.blocks.unregisterBlockType("yoast/faq-block")}))}();
