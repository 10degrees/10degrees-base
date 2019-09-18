(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/main"],{

/***/ "./src/js/src/_magnific.js":
/*!*********************************!*\
  !*** ./src/js/src/_magnific.js ***!
  \*********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

__webpack_require__(/*! magnific-popup */ "./node_modules/magnific-popup/dist/jquery.magnific-popup.js");

var Magnific =
/*#__PURE__*/
function () {
  function Magnific() {
    _classCallCheck(this, Magnific);
  }

  _createClass(Magnific, [{
    key: "init",
    value: function init() {
      $('.js-popup').magnificPopup({
        type: 'inline'
      });
      $('.js-popup-video').magnificPopup({
        type: 'iframe'
      });
    }
  }]);

  return Magnific;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (Magnific);

/***/ }),

/***/ "./src/js/src/_slider.js":
/*!*******************************!*\
  !*** ./src/js/src/_slider.js ***!
  \*******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

__webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");

var Slider =
/*#__PURE__*/
function () {
  function Slider() {
    _classCallCheck(this, Slider);
  }

  _createClass(Slider, [{
    key: "init",
    value: function init() {
      var $this = this;
      $(".js-slider").each(function () {
        var instance = $(this);
        $(this).slick({
          arrows: $this.arrows(instance),
          dots: $this.dots(instance),
          autoplay: $this.autoplay(instance),
          autoplaySpeed: $this.speed(instance),
          pauseOnHover: $this.pauseOnHover(instance),
          nextArrow: $this.nextArrow(instance),
          prevArrow: $this.prevArrow(instance)
        });
      });
    }
    /**	
     * Defaults to true
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "autoplay",
    value: function autoplay(instance) {
      if ($(instance).attr('data-autoplay') == 'false') {
        return false;
      }

      return true;
    }
    /**	
     * Defaults to 5000
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "speed",
    value: function speed(instance) {
      if ($(instance).attr('data-speed')) {
        return $(instance).attr('data-speed');
      }

      return 5000;
    }
    /**	
     * Defaults to false
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "arrows",
    value: function arrows(instance) {
      if ($(instance).attr('data-has-arrows') == 'true') {
        return true;
      }

      return false;
    }
    /**	
     * Defaults to false
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "dots",
    value: function dots(instance) {
      if ($(instance).attr('data-has-dots') == 'true') {
        return true;
      }

      return false;
    }
    /**	
     * Defaults to true
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "pauseOnHover",
    value: function pauseOnHover(instance) {
      if ($(instance).attr('data-pause-on-hover') == 'false') {
        return false;
      }

      return true;
    }
    /**
     * Default to a nice svg arrow
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "nextArrow",
    value: function nextArrow(instance) {
      if ($(instance).attr('data-next-arrow')) {
        return $(instance).attr('data-next-arrow');
      }

      return '<div class="slick-next"><i class="fas fa-arrow-right"></i></div>';
    }
    /**
     * Default to a nice svg arrow
     * 
     * @param  slick slider instance
     * @return bool
     */

  }, {
    key: "prevArrow",
    value: function prevArrow(instance) {
      if ($(instance).attr('data-prev-arrow')) {
        return $(instance).attr('data-prev-arrow');
      }

      return '<div class="slick-prev"><i class="fas fa-arrow-left"></i></div>';
    }
  }]);

  return Slider;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (Slider);

/***/ }),

/***/ "./src/js/src/components/_bootstrapMenu.js":
/*!*************************************************!*\
  !*** ./src/js/src/components/_bootstrapMenu.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es6.array.find */ "./node_modules/core-js/modules/es6.array.find.js");
/* harmony import */ var core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0__);


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var BootstrapMenu =
/*#__PURE__*/
function () {
  function BootstrapMenu() {
    _classCallCheck(this, BootstrapMenu);
  }

  _createClass(BootstrapMenu, [{
    key: "init",
    value: function init() {
      var self = this;

      try {
        self.main();
      } catch (error) {
        console.error('bootstrapMenu.js error');
        console.error(error);
      }
    }
  }, {
    key: "main",
    value: function main() {
      $(".bootstrap-walker-nav-menu ul.dropdown-menu [data-toggle='dropdown']").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).siblings().toggleClass("show");

        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
          $('.dropdown-submenu .show').removeClass("show");
        });
      });
    }
  }]);

  return BootstrapMenu;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (BootstrapMenu);

