// محرك اختبار عجلة الحياة - 8 جوانب × 10 أسئلة (مقياس ليكرت 0-4)
import confetti from 'canvas-confetti';
import { CATEGORIES, ANSWER_SCALE } from './lifeWheelAssessmentData.js';
import { initNavigation } from './navigation.js';
import { saveLifeWheelAnswers } from './lifeWheelSave.js';

initNavigation();

const TOTAL_CATEGORIES = CATEGORIES.length;
const QUESTIONS_PER_CATEGORY = 10;

let currentCategoryIndex = 0;
const answers = CATEGORIES.map(() => Array(QUESTIONS_PER_CATEGORY).fill(null));

function scaleFor(value) {
  return ANSWER_SCALE.find((s) => s.value === value);
}


// عرض الخط     بت المميّز (Bar) اللي فيجما بيسجله فعليًا لكل جانب، مأخوذ من الميتاداتا الحقيقية
// (بيانات كل صفحة جانب على حدة) - مش نسبة خطية متساوية بين كل خطوة والتانية.
// القيم دي هي عرض الجزء المميّز بالبكسل زي ما فيجما مسجله بالظبط لكل جانب من الـ8.
const STEP_LINE_WIDTHS = [105, 254, 389, 519, 664, 787, 931, 931];
const STEP_LINE_MAX = Math.max(...STEP_LINE_WIDTHS);



function renderStepper() {
  const el = document.getElementById('lw-stepper');
  if (!el) return;

  el.innerHTML = `
    <div class="relative w-full flex items-start justify-between">
      <div id="lw-base-line" class="absolute h-[1px] md:h-[2px] bg-[#DEDEDE] z-0 pointer-events-none"></div>
      <div id="lw-active-line" class="absolute h-[1px] md:h-[2px] bg-brand-primary transition-all duration-300 z-0 pointer-events-none"></div>
      ${CATEGORIES.map((cat, i) => {
        const reached = i <= currentCategoryIndex;
        const circleClass = reached
          ? 'bg-brand-primary border-brand-primary'
          : 'bg-[#f5f6fa] border-[#565656]/50 md:border-[#6f6f6f]';
        const iconColorClass = reached ? 'text-white' : 'text-[#565656] md:text-[#6f6f6f]';
        const labelColorClass = reached ? 'text-brand-primary font-bold' : 'text-[#565656] md:text-[#6f6f6f] font-semibold';
        const shortLabel = cat.label.replace('الجانب ', '');
        return `
          <button type="button" class="lw-step-btn flex flex-col items-center gap-1 md:gap-2 flex-1 min-w-0 max-w-[42px] sm:max-w-[48px] md:max-w-none transition-transform cursor-pointer" data-index="${i}" ${i > currentCategoryIndex ? 'disabled' : ''} aria-label="${cat.label} (الخطوة ${i + 1})">
            <div class="relative flex items-center justify-center rounded-full w-[26px] h-[26px] min-[360px]:w-[28px] min-[360px]:h-[28px] md:w-[54px] md:h-[54px] border-[0.6px] md:border-[1.6px] ${circleClass} transition-colors z-10 shadow-sm">
              <span class="lw-icon-mask w-[13px] h-[13px] min-[360px]:w-[14px] min-[360px]:h-[14px] md:w-[22px] md:h-[22px] ${iconColorClass}" style="--icon-url:url('${cat.iconUrl}')"></span>
            </div>
            <div class="flex flex-col items-center leading-tight w-full pointer-events-none">
              <span class="font-messiri text-[8px] min-[360px]:text-[9px] md:text-[14px] ${labelColorClass}">${i + 1}</span>
              <span class="font-messiri text-[8.5px] min-[360px]:text-[9.5px] min-[390px]:text-[10.5px] md:hidden ${labelColorClass} text-center leading-none mt-1 truncate w-full block font-medium">${shortLabel}</span>
              <span class="font-messiri hidden md:inline text-[13px] lg:text-[14px] ${labelColorClass} whitespace-nowrap mt-0.5">${cat.label}</span>
            </div>
          </button>
        `;
      }).join('')}
    </div>
  `;

  el.querySelectorAll('.lw-step-btn').forEach((btn) => {
    if (btn.disabled) return;
    btn.addEventListener('click', () => goToCategory(Number(btn.dataset.index)));
  });

  requestAnimationFrame(updateStepperLine);
}

