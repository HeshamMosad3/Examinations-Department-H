// صفحة نتيجة تقييم مفاتيح الشخصية السبعة
import { initNavigation } from './navigation.js';

initNavigation();

// «عرض المزيد» في تفسير النتيجة الإجمالية
document.querySelectorAll('[data-more-toggle]').forEach((button) => {
  const box = button.parentElement;
  const first = box.querySelector('[data-first]');
  const more = box.querySelector('[data-more]');

  button.addEventListener('click', () => {
    const open = button.getAttribute('aria-expanded') !== 'true';

    // مربع المخطط يساوي طول العمود التاني وهو مقفول، ولما يتفتح «عرض المزيد» العمود بس هو اللي يكبر
    const chart = document.querySelector('[data-kr-chart]');
    if (chart) {
      chart.style.height = open ? `${chart.offsetHeight}px` : '';
      chart.style.alignSelf = open ? 'flex-start' : '';
    }
    button.setAttribute('aria-expanded', String(open));
    first.classList.toggle('line-clamp-5', !open);
    more.classList.toggle('hidden', !open);
    more.classList.toggle('flex', open);
    button.querySelector('[data-label]').textContent = open ? button.dataset.labelLess : button.dataset.labelMore;
    button.querySelector('[data-chevron]').style.transform = open ? 'rotate(180deg)' : '';
  });
});
