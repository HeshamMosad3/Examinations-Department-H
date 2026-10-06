/**
 * لوحة إدارة دار الرؤى: سلوك مشترك من غير jQuery.
 *  - [data-confirm]: تأكيد قبل إرسال الفورم.
 *  - [data-fill]: زرار بيفتح مودال ويملا فورمه من JSON (action + قيم الحقول).
 *  - [data-options]: محرر اختيارات الإجابة (إضافة / حذف صف).
 *  - [data-sortable-url]: ترتيب العناصر بالسحب وحفظه.
 */
(function () {
  const csrf = document.querySelector('meta[name="csrf-token"]')?.content;

  // تأكيد قبل الحذف وأي عملية مهمة
  document.addEventListener('submit', (e) => {
    const message = e.target.getAttribute('data-confirm');
    if (message && !window.confirm(message)) e.preventDefault();
  });

  // ---------- محرر الاختيارات ----------
  function optionRow(label = '', score = '') {
    const row = document.createElement('div');
    row.className = 'input-group input-group-sm mb-2';
    row.dataset.optionRow = '';
    row.innerHTML = `
      <input type="text" class="form-control" data-label placeholder="نص الاختيار" required>
      <input type="number" class="form-control" style="max-width:6.5rem" data-score placeholder="الدرجة" required>
      <button type="button" class="btn btn-outline-danger" data-remove-option aria-label="حذف الاختيار"><i class="bi bi-x-lg"></i></button>`;
    row.querySelector('[data-label]').value = label;
    row.querySelector('[data-score]').value = score;
    return row;
  }

  function renumber(editor) {
    editor.querySelectorAll('[data-option-row]').forEach((row, i) => {
      row.querySelector('[data-label]').name = `options[${i}][label_ar]`;
      row.querySelector('[data-score]').name = `options[${i}][score_value]`;
    });
  }

  function setOptions(editor, options) {
    const list = editor.querySelector('[data-options-list]');
    list.innerHTML = '';
    (options.length ? options : [{}, {}]).forEach((o) => list.appendChild(optionRow(o.label_ar ?? '', o.score_value ?? '')));
    renumber(editor);
  }

  document.addEventListener('click', (e) => {
    const add = e.target.closest('[data-add-option]');
    if (add) {
      const editor = add.closest('[data-options]');
      editor.querySelector('[data-options-list]').appendChild(optionRow());
      renumber(editor);
    }
    const remove = e.target.closest('[data-remove-option]');
    if (remove) {
      const editor = remove.closest('[data-options]');
      remove.closest('[data-option-row]').remove();
      renumber(editor);
    }
    const preset = e.target.closest('[data-options-preset]');
    if (preset) {
      setOptions(preset.closest('[data-options]'), JSON.parse(preset.dataset.optionsPreset));
    }
  });

  // ---------- فتح مودال وملء الفورم ----------
  document.addEventListener('click', (e) => {
    const trigger = e.target.closest('[data-fill]');
    if (!trigger) return;
    const modal = document.querySelector(trigger.dataset.bsTarget);
    const form = modal.querySelector('form');
    const data = JSON.parse(trigger.dataset.fill);

    form.reset();
    form.action = data.action;
    const method = form.querySelector('input[name="_method"]');
    if (method) method.value = data.method || 'POST';
    modal.querySelectorAll('[data-title]').forEach((el) => { el.textContent = data.title || el.dataset.title; });

    Object.entries(data.values || {}).forEach(([name, value]) => {
      const field = form.elements.namedItem(name);
      if (!field) return;
      if (field.type === 'checkbox') field.checked = !!value;
      else field.value = value ?? '';
    });
    const editor = form.querySelector('[data-options]');
    if (editor) setOptions(editor, data.options || []);
  });

  // ---------- ترتيب بالسحب ----------
  document.querySelectorAll('[data-sortable-url]').forEach((list) => {
    if (!window.Sortable) return;
    window.Sortable.create(list, {
      handle: '.drag-handle',
      animation: 150,
      onEnd: () => {
        const ids = [...list.querySelectorAll('[data-id]')].map((el) => el.dataset.id);
        list.querySelectorAll('[data-number]').forEach((el, i) => { el.textContent = i + 1; });
        fetch(list.dataset.sortableUrl, {
          method: 'PATCH',
          headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf, Accept: 'application/json' },
          body: JSON.stringify({ ids }),
        }).then((r) => { if (!r.ok) window.alert('حصل خطأ في حفظ الترتيب، حدّث الصفحة وحاول تاني.'); });
      },
    });
  });

  // ---------- فتح التبويب من الرابط (?tab=) أو من زرار [data-open-tab] ----------
  function openTab(tab, scroll) {
    const button = document.querySelector(`[data-bs-target="#tab-${tab}"]`);
    if (!button || !window.bootstrap) return;
    window.bootstrap.Tab.getOrCreateInstance(button).show();
    if (scroll) button.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  const tab = new URLSearchParams(location.search).get('tab');
  if (tab) openTab(tab, false);
  document.addEventListener('click', (e) => {
    const trigger = e.target.closest('[data-open-tab]');
    if (trigger) openTab(trigger.dataset.openTab, true);
  });
})();
