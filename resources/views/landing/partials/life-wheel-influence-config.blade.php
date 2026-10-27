{{-- إعدادات تأثير جوانب العجلة على بعضها وإعدادات حركتها (من لوحة الإدارة) لعجلة الصفحة الرئيسية. لو مش متاحة، العجلة بتستخدم القيم الافتراضية. --}}
@php
  try {
    $lifeWheelInfluence = app(\App\Services\Dashboard\Admin\LifeWheelInfluenceSettings::class)->wheelConfig();
  } catch (\Throwable $e) {
    $lifeWheelInfluence = null;
  }
  try {
    $lifeWheelJourney = app(\App\Services\Dashboard\Admin\LifeWheelJourneySettings::class)->wheelConfig();
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

{{-- ألوان وأيقونات محاور العجلة وصورة البوصلة (من لوحة الإدارة ← محتوى الموقع ← تصميم العجلة). اللون الغلط (مش #hex) بيرجع للأصلي. --}}
@php
  $color = fn ($value, $fallback) => preg_match('/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim((string) $value)) ? trim($value) : $fallback;
  $lifeWheelStyle = [
    'axes' => [
    'personal' => [
      'fill' => $color(cms('wheel_style.personal.color_fill', '#693CC7'), '#693CC7'),
      'bg' => $color(cms('wheel_style.personal.color_bg', '#D9D0ED'), '#D9D0ED'),
      'text' => $color(cms('wheel_style.personal.color_label', '#5C3E9B'), '#5C3E9B'),
      'icon' => cms_image('wheel_style.personal.icon', '/landing/icons/wheel_of_life/home/personal.svg'),
    ],
    'spiritual' => [
      'fill' => $color(cms('wheel_style.spiritual.color_fill', '#6262E0'), '#6262E0'),
      'bg' => $color(cms('wheel_style.spiritual.color_bg', '#D7DBF9'), '#D7DBF9'),
      'text' => $color(cms('wheel_style.spiritual.color_label', '#5B6ECC'), '#5B6ECC'),
      'icon' => cms_image('wheel_style.spiritual.icon', '/landing/icons/wheel_of_life/home/spiritual.svg'),
    ],
    'health' => [
      'fill' => $color(cms('wheel_style.health.color_fill', '#328C65'), '#328C65'),
      'bg' => $color(cms('wheel_style.health.color_bg', '#D1EBE0'), '#D1EBE0'),
      'text' => $color(cms('wheel_style.health.color_label', '#489674'), '#489674'),
      'icon' => cms_image('wheel_style.health.icon', '/landing/icons/wheel_of_life/home/health.svg'),
    ],
    'social' => [
      'fill' => $color(cms('wheel_style.social.color_fill', '#C73269'), '#C73269'),
      'bg' => $color(cms('wheel_style.social.color_bg', '#F8D1DF'), '#F8D1DF'),
      'text' => $color(cms('wheel_style.social.color_label', '#963056'), '#963056'),
      'icon' => cms_image('wheel_style.social.icon', '/landing/icons/wheel_of_life/home/social.svg'),
    ],
    'family' => [
      'fill' => $color(cms('wheel_style.family.color_fill', '#D87F3C'), '#D87F3C'),
      'bg' => $color(cms('wheel_style.family.color_bg', '#FDE5D2'), '#FDE5D2'),
      'text' => $color(cms('wheel_style.family.color_label', '#BC7B4A'), '#BC7B4A'),
      'icon' => cms_image('wheel_style.family.icon', '/landing/icons/wheel_of_life/home/family.svg'),
    ],
    'leisure' => [
      'fill' => $color(cms('wheel_style.leisure.color_fill', '#DACB5E'), '#DACB5E'),
      'bg' => $color(cms('wheel_style.leisure.color_bg', '#F5F1D3'), '#F5F1D3'),
      'text' => $color(cms('wheel_style.leisure.color_label', '#B8AA44'), '#B8AA44'),
      'icon' => cms_image('wheel_style.leisure.icon', '/landing/icons/wheel_of_life/home/leisure.svg'),
    ],
    'financial' => [
      'fill' => $color(cms('wheel_style.financial.color_fill', '#59CFD6'), '#59CFD6'),
      'bg' => $color(cms('wheel_style.financial.color_bg', '#D2F2F4'), '#D2F2F4'),
      'text' => $color(cms('wheel_style.financial.color_label', '#27797E'), '#27797E'),
      'icon' => cms_image('wheel_style.financial.icon', '/landing/icons/wheel_of_life/home/financial.svg'),
    ],
    'career' => [
      'fill' => $color(cms('wheel_style.career.color_fill', '#244973'), '#244973'),
      'bg' => $color(cms('wheel_style.career.color_bg', '#CDDAED'), '#CDDAED'),
      'text' => $color(cms('wheel_style.career.color_label', '#21487B'), '#21487B'),
      'icon' => cms_image('wheel_style.career.icon', '/landing/icons/wheel_of_life/home/career.svg'),
    ],
    ],
    'compass' => cms_image('wheel_style.compass.image', '/landing/images/Frame%202147238562.png'),
  ];
@endphp
<script>window.LIFE_WHEEL_STYLE = @json($lifeWheelStyle);</script>
