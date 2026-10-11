{{--
    نوافذ التسجيل السريع والدخول السريع (Figma: "إنشاء حساب جديد" 3414:6187 و"تسجيل الدخول" 3414:6154) للزوار بس.
    بتتفتح من أي زر عليه data-auth-gate="<next>" (ابدأ التقييم / عرض التقرير): window.AuthDialogs.open('signup'|'signin', next).
    بعد النجاح بنروح للصفحة اللي كان رايحلها (?next= بيتعالج في AuthController). صفحتا /login و/register الكاملتان زي ما هما.
    المقاسات: موبايل 361px (قياس Figma) ← 460px (≥640) ← 640px بعمودين (≥768) ← 720px (≥1024)؛ الدخول أصغر دايماً.
--}}
@php
    $img = '/images/auth/quick';

    $signup = [
        ['name' => 'name', 'type' => 'text', 'auto' => 'name', 'span' => 'md:col-span-2', 'label' => cms('auth.quick.field_name.label', 'الاسم بالكامل (بالعربي)'), 'placeholder' => cms('auth.quick.field_name.placeholder', 'أدخل الاسم بالكامل')],
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
    $submitClass = 'w-full flex items-center justify-center px-6 py-3 rounded-[10px] bg-[#204A7A] hover:bg-[#163558] transition-colors font-semibold text-[14px] sm:text-[16px] leading-[1.5] text-[#F6F6F6] cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204A7A] focus-visible:ring-offset-2';
    $rememberLabel = cms('auth.register.remember', 'تذكرني');
@endphp

<style>
  /* شريط التمرير بألوان الموقع (الأزرق الأساسي #204A7A على خلفية فاتحة) */
  .auth-dialog-scroll { scrollbar-width: thin; scrollbar-color: #204A7A #EAF4FC; }
  .auth-dialog-scroll::-webkit-scrollbar { width: 8px; }
  .auth-dialog-scroll::-webkit-scrollbar-track { background: #EAF4FC; border-radius: 9999px; margin-block: 18px; }
  .auth-dialog-scroll::-webkit-scrollbar-thumb { background: #204A7A; border-radius: 9999px; border: 2px solid #EAF4FC; }
  .auth-dialog-scroll::-webkit-scrollbar-thumb:hover { background: #163558; }
  @media (prefers-reduced-motion: reduce) { #authDialog, #authDialogPanel { transition: none !important; } }
</style>

<div id="authDialog" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="ad-title-signup" class="fixed inset-0 z-[60] flex items-center justify-center p-3 sm:p-6 opacity-0 pointer-events-none transition-opacity duration-300 font-messiri">
  <div id="authDialogBackdrop" class="absolute inset-0 bg-[#000000]/60 backdrop-blur-sm" aria-hidden="true"></div>

  {{-- الحاوية بتقص الزوايا، والتمرير جوّاها عشان الشريط ما يتقصش عند الحواف المدوّرة --}}
  <div id="authDialogPanel" data-size="signup" class="relative w-full max-w-[361px] sm:max-w-[460px] data-[size=signup]:md:max-w-[640px] data-[size=signup]:lg:max-w-[720px] data-[size=signin]:md:max-w-[480px] bg-white rounded-[15px] sm:rounded-[20px] shadow-2xl overflow-hidden scale-95 transition-[transform,max-width] duration-300">
    <div class="auth-dialog-scroll max-h-[calc(100dvh-1.5rem)] sm:max-h-[calc(100dvh-3rem)] overflow-y-auto overscroll-contain px-4 py-[25px] sm:px-8 sm:py-8 lg:px-10 lg:py-9">
      <div class="flex flex-col gap-[14px] items-stretch">
        <button type="button" data-ad-close aria-label="{{ cms('auth.quick.close', 'إغلاق النافذة') }}" class="self-start size-[24px] shrink-0 cursor-pointer rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204A7A]">
          <img src="{{ $img }}/close.svg" alt="" class="block size-full" />
        </button>

        {{-- ===== التسجيل السريع ===== --}}
        <section data-ad-panel="signup" class="flex flex-col gap-8 items-center">
          <div class="flex flex-col gap-[17px] items-center">
            <div class="bg-[#EAF4FC] flex items-center justify-center size-[64px] sm:size-[72px] rounded-full">
              <img src="{{ $img }}/lock.svg" alt="" class="block size-[28px] sm:size-[32px]" />
            </div>
            <h2 id="ad-title-signup" class="font-bold text-[17px] sm:text-[20px] lg:text-[22px] text-[#1B436C] text-center">
              {{ cms('auth.quick.title', 'إنشاء حساب جديد للوصول إلى تقريرك') }}
            </h2>
          </div>

          <form data-ad-form action="{{ route('quick-signup.post') }}" method="POST" novalidate class="w-full flex flex-col gap-6">
            @csrf
            <input type="hidden" name="next" value="" data-ad-next>
            <div class="flex flex-col gap-4">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 lg:gap-x-6 gap-y-5">
                @foreach ($signup as $f)
                  @include('landing.partials.auth-dialog-field', ['form' => 'su', 'f' => $f])
                @endforeach
              </div>
              <label class="flex items-center gap-[10px] cursor-pointer select-none w-fit">
                <input type="checkbox" name="remember" value="1" class="size-[17px] rounded-[2px] border border-[#565656] text-[#204A7A] focus:ring-[#204A7A] cursor-pointer" />
                <span class="font-medium text-[14px] sm:text-[15px] text-[#565656]">{{ $rememberLabel }}</span>
              </label>
            </div>

            <p data-ad-form-error role="alert" class="hidden text-[13px] font-medium text-[#E53935] text-center"></p>

            <button type="submit" data-ad-submit class="{{ $submitClass }} md:max-w-[320px] md:mx-auto">{{ cms('auth.register.submit', 'إنشاء حساب جديد') }}</button>
          </form>

          <p class="flex items-center justify-center gap-1 text-[14px] sm:text-[15px] leading-[1.2]">
            <span class="font-normal text-[#515151]">{{ cms('auth.register.have_account', 'هل لديك حساب؟') }}</span>
            <button type="button" data-ad-switch="signin" class="font-semibold text-[#204A7A] border-b-[0.7px] border-[#204A7A] cursor-pointer">{{ cms('auth.register.login_link', 'تسجيل دخول') }}</button>
          </p>
        </section>

        {{-- ===== الدخول السريع ===== --}}
        <section data-ad-panel="signin" class="hidden flex-col gap-8 items-center">
          <div class="flex flex-col gap-[17px] items-center">
            <div class="bg-[#EAF4FC] flex items-center justify-center size-[64px] sm:size-[72px] rounded-full">
              <img src="{{ $img }}/lock.svg" alt="" class="block size-[28px] sm:size-[32px]" />
            </div>
            <h2 id="ad-title-signin" class="font-bold text-[17px] sm:text-[20px] lg:text-[22px] text-[#1B436C] text-center">
              {{ cms('auth.quick.signin_title', 'سجّل الدخول للوصول إلى تقريرك') }}
            </h2>
          </div>

          <form data-ad-form action="{{ route('quick-login.post') }}" method="POST" novalidate class="w-full flex flex-col gap-6">
            @csrf
            <input type="hidden" name="next" value="" data-ad-next>
            <div class="flex flex-col gap-4">
              <div class="flex flex-col gap-5">
                @foreach ($signin as $f)
                  @include('landing.partials.auth-dialog-field', ['form' => 'si', 'f' => $f])
                @endforeach
              </div>
              <div class="flex items-center justify-between gap-4">
                <label class="flex items-center gap-[10px] cursor-pointer select-none w-fit">
                  <input type="checkbox" name="remember" value="1" class="size-[17px] rounded-[2px] border border-[#565656] text-[#204A7A] focus:ring-[#204A7A] cursor-pointer" />
                  <span class="font-medium text-[14px] sm:text-[15px] text-[#565656]">{{ $rememberLabel }}</span>
                </label>
                <a href="{{ route('password.request') }}" class="font-semibold text-[14px] sm:text-[15px] text-[#204A7A] hover:underline">{{ cms('auth.login.forgot_password', 'هل نسيت كلمة المرور؟') }}</a>
              </div>
            </div>

            <p data-ad-form-error role="alert" class="hidden text-[13px] font-medium text-[#E53935] text-center"></p>

            <button type="submit" data-ad-submit class="{{ $submitClass }}">{{ cms('auth.login.submit', 'تسجيل دخول') }}</button>
          </form>

          <p class="flex items-center justify-center gap-1 text-[14px] sm:text-[15px] leading-[1.2]">
            <span class="font-normal text-[#515151]">{{ cms('auth.login.no_account', 'ليس لديك حساب؟') }}</span>
            <button type="button" data-ad-switch="signup" class="font-semibold text-[#204A7A] border-b-[0.7px] border-[#204A7A] cursor-pointer">{{ cms('auth.login.register_link', 'إنشاء حساب جديد') }}</button>
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
    const sections = [...dialog.querySelectorAll('[data-ad-panel]')];
    const genericError = @json($genericError);
    const confirmedTemplate = @json(cms('auth.validation.confirmed', 'تأكيد :attribute غير متطابق.'));
    let next = '';
    let trigger = null;
    let current = 'signup';

    const isOpen = () => !dialog.classList.contains('pointer-events-none');
    const focusable = () => [...dialog.querySelectorAll('a[href], button, input, select, textarea, [tabindex]:not([tabindex="-1"])')]
      .filter((el) => !el.disabled && el.offsetParent !== null);

    function show(which) {
      current = which;
      panel.dataset.size = which;
      sections.forEach((s) => { const active = s.dataset.adPanel === which; s.classList.toggle('hidden', !active); s.classList.toggle('flex', active); });
      dialog.setAttribute('aria-labelledby', `ad-title-${which}`);
      dialog.querySelectorAll('[data-ad-next]').forEach((i) => { i.value = next; });
      dialog.querySelectorAll('[data-ad-panel]').forEach((s) => s.scrollTop = 0);
      panel.firstElementChild.scrollTop = 0;
    }

    function open(which = 'signup', nextValue = '') {
      if (!isOpen()) trigger = document.activeElement;
      next = nextValue || next;
      show(which);
      dialog.classList.remove('opacity-0', 'pointer-events-none');
      dialog.setAttribute('aria-hidden', 'false');
      panel.classList.replace('scale-95', 'scale-100');
      document.documentElement.style.overflow = 'hidden';
      setTimeout(() => dialog.querySelector(`[data-ad-panel="${which}"] input:not([type=hidden])`)?.focus(), 60);
    }

    function close() {
      dialog.classList.add('opacity-0', 'pointer-events-none');
      dialog.setAttribute('aria-hidden', 'true');
      panel.classList.replace('scale-100', 'scale-95');
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

      const box = (name) => form.querySelector(`[data-ad-error="${name}"]`);
      function setError(name, message) {
        const b = box(name);
        const wrapper = form.querySelector(`[data-ad-group="${name}"] [data-ad-wrapper]`);
        if (!b) return;
        b.textContent = message;
        b.classList.toggle('hidden', !message);
        wrapper?.classList.toggle('!border-[#E53935]', !!message);
        wrapper?.classList.toggle('bg-[#FFF5F5]', !!message);
      }
      const clearErrors = () => {
        form.querySelectorAll('[data-ad-error]').forEach((b) => setError(b.dataset.adError, ''));
        formError.classList.add('hidden');
      };
      const focusFirstError = () => form.querySelector('[data-ad-error]:not(.hidden)')?.closest('[data-ad-group]')?.querySelector('input')?.focus();

      form.querySelectorAll('[data-ad-toggle]').forEach((btn) => btn.addEventListener('click', () => {
        const input = btn.closest('[data-ad-wrapper]').querySelector('input');
        const reveal = input.type === 'password';
        input.type = reveal ? 'text' : 'password';
        btn.querySelector('[data-ad-eye-closed]').classList.toggle('hidden', reveal);
        btn.querySelector('[data-ad-eye-open]').classList.toggle('hidden', !reveal);
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
            formError.classList.remove('hidden');
          }
        } catch (err) {
          formError.textContent = genericError;
          formError.classList.remove('hidden');
        }
        submitBtn.disabled = false;
      });
    });
  })();
</script>
