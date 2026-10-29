// Course details page — accordions, collapsible section, reviews slider and share button (no backend)
import $ from 'jquery';
import './course-details.css';
import './course-details-modal.css';

$(function () {
  // ---- accordions (plan days + FAQ): every item opens/closes on its own ----
  $('.cd-item-btn').on('click', function () {
    var $item = $(this).closest('.cd-item');
    var open = !$item.hasClass('is-open');
    $item.toggleClass('is-open', open);
    $(this).attr('aria-expanded', open);
  });

  // ---- section 02 collapses from its banner button ----
  $('[data-cd-collapse]').on('click', function () {
    var $panel = $('#' + $(this).data('cd-collapse'));
    var open = !$panel.hasClass('is-open');
    $panel.toggleClass('is-open', open);
    $(this).find('.cd-head-toggle').attr('aria-expanded', open);
  });

  // ---- reviews slider: 3 cards per view on desktop, 1 centred card (with peeking neighbours) on mobile ----
  var $slider = $('#cd-slider');
  var $track = $slider.find('.cd-track');
  var $cards = $track.children();
  var $dots = $slider.find('.cd-dots');
  var index = 0;
  var wide = window.matchMedia('(min-width: 1200px)');
  var tablet = window.matchMedia('(min-width: 768px)');

  function perView() { return wide.matches ? 3 : (tablet.matches ? 2 : 1); }
  function last() { return Math.max(0, $cards.length - perView()); }

  function buildDots() {
    $dots.empty();
    for (var i = 0; i <= last(); i++) {
      $('<button type="button" class="cd-dot" role="tab"></button>').attr('aria-label', 'التقييم ' + (i + 1)).data('i', i).appendTo($dots);
    }
  }

  function render() {
    index = Math.min(index, last());
    var step = $cards.eq(0).outerWidth() + parseFloat($track.css('column-gap') || 0);
    // RTL: the track starts on the right, so moving forward means translating to the right (+)
    $track.css('transform', 'translateX(' + (index * step) + 'px)');
    $cards.removeClass('is-active').slice(index, index + perView()).addClass('is-active');
    $dots.children().each(function (i) {
      $(this).toggleClass('is-active', i === index).attr('aria-selected', i === index);
    });
  }

  $dots.on('click', '.cd-dot', function () { index = $(this).data('i'); render(); });

  // swipe / drag
  var startX = null;
  $slider.on('pointerdown', function (e) { startX = e.clientX; });
  $(window).on('pointerup', function (e) {
    if (startX === null) return;
    var dx = e.clientX - startX;
    startX = null;
    if (Math.abs(dx) < 40) return;
    // RTL: dragging to the left shows the next card
    index = Math.max(0, Math.min(last(), index + (dx < 0 ? 1 : -1)));
    render();
  });

  var onResize = function () { buildDots(); render(); };
  [wide, tablet].forEach(function (mq) { mq.addEventListener ? mq.addEventListener('change', onResize) : mq.addListener(onResize); });
  $(window).on('resize', render);
  buildDots();
  render();

  // ---- share ----
  $('#cd-share').on('click', function () {
    var data = { title: document.title, url: window.location.href };
    if (navigator.share) { navigator.share(data).catch(function () {}); return; }
    if (navigator.clipboard) {
      navigator.clipboard.writeText(data.url).then(function () {
        var $b = $('#cd-share').attr('title', 'تم نسخ الرابط');
        setTimeout(function () { $b.removeAttr('title'); }, 1500);
      });
    }
  });

  // ---- corporate quote dialog (Bootstrap modal): client-side validation only, nothing is sent ----
  var $form = $('#cd-corp-form');
  var modalEl = document.getElementById('cd-corp-modal');

  function markInvalid($el, bad) {
    ($el.closest('.cd-phone').length ? $el.closest('.cd-phone') : $el).toggleClass('is-invalid', bad);
  }

  $form.on('input change', '.cd-input', function () {
    markInvalid($(this), false);
    if (this.type === 'date') { $(this).toggleClass('has-value', !!this.value); }
  });

  // training place: shown only for on-site / hybrid training, hidden + cleared + not required for online
  var $city = $('#cd-field-city');
  var $citySelect = $('#cd-f-city');
  $('#cd-f-method').on('change', function () {
    var show = $(this).val() !== 'أونلاين';
    $city.toggleClass('is-collapsed', !show).attr('aria-hidden', !show);
    $citySelect.prop('disabled', !show);
    if (!show) { $citySelect.val(''); markInvalid($citySelect, false); }
  });

  $form.on('submit', function (e) {
    e.preventDefault();
    var ok = true;
    $form.find('.cd-input[required]:not(:disabled)').each(function () {
      var v = $.trim($(this).val());
      var bad = !v
        || (this.type === 'tel' && !/^\d{8,10}$/.test(v.replace(/\s+/g, '')))
        || ($(this).data('kind') === 'count' && !(parseInt(v, 10) > 0));
      markInvalid($(this), bad);
      if (bad && ok) { $(this).trigger('focus'); }
      ok = ok && !bad;
    });
    if (!ok) return;
    window.bootstrap.Modal.getInstance(modalEl).hide();
  });

  modalEl.addEventListener('hidden.bs.modal', function () {
    $form[0].reset();
    $form.find('.is-invalid').removeClass('is-invalid');
    $form.find('.cd-date').removeClass('has-value');
    $city.addClass('is-collapsed').attr('aria-hidden', true);
    $citySelect.prop('disabled', true);
  });
});
