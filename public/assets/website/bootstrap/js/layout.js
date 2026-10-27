/* Shared behaviour for the Bootstrap + jQuery pages */
$(function () {
  var $header = $('#main-header');

  // Slightly stronger header shadow once the page is scrolled
  $(window).on('scroll', function () {
    $header.toggleClass('is-scrolled', $(this).scrollTop() > 8);
  }).trigger('scroll');

  // Close the drawer when an in-page link (e.g. #contact) is tapped
  $('#mobile-drawer a[href^="#"]').on('click', function () {
    var drawer = bootstrap.Offcanvas.getInstance(document.getElementById('mobile-drawer'));
    if (drawer) drawer.hide();
  });
});
