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
  initNewLifeWheel();

  // Initialize Quiz
  initQuiz();

  // Handle Login Modal
  const loginLinks = document.querySelectorAll('a[href="#login"]');
  const loginModal = document.getElementById('login-modal');
  const closeLoginBtn = document.getElementById('close-login');
  const loginError = document.getElementById('login-error');
  let lastFocusedElement = null;

  const openLoginModal = (triggerEl) => {
    if (!loginModal) return;
    lastFocusedElement = triggerEl || document.activeElement;
    loginModal.classList.remove('hidden');
    loginModal.setAttribute('aria-hidden', 'false');
    const usernameInput = document.getElementById('login-username');
    if (usernameInput) {
      setTimeout(() => usernameInput.focus(), 50);
    }
  };

  const closeLoginModal = () => {
    if (!loginModal || loginModal.classList.contains('hidden')) return;
    loginModal.classList.add('hidden');
    loginModal.setAttribute('aria-hidden', 'true');
    if (loginError) loginError.classList.add('hidden');
    if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
      lastFocusedElement.focus();
    }
  };
  
  if (loginLinks.length > 0 && loginModal) {
    loginLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        openLoginModal(link);
      });
    });

    closeLoginBtn?.addEventListener('click', closeLoginModal);

    // Close on backdrop click
    loginModal.addEventListener('click', (e) => {
      if (e.target === loginModal) {
        closeLoginModal();
      }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !loginModal.classList.contains('hidden')) {
        closeLoginModal();
      }
    });

  }

  console.log('دار الرؤى للتدريب - تم تحميل واجهة الموقع بنجاح');
});
