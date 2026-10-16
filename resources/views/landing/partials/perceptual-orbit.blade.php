@php
  // رسمة أنماط الإدراك (Figma ديسكتوب 572×503، موبايل 393×346). الهندسة والصور والألوان من ثيم المستوى (resources/data/perceptual-report-theme.php).
  // كل القياسات بوحدة u = عرض الصندوق / عرض التصميم، فالرسمة بتتكبر وتتصغر بنفس النسب.
  $devices = [
    'd' => ['class' => 'hidden lg:block', 'badge' => 58.219, 'icon' => 29.109, 'gap' => 8.014, 'label' => 26.046, 'caption' => 18.032, 'col' => 6.011,
            'kin_w' => 147.257, 'aud_w' => 158.277, 'aud_cap' => 112.071, 'vis' => ['w' => 142.249, 'h' => 119.208, 'bl' => 9.46, 'lx' => 73.5, 'ly' => 9.46, 'cx' => 69.86, 'cy' => 64.04, 'cw' => 145.547, 'rowh' => 58.102],
            'shadow' => [17.466, 5.822, 11.644], 'dot' => 8.733],
    'm' => ['class' => 'lg:hidden', 'badge' => 40, 'icon' => 20, 'gap' => 6, 'label' => 17, 'caption' => 12, 'col' => 3,
            'kin_w' => 89, 'aud_w' => 109, 'aud_cap' => 77, 'vis' => ['w' => 98, 'h' => 82, 'bl' => 6.5, 'lx' => 50.5, 'ly' => 6.5, 'cx' => 48, 'cy' => 44, 'cw' => 100, 'rowh' => 40],
            'shadow' => [12, 4, 8], 'dot' => 6],
  ];
  $labels = [
    'kin' => [cms('perceptual_result.orbit.kinesthetic_label', 'حسي'), cms('perceptual_result.orbit.kinesthetic_text', 'تشعر وتتفاعل مع ما حولك.')],
    'aud' => [cms('perceptual_result.orbit.auditory_label', 'سمعي'), cms('perceptual_result.orbit.auditory_text', 'تسمع وتفهم الأصوات.')],
    'vis' => [cms('perceptual_result.orbit.visual_label', 'بصري'), cms('perceptual_result.orbit.visual_text', 'ترى وتلاحظ التفاصيل.')],
  ];
  $badgeStyle = [
    'kin' => ['rgb' => '236,72,153', 'bg' => '#fdf2f8', 'text' => '#ec4899', 'icon' => $theme['assets']['badge_heart'] ?? '/landing/images/perceptual-report/result/heart.svg'],
    'aud' => ['rgb' => '124,58,237', 'bg' => '#f5f3ff', 'text' => '#7c3aed', 'icon' => $theme['assets']['badge_headphones'] ?? '/landing/images/perceptual-report/result/headphones.svg'],
    'vis' => ['rgb' => '30,90,249', 'bg' => '#eff6ff', 'text' => '#1e5af9', 'icon' => $theme['assets']['badge_eye'] ?? '/landing/images/perceptual-report/result/eye.svg'],
  ];