function updateStepperLine() {
  const el = document.getElementById('lw-stepper');
  const baseLine = el?.querySelector('#lw-base-line');
  const activeLine = el?.querySelector('#lw-active-line');
  const btns = el?.querySelectorAll('.lw-step-btn');
  if (!baseLine || !activeLine || !btns || btns.length < 2) return;

  const container = el.firstElementChild;
  if (!container) return;
  const containerRect = container.getBoundingClientRect();
  const firstCircle = btns[0].querySelector('.rounded-full');
  const lastCircle = btns[btns.length - 1].querySelector('.rounded-full');
  const activeCircle = btns[currentCategoryIndex].querySelector('.rounded-full');

  if (firstCircle && lastCircle && activeCircle) {
    const firstRect = firstCircle.getBoundingClientRect();
    const lastRect = lastCircle.getBoundingClientRect();
    const activeRect = activeCircle.getBoundingClientRect();

    const firstCenter = firstRect.left + firstRect.width / 2;
    const lastCenter = lastRect.left + lastRect.width / 2;
    const activeCenter = activeRect.left + activeRect.width / 2;

    let targetCenter = activeCenter;
    if (currentCategoryIndex < btns.length - 1) {
      const nextCircle = btns[currentCategoryIndex + 1].querySelector('.rounded-full');
      if (nextCircle) {
        const nextRect = nextCircle.getBoundingClientRect();
        const nextCenter = nextRect.left + nextRect.width / 2;
        targetCenter = (activeCenter + nextCenter) / 2;
      }
    }

    const centerY = (firstRect.top + firstRect.height / 2) - containerRect.top;

    baseLine.style.top = centerY + 'px';
    baseLine.style.transform = 'translateY(-50%)';
    activeLine.style.top = centerY + 'px';
    activeLine.style.transform = 'translateY(-50%)';

    // In RTL: firstCircle (step 1) is at the right, lastCircle (step 8) is at the left
    const rightOffset = Math.max(0, containerRect.right - firstCenter);
    const leftOffset = Math.max(0, lastCenter - containerRect.left);

    baseLine.style.right = rightOffset + 'px';
    baseLine.style.left = leftOffset + 'px';

    activeLine.style.right = rightOffset + 'px';
    const activeWidth = Math.max(0, firstCenter - targetCenter);
    activeLine.style.width = activeWidth + 'px';
  }
}

window.addEventListener('resize', updateStepperLine);

function renderScaleLegend() {
  const el = document.getElementById('lw-scale-legend');
  if (!el) return;

  const visualOrder = [...ANSWER_SCALE].reverse();
  const html = [];
  visualOrder.forEach((s, i) => {
    html.push(`
      <div class="flex flex-col items-center gap-1.5 sm:gap-2 shrink-0">
        <div class="w-[32px] h-[32px] min-[360px]:w-[36px] min-[360px]:h-[36px] md:w-[50px] md:h-[50px] rounded-full border-2 flex items-center justify-center font-messiri font-bold text-[14px] md:text-[17px] shadow-sm" style="background:${s.bg};color:${s.text};border-color:${s.bg}">${s.value}</div>
        <span class="font-messiri font-semibold text-[11px] min-[360px]:text-[12.5px] md:text-[14px] text-[#262626] whitespace-nowrap">${s.label}</span>
      </div>
    `);
    if (i < visualOrder.length - 1) {
      html.push(`
        <div class="w-px h-[32px] min-[360px]:h-[38px] sm:h-[48px] md:h-[60px] bg-[#DDDDDD] self-center shrink-0" aria-hidden="true"></div>
      `);
    }
  });
  el.innerHTML = html.join('');
}

