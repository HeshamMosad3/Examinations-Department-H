{{--
    نوافذ التسجيل السريع والدخول السريع (Figma: "إنشاء حساب جديد" 3414:6187 و"تسجيل الدخول" 3414:6154) للزوار بس.
    بتتفتح من أي زر عليه data-auth-gate="<next>" (ابدأ التقييم / عرض التقرير): window.AuthDialogs.open('signup'|'signin', next).
    بعد النجاح بنروح للصفحة اللي كان رايحلها (?next= بيتعالج في AuthController). صفحتا /login و/register الكاملتان زي ما هما.
    المقاسات: موبايل 361px (قياس Figma) ← 460px (≥640) ← 640px بعمودين (≥768) ← 720px (≥1024)؛ الدخول أصغر دايماً.
    التخطيط (الحجم والحقول والتمرير) CSS عادي في الـ <style> تحت عشان يشتغل حتى لو ملف Tailwind المبني قديم؛ الألوان/الخطوط بس من Tailwind.
--}}
@php
    $img = '/images/auth/quick';

    $signup = [
        ['name' => 'name', 'type' => 'text', 'auto' => 'name', 'span' => 'qa-span-2', 'label' => cms('auth.quick.field_name.label', 'الاسم بالكامل (بالعربي)'), 'placeholder' => cms('auth.quick.field_name.placeholder', 'أدخل الاسم بالكامل')],
        ['name' => 'email', 'type' => 'email', 'auto' => 'email', 'label' => cms('auth.field_email.label', 'البريد الإلكتروني'), 'placeholder' => cms('auth.field_email.placeholder', 'user@gmail.com')],
        ['name' => 'phone', 'type' => 'tel', 'auto' => 'tel-national', 'label' => cms('auth.field_phone.label', 'رقم الجوال'), 'placeholder' => cms('auth.quick.field_phone.placeholder', '00000000'), 'prefix' => cms('auth.quick.field_phone.prefix', '+966')],
        ['name' => 'national_id', 'type' => 'tel', 'auto' => 'off', 'label' => cms('auth.field_national_id.label', 'رقم الهوية (الإقامة)'), 'placeholder' => cms('auth.field_national_id.placeholder', 'أدخل رقم الهوية')],
        ['name' => 'national_id_confirmation', 'type' => 'tel', 'auto' => 'off', 'label' => cms('auth.field_national_id.confirm_label', 'تأكيد رقم الهوية (الإقامة)'), 'placeholder' => cms('auth.field_national_id.confirm_placeholder', 'تأكيد رقم الهوية')],
        ['name' => 'password', 'type' => 'password', 'auto' => 'new-password', 'label' => cms('auth.field_password.label', 'كلمة المرور'), 'placeholder' => '********'],
        ['name' => 'password_confirmation', 'type' => 'password', 'auto' => 'new-password', 'label' => cms('auth.field_password.confirm_label', 'تأكيد كلمة المرور'), 'placeholder' => '********'],
    ];

    $signin = [
        ['name' => 'email', 'type' => 'email', 'auto' => 'email', 'label' => cms('auth.field_email.label', 'البريد الإلكتروني'), 'placeholder' => cms('auth.field_email.placeholder', 'user@gmail.com')],
        ['name' => 'password', 'type' => 'password', 'auto' => 'current-password', 'label' => cms('auth.field_password.label', 'كلمة المرور'), 'placeholder' => '********'],
    ];

    $genericError = cms('auth.quick.generic_error', 'حدث خطأ، يرجى المحاولة مرة أخرى.');
    $rememberLabel = cms('auth.register.remember', 'تذكرني');
@endphp

