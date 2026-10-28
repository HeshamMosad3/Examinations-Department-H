/* Courses page — client-side search + pagination (no backend) */
import $ from 'jquery';
import './courses.css';

$(function () {
  var PAGE_SIZE = 6;
  var $cols = $('#courses-grid .course-col');
  var $empty = $('#courses-empty');
  var $pager = $('#courses-pager');
  var page = 1;
  var query = '';

  // Same normalisation for the typed text and the card text so Arabic search is forgiving
  function normalize(s) {
    return $.trim(String(s))
      .toLowerCase()
      .replace(/[ً-ٰٟـ]/g, '')   // tashkeel + tatweel
      .replace(/[أإآ]/g, 'ا')
      .replace(/ى/g, 'ي')
      .replace(/ة/g, 'ه');
  }

  function matches() {
    var q = normalize(query);
    return $cols.filter(function () {
      return !q || normalize($(this).data('search')).indexOf(q) !== -1;
    });
  }

  function renderPager(total) {
    var pages = Math.max(1, Math.ceil(total / PAGE_SIZE));
    var prevOff = page === 1, nextOff = page === pages;
    var html = '<ul class="pager-list">';
    // RTL: "previous" (›) sits on the right, "next" (‹) on the left. Disabled = the grey icon from Figma.
    html += '<li><button type="button" class="pager-btn pager-nav" data-go="prev" aria-label="الصفحة السابقة"' + (prevOff ? ' disabled' : '') + '>' +
            '<img src="' + $pager.data(prevOff ? 'icon-prev-off' : 'icon-prev') + '" alt="" aria-hidden="true" /></button></li>';
    for (var i = 1; i <= pages; i++) {
      html += '<li><button type="button" class="pager-btn pager-num' + (i === page ? ' is-active' : '') + '" data-go="' + i + '"' +
              (i === page ? ' aria-current="page"' : '') + ' aria-label="صفحة ' + i + '">' + i + '</button></li>';
    }
    html += '<li><button type="button" class="pager-btn pager-nav" data-go="next" aria-label="الصفحة التالية"' + (nextOff ? ' disabled' : '') + '>' +
            '<img src="' + $pager.data(nextOff ? 'icon-next-off' : 'icon-next') + '" alt="" aria-hidden="true" /></button></li>';
    html += '</ul>';
    $pager.html(html).toggleClass('d-none', total === 0);
    return pages;
  }

  function render(scroll) {
    var $found = matches();
    var pages = Math.max(1, Math.ceil($found.length / PAGE_SIZE));
    if (page > pages) page = pages;

    $cols.addClass('d-none');
    $found.slice((page - 1) * PAGE_SIZE, page * PAGE_SIZE).removeClass('d-none');
    $empty.toggleClass('d-none', $found.length > 0);
    renderPager($found.length);

    if (scroll) {
      $('html, body').animate({ scrollTop: $('#courses-grid').offset().top - 110 }, 300);
    }
  }

  // Live search
  $('#course-search').on('input', function () {
    query = $(this).val();
    page = 1;
    render(false);
  });
  $('#course-search-form').on('submit', function (e) {
    e.preventDefault();
    query = $('#course-search').val();
    page = 1;
    render(true);
  });

  // Pagination (delegated — the buttons are re-rendered on every change)
  $pager.on('click', '.pager-btn:not(:disabled)', function () {
    var go = $(this).data('go');
    if (go === 'prev') page--;
    else if (go === 'next') page++;
    else page = parseInt(go, 10);
    render(true);
  });

  render(false);
});
