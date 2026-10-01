export function initTestimonialsSlider() {
  function run() {
    const slider = document.getElementById('testimonials-slider');
    if (!slider) return;

    const cards = Array.from(slider.querySelectorAll('.testimonial-card'));
    const dotsContainer = document.getElementById('testi-dots');
    const btnNext = document.getElementById('testi-next');
    const btnPrev = document.getElementById('testi-prev');

    if (cards.length === 0) return;

    let activeIndex = window.innerWidth < 1024 ? 1 : 0;
    let isDragging = false;
    let startX, scrollLeft;
    let isTouching = false;

    function renderDots() {
      if (!dotsContainer) return;
      dotsContainer.innerHTML = '';
      // Exactly 4 dots in both mobile (Figma #954:7735) and desktop (#952:4234)
      const count = 4;
      const isMobile = window.innerWidth < 1024;
      const currentActiveDot = isMobile ? (activeIndex % 4) : Math.min(3, Math.floor(activeIndex / 3));
      
      for (let i = 0; i < count; i++) {
        const dot = document.createElement('span');
        dot.className = i === currentActiveDot
          ? 'w-7 h-2 rounded-full bg-brand-primary transition-all duration-300 block cursor-pointer' 
          : 'w-2 h-2 rounded-full bg-[#DCE4EE] hover:bg-gray-300 transition-all duration-300 block cursor-pointer';
        
        dot.addEventListener('click', () => {
          if (isMobile) {
            scrollToCard(i);
          } else {
            scrollToPage(i);
          }
        });
        dotsContainer.appendChild(dot);
      }
    }

    function updateActiveState(index) {
      if (!dotsContainer) return;
      const dots = Array.from(dotsContainer.children);
      if (dots.length === 0) return;

      const isMobile = window.innerWidth < 1024;
      // In RTL, Dot 0 is on the right, Dot 3 is on the left.
      // Every card swipe moves the dot in the exact swipe direction!
      let targetDot;
      if (isMobile) {
        targetDot = index % 4;
      } else {
        targetDot = Math.min(3, Math.floor(index / 3));
      }

      dots.forEach((dot, i) => {
        dot.className = i === targetDot
          ? 'w-7 h-2 rounded-full bg-brand-primary transition-all duration-300 block cursor-pointer'
          : 'w-2 h-2 rounded-full bg-[#DCE4EE] hover:bg-gray-300 transition-all duration-300 block cursor-pointer';
      });

      // Desktop arrow button states
      if (btnPrev && btnNext) {
        const targetPage = Math.min(3, Math.floor(index / 3));
        const activeClass = 'hidden md:flex w-[50px] h-[50px] rounded-full border-[1.5px] border-[#204A7A] text-[#204A7A] items-center justify-center hover:bg-[#204A7A] hover:text-white transition-all duration-200 bg-white cursor-pointer shrink-0 z-10';
        const disabledClass = 'hidden md:flex w-[50px] h-[50px] rounded-full border-[1.5px] border-[#DEDEDE] text-[#DEDEDE] items-center justify-center transition-all duration-200 bg-white cursor-default shrink-0 z-10';
        
        btnPrev.className = (targetPage <= 0) ? disabledClass : activeClass;
        btnNext.className = (targetPage >= 3) ? disabledClass : activeClass;
      }
    }

    function adjustSliderPadding() {
      if (window.innerWidth < 1024) {
        const card = cards[0];
        const cardWidth = (card && card.offsetWidth) ? card.offsetWidth : (window.innerWidth >= 410 ? 295 : (window.innerWidth >= 390 ? 280 : (window.innerWidth >= 370 ? 272 : 260)));
        const sliderWidth = slider.getBoundingClientRect().width || window.innerWidth;
        const pad = Math.max(16, (sliderWidth - cardWidth) / 2);
        slider.style.paddingLeft = `${pad}px`;
        slider.style.paddingRight = `${pad}px`;
      } else {
        slider.style.paddingLeft = '';
        slider.style.paddingRight = '';
      }
    }

    function scrollToCard(index, smooth = true) {
      if (index < 0) index = 0;
      if (index >= cards.length) index = cards.length - 1;
      
      activeIndex = index;
      const targetCard = cards[index];
      if (targetCard) {
        const sliderRect = slider.getBoundingClientRect();
        const cardRect = targetCard.getBoundingClientRect();
        const currentCenter = cardRect.left + cardRect.width / 2;
        const targetCenter = sliderRect.left + sliderRect.width / 2;
        const diff = currentCenter - targetCenter;
        
        if (Math.abs(diff) > 2) {
          slider.scrollBy({ left: diff, behavior: smooth ? 'smooth' : 'auto' });
        }
        updateActiveState(index);
        updateCardTransforms();
      }
    }

    function scrollToPage(pageIndex) {
      const maxPage = 3;
      if (pageIndex < 0) pageIndex = 0;
      if (pageIndex > maxPage) pageIndex = maxPage;

      let targetIndex = pageIndex * 3;
      if (targetIndex >= cards.length) targetIndex = cards.length - 1;
      
      if (cards[targetIndex]) {
        cards[targetIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: window.innerWidth < 1024 ? 'center' : 'start' });
      }
      activeIndex = targetIndex;
      updateActiveState(targetIndex);
    }

    function updateCardTransforms() {
      if (window.innerWidth >= 1024) {
        cards.forEach(card => {
          card.style.transform = '';
          card.style.opacity = '';
          card.style.zIndex = '';
        });
        return;
      }

      const sliderRect = slider.getBoundingClientRect();
      const sliderCenter = sliderRect.left + sliderRect.width / 2;
      let closestIdx = 0;
      let minDist = Infinity;

      cards.forEach((card, i) => {
        const cardRect = card.getBoundingClientRect();
        const cardCenter = cardRect.left + cardRect.width / 2;
        const dist = Math.abs(sliderCenter - cardCenter);
        if (dist < minDist) {
          minDist = dist;
          closestIdx = i;
        }

        const cardW = card.offsetWidth || 275;
        const ratio = Math.min(dist / cardW, 1);
        const eased = Math.sin((ratio * Math.PI) / 2);

        // Center card: scale 1.0, opacity 1.0
        // Side cards: scale ~0.94 (matches Figma 298px vs 315px), opacity 0.85
        const scale = 1 - eased * 0.06;
        const opacity = 1 - eased * 0.15;

        card.style.transform = `scale(${scale})`;
        card.style.opacity = opacity;
        card.style.transformOrigin = 'center center';
        card.style.transition = (isTouching || isDragging)
          ? 'none'
          : 'transform 0.25s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.25s cubic-bezier(0.25, 1, 0.5, 1)';

        if (dist < cardW / 2) {
          card.style.zIndex = '10';
        } else {
          card.style.zIndex = '1';
        }
      });

      activeIndex = closestIdx;
      updateActiveState(closestIdx);
    }

    let ticking = false;
    slider.addEventListener('scroll', () => {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          updateCardTransforms();
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });

    slider.addEventListener('touchstart', () => {
      isTouching = true;
    }, { passive: true });

    slider.addEventListener('touchend', () => {
      isTouching = false;
      setTimeout(updateCardTransforms, 120);
    }, { passive: true });

    slider.addEventListener('mousedown', (e) => {
      if (window.innerWidth >= 1024) return;
      isDragging = true;
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
      slider.classList.remove('scroll-smooth', 'snap-x');
    });

    window.addEventListener('mouseup', () => {
      if (!isDragging) return;
      isDragging = false;
      slider.classList.add('scroll-smooth', 'snap-x');
      scrollToCard(activeIndex);
    });

    slider.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 1.2;
      slider.scrollLeft = scrollLeft - walk;
    });

    cards.forEach((card, i) => {
      card.addEventListener('click', () => {
        if (window.innerWidth < 1024 && i !== activeIndex) {
          scrollToCard(i);
        }
      });
    });

    if (btnNext) {
      btnNext.addEventListener('click', () => {
        if (window.innerWidth < 1024) {
          let target = activeIndex + 1;
          if (target >= cards.length) return;
          scrollToCard(target);
        } else {
          const curPage = Math.floor(activeIndex / 3);
          scrollToPage(curPage + 1);
        }
      });
    }

    if (btnPrev) {
      btnPrev.addEventListener('click', () => {
        if (window.innerWidth < 1024) {
          let target = activeIndex - 1;
          if (target < 0) return;
          scrollToCard(target);
        } else {
          const curPage = Math.floor(activeIndex / 3);
          scrollToPage(curPage - 1);
        }
      });
    }

    const init = () => {
      adjustSliderPadding();
      renderDots();
      if (window.innerWidth < 1024) {
        scrollToCard(1, false);
      } else {
        scrollToPage(0);
      }
      updateCardTransforms();
    };

    init();
    window.addEventListener('resize', init);
    if (window.innerWidth < 1024) {
      setTimeout(() => scrollToCard(1, false), 150);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', run);
  } else {
    run();
  }
}