<style>
  .qa-overlay, .qa-overlay *, .qa-overlay *::before, .qa-overlay *::after { box-sizing: border-box; }

  /* ===== Overlay + panel ===== */
  .qa-overlay { position: fixed; inset: 0; z-index: 60; display: flex; align-items: center; justify-content: center; padding: 12px; font-family: 'El Messiri', 'Cairo', sans-serif; opacity: 0; pointer-events: none; transition: opacity .3s; }
  .qa-overlay.is-open { opacity: 1; pointer-events: auto; }
  .qa-backdrop { position: absolute; inset: 0; background: rgba(0, 0, 0, .6); -webkit-backdrop-filter: blur(4px); backdrop-filter: blur(4px); }
  .qa-panel { position: relative; width: 100%; max-width: 361px; background: #fff; border-radius: 15px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, .25); overflow: hidden; transform: scale(.95); transition: transform .3s, max-width .3s; }
  .qa-overlay.is-open .qa-panel { transform: scale(1); }
  /* الحاوية بتقص الزوايا، والتمرير جوّاها عشان الشريط ما يتقصش عند الحواف المدوّرة */
  .qa-scroll { max-height: calc(100vh - 24px); max-height: calc(100dvh - 24px); overflow-y: auto; overscroll-behavior: contain; padding: 25px 16px; }
  @media (min-width: 640px) {
    .qa-overlay { padding: 24px; }
    .qa-panel { max-width: 460px; border-radius: 20px; }
    .qa-scroll { max-height: calc(100vh - 48px); max-height: calc(100dvh - 48px); padding: 32px; }
  }
  @media (min-width: 768px) {
    .qa-panel[data-size="signup"] { max-width: 640px; }
    .qa-panel[data-size="signin"] { max-width: 480px; }
  }
  @media (min-width: 1024px) {
    .qa-panel[data-size="signup"] { max-width: 720px; }
    .qa-scroll { padding: 36px 40px; }
  }

  /* شريط التمرير بألوان الموقع (الأزرق الأساسي #204A7A على خلفية فاتحة) */
  .qa-scroll { scrollbar-width: thin; scrollbar-color: #204A7A #EAF4FC; }
  .qa-scroll::-webkit-scrollbar { width: 8px; }
  .qa-scroll::-webkit-scrollbar-track { background: #EAF4FC; border-radius: 9999px; margin-block: 18px; }
  .qa-scroll::-webkit-scrollbar-thumb { background: #204A7A; border-radius: 9999px; border: 2px solid #EAF4FC; }
  .qa-scroll::-webkit-scrollbar-thumb:hover { background: #163558; }

  /* ===== Layout ===== */
  .qa-stack { display: flex; flex-direction: column; gap: 14px; align-items: stretch; }
  .qa-close { align-self: flex-start; width: 24px; height: 24px; flex-shrink: 0; cursor: pointer; border-radius: 4px; background: none; border: 0; padding: 0; }
  .qa-close img { display: block; width: 100%; height: 100%; }
  .qa-close:focus-visible, .qa-eye:focus-visible { outline: 2px solid #204A7A; outline-offset: 2px; }
  .qa-section { display: flex; flex-direction: column; align-items: center; gap: 32px; }
  .qa-section[hidden] { display: none; }
  .qa-head { display: flex; flex-direction: column; align-items: center; gap: 17px; }
  .qa-badge { display: flex; align-items: center; justify-content: center; width: 64px; height: 64px; border-radius: 9999px; background: #EAF4FC; }
  .qa-badge img { display: block; width: 28px; height: 28px; }
  .qa-form { width: 100%; display: flex; flex-direction: column; gap: 24px; }
  .qa-fields { display: flex; flex-direction: column; gap: 16px; }
  .qa-grid { display: grid; grid-template-columns: minmax(0, 1fr); gap: 20px 16px; }
  .qa-column { display: flex; flex-direction: column; gap: 20px; }
  .qa-row { display: flex; align-items: center; justify-content: space-between; gap: 16px; }
  @media (min-width: 640px) {
    .qa-badge { width: 72px; height: 72px; }
    .qa-badge img { width: 32px; height: 32px; }
  }
  @media (min-width: 768px) {
    .qa-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .qa-span-2 { grid-column: 1 / -1; }
    .qa-panel[data-size="signup"] .qa-submit { max-width: 320px; margin-inline: auto; }
  }
  @media (min-width: 1024px) { .qa-grid { column-gap: 24px; } }

  /* ===== Fields ===== */
  .qa-group { display: flex; flex-direction: column; gap: 10px; min-width: 0; }
  .qa-label { display: flex; align-items: flex-start; gap: 4px; font-weight: 500; font-size: 14px; line-height: 20px; color: #262626; }
  .qa-label img { display: block; width: 10px; height: 10px; }
  .qa-input-wrap { display: flex; align-items: center; height: 56px; width: 100%; overflow: hidden; background: #fff; border: 1px solid #DADADA; border-radius: 10px; padding: 12px 16px; transition: border-color .2s, background-color .2s, box-shadow .2s; }
  .qa-input-wrap.has-prefix { padding: 0; }
  .qa-input-wrap:focus-within { border-color: #4585CF; background: #F6F6F6; box-shadow: 0 0 0 4px rgba(69, 133, 207, .12); }
  .qa-input-wrap.is-error { border-color: #E53935; background: #FFF5F5; }
  .qa-input-wrap.is-error:focus-within { box-shadow: 0 0 0 4px rgba(229, 57, 53, .12); }
  .qa-input { min-width: 0; flex: 1 1 auto; height: 100%; background: transparent; border: 0; outline: 0; box-shadow: none; padding: 0; text-align: right; font: inherit; font-weight: 400; font-size: 14px; color: #262626; }
  .qa-input:focus { outline: 0; box-shadow: none; }
  .qa-input::placeholder { color: #949494; opacity: 1; }
  .qa-input-wrap.has-prefix .qa-input { padding: 0 16px; }
  .qa-prefix { display: flex; align-items: center; justify-content: center; gap: 8px; height: 100%; width: 96px; flex-shrink: 0; padding: 0 16px; background: rgba(182, 182, 182, .1); border-left: 1px solid #DDDDDD; user-select: none; }
  .qa-prefix span { font-weight: 600; font-size: 14px; color: #262626; white-space: nowrap; unicode-bidi: isolate; }
  .qa-prefix img { display: block; width: 28px; height: 28px; }
  .qa-eye { flex-shrink: 0; width: 20px; height: 20px; padding: 0; background: none; border: 0; cursor: pointer; display: flex; align-items: center; justify-content: center; border-radius: 4px; }
  .qa-eye img { display: block; width: 20px; height: 20px; }
  .qa-eye i { font-size: 18px; line-height: 20px; color: #949494; }
  .qa-eye [hidden] { display: none; }
  .qa-error { font-size: 13px; font-weight: 500; color: #E53935; margin: 0; }
  .qa-error[hidden], .qa-form-error[hidden] { display: none; }
  .qa-form-error { font-size: 13px; font-weight: 500; color: #E53935; text-align: center; margin: 0; }
  .qa-check { display: flex; align-items: center; gap: 10px; width: fit-content; cursor: pointer; user-select: none; }
  .qa-check input { width: 17px; height: 17px; margin: 0; accent-color: #204A7A; cursor: pointer; }
  .qa-check span { font-weight: 500; font-size: 14px; color: #565656; }
  .qa-link-btn { background: none; border: 0; padding: 0; cursor: pointer; font: inherit; font-weight: 600; color: #204A7A; border-bottom: .7px solid #204A7A; }
  .qa-link { font-weight: 600; font-size: 14px; color: #204A7A; text-decoration: none; }
  .qa-link:hover { text-decoration: underline; }
  .qa-switch { display: flex; align-items: center; justify-content: center; gap: 4px; font-size: 14px; line-height: 1.2; margin: 0; }
  .qa-switch span { font-weight: 400; color: #515151; }
  .qa-title { margin: 0; font-weight: 700; font-size: 17px; text-align: center; color: #1B436C; }
  .qa-submit { width: 100%; display: flex; align-items: center; justify-content: center; padding: 12px 24px; border: 0; border-radius: 10px; background: #204A7A; color: #F6F6F6; font: inherit; font-weight: 600; font-size: 14px; line-height: 1.5; cursor: pointer; transition: background-color .2s; }
  .qa-submit:hover { background: #163558; }
  .qa-submit:focus-visible { outline: 2px solid #204A7A; outline-offset: 2px; }
  .qa-submit:disabled { opacity: .7; cursor: not-allowed; }
  @media (min-width: 640px) {
    .qa-title { font-size: 20px; }
    .qa-label, .qa-input, .qa-check span, .qa-link, .qa-switch { font-size: 15px; }
    .qa-submit { font-size: 16px; }
  }
  @media (min-width: 1024px) { .qa-title { font-size: 22px; } }
  @media (prefers-reduced-motion: reduce) { .qa-overlay, .qa-panel, .qa-input-wrap { transition: none; } }
</style>

<div id="authDialog" class="qa-overlay" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="qa-title-signup">
  <div id="authDialogBackdrop" class="qa-backdrop" aria-hidden="true"></div>

  <div id="authDialogPanel" class="qa-panel" data-size="signup">
    <div class="qa-scroll">
      <div class="qa-stack">
        <button type="button" data-ad-close class="qa-close" aria-label="{{ cms('auth.quick.close', 'إغلاق النافذة') }}">
          <img src="{{ $img }}/close.svg" alt="" />
        </button>

        {{-- ===== التسجيل السريع ===== --}}
        <section data-ad-panel="signup" class="qa-section">
          <div class="qa-head">
            <div class="qa-badge"><img src="{{ $img }}/lock.svg" alt="" /></div>
            <h2 id="qa-title-signup" class="qa-title">{{ cms('auth.quick.title', 'إنشاء حساب جديد للوصول إلى تقريرك') }}</h2>
          </div>

          <form data-ad-form action="{{ route('quick-signup.post') }}" method="POST" novalidate class="qa-form">
            @csrf
            <input type="hidden" name="next" value="" data-ad-next>
            <div class="qa-fields">
              <div class="qa-grid">
                @foreach ($signup as $f)
                  @include('website.partials.auth-dialog-field', ['form' => 'su', 'f' => $f])
                @endforeach
              </div>
              <label class="qa-check">
                <input type="checkbox" name="remember" value="1" />
                <span>{{ $rememberLabel }}</span>
              </label>
            </div>

            <p data-ad-form-error role="alert" class="qa-form-error" hidden></p>

            <button type="submit" data-ad-submit class="qa-submit">{{ cms('auth.register.submit', 'إنشاء حساب جديد') }}</button>
          </form>

          <p class="qa-switch">
            <span>{{ cms('auth.register.have_account', 'هل لديك حساب؟') }}</span>
            <button type="button" data-ad-switch="signin" class="qa-link-btn">{{ cms('auth.register.login_link', 'تسجيل دخول') }}</button>
          </p>
        </section>

        {{-- ===== الدخول السريع ===== --}}
        <section data-ad-panel="signin" class="qa-section" hidden>
          <div class="qa-head">
            <div class="qa-badge"><img src="{{ $img }}/lock.svg" alt="" /></div>
            <h2 id="qa-title-signin" class="qa-title">{{ cms('auth.quick.signin_title', 'سجّل الدخول للوصول إلى تقريرك') }}</h2>
          </div>

          <form data-ad-form action="{{ route('quick-login.post') }}" method="POST" novalidate class="qa-form">
            @csrf
            <input type="hidden" name="next" value="" data-ad-next>
            <div class="qa-fields">
              <div class="qa-column">
                @foreach ($signin as $f)
                  @include('website.partials.auth-dialog-field', ['form' => 'si', 'f' => $f])
                @endforeach
              </div>
              <div class="qa-row">
                <label class="qa-check">
                  <input type="checkbox" name="remember" value="1" />
                  <span>{{ $rememberLabel }}</span>
                </label>
                <a href="{{ route('password.request') }}" class="qa-link">{{ cms('auth.login.forgot_password', 'هل نسيت كلمة المرور؟') }}</a>
              </div>
            </div>

            <p data-ad-form-error role="alert" class="qa-form-error" hidden></p>

            <button type="submit" data-ad-submit class="qa-submit">{{ cms('auth.login.submit', 'تسجيل دخول') }}</button>
          </form>

          <p class="qa-switch">
            <span>{{ cms('auth.login.no_account', 'ليس لديك حساب؟') }}</span>
            <button type="button" data-ad-switch="signup" class="qa-link-btn">{{ cms('auth.login.register_link', 'إنشاء حساب جديد') }}</button>
          </p>
        </section>
      </div>
    </div>
  </div>
</div>

<script>
  (() => {
    const dialog = document.getElementById('authDialog');
    const panel = document.getElementById('authDialogPanel');
    const scroller = panel.querySelector('.qa-scroll');
    const sections = [...dialog.querySelectorAll('[data-ad-panel]')];
    const genericError = @json($genericError);
    const confirmedTemplate = @json(cms('auth.validation.confirmed', 'تأكيد :attribute غير متطابق.'));
    let next = '';
    let trigger = null;

    const isOpen = () => dialog.classList.contains('is-open');
    const focusable = () => [...dialog.querySelectorAll('a[href], button, input, select, textarea, [tabindex]:not([tabindex="-1"])')]
      .filter((el) => !el.disabled && el.offsetParent !== null);

    function show(which) {
      panel.dataset.size = which;
      sections.forEach((s) => { s.hidden = s.dataset.adPanel !== which; });
      dialog.setAttribute('aria-labelledby', `qa-title-${which}`);
      dialog.querySelectorAll('[data-ad-next]').forEach((i) => { i.value = next; });
      scroller.scrollTop = 0;
    }

    function open(which = 'signup', nextValue = '') {
      if (!isOpen()) trigger = document.activeElement;
      next = nextValue || next;
      show(which);
      dialog.classList.add('is-open');
      dialog.setAttribute('aria-hidden', 'false');
      document.documentElement.style.overflow = 'hidden';
      setTimeout(() => dialog.querySelector(`[data-ad-panel="${which}"] input:not([type=hidden])`)?.focus(), 60);
    }

    function close() {
      dialog.classList.remove('is-open');
      dialog.setAttribute('aria-hidden', 'true');
      document.documentElement.style.overflow = '';
      if (trigger && typeof trigger.focus === 'function') trigger.focus();
    }

    window.AuthDialogs = { open, close };

    dialog.querySelectorAll('[data-ad-close]').forEach((b) => b.addEventListener('click', close));
    document.getElementById('authDialogBackdrop').addEventListener('click', close);
    dialog.querySelectorAll('[data-ad-switch]').forEach((b) => b.addEventListener('click', () => {
      show(b.dataset.adSwitch);
      dialog.querySelector(`[data-ad-panel="${b.dataset.adSwitch}"] input:not([type=hidden])`)?.focus();
    }));

    document.addEventListener('keydown', (e) => {
      if (!isOpen()) return;
      if (e.key === 'Escape') return close();
      if (e.key === 'Tab') { // keep focus inside the dialog
        const items = focusable();
        if (!items.length) return;
        const first = items[0], last = items[items.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
      }
    });

    // "Start assessment" / "view report" buttons for guests carry data-auth-gate="<where to go afterwards>"
    document.addEventListener('click', (e) => {
      const gate = e.target.closest('[data-auth-gate]');
      if (!gate || e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
      e.preventDefault();
      open('signup', gate.dataset.authGate);
    });

    // ----- forms -----
    dialog.querySelectorAll('[data-ad-form]').forEach((form) => {
      const submitBtn = form.querySelector('[data-ad-submit]');
      const formError = form.querySelector('[data-ad-form-error]');

      function setError(name, message) {
        const box = form.querySelector(`[data-ad-error="${name}"]`);
        const wrapper = form.querySelector(`[data-ad-group="${name}"] [data-ad-wrapper]`);
        if (!box) return;
        box.textContent = message;
        box.hidden = !message;
        wrapper?.classList.toggle('is-error', !!message);
      }
      const clearErrors = () => {
        form.querySelectorAll('[data-ad-error]').forEach((b) => setError(b.dataset.adError, ''));
        formError.hidden = true;
      };
      const focusFirstError = () => form.querySelector('[data-ad-error]:not([hidden])')?.closest('[data-ad-group]')?.querySelector('input')?.focus();

      form.querySelectorAll('[data-ad-toggle]').forEach((btn) => btn.addEventListener('click', () => {
        const input = btn.closest('[data-ad-wrapper]').querySelector('input');
        const reveal = input.type === 'password';
        input.type = reveal ? 'text' : 'password';
        btn.querySelector('[data-ad-eye-closed]').hidden = reveal;
        btn.querySelector('[data-ad-eye-open]').hidden = !reveal;
      }));

      form.addEventListener('input', (e) => { if (e.target.name) setError(e.target.name, ''); });

      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearErrors();

        // Confirmation fields must match before we bother the server
        const mismatch = ['national_id', 'password'].filter((n) => form.elements[`${n}_confirmation`] && form.elements[n].value !== form.elements[`${n}_confirmation`].value);
        mismatch.forEach((n) => setError(`${n}_confirmation`, confirmedTemplate.replace(':attribute', form.querySelector(`label[for$="-${n}"]`).textContent.trim())));
        if (mismatch.length) return focusFirstError();

        submitBtn.disabled = true;
        try {
          const res = await fetch(form.action, {
            method: 'POST',
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
            body: new FormData(form),
            credentials: 'same-origin',
          });
          const data = await res.json().catch(() => ({}));

          if (res.ok && data.redirect) {
            // Same page (e.g. "/#challenge") needs an explicit reload: only the hash changes otherwise
            const target = new URL(data.redirect, window.location.href);
            const samePage = target.pathname === window.location.pathname && target.search === window.location.search;
            window.location.href = target.href;
            if (samePage) window.location.reload();
            return; // keep the button disabled while we navigate
          }

          if (res.status === 422 && data.errors) {
            Object.entries(data.errors).forEach(([name, messages]) => setError(name, messages[0]));
            focusFirstError();
          } else {
            formError.textContent = res.status === 419 ? genericError : (data.message || genericError);
            formError.hidden = false;
          }
        } catch (err) {
          formError.textContent = genericError;
          formError.hidden = false;
        }
        submitBtn.disabled = false;
      });
    });
  })();
</script>
