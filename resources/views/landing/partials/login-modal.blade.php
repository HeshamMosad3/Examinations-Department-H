<!-- Login Modal -->
<div id="login-modal" role="dialog" aria-modal="true" aria-labelledby="login-modal-title" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[100] {{ $errors->any() ? '' : 'hidden' }} flex items-center justify-center p-4">
  <div class="bg-white rounded-[20px] p-6 sm:p-8 w-full max-w-[440px] shadow-2xl relative border border-[#DADADA]/50">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <div class="flex items-center gap-3">
        <img src="/images/auth/auth-logo.png" alt="دار الرؤى" class="w-10 h-10 object-contain" />
        <h3 id="login-modal-title" class="text-2xl font-bold text-[#204A7A]">{{ cms('global.login_modal.title', 'تسجيل الدخول') }}</h3>
      </div>
      <button id="close-login" aria-label="إغلاق نافذة تسجيل الدخول" class="text-gray-400 hover:text-gray-700 p-2 rounded-lg transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204A7A]">
        <i class="fa-solid fa-xmark text-xl" aria-hidden="true"></i>
      </button>
    </div>

    <!-- Optional Context Prompt Message (e.g. when attempting to take an assignment) -->
    <div id="login-modal-prompt" class="hidden mb-4 p-3 rounded-[12px] bg-[#EFF6FF] border border-[#204A7A]/20 text-[#204A7A] text-sm text-center font-medium leading-relaxed">
      <span id="login-modal-prompt-text"></span>
    </div>

    <!-- Form -->
    <form id="login-form" method="POST" action="{{ route('login.post') }}" class="flex flex-col gap-4">
      @csrf
      <input type="hidden" id="login-next-input" name="next" value="{{ $loginNext ?? '' }}">

            <!-- Email Input -->
            <div class="flex flex-col gap-1.5">
                <label for="login-username" class="text-sm font-medium text-[#262626]">{{ cms('global.login_modal.username', 'البريد الإلكتروني') }}</label>
                <input 
                    type="email" 
                    id="login-username" 
                    name="email" 
                    value="{{ old('email') }}" 
                    autocomplete="username" 
                    placeholder="user@gmail.com"
                    dir="rtl"
                    class="w-full h-12 px-4 border border-[#DADADA] rounded-[10px] text-right font-sans text-sm focus:border-[#204A7A] focus:ring-1 focus:ring-[#204A7A] focus-visible:outline-none transition-all" 
                    required 
                />
            </div>

      <!-- Password -->
      <div class="flex flex-col gap-1.5">
        <label for="login-password" class="text-sm font-medium text-[#262626]">{{ cms('global.login_modal.password', 'كلمة المرور') }}</label>
        <div class="w-full h-12 px-4 border border-[#DADADA] rounded-[10px] flex items-center justify-between focus-within:border-[#204A7A] focus-within:ring-1 focus-within:ring-[#204A7A] transition-all">
          <input 
            type="password" 
            id="login-password" 
            name="password" 
            autocomplete="current-password" 
            placeholder="••••••••"
            class="w-full h-full bg-transparent text-sm focus:outline-none" 
            required 
          />
          <button 
            type="button" 
            onclick="const p = document.getElementById('login-password'); const i = this.querySelector('i'); if(p.type === 'password'){ p.type = 'text'; i.classList.replace('fa-eye-slash','fa-eye'); }else{ p.type = 'password'; i.classList.replace('fa-eye','fa-eye-slash'); }"
            class="text-gray-400 hover:text-[#204A7A] p-1"
          >
            <i class="fa-regular fa-eye-slash text-sm"></i>
          </button>
        </div>
      </div>

      <!-- Links: Remember & Forgot -->
      <div class="flex items-center justify-between text-xs pt-1">
        <label class="flex items-center gap-1.5 cursor-pointer">
          <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-[#204A7A] focus:ring-[#204A7A]" />
          <span class="text-gray-600">تذكرني</span>
        </label>
        <a href="{{ route('password.request') }}" class="text-[#204A7A] hover:underline font-semibold">هل نسيت كلمة المرور؟</a>
      </div>

      <p id="login-error" role="alert" aria-live="polite" class="text-red-500 text-sm {{ $errors->any() ? '' : 'hidden' }}">
        {{ $errors->first() ?: cms('global.login_modal.error', 'بيانات الدخول غير صحيحة.') }}
      </p>

      <button type="submit" class="w-full mt-2 h-12 bg-[#204A7A] text-white rounded-[10px] font-semibold text-base hover:bg-[#163558] transition-colors shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204A7A]">
        {{ cms('global.login_modal.submit', 'تسجيل الدخول') }}
      </button>

      <!-- Register Link Section matching user requirement -->
      <div class="text-center text-sm pt-2 flex flex-col items-center gap-1">
        <span class="text-gray-600 leading-normal">إذا لم يكن لديك حساب،</span>
        <a id="login-modal-register-link" href="{{ isset($loginNext) && $loginNext ? route('register', ['next' => $loginNext]) : route('register') }}" class="text-[#204A7A] font-bold hover:underline transition-colors">
          أنشئ حساباً سريعاً الآن
        </a>
      </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modalForm = document.getElementById('login-form');
    if (!modalForm) return;

    modalForm.setAttribute('novalidate', 'true');
    const uInput = document.getElementById('login-username');
    const pInput = document.getElementById('login-password');
    const errBox = document.getElementById('login-error');

    function showModalError(msg) {
      if (errBox) {
        errBox.textContent = msg;
        errBox.classList.remove('hidden');
      }
    }

    function clearModalError() {
      if (errBox && !{{ $errors->any() ? 'true' : 'false' }}) {
        errBox.textContent = '';
        errBox.classList.add('hidden');
      }
    }

    if (uInput) uInput.addEventListener('input', clearModalError);
    if (pInput) pInput.addEventListener('input', clearModalError);

    // Global helper to open login modal with optional prompt message and next target
    window.openLoginModal = function(options = {}) {
      const modal = document.getElementById('login-modal');
      const promptBox = document.getElementById('login-modal-prompt');
      const promptText = document.getElementById('login-modal-prompt-text');
      const nextInput = document.getElementById('login-next-input');
      const regLink = document.getElementById('login-modal-register-link');

      if (!modal) return;

      const message = options.prompt || '';
      if (message && promptBox && promptText) {
        promptText.textContent = message;
        promptBox.classList.remove('hidden');
      } else if (promptBox) {
        promptBox.classList.add('hidden');
      }

      const nextVal = options.next || '';
      if (nextInput) {
        nextInput.value = nextVal;
      }

      if (regLink) {
        const baseRegUrl = "{{ route('register') }}";
        regLink.href = nextVal ? `${baseRegUrl}?next=${encodeURIComponent(nextVal)}` : baseRegUrl;
      }

      modal.classList.remove('hidden');
      modal.setAttribute('aria-hidden', 'false');

      const uEl = document.getElementById('login-username');
      if (uEl) {
        setTimeout(() => uEl.focus(), 60);
      }
    };

    modalForm.addEventListener('submit', (e) => {
      const uVal = uInput ? uInput.value.trim() : '';
      const pVal = pInput ? pInput.value : '';

      if (!uVal) {
        e.preventDefault();
        showModalError('البريد الإلكتروني مطلوب.');
        if (uInput) uInput.focus();
        return;
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(uVal)) {
        e.preventDefault();
        showModalError('يرجى إدخال بريد إلكتروني صحيح.');
        if (uInput) uInput.focus();
        return;
      }

      if (!pVal) {
        e.preventDefault();
        showModalError('كلمة المرور مطلوبة.');
        if (pInput) pInput.focus();
        return;
      }

      if (pVal.length < 8) {
        e.preventDefault();
        showModalError('كلمة المرور يجب أن لا تقل عن 8 خانات.');
        if (pInput) pInput.focus();
        return;
      }
    });
  });
</script>
