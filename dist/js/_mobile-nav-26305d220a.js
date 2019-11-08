class MobileNav {
  init() {
    $('.nav-control').click(function () {
      $('#menu-primary-navigation').toggleClass('nav-open');
      $('.nav-control').toggleClass('x close');
    });
  }

}

;
export default MobileNav;