function renderCategoryHeader() {
  const el = document.getElementById('lw-category-header');
  if (!el) return;
  const cat = CATEGORIES[currentCategoryIndex];
  const fallbackDescs = [
    'يقيس مدى التزام الفرد بالعبادات والممارسات الإيمانية، وانعكاس القيم الروحية على سلوكه بما يمنحه السكينة والاستقرار النفسي.',
    'يقيس مدى اهتمام الفرد بصحته البدنية والنفسية، من خلال العادات الغذائية وممارسة الرياضة والوقاية من الأمراض.',
    'يقيس مدى وعي الفرد بذاته وسعيه لتطوير مهاراته وقدراته، واهتمامه بالنمو المستمر وتحقيق الأهداف الشخصية.',
    'يقيس جودة علاقة الفرد بأفراد أسرته، ومدى تواصله وتفاعله معهم، واهتمامه ببناء أسرة متماسكة ومستقرة.',
    'يقيس مدى تفاعل الفرد مع مجتمعه، ومشاركته في الأنشطة الاجتماعية، وبناء علاقات إيجابية مع الآخرين.',
    'يقيس مدى كفاءة الفرد في أداء مهامه الوظيفية، وتطوير مهاراته المهنية، وتحقيق طموحاته في مسيرته العملية.',
    'يقيس مدى قدرة الفرد على إدارة أمواله، والتخطيط المالي السليم، وتوفير احتياجاته، والاستعداد للمستقبل.',
    'يقيس مدى قدرة الفرد على الترويح عن نفسه، وممارسة هواياته وأنشطته المفضلة، وتحقيق التوازن في حياته.'
  ];
  const desc = cat.description || fallbackDescs[currentCategoryIndex] || '';
  const titleLabel = cat.label.replace('الجانب ', '');

  el.innerHTML = `
    <div class="flex flex-col items-start gap-1.5 md:gap-2 mb-2 md:mb-3 w-full">
      <span class="font-messiri font-semibold text-[#ce9d42] text-[13px] sm:text-[14px] md:text-[18px] whitespace-nowrap">الجانب ${currentCategoryIndex + 1} من ${TOTAL_CATEGORIES}</span>
      <div class="flex items-center gap-2.5 md:gap-3">
        <div class="w-[38px] h-[38px] md:w-[54px] md:h-[54px] rounded-full bg-brand-primary flex items-center justify-center shrink-0 shadow-sm">
          <span class="lw-icon-mask w-[18px] h-[18px] md:w-[24px] md:h-[24px] text-white" style="--icon-url:url('${cat.iconUrl}')"></span>
        </div>
        <h2 class="font-messiri font-bold text-brand-primary text-[20px] sm:text-[22px] md:text-[28px]">${titleLabel}</h2>
      </div>
    </div>
    <p class="font-messiri text-[#565656] text-[13.5px] sm:text-[14.5px] md:text-[17px] leading-relaxed text-right w-full">${desc}</p>
  `;

  const reminderBox = document.getElementById('lw-reminder-box');
  const scaleLegend = document.getElementById('lw-scale-legend');
  if (reminderBox) {
      reminderBox.style.display = currentCategoryIndex === 0 ? 'flex' : 'none';
  }
  if (scaleLegend) {
      scaleLegend.style.display = currentCategoryIndex === 0 ? 'flex' : 'none';
  }
}

function renderProgressRow() {
  const el = document.getElementById('lw-progress-row');
  if (!el) return;
  const answered = answers[currentCategoryIndex].filter((v) => v !== null).length;
  const pct = (answered / QUESTIONS_PER_CATEGORY) * 100;
  el.innerHTML = `
    <div class="flex-1 h-[10px] md:h-[12px] bg-[#e5e7eb] rounded-full overflow-hidden">
      <div class="h-full bg-[#2b5788] rounded-full transition-all duration-300" style="width:${pct}%"></div>
    </div>
    <span class="font-messiri font-semibold text-[#2b5788] text-[13px] md:text-[17px] shrink-0">${answered}/${QUESTIONS_PER_CATEGORY}</span>
  `;
}

function applySelectedStyle(btn, val) {
  const s = scaleFor(val);
  btn.style.background = s.bg;
  btn.style.borderColor = s.bg;
  btn.style.color = s.text;
  btn.setAttribute('aria-checked', 'true');
}

