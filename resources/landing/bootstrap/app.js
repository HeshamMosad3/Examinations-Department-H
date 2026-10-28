// Shared entry for the Bootstrap + jQuery pages (resources/views/website/bootstrap/*).
// Everything is installed through npm and bundled by Vite — nothing is loaded from a CDN.
import 'bootstrap/dist/css/bootstrap.rtl.min.css';
import '@fortawesome/fontawesome-free/css/fontawesome.min.css';
import '@fortawesome/fontawesome-free/css/solid.min.css';
import '@fortawesome/fontawesome-free/css/regular.min.css';
import './theme.css';

import $ from 'jquery';
import * as bootstrap from 'bootstrap';

window.$ = window.jQuery = $;
window.bootstrap = bootstrap;

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

  // User menu: opens on hover (mouse devices) exactly like the main site header,
  // and on click/tap everywhere else (Bootstrap dropdown handles that).
  var canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  var $menu = $('#user-profile-menu');
  if ($menu.length && canHover) {
    var toggle = $menu.find('[data-bs-toggle="dropdown"]')[0];
    var dropdown = bootstrap.Dropdown.getOrCreateInstance(toggle);
    var timer;
    $menu.on('mouseenter', function () { clearTimeout(timer); dropdown.show(); });
    $menu.on('mouseleave', function () { timer = setTimeout(function () { dropdown.hide(); }, 120); });
  }
});
