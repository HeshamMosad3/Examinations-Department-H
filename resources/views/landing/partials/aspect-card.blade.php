{{--
  Aspect card: Figma "Service (Desktop)" component set with Property 1 = Default / Expand.
  Both variants are rendered; resources/landing/js/lifeWheelDetails.js swaps them on "عرض التفاصيل" / "اخفاء التفاصيل".
  Expects: $a (resources/data/life-wheel-aspects.php + the user's percentages from LifeWheelController), $d (details images url), $icons (aspect icons url).
--}}
@php $x = $a['expand']; @endphp
<div data-aspect="{{ $a['key'] }}" class="{{ $a['order'] }} xl:order-none w-full">
  {{-- ===== Default variant ===== --}}
  <article data-aspect-default dir="ltr" class="relative h-[161px] w-full bg-white {{ $a['border'] }} border-r-[3px] border-solid drop-shadow-[0px_4px_3.1px_rgba(0,0,0,0.18)] rounded-[17px]">
    <div class="absolute border {{ $a['border'] }} border-solid flex flex-col items-center left-0 pb-[8px] pt-[16px] px-[16px] right-[-3px] rounded-[17px] top-[-1px]">
      <div class="flex flex-col gap-[19px] items-center relative shrink-0 w-full xl:w-[369px]">
        <div class="flex gap-[17px] h-[89px] items-start justify-end relative shrink-0 w-full">
          <div class="flex flex-col gap-[8px] h-[89px] items-end relative min-w-0 flex-1">
            <div class="flex items-center justify-between relative shrink-0 w-full h-[33px]">
              <div class="{{ $a['badge'] }} border border-solid flex flex-col h-[24px] items-center justify-center px-[11px] py-[3px] relative rounded-[9999px] shrink-0 w-[57px]">
                <p class="[word-break:break-word] font-messiri font-bold leading-[16px] relative shrink-0 {{ $a['text'] }} text-[14px] text-right {{ $a['key'] === 'financial' ? 'h-[14px]' : 'h-[13px]' }}">{{ $a['percent'] }}%</p>
              </div>
              <h2 class="[word-break:break-word] font-messiri font-bold leading-[normal] relative self-start shrink-0 {{ $a['text'] }} text-[21px] text-right xl:whitespace-nowrap" dir="auto">{{ $a['name'] }}</h2>
            </div>
            <p class="[word-break:break-word] font-messiri font-medium leading-[normal] relative shrink-0 text-[#565656] text-[14px] text-right max-w-full {{ $a['descWidth'] }}" dir="auto">{{ $a['desc'] }}</p>
          </div>
          @if (empty($a['iconGlyph']))
            <div class="relative shrink-0 size-[50px]">
              <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $icons }}/{{ $a['icon'] }}" />
            </div>
          @else
            <div class="bg-[#fff0e5] flex items-center justify-center relative rounded-[16px] shrink-0 size-[50px]">
              <div class="relative shrink-0 size-[26px]">
                <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $icons }}/{{ $a['icon'] }}" />
              </div>
            </div>
          @endif
        </div>
        <button type="button" data-aspect-toggle="expand" aria-expanded="false" aria-controls="aspect-{{ $a['key'] }}-details" class="cursor-pointer flex gap-[7px] h-[29px] items-center justify-center relative shrink-0 w-full">
          <div class="flex h-[7px] items-center justify-center relative shrink-0 w-[14px]">
            <div class="-rotate-90 flex-none">
              <div class="h-[14px] relative w-[7px]">
                <div class="absolute inset-[-5.36%_-10.71%]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/chevron-down.svg" /></div>
              </div>
            </div>
          </div>
          <div class="flex flex-col items-center relative shrink-0">
            <div class="[word-break:break-word] flex flex-col font-messiri font-semibold justify-center leading-[0] relative shrink-0 text-[#204a7a] text-[17px] text-center whitespace-nowrap">
              <p class="leading-[16px]" dir="auto">عرض التفاصيل</p>
            </div>
          </div>
        </button>
      </div>
    </div>
  </article>

  {{-- ===== Expand variant ===== --}}
  <article data-aspect-expanded id="aspect-{{ $a['key'] }}-details" hidden dir="ltr" class="aspect-x relative {{ $x['width'] ?? 'w-full' }} bg-white {{ $x['border'] }} border-r-[3px] border-solid drop-shadow-[0px_4px_3.1px_rgba(0,0,0,0.18)] rounded-[17px] {{ $x['outer'] }}">
    <div class="aspect-x-inner absolute border {{ $x['border'] }} border-solid flex flex-col items-center rounded-[17px] {{ $x['inner'] }}">
      <div class="aspect-x-content flex flex-col relative shrink-0 {{ $x['content'] }}">
        <div class="aspect-x-fill flex flex-col gap-[19px] items-center relative shrink-0 {{ $x['head'] }}">
          <div class="flex gap-[17px] h-[89px] items-start justify-end relative shrink-0 w-full">
            <div class="aspect-x-text flex flex-col gap-[8px] h-[89px] items-end relative shrink-0 w-[302px]">
              <div class="flex items-center justify-between relative shrink-0 w-full h-[33px]">
                <div class="{{ $a['badge'] }} border border-solid flex flex-col h-[24px] items-center justify-center px-[11px] py-[3px] relative rounded-[9999px] shrink-0 w-[57px]">
                  <p class="[word-break:break-word] font-messiri font-bold leading-[16px] relative shrink-0 {{ $a['text'] }} text-[14px] text-right {{ $a['key'] === 'financial' ? 'h-[14px]' : 'h-[13px]' }}">{{ $a['percent'] }}%</p>
                </div>
                <h2 class="[word-break:break-word] font-messiri font-bold leading-[normal] relative self-start shrink-0 {{ $a['text'] }} text-[21px] text-right whitespace-nowrap" dir="auto">{{ $a['name'] }}</h2>
              </div>
              <p class="[word-break:break-word] font-messiri font-medium leading-[normal] relative shrink-0 text-[#565656] text-[14px] text-right max-w-full {{ $a['descWidth'] }}" dir="auto">{{ $a['desc'] }}</p>
            </div>
            @if (empty($a['iconGlyph']))
              <div class="relative shrink-0 size-[50px]">
                <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $icons }}/{{ $a['icon'] }}" />
              </div>
            @else
              <div class="bg-[#fff0e5] flex items-center justify-center relative rounded-[16px] shrink-0 size-[50px]">
                <div class="relative shrink-0 size-[26px]">
                  <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $icons }}/{{ $a['icon'] }}" />
                </div>
              </div>
            @endif
          </div>
          <button type="button" data-aspect-toggle="collapse" aria-expanded="true" aria-controls="aspect-{{ $a['key'] }}-details" class="aspect-x-fill cursor-pointer flex gap-[7px] h-[29px] items-center justify-center relative shrink-0 {{ $x['hideBtn'] }}">
            <div class="flex h-[7px] items-center justify-center relative shrink-0 w-[14px]">
              <div class="flex-none rotate-90">
                <div class="h-[14px] relative w-[7px]">
                  <div class="absolute inset-[-5.36%_-10.71%]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/chevron-down.svg" /></div>
                </div>
              </div>
            </div>
            <div class="flex flex-col items-center relative shrink-0">
              <div class="[word-break:break-word] flex flex-col font-messiri font-semibold justify-center leading-[0] relative shrink-0 text-[#204a7a] text-[17px] text-center whitespace-nowrap">
                <p class="leading-[16px]" dir="auto">اخفاء التفاصيل</p>
              </div>
            </div>
          </button>
        </div>

        <ul class="aspect-x-list flex flex-col relative shrink-0 {{ $x['list'] }}" aria-label="تفاصيل {{ $a['name'] }}">
          @foreach ($a['subs'] as $s)
            <li class="bg-[#f5f8fc] border border-[#f1f5f9] border-solid flex flex-col items-start px-[16px] py-[8px] relative rounded-[12px] shrink-0 w-full">
              <div class="relative shrink-0 w-full">
                <div class="flex flex-col gap-[10px] {{ $s['rowAlign'] }} relative size-full">
                  <div class="flex items-center justify-between relative shrink-0 w-full">
                    <div class="flex flex-col items-end relative shrink-0">
                      <div class="[word-break:break-word] flex flex-col font-messiri font-bold justify-center leading-[0] relative shrink-0 {{ $s['pct'] ?? $x['pct'] }} text-[14px] text-right whitespace-nowrap">
                        <p class="leading-[20px]">{{ $s['value'] }}%</p>
                      </div>
                    </div>
                    <div class="aspect-x-wrap flex gap-[10px] items-start justify-end relative shrink-0 {{ $s['wrap'] }}">
                      <div class="aspect-x-col flex flex-col gap-[6px] {{ $s['colAlign'] }} relative shrink-0 {{ $s['colW'] }}">
                        <div class="flex flex-col items-end relative shrink-0 w-full h-[26px]">
                          <div class="[word-break:break-word] flex flex-col font-messiri font-semibold justify-center leading-[0] relative shrink-0 text-[#1e293b] text-[17px] text-right {{ $s['titleW'] }}">
                            <p class="leading-[1.5]" dir="auto">{{ $s['title'] }}</p>
                          </div>
                        </div>
                        <div class="aspect-x-fill flex flex-col items-end relative shrink-0 {{ $s['descBox'] }}">
                          <div class="[word-break:break-word] flex flex-col font-messiri font-medium justify-center leading-[0] relative shrink-0 text-[#565656] text-[12px] text-right aspect-x-fill {{ $s['descW'] }}">
                            <p class="{{ $s['descLeading'] }}" dir="auto">{{ $s['desc'] }}</p>
                          </div>
                        </div>
                      </div>
                      @if ($s['iconInner'])
                        <div class="{{ $x['box'] }} border border-solid flex items-center justify-center p-px relative rounded-[11px] shrink-0 size-[36px]">
                          @if ($s['iconWrap'])
                            <div class="relative shrink-0 {{ $s['iconInner'] }}">
                              <div class="absolute inset-[0_0_-0.96%_0]"><img alt="" class="block max-w-none size-full" src="{{ $icons }}/{{ $s['file'] }}" /></div>
                            </div>
                          @else
                            <div class="relative shrink-0 {{ $s['iconInner'] }}">
                              <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $icons }}/{{ $s['file'] }}" />
                            </div>
                          @endif
                        </div>
                      @else
                        <div class="relative shrink-0 size-[36px]">
                          <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $icons }}/{{ $s['file'] }}" />
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="bg-[rgba(226,232,240,0.8)] h-[6px] overflow-clip relative rounded-[9999px] shrink-0 w-full" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $s['value'] }}" aria-label="{{ $s['title'] }}">
                    <div class="absolute inset-y-0 right-0 {{ $s['bar'] ?? $x['bar'] }} rounded-[9999px]" style="width: {{ $s['value'] }}%"></div>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </article>
</div>