function resetStyle(btn) {
  const val = Number(btn.dataset.value);
  const s = scaleFor(val);
  btn.style.background = 'transparent';
  btn.style.borderColor = s.bg;
  btn.style.color = s.text;
  btn.setAttribute('aria-checked', 'false');
}

function renderQuestions() {
  const el = document.getElementById('lw-questions');
  if (!el) return;
  const cat = CATEGORIES[currentCategoryIndex];

  // فيجما: ترتيب خيارات الإجابة 0، 1، 2، 3، 4 من اليمين لليسار مع فجوة واضحة 26px
  const circleOrder = [...ANSWER_SCALE].reverse();

  el.innerHTML = cat.questions.map((q, qIdx) => `
    <div class="flex flex-col md:flex-row md:items-center gap-3.5 md:gap-8 py-5 md:py-6" data-q="${qIdx}">
      <div class="flex items-center justify-center md:justify-start w-full md:w-auto mx-auto md:mx-0 gap-4 min-[360px]:gap-[18px] min-[375px]:gap-[22px] min-[390px]:gap-[26px] md:gap-4 lg:gap-6 order-2 shrink-0 py-1" role="radiogroup" aria-labelledby="lw-q-text-${qIdx}">
        ${circleOrder.map((s) => `
          <button type="button" role="radio" aria-checked="false" aria-label="الدرجة ${s.value}" class="lw-answer-btn w-[36px] h-[36px] min-[360px]:w-[38px] min-[360px]:h-[38px] min-[390px]:w-[40px] min-[390px]:h-[40px] md:w-[50px] md:h-[50px] rounded-full border-2 flex items-center justify-center font-messiri font-bold text-[14px] min-[360px]:text-[15px] md:text-[17px] transition-all cursor-pointer select-none active:scale-95 shadow-sm"
            data-value="${s.value}" style="border-color:${s.bg};color:${s.text};background:transparent">${s.value}</button>
        `).join('')}
      </div>
      <div class="flex items-start md:items-center justify-start text-right w-full gap-2.5 order-1 flex-1 min-w-0">
        <span class="font-messiri font-bold text-brand-primary text-[16px] md:text-[24px] shrink-0">${qIdx + 1}.</span>
        <p id="lw-q-text-${qIdx}" class="font-messiri font-medium text-[#262626] text-[15px] sm:text-[16px] md:text-[20px] leading-relaxed text-right">${q}</p>
      </div>
    </div>
  `).join('');

  el.querySelectorAll('[data-q]').forEach((row) => {
    const qIdx = Number(row.dataset.q);
    const saved = answers[currentCategoryIndex][qIdx];

    row.querySelectorAll('.lw-answer-btn').forEach((btn) => {
      const val = Number(btn.dataset.value);
      if (saved === val) applySelectedStyle(btn, val);

      btn.addEventListener('click', () => {
        answers[currentCategoryIndex][qIdx] = val;
        row.querySelectorAll('.lw-answer-btn').forEach((b) => resetStyle(b));
        applySelectedStyle(btn, val);
        renderProgressRow();
        renderNavButtons();
      });
    });
  });
}

