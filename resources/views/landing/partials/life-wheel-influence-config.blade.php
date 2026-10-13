{{-- إعدادات تأثير جوانب العجلة على بعضها وإعدادات حركتها (من لوحة الإدارة) لعجلة الصفحة الرئيسية. لو مش متاحة، العجلة بتستخدم القيم الافتراضية. --}}
@php
  try {
    $lifeWheelInfluence = app(\App\Services\LifeWheelInfluenceSettings::class)->wheelConfig();
  } catch (\Throwable $e) {
    $lifeWheelInfluence = null;
  }
  try {
    $lifeWheelJourney = app(\App\Services\LifeWheelJourneySettings::class)->wheelConfig();
  } catch (\Throwable $e) {
    $lifeWheelJourney = null;
  }
@endphp
@if ($lifeWheelInfluence)
  <script>window.LIFE_WHEEL_INFLUENCE = @json($lifeWheelInfluence);</script>
@endif
{{-- حركة العجلة (محاكاة سنين من حياة شخص): الإعدادات من لوحة الإدارة، ولو مش متاحة العجلة بتستخدم الحركة القديمة --}}
@if ($lifeWheelJourney)
  <script>window.LIFE_WHEEL_JOURNEY = @json($lifeWheelJourney);</script>
@endif
