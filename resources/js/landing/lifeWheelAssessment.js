// محرك اختبار عجلة الحياة - 8 جوانب × 10 أسئلة (مقياس ليكرت 0-4)
import confetti from 'canvas-confetti';
import { CATEGORIES, ANSWER_SCALE } from './lifeWheelAssessmentData.js';

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
    <div class="relative flex items-start justify-start md:justify-between gap-[16px] md:gap-0 min-w-max md:min-w-0 md:w-full px-2">
      <div class="absolute top-[20px] md:top-[27px] inset-x-[20px] md:inset-x-[27px] h-[2px] bg-[#e5e7eb]"></div>
      <div id="lw-active-line" class="absolute top-[20px] md:top-[27px] right-[20px] md:right-[27px] h-[2px] bg-brand-primary transition-all duration-300" style="width:0px;"></div>
      ${CATEGORIES.map((cat, i) => {
        const reached = i <= currentCategoryIndex;
        const circleClass = reached
          ? 'bg-brand-primary'
          : 'bg-[#f5f6fa] border-[1.6px] border-[#6f6f6f]';
        const iconColorClass = reached ? 'text-white' : 'text-[#6f6f6f]';
        const labelColorClass = reached ? 'text-brand-primary font-bold' : 'text-[#6f6f6f] font-semibold';
        return `
          <button type="button" class="lw-step-btn flex flex-col items-center gap-1.5 md:gap-2 shrink-0" data-index="${i}" ${i > currentCategoryIndex ? 'disabled' : ''}>
            <div class="relative flex items-center justify-center rounded-full w-[40px] h-[40px] md:w-[54px] md:h-[54px] ${circleClass} transition-colors">
              <span class="lw-icon-mask w-[16px] h-[16px] md:w-[22px] md:h-[22px] ${iconColorClass}" style="--icon-url:url('${cat.iconUrl}')"></span>
            </div>
            <div class="flex flex-col items-center leading-tight">
              <span class="font-messiri text-[11px] md:text-[14px] ${labelColorClass}">${i + 1}</span>
              <span class="font-messiri text-[10px] md:text-[14px] ${labelColorClass} whitespace-nowrap">${cat.label}</span>
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

  updateStepperLine();
}

function updateStepperLine() {
  const el = document.getElementById('lw-stepper');
  const line = el?.querySelector('#lw-active-line');
  const btns = el?.querySelectorAll('.lw-step-btn');
  if (!line || !btns || !btns.length) return;

  const firstCircle = btns[0].querySelector('.rounded-full');
  const activeCircle = btns[currentCategoryIndex].querySelector('.rounded-full');

  if (firstCircle && activeCircle) {
    const firstRect = firstCircle.getBoundingClientRect();
    const activeRect = activeCircle.getBoundingClientRect();
    const firstCenter = firstRect.left + firstRect.width / 2;
    const activeCenter = activeRect.left + activeRect.width / 2;
    const width = Math.abs(firstCenter - activeCenter);
    line.style.width = width + 'px';
  }
}

window.addEventListener('resize', updateStepperLine);

function renderScaleLegend() {
  const el = document.getElementById('lw-scale-legend');
  if (!el) return;
  // الترتيب البصري في فيجما: 4 (دائماً) أقصى اليسار ... 0 (لا تنطبق) أقصى اليمين.
  // كود فيجما نفسه LTR افتراضيًا، فبالنسبة لصفحتنا (dir=rtl) لازم نعكس ترتيب الـ DOM
  // (أول عنصر في DOM بيتحط أقصى اليمين في RTL) عشان نرجّع نفس الترتيب البصري بالظبط.
  const visualOrder = [...ANSWER_SCALE].reverse();
  el.innerHTML = visualOrder.map((s, i) => `
    <div class="flex items-center gap-[77px]">
      <div class="flex flex-col items-center gap-2">
        <div class="w-[50px] h-[50px] rounded-full flex items-center justify-center font-messiri font-bold text-[17px]" style="background:${s.bg};color:${s.text}">${s.value}</div>
        <span class="font-messiri font-semibold text-[14px] text-[#262626] whitespace-nowrap">${s.label}</span>
      </div>
      ${i < visualOrder.length - 1 ? '<div class="w-px h-[66px] bg-[#DDDDDD]"></div>' : ''}
    </div>
  `).join('');
}

function renderCategoryHeader() {
  const el = document.getElementById('lw-category-header');
  if (!el) return;
  const cat = CATEGORIES[currentCategoryIndex];
  // في فيجما الكتلة دي (الرقم "الجانب N من 8" فوق، وتحتها الأيقونة+الاسم) كلها كتلة
  // واحدة متراصة رأسيًا وملتزقة باليمين - مفيش حاجة تانية جنبها في نفس الصف.
  el.innerHTML = `
    <div class="flex flex-col items-start gap-1.5 md:gap-2 mb-2 md:mb-3">
      <span class="font-messiri font-medium text-[#6f6f6f] text-[12px] md:text-[18px] whitespace-nowrap">الجانب ${currentCategoryIndex + 1} من ${TOTAL_CATEGORIES}</span>
      <div class="flex items-center gap-2.5 md:gap-3">
        <div class="w-[36px] h-[36px] md:w-[54px] md:h-[54px] rounded-full bg-[#EFF3F8] flex items-center justify-center shrink-0">
          <span class="lw-icon-mask w-[15px] h-[15px] md:w-[22px] md:h-[22px] text-brand-primary" style="--icon-url:url('${cat.iconUrl}')"></span>
        </div>
        <h1 class="font-messiri font-bold text-brand-primary text-[17px] md:text-[28px]">${cat.label}</h1>
      </div>
    </div>
    <p class="font-messiri text-[#565656] text-[12.5px] md:text-[17px] leading-relaxed">${cat.description}</p>
  `;
}

function renderProgressRow() {
  const el = document.getElementById('lw-progress-row');
  if (!el) return;
  const answered = answers[currentCategoryIndex].filter((v) => v !== null).length;
  const pct = (answered / QUESTIONS_PER_CATEGORY) * 100;
  // فيجما: الشريط بياخد أغلب العرض على اليمين، والنص الصغير "X/10" في أقصى الشمال.
  // عشان كود فيجما نفسه LTR افتراضيًا، لازم نقلب ترتيب الـ DOM هنا عشان يرجع نفس
  // الشكل بالظبط جوه صفحتنا اللي dir=rtl (أول عنصر في DOM بيتحط أقصى اليمين في RTL).
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
}

function resetStyle(btn) {
  const val = Number(btn.dataset.value);
  const s = scaleFor(val);
  btn.style.background = 'transparent';
  btn.style.borderColor = s.bg;
  btn.style.color = s.text;
}

function renderQuestions() {
  const el = document.getElementById('lw-questions');
  if (!el) return;
  const cat = CATEGORIES[currentCategoryIndex];

  // فيجما: دواير الإجابة على الشمال (4 يمين المجموعة...0 شمالها)، والسؤال على اليمين.
  // بالنسبة لصفحتنا RTL: أول عنصر في DOM بيتحط أقصى اليمين، فلازم نعكس ترتيب كل حاجة
  // كانت متبنية على افتراض LTR الافتراضي في كود فيجما.
  const circleOrder = [...ANSWER_SCALE].reverse();

  el.innerHTML = cat.questions.map((q, qIdx) => `
    <div class="flex flex-col md:flex-row md:items-center gap-3 md:gap-8 py-4 md:py-6" data-q="${qIdx}">
      <div class="flex items-center justify-center md:justify-start gap-1.5 md:gap-3 order-2 shrink-0">
        ${circleOrder.map((s) => `
          <button type="button" class="lw-answer-btn w-[36px] h-[36px] md:w-[50px] md:h-[50px] rounded-full border-2 flex items-center justify-center font-messiri font-bold text-[13px] md:text-[17px] transition-all"
            data-value="${s.value}" style="border-color:${s.bg};color:${s.text};background:transparent">${s.value}</button>
        `).join('')}
      </div>
      <div class="flex items-start md:items-center gap-2 order-1 flex-1 min-w-0">
        <span class="font-messiri font-semibold text-brand-primary text-[14px] md:text-[25px] shrink-0">.${qIdx + 1}</span>
        <p class="font-messiri text-[#262626] text-[13.5px] md:text-[21px] text-right leading-snug">${q}</p>
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
      <button type="button" id="lw-prev-btn" class="flex items-center gap-2 h-[46px] md:h-[60px] px-4 md:px-6 rounded-[15px] border-2 border-brand-primary text-brand-primary font-messiri font-semibold text-[13px] md:text-[21px] hover:bg-brand-primary hover:text-white transition-all cursor-pointer">
        <i class="fa-solid fa-arrow-right text-[12px] md:text-[16px]"></i>
        <span>الجانب السابق</span>
      </button>
    `}
    <button type="button" id="lw-next-btn" class="flex items-center gap-2 h-[46px] md:h-[60px] px-4 md:px-6 rounded-[15px] font-messiri font-semibold text-[13px] md:text-[21px] transition-all ${allAnswered ? 'bg-brand-primary text-white hover:bg-[#102744] shadow-md cursor-pointer' : 'bg-brand-primary/50 text-white/70 cursor-not-allowed'}" ${allAnswered ? '' : 'disabled'}>
      <span>${isLast ? 'إنهاء الاختبار' : 'الجانب التالي'}</span>
      <i class="fa-solid fa-arrow-left text-[12px] md:text-[16px]"></i>
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

function showMilestone() {
  const overlay = document.getElementById('lw-milestone-overlay');
  const text = document.getElementById('lw-milestone-text');
  if (!overlay || !text) return;
  const isLast = currentCategoryIndex === TOTAL_CATEGORIES - 1;

  text.textContent = isLast
    ? 'ممتاز! أنهيت اختبار عجلة الحياة بالكامل — استعد لاكتشاف نتيجتك.'
    : 'ممتاز! أنهيت هذا الجانب بالكامل — كمّل رحلتك واكتشف الجانب التالي.';

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
  }, 2200);
}

function showCompletionScreen() {
  localStorage.setItem('lwAnswers', JSON.stringify(answers));
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
