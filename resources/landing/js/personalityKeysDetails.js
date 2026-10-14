// صفحة تفاصيل مفاتيح الشخصية السبعة: فتح وقفل تفاصيل كل مفتاح
import { initNavigation } from './navigation.js';

initNavigation();

document.querySelectorAll('[data-key-card]').forEach((card) => {
  const button = card.querySelector('[data-toggle]');
  const list = card.querySelector('[data-list]');
  if (!button || !list) return;

  button.addEventListener('click', () => {
    const open = card.dataset.open !== 'true';
    card.dataset.open = String(open);
    button.setAttribute('aria-expanded', String(open));
    list.classList.toggle('hidden', !open);
    list.classList.toggle('flex', open);
    button.querySelector('[data-label]').textContent = open ? 'إخفاء التفاصيل' : 'عرض التفاصيل';
    button.querySelector('[data-chevron]').style.transform = open ? 'rotate(180deg)' : '';
  });
});
