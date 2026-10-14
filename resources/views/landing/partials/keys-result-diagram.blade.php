{{--
  مخطط المفاتيح السبعة في صفحة النتيجة (Figma: ديسكتوب #3551:8838 / موبايل #3551:9789).
  زي رسمة صفحة الاستكشاف لكن النسبة المئوية جوه كل مفتاح. الأرقام بوحدات فيجما و --u = 1px على الديسكتوب.
  $c: إعدادات المقاس، $percents: ['K1' => 80, ...]
--}}
@php
  $img = '/landing/images/personality-keys-explore';
  $res = '/landing/images/keys-result';
  $u = fn ($n) => "calc(var(--u) * {$n})";
  $box = fn ($l, $t, $w, $h) => 'left:' . $u($l) . ';top:' . $u($t) . ';width:' . $u($w) . ';height:' . $u($h);
  $ins = function ($v) {
    $t = array_map('floatval', preg_split('/\s+/', trim($v ?: '0')));
    [$top, $right, $bottom, $left] = match (count($t)) { 1 => [$t[0], $t[0], $t[0], $t[0]], 2 => [$t[0], $t[1], $t[0], $t[1]], default => [$t[0], $t[1], $t[2], $t[3]] };
    return 'left:' . $left . '%;top:' . $top . '%;width:' . (100 - $left - $right) . '%;height:' . (100 - $top - $bottom) . '%';
  };
  // أصغر عناصر الرسمة: نقطة / نقطة مايلة / شريط مايل (كلها بإحداثيات الإطار)
  $g = $c['g'];
  $G = fn ($x, $y) => [$g[0] + $x, $g[1] + $y];

  $nodes = [
    'K1' => ['n' => 1, 'label' => 'البصيرة', 'color' => '#4f6ea5', 'poly' => '-12.73% -20.37% -27.78% -20.37%', 'group' => '21.89% 9.37% 21.86% 9.38%', 'gimg' => null],
    'K2' => ['n' => 2, 'label' => 'الدافع', 'color' => '#64748b', 'poly' => '-21.62% -20.37% -18.9% -20.37%', 'group' => null, 'gimg' => '-5.07% -5.32%'],
    'K3' => ['n' => 3, 'label' => 'الصمود', 'color' => '#5fae7d', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'group' => null, 'gimg' => null],
    'K4' => ['n' => 4, 'label' => 'الارتباط', 'color' => '#735297', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'group' => '16.67% 8.35% 12.5% 8.32%', 'gimg' => '-5.4% -4.59%'],
    'K5' => ['n' => 5, 'label' => 'القرار', 'color' => '#ccab3e', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'group' => null, 'gimg' => null],
    'K6' => ['n' => 6, 'label' => 'التأثير', 'color' => '#b35769', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'group' => '5.54% 9.72% 9.74% 5.57%', 'gimg' => '0 -4.51% -4.52% 0'],
    'K7' => ['n' => 7, 'label' => 'الأفق', 'color' => '#8640c9', 'poly' => '-6.51% -14.48% -21.56% -14.48%', 'group' => null, 'gimg' => null],
  ];
@endphp
<div class="relative" dir="ltr" style="width: {{ $u($c['W']) }}; height: {{ $u($c['H']) }}">
  <img src="{{ $res }}/ring-1.svg" alt="" class="absolute max-w-none" style="{{ $box($g[0] + $c['ring1'][0], $g[1] + $c['ring1'][1], $c['ring1'][2], $c['ring1'][2]) }}" />
  <img src="{{ $res }}/ring-2.svg" alt="" class="absolute max-w-none" style="{{ $box($g[0] + $c['ring2'][0], $g[1] + $c['ring2'][1], $c['ring2'][2], $c['ring2'][3]) }}" />

  @foreach ($c['items'] as $it)
    @php [$type, $a] = [$it[0], array_slice($it, 1)]; @endphp
    @if ($type === 'dot')
      <span class="absolute rounded-full" style="{{ $box($a[0], $a[1], $a[2], $a[2]) }}; background: {{ $a[3] }}"></span>
    @elseif ($type === 'rdot')
      <span class="absolute flex items-center justify-center" style="{{ $box($a[0], $a[1], $a[2], $a[2]) }}"><span class="block rounded-full flex-none" style="width: {{ $u($a[3]) }}; height: {{ $u($a[3]) }}; background: {{ $a[5] }}; transform: rotate({{ $a[4] }}deg)"></span></span>
    @else
      <span class="absolute flex items-center justify-center" style="{{ $box($a[0], $a[1], $a[2], $a[3]) }}"><span class="block flex-none" style="width: {{ $u($a[5]) }}; height: {{ $u($a[6]) }}; background: {{ $a[7] }}; transform: rotate({{ $a[4] }}deg){{ ! empty($a[8]) ? ' skewX(' . $a[8] . 'deg)' : '' }}"></span></span>
    @endif
  @endforeach

  {{-- القرص بالشعار --}}
  <span class="absolute rounded-full bg-[#204a7a] border-solid border-[#d5dae1]" style="{{ $box($g[0] + $c['emb'][0], $g[1] + $c['emb'][1], $c['emb'][2], $c['emb'][2]) }}; border-width: {{ $u($c['embBorder']) }}">
    <img src="{{ cms_image('keys_explore.hero.emblem', $img . '/emblem.svg') }}" alt="" class="absolute max-w-none" style="{{ $box($c['embImg'][0], $c['embImg'][1], $c['embImg'][2], $c['embImg'][3]) }}" />
  </span>

  {{-- المفاتيح السبعة بالنسب --}}
  @foreach ($nodes as $code => $nd)
    @php
      $p = $c['nodes'][$code]; // [left, top, bodyLeft, bodyTop, bodyW, bodyH, gap, nameSize, iconSize(w,h)]
      $pct = $percents[$code] ?? 0;
    @endphp
    <div class="absolute" style="{{ $box($p[0], $p[1], $c['poly'][0], $c['poly'][1]) }}">
      <img src="{{ $img }}/polygon-{{ $nd['n'] }}.svg" alt="" class="absolute max-w-none" style="{{ $ins($nd['poly']) }}" />
      <div class="absolute flex flex-col items-center justify-center border-[#f6f6f6] border-solid text-center" style="{{ $box($p[2], $p[3], $p[4], $p[5]) }}; border-bottom-width: {{ $u($c['border']) }}; border-radius: {{ $u($c['radius']) }}; gap: {{ $u($p[6]) }}">
        <span class="block shrink-0 bg-[#f6f6f6] text-center font-bold leading-[1.5]" dir="ltr" style="width: {{ $u($c['pill'][0]) }}; height: {{ $u($c['pill'][1]) }}; border-radius: {{ $u($c['pill'][2]) }}; font-size: {{ $u($c['pill'][3]) }}; color: {{ $nd['color'] }}; padding-top: {{ $u($c['pill'][4]) }}">{{ $pct }}%</span>
        <span class="relative block shrink-0" style="width: {{ $u($p[8][0]) }}; height: {{ $u($p[8][1]) }}">
          @if ($nd['group'])
            <span class="absolute" style="{{ $ins($nd['group']) }}"><img src="{{ $img }}/hero-{{ $nd['n'] }}.svg" alt="" class="absolute max-w-none" style="{{ $ins($nd['gimg'] ?? '0') }}" /></span>
          @else
            <img src="{{ $img }}/hero-{{ $nd['n'] }}.svg" alt="" class="absolute max-w-none" style="{{ $ins($nd['gimg'] ?? '0') }}" />
          @endif
        </span>
        <span class="block w-full font-bold leading-[normal]" style="font-size: {{ $u($p[7]) }}; color: {{ $code === 'K2' ? '#e9edf2' : '#f6f6f6' }}; {{ $code === 'K6' ? 'font-weight: 600' : '' }}">{{ $nd['label'] }}</span>
      </div>
    </div>
  @endforeach
</div>
