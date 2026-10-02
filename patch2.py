import re

with open('resources/landing/js/lifeWheelAssessment.js', 'r', encoding='utf-8') as f:
    content = f.read()

bad = """<h2 class="font-messiri font-bold text-brand-primary text-[20px] sm:text-[22px] md:text-[28px]">${titleLabel}</h2>
          <div class="w-[38px] h-[38px] md:w-[54px] md:h-[54px] rounded-full bg-[#EFF3F8] flex items-center justify-center shrink-0">
            <span class="lw-icon-mask w-[18px] h-[18px] md:w-[24px] md:h-[24px] text-brand-primary" style="--icon-url:url('${cat.iconUrl}')"></span>
          </div>"""

good = """<div class="w-[38px] h-[38px] md:w-[54px] md:h-[54px] rounded-full bg-[#EFF3F8] flex items-center justify-center shrink-0">
            <span class="lw-icon-mask w-[18px] h-[18px] md:w-[24px] md:h-[24px] text-brand-primary" style="--icon-url:url('${cat.iconUrl}')"></span>
          </div>
          <h2 class="font-messiri font-bold text-brand-primary text-[20px] sm:text-[22px] md:text-[28px]">${titleLabel}</h2>"""

content = content.replace(bad, good)

# Also fix the text-right class on the description to make sure it aligns right correctly, and the flex-start
content = content.replace(
    '<div class="flex flex-col items-start gap-1.5 md:gap-2 mb-2 md:mb-3">',
    '<div class="flex flex-col items-end gap-1.5 md:gap-2 mb-2 md:mb-3 w-full">'
)
# Note: since the parent is w-full, items-end aligns to the left? NO! In RTL, start is right, end is left.
# The original code was items-start (which is right in RTL), so let's put it back to items-start.
content = content.replace(
    '<div class="flex flex-col items-end gap-1.5 md:gap-2 mb-2 md:mb-3 w-full">',
    '<div class="flex flex-col items-start gap-1.5 md:gap-2 mb-2 md:mb-3">'
)

content = content.replace(
    '<div class="w-full flex justify-end">',
    '<div class="w-full flex justify-start">'
)

content = content.replace(
    '<div class="flex items-center justify-end w-full gap-2.5 md:gap-3">',
    '<div class="flex items-center justify-start w-full gap-2.5 md:gap-3">'
)

with open('resources/landing/js/lifeWheelAssessment.js', 'w', encoding='utf-8') as f:
    f.write(content)
