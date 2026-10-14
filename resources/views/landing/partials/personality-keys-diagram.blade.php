{{--
  رسمة مفاتيح الشخصية السبعة في صفحة الاستكشاف (Figma: ديسكتوب #3551:10973 / موبايل #3551:12155).
  كل المقاسات بوحدات فيجما: على الديسكتوب --u = 1px، وعلى الموبايل بتتصغر بالنسبة مع عرض الشاشة.
  المتغيرات: $c (إعدادات المقاس: ديسكتوب أو موبايل)
--}}
@php
  $img = '/landing/images/personality-keys-explore';
  $u = fn ($n) => "calc(var(--u) * {$n})";
  $box = fn ($l, $t, $w, $h) => 'left:' . $u($l) . ';top:' . $u($t) . ';width:' . $u($w) . ';height:' . $u($h);
  // شريط رفيع مايل (خطوط الربط بين الدبابيس والمفاتيح): الحاوية بمقاس مربع الدوران، والشريط جواها بزاوية
  $bar = fn ($b) => '<span class="absolute flex items-center justify-center" style="' . $box($b[0], $b[1], $b[2], $b[3]) . '"><span class="block flex-none" style="width:' . $u($b[5]) . ';height:' . $u($b[6]) . ';background:' . $b[7] . ';transform:rotate(' . $b[4] . 'deg)"></span></span>';
  $g = $c['g'];
  // الصور بتتمط على مربع الأب بهوامش (inset) زي فيجما: بنحسب left/top/width/height لأن الصورة مش بتتمط لوحدها
  $ins = function ($v) {
    $t = array_map('floatval', preg_split('/\s+/', trim($v ?: '0')));
    [$top, $right, $bottom, $left] = match (count($t)) { 1 => [$t[0], $t[0], $t[0], $t[0]], 2 => [$t[0], $t[1], $t[0], $t[1]], default => [$t[0], $t[1], $t[2], $t[3]] };
    return 'left:' . $left . '%;top:' . $top . '%;width:' . (100 - $left - $right) . '%;height:' . (100 - $top - $bottom) . '%';
  };

  $nodes = [
    1 => ['label' => 'البصيرة', 'icon' => 'hero-1', 'iw' => [28.703, 20], 'ih' => [28.703, 20], 'group' => '21.87% 9.37% 21.88% 9.38%', 'gimg' => null, 'poly' => '-12.73% -20.37% -27.78% -20.37%', 'name' => [17.222, 700, '#f6f6f6'], 'mname' => [12.071, 700, '#f6f6f6'], 'num' => 'up'],
    2 => ['label' => 'الدافع', 'icon' => 'hero-2', 'iw' => [20.776, 15], 'ih' => [21.958, 15], 'group' => null, 'gimg' => '-4.9% -5.18%', 'poly' => '-21.62% -20.37% -18.9% -20.37%', 'name' => [17.222, 700, '#e9edf2'], 'mname' => [12.071, 700, '#e9edf2'], 'num' => 'up'],
    3 => ['label' => 'الصمود', 'icon' => 'hero-3', 'iw' => [28.703, 20], 'ih' => [28.703, 20], 'group' => null, 'gimg' => null, 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'name' => [15.787, 700, '#f6f6f6'], 'mname' => [11.065, 700, '#f6f6f6'], 'num' => 'mid'],
    4 => ['label' => 'الارتباط', 'icon' => 'hero-4', 'iw' => [27.268, 20], 'ih' => [27.268, 20], 'group' => '16.66% 8.34% 12.51% 8.32%', 'gimg' => '-5.57% -4.74%', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'name' => [14.352, 700, '#f6f6f6'], 'mname' => [10.059, 700, '#f6f6f6'], 'num' => 'mid'],
    5 => ['label' => 'القرار', 'icon' => 'hero-5', 'iw' => [28.703, 20], 'ih' => [28.703, 20], 'group' => null, 'gimg' => null, 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'name' => [14.352, 700, '#f6f6f6'], 'mname' => [10.059, 700, '#f6f6f6'], 'num' => 'mid'],
    6 => ['label' => 'التأثير', 'icon' => 'hero-6', 'iw' => [28.703, 20], 'ih' => [28.703, 20], 'group' => '5.55% 9.73% 9.73% 5.56%', 'gimg' => '0 -4.43% -4.43% 0', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'name' => [17.222, 600, '#f6f6f6'], 'mname' => [12.071, 600, '#f6f6f6'], 'num' => 'up'],
    7 => ['label' => 'الأفق', 'icon' => 'hero-7', 'iw' => [28.703, 20], 'ih' => [28.703, 20], 'group' => null, 'gimg' => null, 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'name' => [17.222, 700, '#f6f6f6'], 'mname' => [12.071, 700, '#f6f6f6'], 'num' => 'up'],
  ];
  $mi = $c['mobile'] ? 1 : 0;
@endphp
<div class="relative" dir="ltr" style="width: {{ $u($c['W']) }}; height: {{ $u($c['H']) }}" aria-hidden="true">
  {{-- الحلقتين والدبابيس في النص --}}
  <img src="{{ $img }}/ring-mid-1.svg" alt="" class="absolute max-w-none" style="{{ $box($g[0] + $c['ring1'][0], $g[1] + $c['ring1'][1], $c['ring1'][2], $c['ring1'][3]) }}" />
  <img src="{{ $img }}/ring-mid-2.svg" alt="" class="absolute max-w-none" style="{{ $box($g[0] + $c['ring2'][0], $g[1] + $c['ring2'][1], $c['ring2'][2], $c['ring2'][3]) }}" />

  @foreach ($c['dots'] as $d)
    <span class="absolute rounded-full" style="{{ $box($g[0] + $d[0], $g[1] + $d[1], $d[2], $d[2]) }}; background: {{ $d[3] }}"></span>
  @endforeach

  {{-- الدبوس الأحمر وخطوطه (التأثير + الصمود + البصيرة) --}}
  <span class="absolute rounded-full" style="{{ $box($g[0] + $c['red'][0], $g[1] + $c['red'][1], $c['red'][2], $c['red'][2]) }}; background: #f63657">
    @foreach ($c['red'][3] as $b){!! $bar($b) !!}@endforeach
  </span>

  {{-- القرص الأزرق بالشعار --}}
  <span class="absolute rounded-full bg-[#204a7a]" style="{{ $box($g[0] + $c['emb'][0], $g[1] + $c['emb'][1], $c['emb'][2], $c['emb'][3]) }}">
    <img src="{{ cms_image('keys_explore.hero.emblem', $img . '/emblem.svg') }}" alt="" class="absolute max-w-none" style="{{ $box($c['embImg'][0], $c['embImg'][1], $c['embImg'][2], $c['embImg'][3]) }}" />
  </span>

  {{-- الدبوس الأزرق الغامق (مايل) --}}
  @php $r = $c['rdot']; @endphp
  <span class="absolute flex items-center justify-center" style="{{ $box($g[0] + $r[0], $g[1] + $r[1], $r[2], $r[2]) }}">
    <span class="relative block rounded-full flex-none" style="width: {{ $u($r[3]) }}; height: {{ $u($r[3]) }}; background: {{ $r[5] }}; transform: rotate({{ $r[4] }}deg)">{!! $bar($r[6]) !!}</span>
  </span>

  {{-- دبوس بنفسجي (مايل) --}}
  @php $p = $c['pdot']; @endphp
  <span class="absolute flex items-center justify-center" style="{{ $box($p[0], $p[1], $p[2], $p[2]) }}">
    <span class="relative block rounded-full flex-none" style="width: {{ $u($p[3]) }}; height: {{ $u($p[3]) }}; background: {{ $p[5] }}; transform: rotate({{ $p[4] }}deg)">{!! $bar($p[6]) !!}</span>
  </span>

  {{-- خطين برتقالي وبنفسجي تحت --}}
  @foreach ($c['bars'] as $b){!! $bar($b) !!}@endforeach

  {{-- المفاتيح السبعة (خماسيات) --}}
  @foreach ($nodes as $n => $nd)
    @php
      [$px, $py] = $c['pos'][$n];
      $b = $c['body'][$nd['num']];
      [$nameSize, $nameWeight, $nameColor] = $nd[$mi ? 'mname' : 'name'];
      $iconW = $nd['iw'][$mi]; $iconH = $nd['ih'][$mi];
    @endphp
    <div class="absolute" style="{{ $box($px, $py, $c['poly'][0], $c['poly'][1]) }}">
      <img src="{{ $img }}/polygon-{{ $n }}.svg" alt="" class="absolute max-w-none" style="{{ $ins($nd['poly']) }}" />
      <div class="absolute flex flex-col items-center justify-center border-[#f6f6f6] border-solid text-center" style="left: {{ $u($b[0]) }}; top: {{ $u($b[1]) }}; width: {{ $u($b[2]) }}; height: {{ $u($b[3]) }}; border-bottom-width: {{ $u($c['border']) }}; border-radius: {{ $u($c['radius']) }}; gap: {{ $u($c['gap']) }}">
        <span class="block w-full font-semibold leading-[1.5] text-[#f6f6f6]" style="font-size: {{ $u($c['numSize']) }}">0{{ $n }}</span>
        <span class="relative block shrink-0" style="width: {{ $u($iconW) }}; height: {{ $u($iconH) }}">
          @if ($nd['group'])
            <span class="absolute" style="{{ $ins($nd['group']) }}">
              <img src="{{ $img }}/{{ $nd['icon'] }}.svg" alt="" class="absolute max-w-none" style="{{ $ins($nd['gimg'] ?? '0') }}" />
            </span>
          @else
            <img src="{{ $img }}/{{ $nd['icon'] }}.svg" alt="" class="absolute max-w-none" style="{{ $ins($nd['gimg'] ?? '0') }}" />
          @endif
        </span>
        <span class="block w-full leading-[normal]" style="font-size: {{ $u($nameSize) }}; font-weight: {{ $nameWeight }}; color: {{ $nameColor }}">{{ $nd['label'] }}</span>
      </div>
    </div>
  @endforeach
</div>
