// صفحة "اكتشف عجلة الحياة" - نفس عجلة الصفحة الرئيسية بالظبط (نفس الشكل الجديد variant: home)
import { initNavigation } from './navigation.js';
import { initNewLifeWheel } from './newLifeWheel.js';

initNavigation();

document.addEventListener('DOMContentLoaded', () => {
  initNewLifeWheel({ variant: 'home' });
});
