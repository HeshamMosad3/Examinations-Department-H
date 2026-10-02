// محرك اختبار أنماط الإدراك - سؤال واحد في كل مرة (نعم / إلى حد ما / لا)
import { initNavigation } from './navigation.js';

initNavigation();

const QUESTIONS = window.PERCEPTUAL_QUESTIONS || [];
const TOTAL = QUESTIONS.length;

let current = 0;
const answers = Array(TOTAL).fill(null);

const el = (id) => document.getElementById(id);

const BTN_BASE = 'h-[45px] md:h-[60px] w-[151px] md:w-[255px] px-[24px] py-[12px] rounded-[10px] md:rounded-[15px] flex items-center justify-center gap-[8px] font-semibold text-[17px] md:text-[21px] leading-normal md:leading-[1.5] whitespace-nowrap transition-colors duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary focus-visible:ring-offset-2';

function renderProgress() {
  const done = Math.min(current + 1, TOTAL);
  el('pt-progress-text').textContent = `${done}/${TOTAL}`;
  el('pt-progress-fill').style.width = `${(done / TOTAL) * 100}%`;
  const bar = el('pt-progress-bar');
  bar.setAttribute('aria-valuemax', TOTAL);
  bar.setAttribute('aria-valuenow', done);
}

function renderOption(option, index) {
  const selected = answers[current] === index;
  const stateClass = selected
    ? 'bg-[#eff6ff] md:bg-white border-[#4c7cb2] border-t-[0.5px] border-l-[0.5px] border-r-4 border-b-4 shadow-[0px_0px_3.5px_0px_rgba(202,218,237,0.5)]'
    : 'bg-white border-[0.6px] border-[#c1c1c1] hover:border-[#4c7cb2]';
  return `
    <button type="button" role="radio" aria-checked="${selected}" data-index="${index}"
      class="pt-option w-full h-[73.2px] md:h-[97px] px-[17px] rounded-[15px] flex items-center justify-start gap-[12px] md:gap-[14px] text-right transition-colors duration-150 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary ${stateClass}">
      <img src="/landing/images/perceptual-test/${selected ? 'radio-checked' : 'radio-empty'}.svg" alt="" width="30" height="30" class="size-[20px] md:size-[30px] shrink-0" />
      <span class="text-[17px] md:text-[30px] ${selected ? 'font-semibold md:font-medium' : 'font-medium'} text-black leading-[1.5] md:leading-normal">${option.label}</span>
    </button>`;
}

function renderNav() {
  const isLast = current === TOTAL - 1;
  const answered = answers[current] !== null;
  const nextClass = answered
    ? 'bg-brand-primary text-white hover:bg-[#102744] cursor-pointer'
    : 'bg-[rgba(32,74,122,0.5)] text-[rgba(246,246,246,0.7)] cursor-not-allowed';

  const prev = current > 0
    ? `<button type="button" id="pt-prev" class="${BTN_BASE} border border-[#204a7a] text-[#204a7a] bg-transparent hover:bg-[#e9edf2] cursor-pointer">
        <i class="fa-solid fa-arrow-right text-[14px] md:text-[18px]" aria-hidden="true"></i>
        <span>السؤال السابق</span>
      </button>`
    : '<span aria-hidden="true"></span>';

  el('pt-nav').innerHTML = `
    ${prev}
    <button type="button" id="pt-next" ${answered ? '' : 'disabled aria-disabled="true"'} class="${BTN_BASE} ${nextClass}">
      <span>${isLast ? 'عرض النتيجة' : 'السؤال التالي'}</span>
      <i class="fa-solid fa-arrow-left text-[14px] md:text-[18px]" aria-hidden="true"></i>
    </button>`;

  el('pt-prev')?.addEventListener('click', () => goTo(current - 1));
  el('pt-next').addEventListener('click', () => {
    if (answers[current] === null) return;
    if (isLast) showResult();
    else goTo(current + 1);
  });
}

function renderQuestion() {
  const q = QUESTIONS[current];
  el('pt-question-number').textContent = `${current + 1}.`;
  el('pt-question-number').setAttribute('dir', 'ltr');
  el('pt-question-text').textContent = q.text;
  el('pt-options').innerHTML = q.options.map(renderOption).join('');
  el('pt-options').querySelectorAll('.pt-option').forEach((btn) => {
    btn.addEventListener('click', () => {
      answers[current] = Number(btn.dataset.index);
      renderQuestion();
      el('pt-options').querySelector(`[data-index="${btn.dataset.index}"]`)?.focus();
    });
  });
  renderProgress();
  renderNav();
}

function goTo(index) {
  current = Math.max(0, Math.min(TOTAL - 1, index));
  renderQuestion();
  el('pt-progress-text').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

// السيرفر بيحسب الدرجات من score_value في قاعدة البيانات، إحنا بنبعت ترتيب الإجابة المختارة لكل سؤال
function showResult() {
  const params = new URLSearchParams({ answers: answers.join(',') });
  window.location.href = `${window.PERCEPTUAL_RESULT_URL}?${params}`;
}

if (TOTAL > 0) renderQuestion();
