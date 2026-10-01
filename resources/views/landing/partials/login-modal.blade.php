<!-- Login Modal -->
  <div id="login-modal" role="dialog" aria-modal="true" aria-labelledby="login-modal-title" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[100] {{ $errors->any() ? '' : 'hidden' }} flex items-center justify-center">
    <div class="bg-white rounded-2xl p-8 w-[90%] max-w-[400px] shadow-2xl">
      <div class="flex justify-between items-center mb-6">
        <h3 id="login-modal-title" class="text-2xl font-bold text-brand-primary">تسجيل الدخول</h3>
        <button id="close-login" aria-label="إغلاق نافذة تسجيل الدخول" class="text-gray-400 hover:text-gray-700 p-1 rounded-lg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary">
          <i class="fa-solid fa-xmark text-xl" aria-hidden="true"></i>
        </button>
      </div>
      <form id="login-form" method="POST" action="{{ route('login.post') }}" class="flex flex-col gap-4">
        @csrf
        @isset($loginNext)
          <input type="hidden" name="next" value="{{ $loginNext }}">
        @endisset
        <div>
          <label for="login-username" class="block text-sm font-medium text-gray-700 mb-1">اسم المستخدم</label>
          <input type="text" id="login-username" name="email" value="{{ old('email') }}" autocomplete="username" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-brand-primary focus:border-brand-primary focus-visible:outline-none" required />
        </div>
        <div>
          <label for="login-password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
          <input type="password" id="login-password" name="password" autocomplete="current-password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-brand-primary focus:border-brand-primary focus-visible:outline-none" required />
        </div>
        <p id="login-error" role="alert" aria-live="polite" class="text-red-500 text-sm {{ $errors->any() ? '' : 'hidden' }}">بيانات الدخول غير صحيحة.</p>
        <button type="submit" class="w-full mt-2 py-3 bg-brand-primary text-white rounded-xl font-bold hover:bg-[#102744] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-brand-primary">دخول</button>
      </form>
    </div>
  </div>
