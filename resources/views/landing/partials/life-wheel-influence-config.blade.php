{{-- إعدادات تأثير جوانب العجلة على بعضها (من لوحة الإدارة) لعجلة الصفحة الرئيسية. لو مش متاحة، العجلة بتستخدم القيم الافتراضية. --}}
@php
  try {
    $lifeWheelInfluence = app(\App\Services\LifeWheelInfluenceSettings::class)->wheelConfig();
  } catch (\Throwable $e) {
    $lifeWheelInfluence = null;
  }
@endphp
@if ($lifeWheelInfluence)
  <script>window.LIFE_WHEEL_INFLUENCE = @json($lifeWheelInfluence);</script>
@endif
