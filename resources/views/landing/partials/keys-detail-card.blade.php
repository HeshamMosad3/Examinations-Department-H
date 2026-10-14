{{--
  كارت مفتاح في صفحة تفاصيل المفاتيح (Figma: ديسكتوب #3551:13181.. / موبايل #3551:13812..)
  $key: المفتاح (code, name, percent, level, summary, subs)، $t: ألوان المفتاح، $v: 'd' ديسكتوب أو 'm' موبايل، $showDetails: التفاصيل متاحة (الملف الشخصي مكتمل)
  الإحداثيات absolute بوحدات فيجما (LTR)، والنصوص جواها rtl.
--}}
@php
  $d = $v === 'd';
  $img = '/landing/images/keys-details';
  $img_c = $d
    ? ($key->code === 'K1' ? [-0.11, -1, 115, 232] : [-1.11, -1.11, 123, 232])
    : ($key->code === 'K2' ? [5, 6, 98, 190] : ($key->code === 'K7' ? [-1, -1, 103, 210] : ($key->code === 'K5' ? [0, -2, 103, 210] : [0, -1, 103, 210])));
  $px = fn ($n) => $n . 'px';
@endphp
<article data-key-card data-open="false" class="relative bg-white border-solid {{ $d ? 'rounded-[20px] border-r-[6px]' : 'rounded-[17px] border-r-[5px]' }} w-full" style="border-color: {{ $t['accent'] }}">
  <div class="relative flex flex-col {{ $d ? 'mr-[-6px] rounded-[18px]' : 'mr-[-5px] rounded-[17px]' }} -mt-px border-solid border-[1.111px]" style="border-color: {{ $t['outer'] }}">
    <div class="relative shrink-0" style="height: {{ $d ? 231 : 208 }}px" dir="rtl">
      <img src="{{ $img }}/{{ strtolower($key->code) }}.webp" alt="" loading="lazy" decoding="async" class="absolute max-w-none object-cover pointer-events-none {{ $key->code === 'K2' && ! $d ? 'rounded-[12px]' : ($d ? 'rounded-l-[20px]' : 'rounded-l-[17px]') }}" style="left: {{ $px($img_c[0]) }}; top: {{ $px($img_c[1]) }}; width: {{ $px($img_c[2]) }}; height: {{ $px($img_c[3]) }}" />

      {{-- الاسم والمستوى والنسبة --}}
      <div class="absolute flex items-center {{ $d ? 'gap-[6px]' : 'justify-between' }}" style="left: {{ $d ? '114.89px; top: 21px; width: 269px' : '117px; top: 19px; width: 229px' }}">
        <p class="font-bold leading-[normal] whitespace-nowrap {{ $d ? 'text-[20px]' : 'text-[17px]' }}" style="color: {{ $t['name'] }}">{{ $key->name }} ({{ $key->code }})</p>
        @if ($key->level)
          <span class="flex items-center justify-center rounded-full border border-solid font-bold whitespace-nowrap {{ $d ? 'h-[25px] min-w-[90px] px-[12.2px] py-[3.3px] text-[14px] border-[1.111px]' : 'h-[23px] min-w-[75px] px-[11px] py-[3px] text-[12px]' }}" style="background: {{ $t['chipBg'] }}; border-color: {{ $t['chipBd'] }}; color: {{ $t['chipTx'] }}">{{ $key->level }}</span>
        @endif
        <span dir="ltr" class="flex items-center justify-center rounded-full border border-solid font-bold {{ $d ? 'h-[25.5px] min-w-[57.76px] px-[12.2px] py-[3.3px] text-[14px] border-[1.111px]' : 'h-[23px] min-w-[52px] px-[11px] py-[3px] text-[12px]' }}" style="background: {{ $t['chipBg'] }}; border-color: {{ $t['chipBd'] }}; color: {{ $t['chipTx'] }}">{{ $key->percent }}%</span>
      </div>

      {{-- الوصف --}}
      @if ($showDetails && $key->summary)
        <p class="absolute font-medium leading-[normal] text-[#565656] text-right" style="left: {{ $d ? '109.34px; top: 81.09px; width: 275px; font-size: 16px' : '103px; top: 73px; width: 243px; font-size: 14px' }}">{{ $key->summary }}</p>
      @endif

      {{-- عرض / إخفاء التفاصيل --}}
      @if ($showDetails && $key->subs->isNotEmpty())
        <button type="button" data-toggle aria-expanded="false" class="kd-no-print absolute flex items-center justify-center font-semibold cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 rounded-[8px] {{ $d ? 'gap-[10px] h-[32px] w-[174px] text-[17px]' : 'gap-[7px] h-[29px] w-[157px] text-[14px]' }}" style="color: {{ $t['name'] }}; --tw-ring-color: {{ $t['name'] }}; left: {{ $d ? 'calc(50% - 87px); top: 186px' : 'calc(50% - 68.5px); top: 167px' }}">
          <span data-label class="leading-[normal]">عرض التفاصيل</span>
          <svg data-chevron class="shrink-0 transition-transform duration-200 {{ $d ? 'w-[11px] h-[6px]' : 'w-[10px] h-[5px]' }}" viewBox="0 0 11 6" fill="none" aria-hidden="true"><path d="M1 1l4.5 4L10 1" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
      @endif
    </div>

    @if ($showDetails && $key->subs->isNotEmpty())
      <div data-list class="kd-list hidden flex-col gap-[10px] {{ $d ? 'mt-[14.5px] pb-[23.5px] px-[16px]' : 'mt-[20px] pb-[19px] px-[16px]' }}">
        @foreach ($key->subs as $sub)
          <div class="rounded-[12px] border border-solid {{ $d ? 'w-[372px] max-w-full mx-auto min-h-[130px] px-[14px] py-[10px]' : 'min-h-[116px] px-[13px] py-[9px]' }}" style="background: {{ $t['subBg'] }}; border-color: {{ $t['subBd'] }}">
            <div class="flex items-start {{ $d ? 'gap-[8px]' : 'justify-between' }}">
              <span class="shrink-0 flex items-center justify-center rounded-[11px] border border-solid p-px font-medium text-black {{ $d ? 'size-[35px] text-[14px]' : 'size-[32px] text-[11px]' }}" dir="ltr" style="background: {{ $t['badgeBg'] }}; border-color: {{ $t['badgeBd'] }}">{{ $sub->code }}</span>
              <div class="flex flex-col gap-[8px] {{ $d ? 'w-[297px]' : 'w-[258px]' }}">
                <div class="flex items-center justify-between">
                  <h4 class="font-bold leading-[normal] text-[#262626] {{ $d ? 'text-[16px]' : 'text-[14px]' }}">{{ $sub->name }}</h4>
                  @if ($sub->level)
                    <span class="flex items-center justify-center rounded-full border border-solid font-bold whitespace-nowrap {{ $d ? 'h-[26px] px-[11px] py-[3px] text-[14px]' : 'h-[23px] px-[11px] py-[3px] text-[12px]' }}" style="background: {{ $t['chipBg'] }}; border-color: {{ $t['subChipBd'] }}; color: {{ $t['chipTx'] }}">{{ $sub->level }}</span>
                  @endif
                </div>
                @if ($sub->summary)
                  <p class="font-medium leading-[normal] text-[#565656] {{ $d ? 'text-[14px]' : 'text-[11px]' }}">{{ $sub->summary }}</p>
                @endif
              </div>
            </div>
            <div class="mt-[0px] flex flex-col gap-[5px]" dir="ltr">
              <span class="font-bold leading-[20px] {{ $d ? 'text-[16px]' : 'text-[14px]' }}" style="color: {{ $t['fill'] }}">{{ $sub->score }}/{{ $sub->max }}</span>
              <div class="h-[6px] w-full overflow-hidden rounded-full flex justify-end" style="background: {{ $t['track'] }}" role="progressbar" aria-valuemin="0" aria-valuemax="{{ $sub->max }}" aria-valuenow="{{ $sub->score }}" aria-label="{{ $sub->name }}">
                <div class="h-full rounded-full" style="width: {{ $sub->percent }}%; background: {{ $t['fill'] }}"></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</article>
