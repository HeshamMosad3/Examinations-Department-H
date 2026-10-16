// اختبار مفاتيح الشخصية السبعة: مفتاح في كل خطوة، والإجابات محفوظة في المتصفح لحد ما تتبعت في آخر مفتاح
import { initNavigation } from './navigation.js';

initNavigation();

const app = document.getElementById('pk-app');

if (app) {
  const total = Number(app.dataset.total);
  const storageKey = `pk:${app.dataset.user}`;
  const sections = [...app.querySelectorAll('[data-pk-key]')];
  const steps = [...app.querySelectorAll('[data-pk-step]')];
  const bar = document.getElementById('pk-bar');
  const back = document.getElementById('pk-back');
  const prevBtn = document.getElementById('pk-prev');
  const nextBtn = document.getElementById('pk-next');
  const nextLabel = document.getElementById('pk-next-label');
  const errorBox = document.getElementById('pk-error');
  const top = document.getElementById('pk-top');

  let index = 0;
  let submitting = false;

  // ----- storage -----
  const load = () => {
    try { return JSON.parse(localStorage.getItem(storageKey)) || {}; } catch { return {}; }
  };
  const save = () => {
    const answers = {};
    app.querySelectorAll('[data-pk-choice]:checked').forEach((input) => {
      answers[input.name.slice(1)] = input.value;
    });
    try { localStorage.setItem(storageKey, JSON.stringify({ answers, index })); } catch { /* private mode */ }
    return answers;
  };

  // ----- helpers -----
  const questionsOf = (section) => [...section.querySelectorAll('[data-pk-question]')];
  const answeredIn = (section) => questionsOf(section).filter((q) => q.querySelector('[data-pk-choice]:checked')).length;
  const isComplete = (section) => answeredIn(section) === questionsOf(section).length;

  function updateProgress(section) {
    const count = questionsOf(section).length;
    const answered = answeredIn(section);
    section.querySelector('[data-pk-count]').textContent = `${answered}/${count}`;
    section.querySelector('[data-pk-fill]').style.width = `${(answered / count) * 100}%`;
    section.querySelector('[role="progressbar"]').setAttribute('aria-valuenow', String(answered));
  }

  function render({ scroll = false } = {}) {
    // classes (not the hidden attribute): these elements also carry flex utilities that would override it
    sections.forEach((section, i) => {
      section.classList.toggle('hidden', i !== index);
      section.style.display = i === index ? '' : 'none'; // also inline, so a stale CSS build can never show two keys at once
    });
    // The reminder + answer legend belong to the very first screen only
    app.querySelectorAll('[data-pk-intro]').forEach((intro) => {
      intro.style.display = index === 0 ? '' : 'none';
    });

    steps.forEach((step, i) => {
      const on = i <= index;
      step.style.cursor = on ? 'pointer' : 'default';
      // المحور اللي اتجاوب كله بياخد شكل «مكتمل» (أيقونة ممتلئة)، وغير كده المفتاح الحالي والسابق عليه بالشكل المفعّل
      const done = isComplete(sections[i]);
      step.querySelector('[data-icon-done]').hidden = !done;
      step.querySelector('[data-icon-on]').hidden = !on || done;
      step.querySelector('[data-icon-off]').hidden = on || done;
      const label = step.querySelector('[data-pk-step-label]');
      const lit = on || done;
      label.classList.toggle('text-[#204a7a]', lit);
      label.classList.toggle('font-bold', lit);
      label.classList.toggle('text-[#565656]', !lit);
      if (i === index) step.setAttribute('aria-current', 'step'); else step.removeAttribute('aria-current');
    });
    requestAnimationFrame(updateStepperLine);

    back.classList.toggle('hidden', index !== 0);
    prevBtn.classList.toggle('hidden', index === 0);

    const last = index === total - 1;
    nextLabel.textContent = last ? app.dataset.finalLabel : app.dataset.nextLabel;
    nextBtn.disabled = submitting || !isComplete(sections[index]);

    errorBox.classList.add('hidden');
    updateProgress(sections[index]);
    if (scroll) top.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  function updateStepperLine() {
    const stepper = document.getElementById('pk-stepper');
    const baseLine = document.getElementById('pk-base-line');
    if (!stepper || !baseLine || !bar || steps.length < 2) return;

    const containerRect = stepper.getBoundingClientRect();
    const firstCircle = steps[0].querySelector('[data-pk-step-icon]');
    const lastCircle = steps[steps.length - 1].querySelector('[data-pk-step-icon]');
    const activeCircle = steps[index].querySelector('[data-pk-step-icon]');

    if (firstCircle && lastCircle && activeCircle) {
      const firstRect = firstCircle.getBoundingClientRect();
      const lastRect = lastCircle.getBoundingClientRect();
      const activeRect = activeCircle.getBoundingClientRect();

      const firstCenter = firstRect.left + firstRect.width / 2;
      const lastCenter = lastRect.left + lastRect.width / 2;
      const activeCenter = activeRect.left + activeRect.width / 2;

      const centerY = (firstRect.top + firstRect.height / 2) - containerRect.top;

      baseLine.style.top = `${centerY}px`;
      baseLine.style.transform = 'translateY(-50%)';

      const rightOffset = Math.max(0, containerRect.right - firstCenter);
      const leftOffset = Math.max(0, lastCenter - containerRect.left);

      baseLine.style.right = `${rightOffset}px`;
      baseLine.style.left = `${leftOffset}px`;

      const activeWidth = Math.max(0, firstCenter - activeCenter);
      bar.style.width = `${activeWidth}px`;
    }
  }

  window.addEventListener('resize', updateStepperLine);

  // ----- restore -----
  const stored = load();
  Object.entries(stored.answers || {}).forEach(([questionId, optionId]) => {
    const input = app.querySelector(`input[name="q${questionId}"][value="${optionId}"]`);
    if (input) input.checked = true;
  });
  sections.forEach(updateProgress);

  // Resume at the saved key, but never past the first key that still has unanswered questions
  const firstOpen = sections.findIndex((section) => !isComplete(section));
  const wanted = Math.min(Number(stored.index) || 0, total - 1);
  index = firstOpen === -1 ? wanted : Math.min(wanted, firstOpen);
  render();

  // ----- events -----
  steps.forEach((step, i) => {
    step.addEventListener('click', () => {
      if (i <= index) {
        index = i;
        save();
        render({ scroll: true });
      }
    });
  });

  app.addEventListener('change', (event) => {
    if (!event.target.matches('[data-pk-choice]')) return;
    save();
    render(); // بيحدّث التقدم والزرار وشكل خطوات المفاتيح (المحور المكتمل بياخد الأيقونة الممتلئة)
  });

  prevBtn.addEventListener('click', () => {
    if (index === 0) return;
    index -= 1;
    save();
    render({ scroll: true });
  });

  nextBtn.addEventListener('click', async () => {
    if (nextBtn.disabled) return;

    if (index < total - 1) {
      index += 1;
      save();
      render({ scroll: true });
      return;
    }

    // Last key: send everything
    submitting = true;
    nextBtn.disabled = true;
    errorBox.classList.add('hidden');

    try {
      const response = await fetch(app.dataset.storeUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'X-Requested-With': 'XMLHttpRequest',
        },
        credentials: 'same-origin',
        body: JSON.stringify({ answers: save() }),
      });
      const data = await response.json().catch(() => ({}));

      if (response.ok && data.redirect) {
        try { localStorage.removeItem(storageKey); } catch { /* ignore */ }
        window.location.href = data.redirect;
        return;
      }
      throw new Error(data.message || 'failed');
    } catch (error) {
      errorBox.textContent = app.dataset.error;
      errorBox.classList.remove('hidden');
      submitting = false;
      nextBtn.disabled = !isComplete(sections[index]);
    }
  });
}
