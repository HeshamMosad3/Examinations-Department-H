export function initNavigation() {
  function run() {
    // Mobile Drawer Controller
    const drawerBtn = document.getElementById('mobile-menu-btn');
    const drawerCloseBtn = document.getElementById('mobile-drawer-close');
    const drawer = document.getElementById('mobile-drawer');
    const backdrop = document.getElementById('mobile-drawer-backdrop');

    const openDrawer = () => {
      if (!drawer || !backdrop) return;
      backdrop.classList.remove('opacity-0', 'pointer-events-none');
      backdrop.classList.add('opacity-100', 'pointer-events-auto');
      drawer.classList.remove('translate-x-full');
      drawer.classList.add('translate-x-0');
      document.body.classList.add('overflow-hidden');
      drawerBtn?.setAttribute('aria-expanded', 'true');
    };

    const closeDrawer = () => {
      if (!drawer || !backdrop) return;
      backdrop.classList.remove('opacity-100', 'pointer-events-auto');
      backdrop.classList.add('opacity-0', 'pointer-events-none');
      drawer.classList.remove('translate-x-0');
      drawer.classList.add('translate-x-full');
      document.body.classList.remove('overflow-hidden');
      drawerBtn?.setAttribute('aria-expanded', 'false');
    };

    if (drawerBtn) drawerBtn.addEventListener('click', openDrawer);
    if (drawerCloseBtn) drawerCloseBtn.addEventListener('click', closeDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeDrawer();
    });

    // Dynamic Active Tab Switcher (matches user reference design)
    const desktopItems = document.querySelectorAll('#main-nav .nav-item');
    const mobileItems = document.querySelectorAll('#mobile-drawer .mobile-nav-item');
    let isClickScrolling = false;
    let clickTimeout = null;

    function setActiveNav(targetNav) {
      desktopItems.forEach(item => {
        const nav = item.getAttribute('data-nav');
        const indicator = item.querySelector('.nav-indicator');
        if (nav === targetNav) {
          item.classList.remove('text-[#1D1D1D]', 'font-medium');
          item.classList.add('text-[#204A7A]', 'font-bold');
          if (!indicator) {
            const ind = document.createElement('span');
            ind.className = 'nav-indicator absolute bottom-[-4px] left-0 right-0 h-[2.5px] bg-[#204A7A] rounded-full';
            item.appendChild(ind);
          }
        } else {
          item.classList.remove('text-[#204A7A]', 'font-bold');
          item.classList.add('text-[#1D1D1D]', 'font-medium');
          if (indicator) {
            indicator.remove();
          }
        }
      });

      mobileItems.forEach(item => {
        const nav = item.getAttribute('data-nav');
        if (nav === targetNav) {
          item.classList.remove('font-normal');
          item.classList.add('text-white', 'font-bold');
        } else {
          item.classList.remove('font-bold');
          item.classList.add('text-white', 'font-normal');
        }
      });
    }

    // Smooth Scroll Helper with exact floating navbar offsets
    function smoothScrollTo(targetId, targetNavName) {
      closeDrawer();

      if (targetId === 'home') {
        if (targetNavName) setActiveNav('home');
        isClickScrolling = true;
        clearTimeout(clickTimeout);
        clickTimeout = setTimeout(() => { isClickScrolling = false; }, 800);
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return;
      }

      const targetEl = document.getElementById(targetId);
      if (targetEl) {
        if (targetNavName) setActiveNav(targetNavName);
        isClickScrolling = true;
        clearTimeout(clickTimeout);
        clickTimeout = setTimeout(() => { isClickScrolling = false; }, 800);

        const headerOffset = window.innerWidth >= 1024 ? 90 : 70;
        const elementPosition = targetEl.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: Math.max(0, offsetPosition),
          behavior: 'smooth'
        });
      }
    }

    // Handle Navbar Links (with data-nav)
    // Shared navbar/footer markup is reused across pages (e.g. life-wheel-assessment.html),
    // so a target section may not exist on the current page - fall back to a real navigation
    // to the homepage with the hash instead of silently doing nothing.
    const allNavLinks = document.querySelectorAll('[data-nav]');
    allNavLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        const targetNav = link.getAttribute('data-nav');
        if (!targetNav) return;
        e.preventDefault();
        if (targetNav !== 'home' && !document.getElementById(targetNav)) {
          window.location.href = `/#${targetNav}`;
          return;
        }
        if (targetNav === 'home' && !document.getElementById('home')) {
          window.location.href = '/';
          return;
        }
        smoothScrollTo(targetNav, targetNav);
      });
    });

    // Handle all other hash anchor links across the page
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      if (anchor.hasAttribute('data-nav')) return;
      const href = anchor.getAttribute('href');
      if (!href || href === '#' || href === '#login') return;

      anchor.addEventListener('click', (e) => {
        const targetId = href.substring(1);
        const targetEl = document.getElementById(targetId);
        if (!targetEl) {
          e.preventDefault();
          window.location.href = `/#${targetId}`;
          return;
        }

        e.preventDefault();
        let navMap = null;
        if (targetId === 'home' || targetId === 'wheel-wrap') navMap = 'home';
        else if (targetId === 'assessments' || targetId === 'personality-keys' || targetId === 'challenge') navMap = 'assessments';
        else if (targetId === 'courses') navMap = 'courses';
        else if (targetId === 'certifications') navMap = 'certifications';
        else if (targetId === 'about') navMap = 'about';
        else if (targetId === 'contact') navMap = 'contact';

        smoothScrollTo(targetId, navMap);
      });
    });

    // ScrollSpy: auto-highlight section as user scrolls (ordered from bottom to top)
    const navSections = [
      { id: 'contact', nav: 'contact' },
      { id: 'about', nav: 'about' },
      { id: 'certifications', nav: 'certifications' },
      { id: 'courses', nav: 'courses' },
      { id: 'challenge', nav: 'assessments' },
      { id: 'personality-keys', nav: 'assessments' },
      { id: 'assessments', nav: 'assessments' },
      { id: 'home', nav: 'home' }
    ];

    // Handle Login Modal across pages
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

      loginModal.addEventListener('click', (e) => {
        if (e.target === loginModal) {
          closeLoginModal();
        }
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !loginModal.classList.contains('hidden')) {
          closeLoginModal();
        }
      });

    }

    // ScrollSpy: auto-highlight section as user scrolls (ordered from bottom to top)
    window.addEventListener('scroll', () => {
      if (isClickScrolling) return;
      const scrollY = window.pageYOffset;
      const headerOffset = window.innerWidth >= 1024 ? 120 : 90;

      for (let i = 0; i < navSections.length; i++) {
        const item = navSections[i];
        const sec = document.getElementById(item.id);
        if (sec) {
          const top = sec.offsetTop - headerOffset;
          if (scrollY >= top - 20) {
            setActiveNav(item.nav);
            break;
          }
        }
      }
    }, { passive: true });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', run);
  } else {
    run();
  }
}