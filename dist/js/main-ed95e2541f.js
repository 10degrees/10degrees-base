'use strict';

class AjaxForm {
  constructor() {
    this.formClass = '.js-ajax-form';
    this.form = false;
  }

  init() {
    var $this = this;
    $("body").on("submit", $this.formClass, function (e) {
      e.preventDefault();
      $this.form = $(this);
      $this.submit();
    });
    $this.maybeSubmitOnLoad();
  }

  submit() {
    this.loadingState();
    var $this = this;
    $.ajax({
      type: "POST",
      url: this.form.attr('action'),
      data: {
        action: this.form.find('input[name="_action"]').val(),
        data: this.form.serialize()
      },
      success: function (result) {
        $this.success(result);
      },
      error: function (data) {
        console.log("error");
        console.log(data);
      }
    });
  }

  success(result) {
    var refresh_target = this.form.attr('data-refresh');

    if (typeof this.form.attr('data-refresh') != 'undefined') {
      $(refresh_target).html(result);
    }
  }

  loadingState() {
    var refresh_target = this.form.attr('data-refresh');

    if (typeof this.form.attr('data-refresh') != 'undefined') {
      $(refresh_target).html('<div class="loading"><i class="fas fa-sync fa-spin"></i></div>');
    }
  }

  maybeSubmitOnLoad() {
    $.each($(this.formClass), function () {
      if (typeof $(this).attr('data-submit-on-load') != 'undefined') {
        $(this).submit();
      }
    });
  }

}

class ScrollToId {
  init() {
    $(".scrollToId").click(function (e) {
      e.preventDefault();
      var target = $(this).attr("href");
      $("html, body").animate({
        scrollTop: $(target).offset().top
      }, 1000);
    });
  }

}

class ScrollToError {
  init() {
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

}

class MobileNav {
  init() {
    $('.nav-control').click(function () {
      $('#menu-primary-navigation').toggleClass('nav-open');
      $('.nav-control').toggleClass('x close');
    });
  }

}

require('magnific-popup');

class Magnific {
  init() {
    $('.js-popup').magnificPopup({
      type: 'inline'
    });
    $('.js-popup-video').magnificPopup({
      type: 'iframe'
    });
  }

}

require('slick-carousel');

class Slider {
  init() {
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


  autoplay(instance) {
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


  speed(instance) {
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


  arrows(instance) {
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


  dots(instance) {
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


  pauseOnHover(instance) {
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


  nextArrow(instance) {
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


  prevArrow(instance) {
    if ($(instance).attr('data-prev-arrow')) {
      return $(instance).attr('data-prev-arrow');
    }

    return '<div class="slick-prev"><i class="fas fa-arrow-left"></i></div>';
  }

}

/**
 *
 * To create new scripts create a partial inside src and write your code there either inside
 * a function or object oriented.
 *
 * Then call it on the relevant page below or in the common function to be run on every page.
 *
 */

(function ($) {
  var App = {
    // All pages
    common: {
      init: function () {
        new AjaxForm().init();
        new ScrollToId().init();
        new ScrollToError().init();
        new MobileNav().init();
        new Magnific().init();
        new Slider().init();
      }
    },
    // Home page
    home: {
      init: function () {// JavaScript to be fired on the home page
      }
    },
    // About us page, note the change from about-us to about_us.
    about_us: {
      init: function () {// JavaScript to be fired on the about us page
      }
    }
  }; // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event

  var UTIL = {
    fire: function (func, funcname, args) {
      var namespace = App;
      funcname = funcname === undefined ? "init" : funcname;

      if (func !== "" && namespace[func] && typeof namespace[func][funcname] === "function") {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function () {
      UTIL.fire("common");
      $.each(document.body.className.replace(/-/g, "_").split(/\s+/), function (i, classnm) {
        UTIL.fire(classnm);
      });
    }
  };
  $(document).ready(UTIL.loadEvents());
})(jQuery); // Fully reference jQuery after this point.
