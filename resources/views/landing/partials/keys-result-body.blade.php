{{--
  جسم صفحة نتيجة مفاتيح الشخصية السبعة: مخطط المفاتيح + أبرز المفاتيح + «ماذا تعني هذه النتيجة؟».
  مشترك بين صفحة النتيجة وتقرير الـPDF. يحتاج: $keys, $top, $next, $lowest, $overall, $overallLevel, $subCount
--}}
@php
  $img = '/landing/images/keys-result';
  $kimg = '/landing/images/personality-keys-explore';
  $percents = $keys->mapWithKeys(fn ($k) => [$k->code => $k->percent])->all();

  // ألوان كل مفتاح في كروت «أبرز المفاتيح» (الأعلى والتالي والأقل حضورًا)
  $themes = [
    'K1' => ['accent' => '#204a7a', 'end' => '#deeaff', 'iconBg' => '#ddebfe', 'pct' => '#4f6ea5', 'label' => '#475d7c'],
    'K2' => ['accent' => '#64748b', 'end' => '#f3f3f4', 'iconBg' => '#eef1f5', 'pct' => '#556378', 'label' => '#475d7c'],
    'K3' => ['accent' => '#5fae7d', 'end' => '#e3f6ea', 'iconBg' => '#e3f6ea', 'pct' => '#227f45', 'label' => '#3f7a59'],
    'K4' => ['accent' => '#735297', 'end' => '#efe7f8', 'iconBg' => '#f1e8fa', 'pct' => '#5d3589', 'label' => '#614283'],
    'K5' => ['accent' => '#ccab3e', 'end' => '#fbf2d6', 'iconBg' => '#fdf3d3', 'pct' => '#b89336', 'label' => '#8f7425'],
    'K6' => ['accent' => '#b35769', 'end' => '#fff1f4', 'iconBg' => '#ffebf0', 'pct' => '#a04a5b', 'label' => '#a04a5b'],
    'K7' => ['accent' => '#8640c9', 'end' => '#f1e6fb', 'iconBg' => '#f3e8fd', 'pct' => '#752fb7', 'label' => '#6d2fb0'],
  ];
  // أيقونة كل مفتاح (من صفحة الاستكشاف): ملف + إطار القص + إطار الصورة جواه
  $icons = [
    'K1' => ['key-1', '21.87% 9.37% 21.88% 9.38%', null], 'K2' => ['key-2', null, null, true], 'K3' => ['key-3', null, null],
    'K4' => ['key-4', '16.67% 8.35% 12.5% 8.32%', '-3.8% -3.23%'], 'K5' => ['key-5', null, null], 'K6' => ['key-6', null, null], 'K7' => ['key-7', null, null],
  ];
  $ins = function ($v) {
    $t = array_map('floatval', preg_split('/\s+/', trim($v ?: '0')));
    [$top, $right, $bottom, $left] = match (count($t)) { 1 => [$t[0], $t[0], $t[0], $t[0]], 2 => [$t[0], $t[1], $t[0], $t[1]], default => [$t[0], $t[1], $t[2], $t[3]] };
    return 'left:' . $left . '%;top:' . $top . '%;width:' . (100 - $left - $right) . '%;height:' . (100 - $top - $bottom) . '%';
  };
  // أيقونة المفتاح داخل مربع (الحجم بالـpx): K2 أيقونتها كاملة بخلفيتها
  $keyIcon = function (string $code, int $size, int $inner) use ($themes, $icons, $kimg, $ins) {
    [$file, $group, $gimg] = $icons[$code]; $whole = ! empty($icons[$code][3]);
    $bg = $whole ? 'transparent' : $themes[$code]['iconBg'];
    $html = '<span class="relative flex shrink-0 items-center justify-center rounded-[7.429px]" style="width:' . $size . 'px;height:' . $size . 'px;background:' . $bg . '">';
    if ($whole) {
      $html .= '<img src="' . $kimg . '/' . $file . '.svg" alt="" class="absolute inset-0 size-full max-w-none" />';
    } else {
      $html .= '<span class="relative block" style="width:' . $inner . 'px;height:' . $inner . 'px">';
      $html .= $group
        ? '<span class="absolute" style="' . $ins($group) . '"><img src="' . $kimg . '/' . $file . '.svg" alt="" class="absolute max-w-none" style="' . $ins($gimg ?? '0') . '" /></span>'
        : '<img src="' . $kimg . '/' . $file . '.svg" alt="" class="absolute inset-0 size-full max-w-none" />';
      $html .= '</span>';
    }

    return $html . '</span>';
  };

  // مخطط المفاتيح: إحداثيات فيجما (ديسكتوب #3551:8838 / موبايل #3551:9789) في resources/data/keys-result-diagram.php، ومشتركة مع تقرير الـ PDF
  ['desktop' => $desktop, 'mobile' => $mobile] = require resource_path('data/keys-result-diagram.php');

  // ماذا تعني هذه النتيجة؟ فقرات مستوى النتيجة الإجمالية (من قاعدة البيانات، بتتعدل من الأدمن)، وأول فقرة بتظهر والباقي تحت «عرض المزيد»
  $paragraphs = $overallLevel ? array_values(array_filter(array_map('trim', preg_split('/\R+/u', (string) $overallLevel->description_ar)), 'strlen')) : [];
  if (! $paragraphs) {
    $level = $overall >= 80 ? 'المرتفع جدًا' : ($overall >= 65 ? 'المرتفع' : ($overall >= 40 ? 'المتوسط' : 'المنخفض'));
    $paragraphs = ["تشير نتيجتك إلى أن مستوى حضور السمات التي يقيسها مقياس مفاتيح الشخصية السبعة لديك يقع ضمن المستوى {$level}."];
  }
  $hasMore = count($paragraphs) > 1 || mb_strlen($paragraphs[0]) > 330;
  $chartNote = str_replace(':count', $subCount, cms('keys_result.chart.note', 'توضح النتائج مستويات مفاتيح شخصيتك السبعة.'));