/***/ }),

/***/ "./src/js/src/main.js":
/*!****************************!*\
  !*** ./src/js/src/main.js ***!
  \****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es6_regexp_replace__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es6.regexp.replace */ "./node_modules/core-js/modules/es6.regexp.replace.js");
/* harmony import */ var core_js_modules_es6_regexp_replace__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es6_regexp_replace__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es6_regexp_split__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es6.regexp.split */ "./node_modules/core-js/modules/es6.regexp.split.js");
/* harmony import */ var core_js_modules_es6_regexp_split__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es6_regexp_split__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _magnific__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_magnific */ "./src/js/src/_magnific.js");
/* harmony import */ var _slider__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./_slider */ "./src/js/src/_slider.js");
/* harmony import */ var _utilities_ajaxForm__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./utilities/_ajaxForm */ "./src/js/src/utilities/_ajaxForm.js");
/* harmony import */ var _utilities_scrollToError__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./utilities/_scrollToError */ "./src/js/src/utilities/_scrollToError.js");
/* harmony import */ var _utilities_scrollToId__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./utilities/_scrollToId */ "./src/js/src/utilities/_scrollToId.js");
/* harmony import */ var _utilities_mobile_nav__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./utilities/_mobile-nav */ "./src/js/src/utilities/_mobile-nav.js");
/* harmony import */ var _components_bootstrapMenu__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./components/_bootstrapMenu */ "./src/js/src/components/_bootstrapMenu.js");



/**
 *
 * To create new scripts create a partial inside src and write your code there either inside
 * a function or object oriented.
 *
 * Then call it on the relevant page below or in the common function to be run on every page.
 *
 */
// Require the classes
window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js-exposed"); //Vendor


 //Utilities




 //Components



(function ($) {
  var App = {
    // All pages
    common: {
      init: function init() {
        new _utilities_mobile_nav__WEBPACK_IMPORTED_MODULE_7__["default"]().init();
        new _utilities_scrollToId__WEBPACK_IMPORTED_MODULE_6__["default"]().init();
        new _utilities_scrollToError__WEBPACK_IMPORTED_MODULE_5__["default"]().init();
        new _slider__WEBPACK_IMPORTED_MODULE_3__["default"]().init();
        new _magnific__WEBPACK_IMPORTED_MODULE_2__["default"]().init();
        new _utilities_ajaxForm__WEBPACK_IMPORTED_MODULE_4__["default"]().init();
        new _components_bootstrapMenu__WEBPACK_IMPORTED_MODULE_8__["default"]().init();
      }
    },
    // Home page
    home: {
      init: function init() {// JavaScript to be fired on the home page
      }
    },
    // About us page, note the change from about-us to about_us.
    about_us: {
      init: function init() {// JavaScript to be fired on the about us page
      }
    }
  }; // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event

  var UTIL = {
    fire: function fire(func, funcname, args) {
      var namespace = App;
      funcname = funcname === undefined ? "init" : funcname;

      if (func !== "" && namespace[func] && typeof namespace[func][funcname] === "function") {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function loadEvents() {
      UTIL.fire("common");
      $.each(document.body.className.replace(/-/g, "_").split(/\s+/), function (i, classnm) {
        UTIL.fire(classnm);
      });
    }
  };
  $(document).ready(UTIL.loadEvents());
})(jQuery); // Fully reference jQuery after this point.

/***/ }),

/***/ "./src/js/src/utilities/_ajaxForm.js":
/*!*******************************************!*\
  !*** ./src/js/src/utilities/_ajaxForm.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es6.array.find */ "./node_modules/core-js/modules/es6.array.find.js");
