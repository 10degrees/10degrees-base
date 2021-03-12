/**
 *
 * To create new scripts create a partial inside src and write your code there either inside
 * a function or object oriented.
 *
 * Then call it on the relevant page below or in the common function to be run on every page.
 *
 */

import 'alpinejs';

//Utilities
import AjaxForm from "./common/ajax-form";
import ScrollToId from "./common/scroll-to-id";
import ScrollToError from "./common/scroll-to-error";
import DisableSVGFocus from './common/disable-svg-focus';
import Menu from "./common/menu";
import MobileMenu from "./common/mobile-menu";

// Block-related JavaScript
import SocialShare from "./common/blocks/social-share";

//Vendor
import Magnific from "./common/magnific";
import Slider from "./common/slider";

window.$ = window.jQuery; // Set JQuery Variable

var App = {
    // All pages
    common: {
        init: function() {
            new DisableSVGFocus();
            new AjaxForm();
            new ScrollToId();
            new ScrollToError();
            new Magnific();
            new Slider();
            new SocialShare();
            new Menu("#nav-primary");
            new MobileMenu();
        }
    },
    // Home page
    home: {
        init: function() {
            // JavaScript to be fired on the home page
        }
    },
    // About us page, note the change from about-us to about_us.
    about_us: {
        init: function() {
            // JavaScript to be fired on the about us page
        }
    }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = App;
        funcname = funcname === undefined ? "init" : funcname;
        if (
            func !== "" &&
            namespace[func] &&
            typeof namespace[func][funcname] === "function"
        ) {
            namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        UTIL.fire("common");

        $.each(
            document.body.className.replace(/-/g, "_").split(/\s+/),
            function(i, classnm) {
                UTIL.fire(classnm);
            }
        );
    }
};

$(document).ready(UTIL.loadEvents());
