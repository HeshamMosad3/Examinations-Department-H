// الملف الشخصي: نسبة الاكتمال الحية، معاينة الصورة، وتأكيد حذف البيانات
import { initNavigation } from './navigation.js';

initNavigation();

const form = document.getElementById('profile-form');

if (form) {
  // ----- completion (same rule as the server: required fields that are filled / all required fields) -----
  const ring = form.parentElement.querySelector('[data-completion-ring]');
  const percentEl = document.querySelector('[data-completion-percent]');
  const titleEl = document.querySelector('[data-completion-title]');
  const textEl = document.querySelector('[data-completion-text]');
  const requiredFields = [...form.querySelectorAll('[data-required]')];
  // Read-only fields (the e-mail) are always filled, so they stay in the total on both sides
  const total = requiredFields.length;

  function updateCompletion() {
    const filled = requiredFields.filter((field) => field.value.trim() !== '').length;
    const percent = total === 0 ? 100 : Math.floor((filled / total) * 100);
    const done = filled === total;

    percentEl.textContent = `${percent}%`;
    const circumference = Number(ring.dataset.circumference);
    ring.style.strokeDashoffset = String(circumference * (1 - percent / 100));
    ring.setAttribute('stroke', done ? '#4ade80' : '#e6b844');
    titleEl.textContent = (done ? form.dataset.doneTitle : form.dataset.title).trim();
    textEl.textContent = done ? form.dataset.doneText : form.dataset.remainingText.replace(':count', String(total - filled));
  }

  form.addEventListener('input', updateCompletion);
  form.addEventListener('change', updateCompletion);
  // No initial call: the page already shows the saved percentage; suggested names only count once the user touches the form

  // ----- custom dropdowns (same look and behaviour as the register form: optional search, check mark on the chosen option) -----
  const dropdowns = [...form.querySelectorAll('[data-dropdown]')].map((root) => ({
    root,
    input: root.querySelector('[data-dropdown-input]'),
    button: root.querySelector('[data-dropdown-button]'),
    menu: root.querySelector('[data-dropdown-menu]'),
    text: root.querySelector('[data-dropdown-text]'),
    flag: root.querySelector('[data-dropdown-flag]'),
    search: root.querySelector('[data-dropdown-search]'),
    empty: root.querySelector('[data-dropdown-empty]'),
    options: [...root.querySelectorAll('[data-dropdown-option]')],
  }));

  const visibleOptions = (dd) => dd.options.filter((option) => !option.hidden);

  function toggleDropdown(dd, open, { focus = false } = {}) {
    dd.menu.hidden = !open;
    dd.button.setAttribute('aria-expanded', open ? 'true' : 'false');
    if (!open) return;
    if (dd.search) {
      dd.search.value = '';
      filterOptions(dd, '');
    }
    if (focus) {
      const target = dd.search || dd.options.find((o) => o.getAttribute('aria-selected') === 'true') || visibleOptions(dd)[0];
      setTimeout(() => {
        target?.focus();
        dd.options.find((o) => o.getAttribute('aria-selected') === 'true')?.scrollIntoView({ block: 'nearest' });
      }, 30);
    }
  }

  function filterOptions(dd, query) {
    const q = query.trim().toLowerCase();
    dd.options.forEach((option) => {
      option.hidden = q !== '' && !option.dataset.label.toLowerCase().includes(q);
      option.style.display = option.hidden ? 'none' : '';
    });
    if (dd.empty) dd.empty.hidden = visibleOptions(dd).length > 0;
  }

  function choose(dd, option) {
    dd.input.value = option.dataset.value;
    dd.text.textContent = option.dataset.label;
    dd.text.classList.toggle('is-placeholder', option.dataset.value === '');
    if (dd.flag) {
      dd.flag.hidden = !option.dataset.flag;
      if (option.dataset.flag) dd.flag.src = option.dataset.flag;
    }
    dd.options.forEach((o) => {
      const selected = o === option;
      o.classList.toggle('is-selected', selected);
      o.setAttribute('aria-selected', selected ? 'true' : 'false');
    });
    dd.button.classList.remove('pf-invalid');
    dd.button.removeAttribute('aria-invalid');
    dd.root.querySelector('.pf-error')?.remove();
    toggleDropdown(dd, false);
    dd.button.focus();
    // lets the live completion bar (and anything else listening on the form) know
    dd.input.dispatchEvent(new Event('input', { bubbles: true }));
    dd.input.dispatchEvent(new Event('change', { bubbles: true }));
  }

  dropdowns.forEach((dd) => {
    dd.button.addEventListener('click', (event) => {
      event.stopPropagation();
      const open = dd.menu.hidden;
      dropdowns.filter((other) => other !== dd).forEach((other) => toggleDropdown(other, false));
      toggleDropdown(dd, open, { focus: open });
    });
    dd.button.addEventListener('keydown', (event) => {
      if (['ArrowDown', 'ArrowUp'].includes(event.key) && dd.menu.hidden) {
        event.preventDefault();
        toggleDropdown(dd, true, { focus: true });
      }
    });
    dd.options.forEach((option) => {
      option.addEventListener('click', () => choose(dd, option));
      option.addEventListener('keydown', (event) => {
        const list = visibleOptions(dd);
        const at = list.indexOf(option);
        if (event.key === 'ArrowDown') { event.preventDefault(); list[Math.min(at + 1, list.length - 1)]?.focus(); }
        else if (event.key === 'ArrowUp') { event.preventDefault(); (at === 0 && dd.search ? dd.search : list[Math.max(at - 1, 0)])?.focus(); }
        else if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); choose(dd, option); }
      });
    });
    dd.search?.addEventListener('input', () => filterOptions(dd, dd.search.value));
    dd.search?.addEventListener('keydown', (event) => {
      if (event.key === 'ArrowDown') { event.preventDefault(); visibleOptions(dd)[0]?.focus(); }
      else if (event.key === 'Enter') { event.preventDefault(); const first = visibleOptions(dd)[0]; if (first) choose(dd, first); }
    });
    dd.root.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && !dd.menu.hidden) {
        event.stopPropagation();
        toggleDropdown(dd, false);
        dd.button.focus();
      } else if (event.key === 'Tab' && !dd.menu.hidden) {
        toggleDropdown(dd, false);
      }
    });
  });

  document.addEventListener('click', (event) => {
    dropdowns.forEach((dd) => {
      if (!dd.root.contains(event.target)) toggleDropdown(dd, false);
    });
  });

  // ----- digits-only fields (phone, ID): drop anything that is not a number as the user types -----
  form.querySelectorAll('input[inputmode="numeric"]').forEach((input) => {
    input.addEventListener('input', () => {
      const map = { '٠': '0', '١': '1', '٢': '2', '٣': '3', '٤': '4', '٥': '5', '٦': '6', '٧': '7', '٨': '8', '٩': '9' };
      input.value = input.value.replace(/[٠-٩]/g, (d) => map[d]).replace(/\D+/g, '');
    });
  });

  // ----- photo preview -----
  const photoInput = document.getElementById('photo');
  const preview = document.getElementById('photo-preview');
  const placeholder = document.getElementById('photo-placeholder');
  const removeWrap = document.getElementById('remove-photo-wrap');
  const removeBox = document.getElementById('remove-photo');
  let objectUrl = null;

  photoInput.addEventListener('change', () => {
    const file = photoInput.files[0];
    if (objectUrl) URL.revokeObjectURL(objectUrl);
    if (!file) return;
    objectUrl = URL.createObjectURL(file);
    preview.src = objectUrl;
    preview.classList.remove('hidden');
    placeholder.classList.add('hidden');
    removeBox.checked = false;
  });

  removeBox.addEventListener('change', () => {
    if (removeBox.checked) {
      preview.classList.add('hidden');
      placeholder.classList.remove('hidden');
      photoInput.value = '';
    } else if (preview.getAttribute('src')) {
      preview.classList.remove('hidden');
      placeholder.classList.add('hidden');
    }
  });

  // ----- jump to the first invalid field after a failed save -----
  const firstError = form.querySelector('[aria-invalid="true"]');
  if (firstError) {
    firstError.scrollIntoView({ block: 'center' });
    firstError.focus({ preventScroll: true });
  } else if (document.querySelector('[data-profile-warning]')) {
    const firstEmpty = requiredFields.find((field) => field.value.trim() === '' && !field.disabled);
    firstEmpty?.closest('[data-field]')?.scrollIntoView({ block: 'center', behavior: 'smooth' });
  }

  // ----- delete data confirmation -----
  const dialog = document.getElementById('delete-dialog');
  document.querySelector('[data-open-delete]')?.addEventListener('click', () => dialog.showModal());
  dialog.querySelector('[data-close-delete]').addEventListener('click', () => dialog.close());
  dialog.addEventListener('click', (event) => {
    if (event.target === dialog) dialog.close();
  });
}