@endphp
    <div class="flex flex-col min-[1280px]:flex-row min-[1280px]:items-stretch gap-[24px] min-[1280px]:gap-[27px] {{ ($pdf ?? false) ? 'min-[1280px]:flex-wrap' : '' }}">

      <!-- مخطط المفاتيح -->
      <section data-kr-chart class="relative bg-white overflow-clip border border-[#d6e6f8] min-[1280px]:border-0 rounded-[20px] min-[1280px]:rounded-[30px] shadow-[0px_0.8px_0px_rgba(91,89,89,0.25)] min-[1280px]:shadow-[0px_5px_11.8px_rgba(0,0,0,0.03)] w-full min-[1280px]:w-[630px] h-[455px] min-[1280px]:h-auto min-[1280px]:min-h-[699px] shrink-0" aria-labelledby="kr-chart">
        <div class="absolute left-1/2 -translate-x-1/2 top-[19px] min-[1280px]:top-[24px] w-[320px] min-[1280px]:w-[582px] max-w-[calc(100%-24px)] h-[33px] min-[1280px]:h-[48px] flex items-center justify-between border-b border-[#f1f5f9] pb-[13px]">
          <h2 id="kr-chart" class="flex items-center gap-[2px] min-[1280px]:gap-[8px] font-semibold min-[1280px]:font-bold text-[14px] min-[1280px]:text-[21px] leading-[1.5] min-[1280px]:leading-[normal] text-[#262626]">
            <span class="flex size-[17px] min-[1280px]:size-[28px] shrink-0 items-center justify-center rotate-90" aria-hidden="true"><img src="{{ $img }}/share.svg" alt="" class="max-w-none w-[12.83px] h-[14.25px] min-[1280px]:w-[20.67px] min-[1280px]:h-[23px]" /></span>
            <span>{{ cms('keys_result.chart.title', 'مخطط مفاتيح شخصيتك السبعة') }}</span>
          </h2>
          <span class="rounded-full bg-[#f1f5f9] px-[12px] py-[4px] font-medium text-[12px] min-[1280px]:text-[14px] leading-[1.5] min-[1280px]:leading-[normal] text-[#565656] whitespace-pre">{{ cms('keys_result.chart.badge', '7 أبعاد رئيسية') }}</span>
        </div>

        <!-- ديسكتوب -->
        <div data-chart-diagram class="hidden min-[1280px]:block absolute left-1/2 -translate-x-1/2 top-[112px]" style="--u: 1px">
          @include('landing.partials.keys-result-diagram', ['c' => $desktop, 'percents' => $percents])
        </div>
        <!-- موبايل -->
        <div class="min-[1280px]:hidden absolute left-1/2 -translate-x-1/2 top-[68px] w-[393px] max-w-[calc(100%+30px)]" style="container-type: inline-size">
          <div style="--u: calc(100cqw / 393); height: calc(100cqw * 334 / 393)">
            @include('landing.partials.keys-result-diagram', ['c' => $mobile, 'percents' => $percents])
          </div>
        </div>

        <p class="absolute left-0 right-0 text-center font-normal text-[11px] min-[1280px]:text-[20px] leading-[normal] text-[#565656] top-[417px] min-[1280px]:top-auto min-[1280px]:bottom-[29px]">{{ $chartNote }}</p>
      </section>

      <div class="{{ ($pdf ?? false) ? 'contents' : 'flex flex-col gap-[24px] min-[1280px]:gap-[28px] min-[1280px]:w-[581px] min-[1280px]:shrink-0 min-[1280px]:flex-1 min-[1280px]:min-h-[699px]' }}">

        <!-- أبرز مفاتيحك -->
        <section class="{{ ($pdf ?? false) ? 'min-[1280px]:flex-1 min-[1280px]:min-w-0' : '' }} bg-white border border-[#e2e8f0] rounded-[16px] shadow-[0px_2px_8px_-2px_rgba(15,23,42,0.04)] min-[1280px]:shadow-none p-[16px] min-[1280px]:px-[30px] min-[1280px]:py-[26px] flex flex-col gap-[12px] min-[1280px]:gap-[18px]" aria-labelledby="kr-highlights">
          <div class="flex items-center gap-[14px] min-[1280px]:gap-[16px] min-[1280px]:h-[33px]">
            <span class="flex size-[28px] min-[1280px]:size-[32px] shrink-0 items-center justify-center rounded-[8px] min-[1280px]:rounded-[7.429px] bg-[#eff6ff]"><img src="{{ $img }}/key-outline.svg" alt="" class="size-[18px] min-[1280px]:size-[24px]" /></span>
            <h2 id="kr-highlights" class="font-bold text-[17px] min-[1280px]:text-[21px] leading-[normal] text-[#262626]">{{ cms('keys_result.highlights.title', 'أبرز مفاتيح شخصيتك') }}</h2>
          </div>

          <div class="flex flex-col gap-[10px] {{ ($pdf ?? false) ? 'min-[1280px]:flex-1 min-[1280px]:gap-[28px]' : 'min-[1280px]:gap-[14px]' }}">
            <div class="flex items-start justify-center gap-[8px] {{ ($pdf ?? false) ? 'min-[1280px]:contents' : 'min-[1280px]:gap-[19px] min-[1280px]:justify-start' }}">
              @foreach ([[$top, cms('keys_result.highlights.top', 'المفتاح الأعلى')], [$next, cms('keys_result.highlights.next', 'المفتاح التالي')]] as [$k, $label])
                @if ($k)
                  @php $t = $themes[$k->code]; @endphp
                  <div class="min-w-0 flex-1 {{ ($pdf ?? false) ? 'min-[1280px]:basis-0 min-[1280px]:w-full min-[1280px]:h-auto' : 'min-[1280px]:flex-none min-[1280px]:w-[250px] min-[1280px]:h-[126px]' }} flex flex-col justify-center rounded-[12px] border border-r-[4px] border-solid p-[12px] min-[1280px]:px-[14px] min-[1280px]:py-[11px]" style="border-color: {{ $t['accent'] }}; background: linear-gradient(to right, {{ $label === cms('keys_result.highlights.top', 'المفتاح الأعلى') ? '#fcfdfe' : '#fcfdfe' }}, {{ $t['end'] }})">
                    <div class="flex flex-col gap-[14px] min-[1280px]:gap-[21px]">
                      <div class="flex items-start justify-between gap-[8px]">
                        <div class="flex flex-col gap-[5px] min-[1280px]:w-[104px]">
                          <span class="font-semibold text-[12px] min-[1280px]:text-[17px] leading-[1.5] min-[1280px]:leading-[26px]" style="color: {{ $t['label'] }}">{{ $label }}</span>
                          <span class="font-bold text-[14px] min-[1280px]:text-[21px] leading-[normal] text-[#262626] whitespace-nowrap min-[1280px]:flex min-[1280px]:h-[26px] min-[1280px]:items-center">{{ $k->name }} ({{ $k->code }})</span>
                        </div>
                        <span class="min-[1280px]:hidden">{!! $keyIcon($k->code, 32, 20) !!}</span>
                        <span class="hidden min-[1280px]:block">{!! $keyIcon($k->code, 36, 24) !!}</span>
                      </div>
                      <span class="block min-[1280px]:flex min-[1280px]:h-[24px] min-[1280px]:items-center font-bold text-[21px] min-[1280px]:text-[25px] leading-[normal]" dir="ltr" style="color: {{ $t['pct'] }}; text-align: left">{{ $k->percent }}%</span>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>

            @if ($lowest && $lowest !== $top)
              @php $t = $themes[$lowest->code]; @endphp
              <div class="rounded-[12px] border border-r-[4px] border-solid px-[13px] py-[11px] min-[1280px]:p-[15px] {{ ($pdf ?? false) ? 'min-[1280px]:flex-1 min-[1280px]:basis-0 min-[1280px]:flex min-[1280px]:flex-col min-[1280px]:justify-center' : 'min-[1280px]:h-[120px]' }}" style="border-color: {{ $t['accent'] }}; background: linear-gradient(to right, #fff, {{ $t['end'] }})">
                <div class="flex items-start justify-between gap-[8px] min-[1280px]:h-[64px]">
                  <div class="flex flex-col gap-[5px] min-w-0 flex-1 min-[1280px]:flex-none min-[1280px]:w-[285px]">
                    <div class="flex items-center gap-[16px] min-[1280px]:items-start">
                      <span class="font-bold min-[1280px]:font-semibold text-[12px] min-[1280px]:text-[17px] leading-[normal] min-[1280px]:leading-[1.5]" style="color: {{ $t['pct'] }}">{{ cms('keys_result.highlights.lowest', 'المفتاح الأقل حضوراً') }}</span>
                      <span class="flex h-[18px] min-[1280px]:h-[23px] min-[1280px]:w-[129px] min-[1280px]:justify-center items-center rounded-full px-[8px] font-bold text-[10px] min-[1280px]:text-[17px] leading-[normal] whitespace-nowrap" style="background: {{ $t['iconBg'] }}; color: {{ $t['pct'] }}">{{ cms('keys_result.highlights.priority', 'أولوية تطوير') }}</span>
                    </div>
                    <span class="font-bold text-[17px] min-[1280px]:text-[21px] leading-[normal] text-[#262626] min-[1280px]:h-[33px]">{{ $lowest->name }} ({{ $lowest->code }})</span>
                  </div>
                  <span class="min-[1280px]:hidden">{!! $keyIcon($lowest->code, 32, 20) !!}</span>
                  <span class="hidden min-[1280px]:block">{!! $keyIcon($lowest->code, 36, 24) !!}</span>
                </div>
                <span class="mt-[-4px] min-[1280px]:mt-0 block min-[1280px]:flex min-[1280px]:h-[24px] min-[1280px]:items-center font-bold min-[1280px]:font-semibold text-[21px] min-[1280px]:text-[25px] leading-[normal] min-[1280px]:leading-[1.5]" dir="ltr" style="color: {{ $t['pct'] }}; text-align: left">{{ $lowest->percent }}%</span>
              </div>
            @endif
          </div>
        </section>

        <!-- ماذا تعني هذه النتيجة؟ -->
        <section class="{{ ($pdf ?? false) ? 'min-[1280px]:basis-full min-[1280px]:w-full' : '' }} rounded-[16px] min-[1280px]:rounded-[20px] border border-[#a3c0e2] px-[15px] py-[19px] min-[1280px]:px-[18px] min-[1280px]:pt-[40px] min-[1280px]:pb-[36px] min-[1280px]:flex-1 flex flex-col justify-between" style="background-image: linear-gradient(79deg, #fff 1%, #d2dfef 99%)" aria-labelledby="kr-insight">
          <div class="flex items-start gap-[8px] min-[1280px]:gap-[12px] w-full">
            <span class="flex size-[41px] min-[1280px]:size-[56px] shrink-0 items-center justify-center rounded-[12px] bg-[#204a7a]"><img src="{{ $img }}/lightbulb.svg" alt="" class="size-[22px] min-[1280px]:size-[32px]" /></span>
            <div class="flex min-w-0 flex-1 flex-col gap-[10px] min-[1280px]:gap-[24px]">
              <div class="flex items-center justify-between min-[1280px]:items-start w-full">
                <h2 id="kr-insight" class="font-bold text-[14px] min-[1280px]:text-[25px] leading-[normal] text-[#172554] whitespace-nowrap">{{ cms('keys_result.insight.title', 'ماذا تعني هذه النتيجة؟') }}</h2>
                <span class="flex items-center gap-[4px] rounded-full bg-white min-[1280px]:bg-[#e9edf2] px-[12px] py-[4px] font-medium min-[1280px]:font-semibold text-[10px] min-[1280px]:text-[14px] leading-[16px] text-[#204a7a] min-[1280px]:h-[33px] min-[1280px]:items-center shrink-0">
                  <span>{{ cms('keys_result.insight.badge', 'تحليل ذكي') }}</span>
                  <img src="{{ $img }}/sparkle.svg" alt="" class="size-[11px] min-[1280px]:size-[13px]" />
                </span>
              </div>
              <div class="w-full font-medium text-[11px] min-[1280px]:text-[20px] leading-[17.88px] min-[1280px]:leading-[1.6] text-[#565656] text-right">
                <div class="w-full relative before:content-['*'] before:absolute before:top-[0.4em] before:right-[-49px] before:w-[41px] min-[1280px]:before:right-[-68px] min-[1280px]:before:w-[56px] before:text-center before:text-[1.9em] before:font-bold before:leading-none before:text-[#204a7a]"><p data-first class="{{ $hasMore ? 'line-clamp-5' : '' }} w-full text-right">{{ $paragraphs[0] }}</p></div>
                @if ($hasMore)
                  <div data-more class="hidden flex-col gap-[10px] mt-[10px] w-full text-right">
                    @foreach (array_slice($paragraphs, 1) as $paragraph)
                      <p class="relative before:content-['*'] before:absolute before:top-[0.4em] before:right-[-49px] before:w-[41px] min-[1280px]:before:right-[-68px] min-[1280px]:before:w-[56px] before:text-center before:text-[1.9em] before:font-bold before:leading-none before:text-[#204a7a]">{{ $paragraph }}</p>
                    @endforeach
                  </div>
                  <button type="button" data-more-toggle data-label-more="{{ cms('keys_result.insight.more', 'عرض المزيد') }}" data-label-less="{{ cms('keys_result.insight.less', 'عرض أقل') }}" aria-expanded="false" class="mt-[10px] flex items-center gap-[6px] font-semibold text-[12px] min-[1280px]:text-[17px] leading-[1.5] text-[#204a7a] cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2 rounded">
                    <span data-label>{{ cms('keys_result.insight.more', 'عرض المزيد') }}</span>
                    <svg data-chevron class="w-[10px] h-[6px] transition-transform duration-200" viewBox="0 0 11 6" fill="none" aria-hidden="true"><path d="M1 1l4.5 4L10 1" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                @endif
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