@endphp
<div class="w-full">
@foreach ($devices as $dev => $s)
  @php
    $c = $theme['orbit'][$dev];
    $u = fn ($n) => 'calc(var(--u) * ' . $n . ')';
    // الشارة الدائرية: الحد واللون من إعدادات الصفحة
    $badge = function ($key) use ($c, $s, $u, $badgeStyle) {
      $b = $badgeStyle[$key]; $cfg = $c[$key]; $rgb = $cfg['rgb'] ?? $b['rgb'];
      return 'width:' . $u($s['badge']) . ';height:' . $u($s['badge']) . ';border:' . $u($cfg['bw']) . ' solid rgba(' . $rgb . ',' . $cfg['ba'] . ');background:' . $b['bg']
        . ';filter:drop-shadow(0 ' . $u($s['shadow'][0]) . ' ' . $u($s['shadow'][0]) . ' rgba(' . $b['rgb'] . ',0.12));box-shadow:inset 0 ' . $u($s['shadow'][1]) . ' ' . $u($s['shadow'][2]) . ' rgba(' . $b['rgb'] . ',0.1)';
    };
    $labelCls = 'font-bold leading-[normal] whitespace-nowrap';
    $captionCls = 'font-normal leading-[normal] text-center text-[#262626]';
  @endphp
  <div class="{{ $s['class'] }} w-full [container-type:inline-size]" style="aspect-ratio: {{ $c['w'] }} / {{ $c['h'] }};">
    <div dir="ltr" class="relative size-full" style="--u: calc(100cqw / {{ $c['w'] }});" role="img" aria-label="{{ cms('perceptual_result.sections.orbit_label', 'أنماط الإدراك: بصري، سمعي، حسي') }}">

      @foreach ($c['glows'] as $g)
        <div class="absolute rounded-full" style="left:{{ $u($g['l']) }};top:{{ $u($g['t']) }};width:{{ $u($g['s']) }};height:{{ $u($g['s']) }};background:{{ $g['c'] }};filter:blur({{ $u($g['b']) }})"></div>
      @endforeach

      <!-- Orbits -->
      <div class="absolute" style="left:calc(50% + {{ $u($c['outer']['dx']) }});top:calc(50% + {{ $u($c['outer']['dy']) }});width:{{ $u($c['outer']['size']) }};height:{{ $u($c['outer']['size']) }};transform:translate(-50%,-50%)">
        <img src="{{ $c['outer']['f'] }}" alt="" class="absolute block max-w-none" style="inset:-0.16%;width:100.32%;height:100.32%" />
      </div>
      <div class="absolute" style="left:calc(50% + {{ $u($c['inner']['dx']) }});top:calc(50% + {{ $u($c['inner']['dy']) }});width:{{ $u($c['inner']['w']) }};height:{{ $u($c['inner']['h']) }};transform:translate(-50%,-50%)">
        <img src="{{ $c['inner']['f'] }}" alt="" class="absolute block max-w-none size-full" />
      </div>

      <!-- Kinesthetic (حسي) -->
      <div class="absolute flex flex-col items-center" style="left:{{ $u($c['kin']['l']) }};top:{{ $u($c['kin']['t']) }};gap:{{ $u($s['col']) }}">
        <div class="flex items-center" style="gap:{{ $u($s['gap']) }}">
          <div class="relative flex items-center justify-center rounded-full shrink-0" style="{{ $badge('kin') }}">
            <img src="{{ $badgeStyle['kin']['icon'] }}" alt="" style="width:{{ $u($s['icon']) }};height:{{ $u($s['icon']) }}" />
          </div>
          <p class="{{ $labelCls }}" style="color:{{ $badgeStyle['kin']['text'] }};font-size:{{ $u($s['label']) }}">{{ $labels['kin'][0] }}</p>
        </div>
        <p class="{{ $captionCls }}" style="position:relative;z-index:10;font-size:{{ $u($s['caption']) }};width:{{ $u($s['kin_w']) }}">{{ $labels['kin'][1] }}</p>
      </div>

      <!-- Auditory (سمعي) -->
      <div class="absolute flex flex-col items-center" style="left:calc(50% + {{ $u($c['aud']['cx']) }});top:{{ $u($c['aud']['t']) }};width:{{ $u($s['aud_w']) }};gap:{{ $u($s['col']) }};transform:translateX(-50%)">
        <div class="flex items-center justify-center w-full" style="gap:{{ $u($s['gap']) }}">
          <div class="relative flex items-center justify-center rounded-full shrink-0" style="{{ $badge('aud') }}">
            <img src="{{ $badgeStyle['aud']['icon'] }}" alt="" style="width:{{ $u($s['icon']) }};height:{{ $u($s['icon']) }}" />
          </div>
          <p class="{{ $labelCls }}" style="color:{{ $badgeStyle['aud']['text'] }};font-size:{{ $u($s['label']) }}">{{ $labels['aud'][0] }}</p>
        </div>
        <p class="{{ $captionCls }}" style="position:relative;z-index:10;font-size:{{ $u($s['caption']) }};width:{{ $u($s['aud_cap']) }}">{{ $labels['aud'][1] }}</p>
      </div>

      <!-- Dots on the orbit -->
      @foreach ($c['dots'] as $dot)
        <div class="absolute" style="left:calc(50% + {{ $u($dot['dx']) }});top:{{ $u($dot['t']) }};width:{{ $u($s['dot']) }};height:{{ $u($s['dot']) }};transform:translateX(-50%)">
          <img src="{{ $dot['f'] }}" alt="" class="absolute block max-w-none" style="inset:-{{ $dot['i'] }}%;width:{{ 100 + 2 * $dot['i'] }}%;height:{{ 100 + 2 * $dot['i'] }}%" />
        </div>
      @endforeach

      <!-- Arc: the part of the orbit that marks the dominant style -->
      <div class="absolute" style="left:{{ $u($c['arc']['l']) }};top:{{ $u($c['arc']['t']) }};width:{{ $u($c['arc']['w']) }};height:{{ $u($c['arc']['h']) }}">
        <img src="{{ $c['arc']['f'] }}" alt="" class="absolute block max-w-none" style="left:{{ $c['arc']['img']['l'] }}%;top:{{ $c['arc']['img']['t'] }}%;width:{{ $c['arc']['img']['w'] }}%;height:{{ $c['arc']['img']['h'] }}%" />
      </div>

      <!-- Brain -->
      <div class="absolute overflow-hidden pointer-events-none" style="left:{{ $u($c['brain']['l']) }};top:{{ $u($c['brain']['t']) }};width:{{ $u($c['brain']['w']) }};height:{{ $u($c['brain']['h']) }}">
        <img src="{{ $c['brain']['f'] }}" alt="" class="absolute max-w-none" style="left:{{ $c['brain']['img']['l'] }}%;top:{{ $c['brain']['img']['t'] }}%;width:{{ $c['brain']['img']['w'] }}%;height:{{ $c['brain']['img']['h'] }}%" />
      </div>

      <!-- Visual (بصري) -->
      <div class="absolute" style="left:{{ $u($c['vis']['l']) }};top:{{ $u($c['vis']['t']) }};width:{{ $u($s['vis']['w']) }};height:{{ $u($s['vis']['h']) }}">
        <div class="absolute inset-x-0 top-0" style="height:{{ $u($s['vis']['rowh']) }}">
          <div class="absolute flex items-center justify-center rounded-full" style="left:{{ $u($s['vis']['bl']) }};top:0;{{ $badge('vis') }}">
            <img src="{{ $badgeStyle['vis']['icon'] }}" alt="" style="width:{{ $u($s['icon']) }};height:{{ $u($s['icon']) }}" />
          </div>
          <p class="absolute {{ $labelCls }}" style="left:{{ $u($s['vis']['lx']) }};top:{{ $u($s['vis']['ly']) }};color:{{ $badgeStyle['vis']['text'] }};font-size:{{ $u($s['label']) }}">{{ $labels['vis'][0] }}</p>
        </div>
        <p class="absolute {{ $captionCls }}" style="left:{{ $u($s['vis']['cx']) }};top:{{ $u($s['vis']['cy']) }};width:{{ $u($s['vis']['cw']) }};z-index:10;font-size:{{ $u($s['caption']) }};transform:translateX(-50%)">{{ $labels['vis'][1] }}</p>
      </div>
    </div>
  </div>
@endforeach
</div>
