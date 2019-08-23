/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/src/main.js":
/*!****************************!*\
  !*** ./src/js/src/main.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n *\n * To create new scripts create a partial inside src and right your code there either inside\n * a function or object oriented.\n *\n * Then call it on the relevant page below or in the common function to be run on every page.\n *\n */\n(function ($) {\n  var Roots = {\n    // All pages\n    common: {\n      init: function init() {\n        mobileNav.init();\n        scrollToId.init();\n        scrollToError.init();\n        slider.init();\n        magnific.init();\n        ajaxForm.init();\n      }\n    },\n    // Home page\n    home: {\n      init: function init() {// JavaScript to be fired on the home page\n      }\n    },\n    // About us page, note the change from about-us to about_us.\n    about_us: {\n      init: function init() {// JavaScript to be fired on the about us page\n      }\n    }\n  }; // The routing fires all common scripts, followed by the page specific scripts.\n  // Add additional events for more control over timing e.g. a finalize event\n\n  var UTIL = {\n    fire: function fire(func, funcname, args) {\n      var namespace = Roots;\n      funcname = funcname === undefined ? \"init\" : funcname;\n\n      if (func !== \"\" && namespace[func] && typeof namespace[func][funcname] === \"function\") {\n        namespace[func][funcname](args);\n      }\n    },\n    loadEvents: function loadEvents() {\n      UTIL.fire(\"common\");\n      $.each(document.body.className.replace(/-/g, \"_\").split(/\\s+/), function (i, classnm) {\n        UTIL.fire(classnm);\n      });\n    }\n  };\n  $(document).ready(UTIL.loadEvents);\n})(jQuery); // Fully reference jQuery after this point.//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvanMvc3JjL21haW4uanM/YmVjZiJdLCJuYW1lcyI6WyIkIiwiUm9vdHMiLCJjb21tb24iLCJpbml0IiwibW9iaWxlTmF2Iiwic2Nyb2xsVG9JZCIsInNjcm9sbFRvRXJyb3IiLCJzbGlkZXIiLCJtYWduaWZpYyIsImFqYXhGb3JtIiwiaG9tZSIsImFib3V0X3VzIiwiVVRJTCIsImZpcmUiLCJmdW5jIiwiZnVuY25hbWUiLCJhcmdzIiwibmFtZXNwYWNlIiwidW5kZWZpbmVkIiwibG9hZEV2ZW50cyIsImVhY2giLCJkb2N1bWVudCIsImJvZHkiLCJjbGFzc05hbWUiLCJyZXBsYWNlIiwic3BsaXQiLCJpIiwiY2xhc3NubSIsInJlYWR5IiwialF1ZXJ5Il0sIm1hcHBpbmdzIjoiQUFBQTs7Ozs7Ozs7QUFTQSxDQUFDLFVBQVNBLENBQVQsRUFBWTtBQUNULE1BQUlDLEtBQUssR0FBRztBQUNSO0FBQ0FDLFVBQU0sRUFBRTtBQUNKQyxVQUFJLEVBQUUsZ0JBQVc7QUFDYkMsaUJBQVMsQ0FBQ0QsSUFBVjtBQUNBRSxrQkFBVSxDQUFDRixJQUFYO0FBQ0FHLHFCQUFhLENBQUNILElBQWQ7QUFDQUksY0FBTSxDQUFDSixJQUFQO0FBQ0FLLGdCQUFRLENBQUNMLElBQVQ7QUFDQU0sZ0JBQVEsQ0FBQ04sSUFBVDtBQUNIO0FBUkcsS0FGQTtBQVlSO0FBQ0FPLFFBQUksRUFBRTtBQUNGUCxVQUFJLEVBQUUsZ0JBQVcsQ0FDYjtBQUNIO0FBSEMsS0FiRTtBQWtCUjtBQUNBUSxZQUFRLEVBQUU7QUFDTlIsVUFBSSxFQUFFLGdCQUFXLENBQ2I7QUFDSDtBQUhLO0FBbkJGLEdBQVosQ0FEUyxDQTJCVDtBQUNBOztBQUNBLE1BQUlTLElBQUksR0FBRztBQUNQQyxRQUFJLEVBQUUsY0FBU0MsSUFBVCxFQUFlQyxRQUFmLEVBQXlCQyxJQUF6QixFQUErQjtBQUNqQyxVQUFJQyxTQUFTLEdBQUdoQixLQUFoQjtBQUNBYyxjQUFRLEdBQUdBLFFBQVEsS0FBS0csU0FBYixHQUF5QixNQUF6QixHQUFrQ0gsUUFBN0M7O0FBQ0EsVUFDSUQsSUFBSSxLQUFLLEVBQVQsSUFDQUcsU0FBUyxDQUFDSCxJQUFELENBRFQsSUFFQSxPQUFPRyxTQUFTLENBQUNILElBQUQsQ0FBVCxDQUFnQkMsUUFBaEIsQ0FBUCxLQUFxQyxVQUh6QyxFQUlFO0FBQ0VFLGlCQUFTLENBQUNILElBQUQsQ0FBVCxDQUFnQkMsUUFBaEIsRUFBMEJDLElBQTFCO0FBQ0g7QUFDSixLQVhNO0FBWVBHLGNBQVUsRUFBRSxzQkFBVztBQUNuQlAsVUFBSSxDQUFDQyxJQUFMLENBQVUsUUFBVjtBQUVBYixPQUFDLENBQUNvQixJQUFGLENBQ0lDLFFBQVEsQ0FBQ0MsSUFBVCxDQUFjQyxTQUFkLENBQXdCQyxPQUF4QixDQUFnQyxJQUFoQyxFQUFzQyxHQUF0QyxFQUEyQ0MsS0FBM0MsQ0FBaUQsS0FBakQsQ0FESixFQUVJLFVBQVNDLENBQVQsRUFBWUMsT0FBWixFQUFxQjtBQUNqQmYsWUFBSSxDQUFDQyxJQUFMLENBQVVjLE9BQVY7QUFDSCxPQUpMO0FBTUg7QUFyQk0sR0FBWDtBQXdCQTNCLEdBQUMsQ0FBQ3FCLFFBQUQsQ0FBRCxDQUFZTyxLQUFaLENBQWtCaEIsSUFBSSxDQUFDTyxVQUF2QjtBQUNILENBdERELEVBc0RHVSxNQXRESCxFLENBc0RZIiwiZmlsZSI6Ii4vc3JjL2pzL3NyYy9tYWluLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKlxuICogVG8gY3JlYXRlIG5ldyBzY3JpcHRzIGNyZWF0ZSBhIHBhcnRpYWwgaW5zaWRlIHNyYyBhbmQgcmlnaHQgeW91ciBjb2RlIHRoZXJlIGVpdGhlciBpbnNpZGVcbiAqIGEgZnVuY3Rpb24gb3Igb2JqZWN0IG9yaWVudGVkLlxuICpcbiAqIFRoZW4gY2FsbCBpdCBvbiB0aGUgcmVsZXZhbnQgcGFnZSBiZWxvdyBvciBpbiB0aGUgY29tbW9uIGZ1bmN0aW9uIHRvIGJlIHJ1biBvbiBldmVyeSBwYWdlLlxuICpcbiAqL1xuXG4oZnVuY3Rpb24oJCkge1xuICAgIHZhciBSb290cyA9IHtcbiAgICAgICAgLy8gQWxsIHBhZ2VzXG4gICAgICAgIGNvbW1vbjoge1xuICAgICAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgbW9iaWxlTmF2LmluaXQoKTtcbiAgICAgICAgICAgICAgICBzY3JvbGxUb0lkLmluaXQoKTtcbiAgICAgICAgICAgICAgICBzY3JvbGxUb0Vycm9yLmluaXQoKTtcbiAgICAgICAgICAgICAgICBzbGlkZXIuaW5pdCgpO1xuICAgICAgICAgICAgICAgIG1hZ25pZmljLmluaXQoKTtcbiAgICAgICAgICAgICAgICBhamF4Rm9ybS5pbml0KCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0sXG4gICAgICAgIC8vIEhvbWUgcGFnZVxuICAgICAgICBob21lOiB7XG4gICAgICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAvLyBKYXZhU2NyaXB0IHRvIGJlIGZpcmVkIG9uIHRoZSBob21lIHBhZ2VcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgLy8gQWJvdXQgdXMgcGFnZSwgbm90ZSB0aGUgY2hhbmdlIGZyb20gYWJvdXQtdXMgdG8gYWJvdXRfdXMuXG4gICAgICAgIGFib3V0X3VzOiB7XG4gICAgICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAvLyBKYXZhU2NyaXB0IHRvIGJlIGZpcmVkIG9uIHRoZSBhYm91dCB1cyBwYWdlXG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9O1xuXG4gICAgLy8gVGhlIHJvdXRpbmcgZmlyZXMgYWxsIGNvbW1vbiBzY3JpcHRzLCBmb2xsb3dlZCBieSB0aGUgcGFnZSBzcGVjaWZpYyBzY3JpcHRzLlxuICAgIC8vIEFkZCBhZGRpdGlvbmFsIGV2ZW50cyBmb3IgbW9yZSBjb250cm9sIG92ZXIgdGltaW5nIGUuZy4gYSBmaW5hbGl6ZSBldmVudFxuICAgIHZhciBVVElMID0ge1xuICAgICAgICBmaXJlOiBmdW5jdGlvbihmdW5jLCBmdW5jbmFtZSwgYXJncykge1xuICAgICAgICAgICAgdmFyIG5hbWVzcGFjZSA9IFJvb3RzO1xuICAgICAgICAgICAgZnVuY25hbWUgPSBmdW5jbmFtZSA9PT0gdW5kZWZpbmVkID8gXCJpbml0XCIgOiBmdW5jbmFtZTtcbiAgICAgICAgICAgIGlmIChcbiAgICAgICAgICAgICAgICBmdW5jICE9PSBcIlwiICYmXG4gICAgICAgICAgICAgICAgbmFtZXNwYWNlW2Z1bmNdICYmXG4gICAgICAgICAgICAgICAgdHlwZW9mIG5hbWVzcGFjZVtmdW5jXVtmdW5jbmFtZV0gPT09IFwiZnVuY3Rpb25cIlxuICAgICAgICAgICAgKSB7XG4gICAgICAgICAgICAgICAgbmFtZXNwYWNlW2Z1bmNdW2Z1bmNuYW1lXShhcmdzKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgbG9hZEV2ZW50czogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBVVElMLmZpcmUoXCJjb21tb25cIik7XG5cbiAgICAgICAgICAgICQuZWFjaChcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5ib2R5LmNsYXNzTmFtZS5yZXBsYWNlKC8tL2csIFwiX1wiKS5zcGxpdCgvXFxzKy8pLFxuICAgICAgICAgICAgICAgIGZ1bmN0aW9uKGksIGNsYXNzbm0pIHtcbiAgICAgICAgICAgICAgICAgICAgVVRJTC5maXJlKGNsYXNzbm0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICk7XG4gICAgICAgIH1cbiAgICB9O1xuXG4gICAgJChkb2N1bWVudCkucmVhZHkoVVRJTC5sb2FkRXZlbnRzKTtcbn0pKGpRdWVyeSk7IC8vIEZ1bGx5IHJlZmVyZW5jZSBqUXVlcnkgYWZ0ZXIgdGhpcyBwb2ludC5cbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/js/src/main.js\n");

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvc2Nzcy9tYWluLnNjc3M/NDI2ZSJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL3NyYy9zY3NzL21haW4uc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./src/scss/main.scss\n");

/***/ }),

/***/ "./src/scss/wp-admin.scss":
/*!********************************!*\
  !*** ./src/scss/wp-admin.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvc2Nzcy93cC1hZG1pbi5zY3NzP2NjZDAiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEiLCJmaWxlIjoiLi9zcmMvc2Nzcy93cC1hZG1pbi5zY3NzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/scss/wp-admin.scss\n");

/***/ }),

