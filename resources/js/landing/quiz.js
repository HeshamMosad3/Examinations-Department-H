// ============================================================================
// QUIZ MODULE — دار الرؤى (التحدي السريع)
// ============================================================================
// يدعم الأسئلة النصية والأسئلة البصرية (الأنماط)، وجاهز للربط بقاعدة البيانات مستقبلاً.

import confetti from 'canvas-confetti';

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

// Helper: Generates HTML for dot patterns inside sequence cards and options
function renderDotContent(dotType, isOption = false) {
  const dotColor = isOption ? 'bg-[#0B1628]' : 'bg-[#204A7A]';
  const dotClass = `w-[10px] h-[10px] md:w-[17.67px] md:h-[17.67px] rounded-full ${dotColor}`;
  const gapClass = 'gap-[4px] md:gap-[7.07px]';

  switch (dotType) {
    case '2-vert':
      return `
        <div class="flex flex-col items-center justify-center ${gapClass}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case '4-grid':
      return `
        <div class="grid grid-cols-2 ${gapClass}">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    case 'question':
      return `<span class="text-[20px] md:text-[35.34px] font-black text-[#204A7A] leading-none font-['Cairo']">؟</span>`;
    case '3-tr':
      return `
        <div class="flex items-center ${gapClass}">
          <span class="${dotClass} self-start mt-0.5"></span>
          <div class="flex flex-col ${gapClass}">
            <span class="${dotClass}"></span>
            <span class="${dotClass}"></span>
          </div>
        </div>`;
    case '3-tl':
      return `
        <div class="flex items-center ${gapClass}">
          <div class="flex flex-col ${gapClass}">
            <span class="${dotClass}"></span>
            <span class="${dotClass}"></span>
          </div>
          <span class="${dotClass} self-end mb-0.5"></span>
        </div>`;
    case '2-diag':
      return `
        <div class="flex items-center gap-[6px] md:gap-[12px]">
          <span class="${dotClass} self-end mb-0.5"></span>
          <span class="${dotClass} self-start mt-0.5"></span>
        </div>`;
    case '2-horiz':
      return `
        <div class="flex items-center gap-[6px] md:gap-[12px]">
          <span class="${dotClass}"></span>
          <span class="${dotClass}"></span>
        </div>`;
    default:
      return '';
  }
}

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
    actionBtn.className = 'w-full max-w-[330px] md:max-w-[671px] h-[40px] md:h-[71px] rounded-[10px] md:rounded-[17.67px] bg-[#BAC7D6] text-white font-semibold font-messiri text-[14px] md:text-[24.74px] flex items-center justify-center gap-[8px] md:gap-[14.14px] cursor-not-allowed transition-all duration-200 shadow-sm';

    // Button label
    const isLast = currentIndex === questions.length - 1;
    let label = isLast ? 'شاهد نتيجتك' : 'التالي';
    if (currentIndex === 0 && q.initialBtnText) {
      label = q.initialBtnText;
    }
    if (btnText) {
      btnText.textContent = label;
    }

    // Question counter
    if (counterEl) {
      counterEl.textContent = `سؤال ${currentIndex + 1} من ${questions.length}`;
    }

    // Progress dashes
    if (progressContainer) {
      progressContainer.innerHTML = '';
      for (let i = 0; i < questions.length; i++) {
        const dot = document.createElement('span');
        if (i === currentIndex) {
          dot.className = 'quiz-dash w-[20px] md:w-[35.34px] h-[6px] md:h-[10.6px] rounded-full bg-[#204A7A] transition-all duration-300';
        } else {
          dot.className = 'quiz-dash w-[12px] md:w-[21.2px] h-[6px] md:h-[10.6px] rounded-full bg-[#DDE4ED] transition-all duration-300';
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
      patternContainer.classList.remove('hidden');
      patternContainer.className = 'flex items-center justify-center gap-2 min-[360px]:gap-[12px] md:gap-[21.2px] my-4 md:my-8 w-full max-w-[330px] md:max-w-[588px] mx-auto';
      patternContainer.innerHTML = '';

      q.patternRow.forEach(item => {
        const card = document.createElement('div');
        if (item === 'question') {
          card.className = 'flex-1 min-w-0 max-w-[56px] h-[50px] min-[360px]:h-[56px] md:max-w-[98.95px] md:h-[98.95px] rounded-[14px] min-[360px]:rounded-[16px] md:rounded-[28.27px] bg-[#204A7A]/5 border-[1.6px] md:border-[2.83px] border-dashed border-[#204A7A]/30 flex items-center justify-center shadow-sm';
        } else {
          card.className = 'flex-1 min-w-0 max-w-[56px] h-[50px] min-[360px]:h-[56px] md:max-w-[98.95px] md:h-[98.95px] rounded-[14px] min-[360px]:rounded-[16px] md:rounded-[28.27px] bg-[#EFF3F8] border-[1.6px] md:border-[2.83px] border-[#DDE4ED] flex items-center justify-center shadow-sm';
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
      // 4 pills in a row matching Figma (Mobile: 75x43, Desktop: 132.5x76)
      optionsContainer.className = 'flex items-center justify-center gap-1.5 min-[360px]:gap-[11px] md:gap-[19.44px] my-4 md:my-8 w-full max-w-[330px] md:max-w-[588px] mx-auto';

      const normalClass = 'quiz-option flex-1 min-w-0 max-w-[75px] md:max-w-[132.5px] h-[43px] md:h-[76px] rounded-[16px] md:rounded-[28.27px] bg-[#EFF3F8] border-[1.6px] md:border-[2.83px] border-[#DDE4ED] flex items-center justify-center shadow-sm hover:border-brand-primary hover:shadow-md transition-all duration-200 cursor-pointer';
      const selectedClass = 'quiz-option flex-1 min-w-0 max-w-[75px] md:max-w-[132.5px] h-[43px] md:h-[76px] rounded-[16px] md:rounded-[28.27px] bg-[#F0F5FA] border-[1.6px] md:border-[2.83px] border-brand-primary flex items-center justify-center shadow-md scale-[1.03] transition-all duration-200 cursor-pointer';

      q.options.forEach((optType, optIdx) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = normalClass;
        btn.innerHTML = renderDotContent(optType, true);

        btn.addEventListener('click', () => {
          selectedOption = optIdx;

          // Reset all
          optionsContainer.querySelectorAll('.quiz-option').forEach(b => {
            b.className = normalClass;
          });

          // Selected
          btn.className = selectedClass;

          // Enable button
          actionBtn.disabled = false;
          actionBtn.className = 'w-full max-w-[330px] md:max-w-[671px] h-[40px] md:h-[71px] rounded-[10px] md:rounded-[17.67px] bg-brand-primary hover:bg-[#102744] text-white font-semibold font-messiri text-[14px] md:text-[24.74px] flex items-center justify-center gap-[8px] md:gap-[14.14px] cursor-pointer shadow-md hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 border-2 border-brand-primary';
          if (btnText) {
            btnText.textContent = isLast ? 'شاهد نتيجتك' : 'التالي';
          }
        });

        optionsContainer.appendChild(btn);
      });

    } else {
      // 2x2 Grid for Text Questions (Mobile: 155x47, Desktop: 313x95)
      optionsContainer.className = 'grid grid-cols-2 gap-2.5 min-[360px]:gap-4 md:gap-[40.4px] my-4 md:my-8 w-full max-w-[330px] md:max-w-[671px] mx-auto';

      const normalClass = 'quiz-option w-full h-[47px] md:h-[95px] rounded-[14px] md:rounded-[32.34px] bg-[#EFF3F8] border-[1.6px] md:border-[3.23px] border-[#DDE4ED] text-[#262626] text-[14px] md:text-[28.3px] font-bold font-cairo flex items-center justify-center cursor-pointer transition-all duration-200 hover:bg-[#F8FAFC] hover:border-brand-primary hover:text-brand-primary shadow-sm';
      const selectedClass = 'quiz-option w-full h-[47px] md:h-[95px] rounded-[14px] md:rounded-[32.34px] bg-[#F0F5FA] border-[1.6px] md:border-[3.23px] border-brand-primary text-brand-primary text-[14px] md:text-[28.3px] font-bold font-cairo flex items-center justify-center cursor-pointer shadow-md transition-all duration-200';

      q.options.forEach((optText, optIdx) => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = normalClass;
        btn.textContent = optText;

        btn.addEventListener('click', () => {
          selectedOption = optIdx;

          // Reset all
          optionsContainer.querySelectorAll('.quiz-option').forEach(b => {
            b.className = normalClass;
          });

          // Selected
          btn.className = selectedClass;

          // Enable button
          actionBtn.disabled = false;
          actionBtn.className = 'w-full max-w-[330px] md:max-w-[671px] h-[40px] md:h-[71px] rounded-[10px] md:rounded-[17.67px] bg-brand-primary hover:bg-[#102744] text-white font-semibold font-messiri text-[14px] md:text-[24.74px] flex items-center justify-center gap-[8px] md:gap-[14.14px] cursor-pointer shadow-md hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 border-2 border-brand-primary';
          if (btnText) {
            btnText.textContent = isLast ? 'شاهد نتيجتك' : 'التالي';
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
        resultTitleEl.textContent = 'محاولة جيدة!';
      }

      // Trophy pop animation
      if (trophyImg) {
        trophyImg.classList.remove('animate-trophy-pop');
        void trophyImg.offsetWidth;
        trophyImg.classList.add('animate-trophy-pop');
      }

      // Fire celebratory confetti!
      fireCelebrationConfetti();
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

