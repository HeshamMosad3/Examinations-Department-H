// ============================================================================
// QUIZ MODULE — دار الرؤى (التحدي السريع)
// ============================================================================
// يدعم الأسئلة النصية والأسئلة البصرية (الأنماط)، وجاهز للربط بقاعدة البيانات مستقبلاً.

import confetti from 'canvas-confetti';
import { cms } from './cms.js';

export const defaultQuestions = [
  {
    id: 1,
    question: 'ما الشكل التالي في النمط؟',
    type: 'pattern',
    patternRow: ['2-vert', '4-grid', '2-vert', 'question'],
    options: ['3-tr', '3-tl', '2-diag', '2-horiz'],
    correctIndex: 1,
    initialBtnText: 'ابدأ التحدي'
  },
  {
    id: 2,
    question: 'ما الرقم التالي في المتتالية: ٢، ٤، ٨، ١٦؟',
    type: 'text',
    options: ['٢٤', '٣٢', '٢٠', '٢٨'],
    correctIndex: 1 // ٣٢
  },
  {
    id: 3,
    question: 'قلم : كتابة = مقص : ؟',
    type: 'text',
    options: ['خياطة', 'قطع', 'حديد', 'ألوان'],
    correctIndex: 1 // قطع
  }
];

// Helper: Generates HTML for dot patterns inside sequence cards and options.
// Wrapped in dir="ltr" so the dice faces aren't mirrored by the RTL page.
function renderDotContent(dotType, isOption = false) {
  const dotSize = isOption ? 'w-[10px] h-[10px] md:w-[16px] md:h-[16px]' : 'w-[8px] h-[8px] md:w-[16px] md:h-[16px]';
  const dotClass = `${dotSize} rounded-full bg-[#0B1628]`;
  const spacer = `<span class="${dotSize}"></span>`;
  // Spacing measured from the Figma frames: sequence dice vs. answer dice
  const gapClass = isOption ? 'gap-[8px] md:gap-[10px]' : 'gap-[11px] md:gap-[13px]';
  const wideGap = isOption ? 'gap-[20px] md:gap-[18px]' : 'gap-[11px] md:gap-[13px]';

  switch (dotType) {
    case '2-vert':
      return `
        <div dir="ltr" class="flex flex-col items-center justify-center ${gapClass}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case '4-grid':
      return `
        <div dir="ltr" class="grid grid-cols-2 ${gapClass}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case 'question':
      return `<span class="text-[18px] md:text-[30px] font-black text-[#204A7A] leading-none font-cairo">?</span>`;
    case '3-tr':
      return `
        <div dir="ltr" class="flex items-start ${wideGap}">
          <span class="${dotClass}"></span>
          <div class="flex flex-col ${gapClass}">
            <span class="${dotClass}"></span>
            <span class="${dotClass}"></span>
          </div>
        </div>`;
    case '3-tl':
      return `
        <div dir="ltr" class="flex items-center ${wideGap}">
          <div class="flex flex-col ${gapClass}">
            <span class="${dotClass}"></span>
            <span class="${dotClass}"></span>
          </div>
          <span class="${dotClass} self-end"></span>
        </div>`;
    case '2-diag':
      return `
        <div dir="ltr" class="flex items-center ${wideGap} h-[25px] md:h-[51px]">
          <span class="${dotClass} self-end"></span>
          <span class="${dotClass} self-start"></span>
        </div>`;
    case '2-horiz':
      return `
        <div dir="ltr" class="flex items-center ${wideGap}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case '1-center':
      return `
        <div class="flex items-center justify-center">
          <span class="${dotClass}"></span>
        </div>`;
    case '3-vert':
      return `
        <div class="flex flex-col items-center justify-center ${gapClass}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case '3-horiz':
      return `
        <div class="flex items-center justify-center ${gapClass}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case '5-dice':
      return `
        <div class="grid grid-cols-3 ${gapClass} place-items-center">
          <span class="${dotClass}"></span> ${spacer} <span class="${dotClass}"></span>
          ${spacer} <span class="${dotClass}"></span> ${spacer}
          <span class="${dotClass}"></span> ${spacer} <span class="${dotClass}"></span>
        </div>`;
    default:
      return '';
  }
}

// Shared classes (Figma: mobile #3403:8558, desktop #3403:9849)
const TEXT_SELECTED_BADGE = '<span class="quiz-option-badge absolute top-[7px] left-[10px] md:top-[12px] md:left-[18px] w-[16px] h-[16px] md:w-[26px] md:h-[26px] rounded-full bg-[#FCD34D] text-[#132C49] flex items-center justify-center" aria-hidden="true"><i class="fa-solid fa-check text-[9px] md:text-[14px]"></i></span>';
const BTN_BASE = 'w-full md:max-w-[671px] h-[40px] md:h-[70px] rounded-[10px] md:rounded-[12px] bg-[#FCD34D] text-[#132C49] font-bold font-messiri text-[14px] md:text-[20px] flex items-center justify-center gap-[8px] md:gap-[10px] transition-all duration-200';
const BTN_DISABLED = `${BTN_BASE} opacity-50 cursor-not-allowed`;
const BTN_ENABLED = `${BTN_BASE} cursor-pointer hover:bg-[#FBBF24] shadow-[0px_4px_12px_rgba(0,0,0,0.16)]`;
const SELECTED_BADGE = '<span class="quiz-option-badge absolute top-[6px] left-[6px] md:top-[7px] md:left-[7px] w-[12px] h-[12px] md:w-[15px] md:h-[15px] rounded-full bg-[#FCD34D] text-[#132C49] flex items-center justify-center" aria-hidden="true"><i class="fa-solid fa-check text-[7px] md:text-[9px]"></i></span>';

export function initQuiz(customQuestions = null) {
  const questions = customQuestions || defaultQuestions;
  let currentIndex = 0;
  let selectedOption = null;
  const userAnswers = [];

  const widget = document.getElementById('quiz-widget');
  const questionCard = document.getElementById('quiz-question-card');
  const resultCard = document.getElementById('quiz-result-card');
  const counterEl = document.getElementById('quiz-counter');
  const progressContainer = document.getElementById('quiz-progress-dots');
  const questionTitleEl = document.getElementById('quiz-question-title');
  const patternContainer = document.getElementById('quiz-pattern-container');
  const optionsContainer = document.getElementById('quiz-options-container');
  const actionBtn = document.getElementById('quiz-action-btn');
  const btnText = document.getElementById('quiz-btn-text');
  const scoreText = document.getElementById('quiz-score-text');
  const restartBtn = document.getElementById('quiz-restart-btn');

  if (!widget || !questionCard || !optionsContainer || !actionBtn) return;

  function renderQuestion() {
    const q = questions[currentIndex];
    selectedOption = null;

    // Reset action button state
    actionBtn.disabled = true;
    actionBtn.className = BTN_DISABLED;

    // Button label
    const isLast = currentIndex === questions.length - 1;
    let label = isLast ? cms('home.challenge.result_button', 'شاهد نتيجتك') : cms('home.challenge.next_button', 'التالي');
    if (currentIndex === 0 && q.initialBtnText) {
      label = q.initialBtnText;
    }
    if (btnText) {
      btnText.textContent = label;
    }

    // Question counter
    if (counterEl) {
      counterEl.textContent = `${cms('home.challenge.counter_question', 'سؤال')} ${currentIndex + 1} ${cms('home.challenge.counter_of', 'من')} ${questions.length}`;
    }

    // Progress dashes
    if (progressContainer) {
      progressContainer.innerHTML = '';
      for (let i = 0; i < questions.length; i++) {
        const dot = document.createElement('span');
        if (i === currentIndex) {
          dot.className = 'quiz-dash w-[19px] md:w-[35px] h-[5px] md:h-[10px] rounded-full bg-[#BAC7D6] transition-all duration-300';
        } else {
          dot.className = 'quiz-dash w-[9px] md:w-[19px] h-[5px] md:h-[10px] rounded-full bg-white transition-all duration-300';
        }
        progressContainer.appendChild(dot);
      }
    }

    // Question title
    if (questionTitleEl) {
      questionTitleEl.textContent = q.question;
    }

    // Render Pattern Sequence Row if question is pattern-based
    if (q.type === 'pattern' && q.patternRow && patternContainer) {
      patternContainer.className = 'flex items-center justify-between w-full md:max-w-[768px] md:mx-auto h-[77px] md:h-[131px] mt-[28px] md:mt-[48px] px-[15px] md:px-[14px] rounded-[12px] md:rounded-[16px] border border-white/80';
      patternContainer.innerHTML = '';

      q.patternRow.forEach((item, idx) => {
        if (idx > 0) {
          const arrow = document.createElement('i');
          arrow.className = 'fa-solid fa-chevron-left text-white text-[12px] md:text-[16px]';
          arrow.setAttribute('aria-hidden', 'true');
          patternContainer.appendChild(arrow);
        }
        const card = document.createElement('div');
        if (item === 'question') {
          card.className = 'shrink-0 w-[45px] h-[45px] md:w-[99px] md:h-[99px] rounded-[9px] md:rounded-[14px] bg-[#F6F8FB] border-[1.5px] md:border-2 border-dashed border-[#4A7FC1] flex items-center justify-center';
        } else {
          card.className = 'shrink-0 w-[45px] h-[45px] md:w-[99px] md:h-[99px] rounded-[9px] md:rounded-[14px] bg-white flex items-center justify-center shadow-sm';
        }
        card.innerHTML = renderDotContent(item, false);
        patternContainer.appendChild(card);
      });
    } else if (patternContainer) {
      patternContainer.classList.add('hidden');
      patternContainer.innerHTML = '';
    }

    // Render Options
    optionsContainer.innerHTML = '';

    if (q.type === 'pattern') {
      // 4 dice in a row (Mobile: 73x58 filling the row, Desktop: 99x99 across 588px)
      optionsContainer.className = 'flex items-center justify-between gap-[12px] md:gap-0 w-full md:max-w-[588px] md:mx-auto mt-[24px] md:mt-[64px]';

      const normalClass = 'quiz-option relative flex-1 md:flex-none min-w-0 h-[58px] md:w-[99px] md:h-[99px] rounded-[14px] bg-[#EEF2F7] border-[1.5px] border-[#DDE4ED] flex items-center justify-center hover:border-[#4A7FC1] outline-none transition-all duration-200 cursor-pointer';
      const selectedClass = 'quiz-option relative flex-1 md:flex-none min-w-0 h-[58px] md:w-[99px] md:h-[99px] rounded-[14px] bg-white border-[3px] border-[#FCD34D] ring-4 ring-[#FCD34D]/40 scale-[1.06] outline-none flex items-center justify-center shadow-[0_6px_18px_rgba(0,0,0,0.35)] transition-all duration-200 cursor-pointer';

      q.options.forEach((optType, optIdx) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = normalClass;
        btn.setAttribute('role', 'radio');
        btn.setAttribute('aria-checked', 'false');
        btn.setAttribute('aria-label', `خيار نمط ${optIdx + 1}`);
        btn.innerHTML = renderDotContent(optType, true);

        btn.addEventListener('click', () => {
          selectedOption = optIdx;

          // Reset all
          optionsContainer.querySelectorAll('.quiz-option').forEach(b => {
            b.className = normalClass;
            b.setAttribute('aria-checked', 'false');
            b.querySelector('.quiz-option-badge')?.remove();
          });

          // Selected
          btn.className = selectedClass;
          btn.setAttribute('aria-checked', 'true');
          btn.insertAdjacentHTML('beforeend', SELECTED_BADGE);

          // Enable button
          actionBtn.disabled = false;
          actionBtn.className = BTN_ENABLED;
          if (btnText) {
            btnText.textContent = isLast ? cms('home.challenge.result_button', 'شاهد نتيجتك') : cms('home.challenge.next_button', 'التالي');
          }
        });

        optionsContainer.appendChild(btn);
      });

    } else {
      // 2x2 Grid for Text Questions (Mobile: 155x47, Desktop: 313x95)
      optionsContainer.className = 'grid grid-cols-2 gap-[12px] md:gap-[40px] mt-[28px] md:mt-[48px] w-full md:max-w-[671px] md:mx-auto';

      const normalClass = 'quiz-option relative w-full h-[47px] md:h-[95px] rounded-[14px] md:rounded-[32.34px] bg-[#EFF3F8] border-[1.6px] md:border-[3.23px] border-[#DDE4ED] text-[#262626] text-[14px] md:text-[28.3px] font-bold font-cairo flex items-center justify-center cursor-pointer transition-all duration-200 hover:bg-[#F8FAFC] hover:border-brand-primary hover:text-brand-primary outline-none shadow-sm';
      const selectedClass = 'quiz-option relative w-full h-[47px] md:h-[95px] rounded-[14px] md:rounded-[32.34px] bg-white border-[2.5px] md:border-[4px] border-[#FCD34D] ring-4 ring-[#FCD34D]/40 outline-none text-[#0B2A4A] text-[14px] md:text-[28.3px] font-bold font-cairo flex items-center justify-center cursor-pointer shadow-[0_6px_18px_rgba(0,0,0,0.35)] transition-all duration-200';

      q.options.forEach((optText, optIdx) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = normalClass;
        btn.setAttribute('role', 'radio');
        btn.setAttribute('aria-checked', 'false');
        btn.setAttribute('aria-label', optText);
        btn.textContent = optText;

        btn.addEventListener('click', () => {
          selectedOption = optIdx;

          // Reset all
          optionsContainer.querySelectorAll('.quiz-option').forEach(b => {
            b.className = normalClass;
            b.setAttribute('aria-checked', 'false');
            b.querySelector('.quiz-option-badge')?.remove();
          });

          // Selected
          btn.className = selectedClass;
          btn.setAttribute('aria-checked', 'true');
          btn.insertAdjacentHTML('beforeend', TEXT_SELECTED_BADGE);

          // Enable button
          actionBtn.disabled = false;
          actionBtn.className = BTN_ENABLED;
          if (btnText) {
            btnText.textContent = isLast ? cms('home.challenge.result_button', 'شاهد نتيجتك') : cms('home.challenge.next_button', 'التالي');
          }
        });

        optionsContainer.appendChild(btn);
      });
    }

    questionCard.classList.remove('hidden');
    if (resultCard) resultCard.classList.add('hidden');
  }

  // Next / Submit handler
  actionBtn.addEventListener('click', () => {
    if (selectedOption === null) return;

    userAnswers[currentIndex] = selectedOption;

    if (currentIndex < questions.length - 1) {
      questionCard.classList.add('opacity-0', 'transition-opacity', 'duration-150');
      setTimeout(() => {
        currentIndex++;
        renderQuestion();
        questionCard.classList.remove('opacity-0');
      }, 150);
    } else {
      showResult();
    }
  });

  function fireCelebrationConfetti() {
    const launch = typeof confetti === 'function' ? confetti : (window.confetti || null);
    if (typeof launch === 'function') {
      // 1. Initial central pop around the trophy
      launch({
        particleCount: 70,
        spread: 70,
        origin: { y: 0.55 },
        colors: ['#FFD700', '#204A7A', '#F59E0B', '#3B82F6', '#EC4899', '#10B981'],
        zIndex: 9999
      });

      // 2. Dual celebratory side cannons shooting upward
      setTimeout(() => {
        launch({
          particleCount: 45,
          angle: 60,
          spread: 55,
          origin: { x: 0.15, y: 0.65 },
          colors: ['#FFD700', '#204A7A', '#F59E0B', '#3B82F6', '#EC4899']
        });
        launch({
          particleCount: 45,
          angle: 120,
          spread: 55,
          origin: { x: 0.85, y: 0.65 },
          colors: ['#FFD700', '#204A7A', '#F59E0B', '#3B82F6', '#EC4899']
        });
      }, 220);

      // 3. Falling stars and shimmering discs
      setTimeout(() => {
        launch({
          particleCount: 35,
          spread: 100,
          origin: { y: 0.4 },
          shapes: ['star', 'circle'],
          colors: ['#FFD700', '#FFA500', '#204A7A', '#FFFFFF']
        });
      }, 450);
    }
  }

  function showResult() {
    let score = 0;
    questions.forEach((q, idx) => {
      if (userAnswers[idx] === q.correctIndex) {
        score++;
      }
    });

    if (questionCard) questionCard.classList.add('hidden');
    if (resultCard) {
      resultCard.classList.remove('hidden');

      const scoreNumEl = document.getElementById('quiz-score-num');
      const totalNumEl = document.getElementById('quiz-total-num');
      const resultTitleEl = document.getElementById('quiz-result-title');
      const trophyImg = document.getElementById('quiz-trophy-img');

      if (scoreNumEl) scoreNumEl.textContent = score;
      if (totalNumEl) totalNumEl.textContent = questions.length;

      if (resultTitleEl) {
        if (score === questions.length) {
          resultTitleEl.textContent = cms('home.challenge.result_excellent', 'ممتاز! أداء رائع');
        } else if (score > 0) {
          resultTitleEl.textContent = cms('home.challenge.result_good', 'محاولة جيدة!');
        } else {
          resultTitleEl.textContent = cms('home.challenge.result_low', 'حظ أوفر!');
        }
      }

      // Trophy logic
      if (trophyImg) {
        trophyImg.classList.remove('animate-trophy-pop');
        void trophyImg.offsetWidth;
        
        if (score === questions.length) {
          trophyImg.src = '/images/icons/trophy.webp';
          trophyImg.classList.add('animate-trophy-pop');
          trophyImg.style.display = 'block';
          resultCard.querySelector('.absolute.inset-0').style.display = 'block'; // Show glow
        } else if (score > 0) {
          trophyImg.src = '/images/icons/trophy.webp';
          trophyImg.classList.add('animate-trophy-pop');
          trophyImg.style.display = 'block';
          resultCard.querySelector('.absolute.inset-0').style.display = 'none'; // Hide glow for non-perfect
        } else {
          trophyImg.style.display = 'none'; // Hide trophy for 0
          resultCard.querySelector('.absolute.inset-0').style.display = 'none';
        }
      }

      // Fire celebratory confetti only if score > 0
      if (score === questions.length) {
        fireCelebrationConfetti(); // Full confetti
      } else if (score > 0) {
        // Less confetti
        const launch = typeof confetti === 'function' ? confetti : (window.confetti || null);
        if (typeof launch === 'function') {
           launch({ particleCount: 30, spread: 50, origin: { y: 0.6 } });
        }
      }
    }
  }

  // Restart handler
  if (restartBtn) {
    restartBtn.addEventListener('click', () => {
      currentIndex = 0;
      userAnswers.length = 0;
      renderQuestion();
    });
  }

  // Initial render
  renderQuestion();
}