/***/ "./src/scss/wp-editor.scss":
/*!*********************************!*\
  !*** ./src/scss/wp-editor.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvc2Nzcy93cC1lZGl0b3Iuc2Nzcz9kMGFiIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vc3JjL3Njc3Mvd3AtZWRpdG9yLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./src/scss/wp-editor.scss\n");

/***/ }),

/***/ "./src/scss/wp-login.scss":
/*!********************************!*\
  !*** ./src/scss/wp-login.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvc2Nzcy93cC1sb2dpbi5zY3NzP2M2ZDMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEiLCJmaWxlIjoiLi9zcmMvc2Nzcy93cC1sb2dpbi5zY3NzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./src/scss/wp-login.scss\n");

/***/ }),

/***/ 0:
/*!***********************************************************************************************************************************!*\
  !*** multi ./src/js/src/main.js ./src/scss/main.scss ./src/scss/wp-admin.scss ./src/scss/wp-editor.scss ./src/scss/wp-login.scss ***!
  \***********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10d-base/src/js/src/main.js */"./src/js/src/main.js");
__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10d-base/src/scss/main.scss */"./src/scss/main.scss");
__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10d-base/src/scss/wp-admin.scss */"./src/scss/wp-admin.scss");
__webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10d-base/src/scss/wp-editor.scss */"./src/scss/wp-editor.scss");
module.exports = __webpack_require__(/*! /Users/matt/code/10d-alpha/wp-content/themes/10d-base/src/scss/wp-login.scss */"./src/scss/wp-login.scss");


/***/ })

/******/ });