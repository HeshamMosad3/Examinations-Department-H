// Course details REDESIGN (v2) — countdowns, sliders, accordions, floating button, count-up, booking modals (no backend)
import $ from 'jquery';
import './course-details-v2.css';

$(function () {
  var mq = window.matchMedia('(max-width: 767.98px)'); // phone layout (tablet 768–1279 and desktop use the 726 column sections)
  var pad = function (n) { return String(n).padStart(2, '0'); };

  // ---- countdowns (top bar + closing banner): stop at 00 once the start date has passed ----
  $('[data-cdv2-countdown]').each(function () {
    var $cd = $(this);
    var target = new Date($cd.data('cdv2-countdown')).getTime();
    var tick = function () {
      var left = Math.max(0, Math.floor((target - Date.now()) / 1000));
      var parts = { d: Math.floor(left / 86400), h: Math.floor(left % 86400 / 3600), m: Math.floor(left % 3600 / 60), s: left % 60 };
      $.each(parts, function (k, v) { $cd.find('[data-unit="' + k + '"]').text(pad(v)); });
    };
    tick();
    setInterval(tick, 1000);
  });

  // ---- dots helper: builds N dots, keeps the active one in sync ----
  var buildDots = function ($dots, n, go) {
    $dots.empty();
    for (var i = 0; i < n; i++) {
      $('<button type="button" role="tab" aria-label="' + (i + 1) + '"></button>').on('click', (function (k) { return function () { go(k); }; })(i)).appendTo($dots);
    }
  };
  var setActive = function ($dots, i) {
    $dots.children().removeClass('is-active').attr('aria-selected', 'false').eq(i).addClass('is-active').attr('aria-selected', 'true');
  };

  // ---- reviews: desktop = 3 cards, the track slides one card; phones = swipeable cards (RTL scroller, negative scrollLeft) ----
  var $slider = $('#cdv2-slider');
  if ($slider.length) {
    var vp = $slider.find('.cdv2-viewport')[0];
    var $track = $slider.find('.cdv2-track');
    var $dots = $slider.find('.cdv2-dots');
    var total = $track.children().length, cur = 0;
    var cfg = function () { return mq.matches ? { pages: total, step: 315 + 17 } : { pages: Math.max(1, total - 2), step: 223 + 28 }; };
    var mark = function () { // phones: cards before / after the centred one are drawn smaller (Figma)
      $track.children().each(function (k) { $(this).toggleClass('is-before', mq.matches && k < cur).toggleClass('is-after', mq.matches && k > cur); });
    };
    var go = function (i) {
      var c = cfg();
      cur = ((i % c.pages) + c.pages) % c.pages;
      if (mq.matches) { vp.scrollTo({ left: -cur * c.step, behavior: 'smooth' }); }
      else { $track.css('transform', 'translateX(' + (cur * c.step) + 'px)'); }
      setActive($dots, cur);
      mark();
    };
    var init = function () {
      var c = cfg();
      buildDots($dots, c.pages, go);
      $track.css('transform', '');
      vp.scrollLeft = 0;
      cur = 1; // Figma draws the 2nd dot active (phone: 2nd card centred, neighbours peeking on both sides)
      go(cur);
    };
    $(vp).on('scroll', function () {
      if (!mq.matches) return;
      var i = Math.round(Math.abs(vp.scrollLeft) / cfg().step);
      if (i !== cur) { cur = i; setActive($dots, cur); mark(); }
    });
    init();
    (mq.addEventListener ? mq.addEventListener('change', init) : mq.addListener(init));
  }

  // ---- plan chips (phones): keep a day's chips on one row by shrinking them a little (down to 72%) instead of wrapping ----
  var fitChips = function () {
    $('.cdv2-chips').each(function () {
      var el = this, kids = $(el).children().css('zoom', '').get();
      el.style.flexWrap = '';
      if (!mq.matches || kids.length < 2) return;
      var gap = parseFloat(getComputedStyle(el).columnGap) || 0, avail = el.clientWidth - gap * (kids.length - 1);
      var sum = kids.reduce(function (a, k) { return a + k.getBoundingClientRect().width; }, 0);
      if (!avail || sum <= avail) return;
      var z = Math.floor(avail / sum * 100) / 100;
      if (z >= 0.72) { $(kids).css('zoom', z); el.style.flexWrap = 'nowrap'; }
    });
  };
  $(window).on('load resize orientationchange', fitChips);
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(fitChips);
  fitChips();

  // ---- certificates (phones): swipeable cards + dots ----
  var certs = document.querySelector('.cdv2-certs');
  var $certDots = $('.cdv2-certs-dots');
  if (certs && $certDots.length) {
    var n = certs.children.length, cstep = 315 + 19;
    buildDots($certDots, n, function (i) { certs.scrollTo({ left: -i * cstep, behavior: 'smooth' }); });
    setActive($certDots, 0);
    $(certs).on('scroll', function () {
      if (!mq.matches) return;
      setActive($certDots, Math.min(n - 1, Math.round(Math.abs(certs.scrollLeft) / cstep)));
    });
  }

  // ---- accordions (plan + FAQ): every item opens/closes on its own ----
  $('.cdv2-item-btn').on('click', function () {
    var $item = $(this).closest('.cdv2-item');
    var open = !$item.hasClass('is-open');
    $item.toggleClass('is-open', open);
    $(this).attr('aria-expanded', open);
  });

  // ---- floating signup button: appears as soon as the booking form starts leaving the screen; click brings the form back ----
  var form = document.querySelector('.cdv2-form'), fab = document.getElementById('cdv2-fab');
  if (form && fab) {
    var bar = document.querySelector('.cdv2-logobar');
    var checkFab = function () {
      // shown once the booking form has completely left the screen (its bottom edge is under the sticky logo bar); hidden again when it comes back
      var r = form.getBoundingClientRect();
      var show = r.bottom <= (bar ? bar.offsetHeight : 0);
      fab.classList.toggle('is-visible', show);
      fab.setAttribute('aria-hidden', show ? 'false' : 'true');
      fab.tabIndex = show ? 0 : -1;
      // phones: at the very bottom the button rests on the footer line (above "all rights reserved"); desktop: it stops above the footer
      var line = document.querySelector('.bs-footer-divider'), footer = document.querySelector('.bs-footer');
      var base = 16, lift = base;
      if (line && mq.matches) {
        lift = Math.max(base, window.innerHeight - line.getBoundingClientRect().top + 12);
      } else if (footer) {
        // desktop: the button stops just above the top edge of the whole footer
        lift = Math.max(24, window.innerHeight - footer.getBoundingClientRect().top + 16);
        if (lift === 24) lift = base;
      }
      fab.style.bottom = lift === base ? '' : lift + 'px';
    };
    $(window).on('scroll resize', checkFab);
    checkFab();
    $(fab).on('click', function () {
      form.scrollIntoView({ behavior: 'smooth', block: 'start' });
      setTimeout(function () { var i = form.querySelector('input'); if (i) i.focus({ preventScroll: true }); }, 600);
    });
  }

  // ---- stats count up (0 → final number, fast) once they scroll into view ----
  var $counts = $('.cdv2-count');
  if ($counts.length && !(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    $counts.each(function () { $(this).data('final', $(this).text()).text('0'); });
    var run = function ($el) {
      var to = parseInt($el.data('to'), 10), comma = $el.data('comma') === 1, dur = 1400, t0 = Date.now();
      var fmt = function (v) { return comma ? v.toLocaleString('en-US') : String(v); };
      var timer = setInterval(function () {
        var p = Math.min(1, (Date.now() - t0) / dur), eased = 1 - Math.pow(1 - p, 3);
        $el.text(fmt(Math.round(to * eased)));
        if (p >= 1) { clearInterval(timer); $el.text($el.data('final')); }
      }, 30);
    };
    var checkCounts = function () {
      $counts.each(function () {
        var $el = $(this);
        if ($el.data('started')) return;
        if (this.getBoundingClientRect().top < window.innerHeight * 0.92) { $el.data('started', true); run($el); }
      });
      if ($counts.filter(function () { return !$(this).data('started'); }).length === 0) $(window).off('scroll resize', checkCounts);
    };
    $(window).on('scroll resize', checkCounts);
    checkCounts();
  }

  // ---- booking form → modals (demo: no backend; a phone equal to data-registered opens the "already registered" one) ----
  var $ok = $('#cdv2-modal-ok'), $dup = $('#cdv2-modal-dup'), lastFocus = null;
  var openModal = function ($m) {
    lastFocus = document.activeElement;
    $m.prop('hidden', false);
    $('body').css('overflow', 'hidden');
    $m.find('[data-cdv2-close]').first().trigger('focus');
  };
  var closeModals = function () {
    $ok.add($dup).prop('hidden', true);
    $('body').css('overflow', '');
    if (lastFocus && lastFocus.focus) lastFocus.focus();
  };
  $('.cdv2-modal').on('click', function (e) { if (e.target === this) closeModals(); });
  $('[data-cdv2-close]').on('click', closeModals);
  $(document).on('keydown', function (e) { if (e.key === 'Escape') closeModals(); });

  // ---- field validation with inline messages (Figma 3969:12947 / 12987 / 13140) ----
  var domains = ['gmail.com', 'hotmail.com', 'outlook.com', 'yahoo.com', 'icloud.com'];
  var dist = function (a, b) {
    var d = [], i, j;
    for (i = 0; i <= a.length; i++) { d[i] = [i]; }
    for (j = 1; j <= b.length; j++) { d[0][j] = j; }
    for (i = 1; i <= a.length; i++) for (j = 1; j <= b.length; j++)
      d[i][j] = Math.min(d[i - 1][j] + 1, d[i][j - 1] + 1, d[i - 1][j - 1] + (a[i - 1] === b[j - 1] ? 0 : 1));
    return d[a.length][b.length];
  };
  var phoneDigits = function (v) { return v.replace(/\D/g, '').replace(/^966/, '').replace(/^0/, ''); };
  var setErr = function (input, msg, suggestion) {
    var $field = $(input).closest('.cdv2-field'), $err = $field.find('.cdv2-err');
    $field.toggleClass('is-error', !!msg);
    if (!msg) { $err.prop('hidden', true).empty(); return; }
    $err.empty().text(msg);
    if (suggestion) {
      $err.empty().append(document.createTextNode('هل تقصد '))
        .append($('<button type="button"></button>').attr('data-fill', suggestion).text(suggestion))
        .append(document.createTextNode(' ؟'));
    }
    $err.prop('hidden', false);
  };
  var check = function (input) {
    var v = $.trim(input.value);
    if (input.name === 'name') { setErr(input, v ? '' : 'اكتب اسمك من فضلك.'); return !!v; }
    if (input.name === 'phone') {
      var d = phoneDigits(input.value), msg = '';
      if (!d) msg = 'اكتب رقم جوالك من فضلك.';
      else if (d.charAt(0) !== '5') msg = 'الرقم لازم يبدأ بـ 5.';
      else if (d.length < 9) msg = d.length === 8 ? 'الرقم ناقص، باقي رقم واحد.' : 'الرقم ناقص، باقي ' + (9 - d.length) + ' أرقام.';
      else if (d.length > 9) msg = 'الرقم أطول من المطلوب.';
      setErr(input, msg); return !msg;
    }
    if (input.name === 'email') {
      var ok = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v), at = v.lastIndexOf('@'), sug = '';
      if (at > 0) {
        var dom = v.slice(at + 1).toLowerCase();
        $.each(domains, function (_, c) { if (dom !== c && dist(dom, c) <= 2) { sug = v.slice(0, at + 1) + c; return false; } });
      }
      if (!v) { setErr(input, 'اكتب بريدك الإلكتروني من فضلك.'); return false; }
      if (sug) { setErr(input, '', null); setErr(input, 'x', sug); return false; }
      setErr(input, ok ? '' : 'البريد الإلكتروني غير صحيح.'); return ok;
    }
    return true;
  };
  $('.cdv2-form')
    .on('input', 'input', function () { if ($(this).closest('.cdv2-field').hasClass('is-error')) check(this); })
    .on('blur', 'input', function () { if ($.trim(this.value)) check(this); })
    .on('mousedown click', '.cdv2-err button', function (e) { e.preventDefault(); if (e.type === 'click') { var i = $(this).closest('.cdv2-field').find('input')[0]; i.value = $(this).data('fill'); check(i); i.focus(); } });

  $('.cdv2-form').on('submit', function (e) {
    e.preventDefault();
    var f = this, first = null;
    $(f).find('input').each(function () { if (!check(this) && !first) first = this; });
    if (first) { first.focus(); return; }
    var digits = f.phone.value.replace(/\D/g, '').replace(/^966/, '').replace(/^0/, '');
    $('[data-cdv2-wa]').attr('href', $(f).data('whatsapp'));
    if ($(f).data('registered') && String(digits) === String($(f).data('registered'))) {
      $('[data-cdv2-masked]').text('+966 ' + digits.slice(0, 3) + ' ••• ' + digits.slice(-3));
      openModal($dup);
    } else {
      openModal($ok);
      f.reset();
    }
  });

  // "add to calendar": a one-event .ics file from the course start
  $('[data-cdv2-ics]').on('click', function () {
    var f = document.querySelector('.cdv2-form');
    var start = new Date($(f).data('start')), end = new Date(start.getTime() + 7 * 3600 * 1000);
    var z = function (d) { return d.toISOString().replace(/[-:]/g, '').replace(/\.\d{3}/, ''); };
    var ics = ['BEGIN:VCALENDAR', 'VERSION:2.0', 'PRODID:-//Dar Al-Ruya//Course//AR', 'BEGIN:VEVENT',
      'UID:' + z(start) + '@dar-alruya', 'DTSTAMP:' + z(new Date()), 'DTSTART:' + z(start), 'DTEND:' + z(end),
      'SUMMARY:' + String($(f).data('title')).replace(/[,;]/g, ' '), 'END:VEVENT', 'END:VCALENDAR'].join('\r\n');
    var a = document.createElement('a');
    a.href = URL.createObjectURL(new Blob([ics], { type: 'text/calendar;charset=utf-8' }));
    a.download = 'course.ics';
    document.body.appendChild(a); a.click(); a.remove();
  });

  // ---- share ----
  $('#cdv2-share').on('click', function () {
    var data = { title: document.title, url: location.href };
    if (navigator.share) { navigator.share(data).catch(function () {}); }
    else if (navigator.clipboard) { navigator.clipboard.writeText(location.href); }
  });
});

// ---- phone: the 726 steps strip is scaled to the column width (the CSS zoom .4972 is the 393 px value) ----
$(function () {
  var phone = window.matchMedia('(max-width: 767.98px)');
  var fit = function () {
    $('.cdv2-steps').each(function () {
      var w = this.parentElement ? this.parentElement.clientWidth : 0;
      this.style.zoom = phone.matches && w ? String(w / 726) : '';
    });
  };
  fit();
  $(window).on('resize orientationchange', fit);
});
