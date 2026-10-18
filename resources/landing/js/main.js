import '../style.css';
import { initQuiz } from './quiz.js';
import { initNewLifeWheel } from './newLifeWheel.js';
import { initNavigation } from './navigation.js';
import { initTestimonialsSlider } from './testimonialsSlider.js';

// Initialize navigation and slider
initNavigation();
initTestimonialsSlider();

document.addEventListener('DOMContentLoaded', () => {
  // Initialize New Wheel
  initNewLifeWheel({ variant: 'home' });

  // Initialize Quiz
  initQuiz(window.challengeQuestions && window.challengeQuestions.length > 0 ? window.challengeQuestions : null);

  console.log('دار الرؤى للتدريب - تم تحميل واجهة الموقع بنجاح');
});

// Coming back to the home page (back button / bfcache) must show the action buttons in their default state,
// not stuck on the focus/active/hover look from the click that left the page.
window.addEventListener('pageshow', () => {
  const el = document.activeElement;
  if (el && el !== document.body && typeof el.blur === 'function') el.blur();
  document.querySelectorAll('a:active, button:active').forEach((node) => node.blur());
});
