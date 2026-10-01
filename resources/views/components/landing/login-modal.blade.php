<!-- Login Modal -->
  <div id="login-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[100] hidden flex items-center justify-center">
    <div class="bg-white rounded-2xl p-8 w-[90%] max-w-[400px] shadow-2xl">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-brand-primary">تسجيل الدخول</h3>
        <button id="close-login" class="text-gray-400 hover:text-gray-700">
          <i class="fa-solid fa-xmark text-xl"></i>
        </button>
      </div>
      <form id="login-form" class="flex flex-col gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">اسم المستخدم</label>
          <input type="text" id="login-username" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-brand-primary focus:border-brand-primary" required />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
          <input type="password" id="login-password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-brand-primary focus:border-brand-primary" required />
        </div>
        <p id="login-error" class="text-red-500 text-sm hidden">بيانات الدخول غير صحيحة.</p>
        <button type="submit" class="w-full mt-2 py-3 bg-brand-primary text-white rounded-xl font-bold hover:bg-[#102744] transition-colors">دخول</button>
      </form>
    </div>
  </div>
