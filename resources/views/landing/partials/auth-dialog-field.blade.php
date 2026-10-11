{{-- حقل واحد داخل نوافذ التسجيل/الدخول السريع: $form (su|si), $f (name, type, auto, label, placeholder, prefix?, span?). التنسيق في <style> بتاع auth-dialogs --}}
@php
    $img = '/images/auth/quick';
    $id = "{$form}-{$f['name']}";
    $isPassword = $f['type'] === 'password';
@endphp
<div class="ad-group {{ $f['span'] ?? '' }}" data-ad-group="{{ $f['name'] }}">
  <label for="{{ $id }}" class="ad-label">
    {{ $f['label'] }}
    <img src="{{ $img }}/asterisk.svg" alt="" aria-hidden="true" width="10" height="10" />
  </label>

  <div data-ad-wrapper class="ad-input-wrap {{ isset($f['prefix']) ? 'has-prefix' : '' }}">
    @isset($f['prefix'])
      <div dir="ltr" class="ad-prefix">
        <span dir="ltr">{{ $f['prefix'] }}</span>
        <img src="{{ $img }}/flag-sa.svg" alt="" width="28" height="28" />
      </div>
    @endisset

    <input
      id="{{ $id }}"
      name="{{ $f['name'] }}"
      type="{{ $f['type'] }}"
      placeholder="{{ $f['placeholder'] }}"
      autocomplete="{{ $f['auto'] }}"
      @if (in_array($f['type'], ['tel', 'email'])) dir="rtl" inputmode="{{ $f['type'] === 'tel' ? 'numeric' : 'email' }}" @endif
      class="ad-input"
    />

    @if ($isPassword)
      <button type="button" data-ad-toggle aria-label="{{ cms('auth.common.toggle_password', 'عرض أو إخفاء كلمة المرور') }}" class="ad-eye">
        <img data-ad-eye-closed src="{{ $img }}/eye-closed.svg" alt="" width="20" height="20" />
        <i data-ad-eye-open class="fa-regular fa-eye" hidden aria-hidden="true"></i>
      </button>
    @endif
  </div>

  <p data-ad-error="{{ $f['name'] }}" role="alert" class="ad-error" hidden></p>
</div>
