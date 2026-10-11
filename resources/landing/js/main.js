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