function renderNavButtons() {
  const el = document.getElementById('lw-nav-buttons');
  if (!el) return;
  const isFirst = currentCategoryIndex === 0;
  const isLast = currentCategoryIndex === TOTAL_CATEGORIES - 1;
  const allAnswered = answers[currentCategoryIndex].every((v) => v !== null);

  el.innerHTML = `
    ${isFirst ? '<span></span>' : `
      <button type="button" id="lw-prev-btn" class="flex items-center gap-2 h-[46px] md:h-[60px] px-4 md:px-6 rounded-[15px] border-2 border-brand-primary text-brand-primary font-messiri font-semibold text-[14px] sm:text-[16px] md:text-[21px] hover:bg-brand-primary hover:text-white transition-all cursor-pointer">
        <i class="fa-solid fa-arrow-right text-[12px] md:text-[16px]" aria-hidden="true"></i>
        <span>الجانب السابق</span>
      </button>
    `}
    <button type="button" id="lw-next-btn" class="flex items-center gap-2 h-[46px] md:h-[60px] px-4 md:px-6 rounded-[15px] font-messiri font-semibold text-[14px] sm:text-[16px] md:text-[21px] transition-all ${allAnswered ? 'bg-brand-primary text-white hover:bg-[#102744] shadow-md cursor-pointer' : 'bg-brand-primary/50 text-white/70 cursor-not-allowed'}" ${allAnswered ? '' : 'disabled'}>
      <span>${isLast ? 'إنهاء الاختبار' : 'الجانب التالي'}</span>
      <i class="fa-solid fa-arrow-left text-[12px] md:text-[16px]" aria-hidden="true"></i>
    </button>
  `;

  const prevBtn = document.getElementById('lw-prev-btn');
  if (prevBtn) prevBtn.addEventListener('click', () => goToCategory(currentCategoryIndex - 1));

  const nextBtn = document.getElementById('lw-next-btn');
  nextBtn.addEventListener('click', () => {
    if (!answers[currentCategoryIndex].every((v) => v !== null)) return;
    showMilestone();
  });
}

function fireConfetti() {
  if (typeof confetti === 'function') {
    confetti({ particleCount: 90, spread: 75, origin: { y: 0.5 }, colors: ['#204A7A', '#FFD700', '#3B82F6', '#10B981'], zIndex: 9999 });
  }
}

const milestoneAssets = [
  { text: 'خطوة جديدة اكتملت! كمّل رحلتك.', lottie: 'aspect-1.json' },
  { text: 'رائع! أنت تتقدم خطوة بخطوة، استمر.', lottie: 'aspect-2.json' },
  { text: 'ممتاز! تقدّمك واضح، خلّينا نكمل.', lottie: 'aspect-3.json' },
  { text: 'أنت في منتصف الطريق! كمّل بنفس الحماس.', lottie: 'aspect-4.json' },
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottie: 'aspect-5.json' },
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottie: 'aspect-6.json' },
  { text: 'باقي خطوة واحدة! أنت قريب من النهاية.', lottie: 'aspect-7.json' },
  { text: 'أحسنت! اكتملت رحلتك، اكتشف نتيجتك.', lottie: 'aspect-8.json' }
];

function showMilestone() {
  const overlay = document.getElementById('lw-milestone-overlay');
  const text = document.getElementById('lw-milestone-text');
  const iconContainer = document.getElementById('lw-milestone-icon');
  
  if (!overlay || !text || !iconContainer) return;
  
  const isLast = currentCategoryIndex === TOTAL_CATEGORIES - 1;
  const asset = milestoneAssets[currentCategoryIndex] || milestoneAssets[0];
  
  text.textContent = asset.text;
  
  // Render the dotlottie player (if the user downloaded the JSON to public/landing/lotties)
  iconContainer.innerHTML = `<dotlottie-player src="/landing/lotties/${asset.lottie}" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></dotlottie-player>`;
  
  overlay.classList.remove('hidden');
  overlay.classList.add('flex');
  
  fireConfetti();

  setTimeout(() => {
    overlay.classList.add('hidden');
    overlay.classList.remove('flex');
    if (isLast) {
      showCompletionScreen();
    } else {
      goToCategory(currentCategoryIndex + 1);
    }
  }, 2500);
}

async function showCompletionScreen() {
  localStorage.setItem('lwAnswers', JSON.stringify(answers));
  // Signed-in users (the page sets window.LW_SAVE_URL) also get the result saved in the database.
  if (window.LW_SAVE_URL) await saveLifeWheelAnswers(window.LW_SAVE_URL, answers);
  window.location.href = '/result.html';
}

function renderAll() {
  renderStepper();
  renderCategoryHeader();
  renderProgressRow();
  renderQuestions();
  renderNavButtons();
}

function goToCategory(index) {
  if (index < 0 || index >= TOTAL_CATEGORIES) return;
  currentCategoryIndex = index;
  renderAll();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function init() {
  if (!document.getElementById('lw-questions')) return;
  renderScaleLegend();
  renderAll();
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
