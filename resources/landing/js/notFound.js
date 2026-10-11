// صفحة 404
import { initNavigation } from './navigation.js';

initNavigation();

// "رجوع": back in history when there is one, otherwise the home page (e.g. the visitor opened the broken link directly)
document.querySelectorAll('[data-go-back]').forEach((button) => {
  button.addEventListener('click', () => {
    const cameFromSite = document.referrer && new URL(document.referrer).origin === window.location.origin;
    if (window.history.length > 1 && cameFromSite) {
      window.history.back();
    } else {
      window.location.href = button.dataset.fallback || '/';
    }
  });
});