/* harmony import */ var core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0__);


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var AjaxForm =
/*#__PURE__*/
function () {
  function AjaxForm() {
    _classCallCheck(this, AjaxForm);

    this.formClass = '.js-ajax-form';
    this.form = false;
  }

  _createClass(AjaxForm, [{
    key: "init",
    value: function init() {
      var $this = this;
      $("body").on("submit", $this.formClass, function (e) {
        e.preventDefault();
        $this.form = $(this);
        $this.submit();
      });
      $this.maybeSubmitOnLoad();
    }
  }, {
    key: "submit",
    value: function submit() {
      this.loadingState();
      var $this = this;
      $.ajax({
        type: "POST",
        url: this.form.attr('action'),
        data: {
          action: this.form.find('input[name="_action"]').val(),
          data: this.form.serialize()
        },
        success: function success(result) {
          $this.success(result);
        },
        error: function error(data) {
          console.log("error");
          console.log(data);
        }
      });
    }
  }, {
    key: "success",
    value: function success(result) {
      var refresh_target = this.form.attr('data-refresh');

      if (typeof this.form.attr('data-refresh') != 'undefined') {
        $(refresh_target).html(result);
      }
    }
  }, {
    key: "loadingState",
    value: function loadingState() {
      var refresh_target = this.form.attr('data-refresh');

      if (typeof this.form.attr('data-refresh') != 'undefined') {
        $(refresh_target).html('<div class="loading"><i class="fas fa-sync fa-spin"></i></div>');
      }
    }
  }, {
    key: "maybeSubmitOnLoad",
    value: function maybeSubmitOnLoad() {
      $.each($(this.formClass), function () {
        if (typeof $(this).attr('data-submit-on-load') != 'undefined') {
          $(this).submit();
        }
      });
    }
  }]);

  return AjaxForm;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (AjaxForm);

/***/ }),

/***/ "./src/js/src/utilities/_mobile-nav.js":
/*!*********************************************!*\
  !*** ./src/js/src/utilities/_mobile-nav.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var MobileNav =
/*#__PURE__*/
function () {
  function MobileNav() {
    _classCallCheck(this, MobileNav);
  }

  _createClass(MobileNav, [{
    key: "init",
    value: function init() {
      $('.nav-control').click(function () {
        $('#menu-primary-navigation').toggleClass('nav-open');
        $('.nav-control').toggleClass('x close');
      });
    }
  }]);

  return MobileNav;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (MobileNav);

/***/ }),

/***/ "./src/js/src/utilities/_scrollToError.js":
/*!************************************************!*\
  !*** ./src/js/src/utilities/_scrollToError.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es6.array.find */ "./node_modules/core-js/modules/es6.array.find.js");
/* harmony import */ var core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es6_array_find__WEBPACK_IMPORTED_MODULE_0__);


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var ScrollToError =
/*#__PURE__*/
function () {
  function ScrollToError() {
    _classCallCheck(this, ScrollToError);
  }

  _createClass(ScrollToError, [{
    key: "init",
    value: function init() {
      $(document).ready(function () {
        var formPresent = $(".gform_validation_error").length;

        if (formPresent != "0") {
          var firstError = $(".validation_message").first();
          var target = $(firstError).parent().find(".gfield_label");
          $("html, body").animate({
            scrollTop: $(target).offset().top - 50
          }, 1000);
        }
      });
    }
  }]);

  return ScrollToError;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (ScrollToError);

/***/ }),

/***/ "./src/js/src/utilities/_scrollToId.js":
/*!*********************************************!*\
  !*** ./src/js/src/utilities/_scrollToId.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var ScrollToId =
/*#__PURE__*/
function () {
  function ScrollToId() {
    _classCallCheck(this, ScrollToId);
  }

  _createClass(ScrollToId, [{
    key: "init",
    value: function init() {
      $(".scrollToId").click(function (e) {
        e.preventDefault();
        var target = $(this).attr("href");
        $("html, body").animate({
          scrollTop: $(target).offset().top
        }, 1000);
      });
    }
  }]);

  return ScrollToId;
}();

;
/* harmony default export */ __webpack_exports__["default"] = (ScrollToId);

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/scss/wp-admin.scss":
/*!********************************!*\
  !*** ./src/scss/wp-admin.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/scss/wp-editor.scss":
/*!*********************************!*\
  !*** ./src/scss/wp-editor.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/scss/wp-login.scss":
/*!********************************!*\
  !*** ./src/scss/wp-login.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************************************************************************!*\
  !*** multi ./src/js/src/main.js ./src/scss/main.scss ./src/scss/wp-admin.scss ./src/scss/wp-editor.scss ./src/scss/wp-login.scss ***!
  \***********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10degrees-base/src/js/src/main.js */"./src/js/src/main.js");
__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10degrees-base/src/scss/main.scss */"./src/scss/main.scss");
__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10degrees-base/src/scss/wp-admin.scss */"./src/scss/wp-admin.scss");
__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10degrees-base/src/scss/wp-editor.scss */"./src/scss/wp-editor.scss");
module.exports = __webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10degrees-base/src/scss/wp-login.scss */"./src/scss/wp-login.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=main.js.map