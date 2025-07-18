// Utilities
import AjaxForm from "./common/ajax-form";
import ScrollToId from "./common/scroll-to-id";
import ScrollToError from "./common/scroll-to-error";

// Vendor
import GoogleMapInit from "./common/google-map-init";

var App = {
    // All pages
    common: {
        init: function() {
            new AjaxForm();
            new ScrollToId();
            new ScrollToError();
            new GoogleMapInit();
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

        document.body.className
            .replace(/-/g, "_")
            .split(/\s+/)
            .forEach((classnm) => {
                UTIL.fire(classnm);
            });
    }
};

document.addEventListener("DOMContentLoaded", () => {
    UTIL.loadEvents();
});
