// صفحة "اكتشف عجلة الحياة" - نفس عجلة الصفحة الرئيسية بالظبط
import { initNavigation } from './navigation.js';
import { initNewLifeWheel } from './newLifeWheel.js';

initNavigation();

document.addEventListener('DOMContentLoaded', () => {
  initNewLifeWheel();
});
