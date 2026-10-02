import re

with open('resources/views/landing/life-wheel-assessment.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

new_html = """<div id="lw-milestone-overlay" role="status" aria-live="polite" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/40 px-4">
      <div id="lw-milestone-card" class="bg-brand-primary rounded-[16px] md:rounded-[24px] shadow-2xl px-5 py-4 md:px-10 md:py-6 w-[95%] sm:w-auto max-w-[352px] md:max-w-[650px] flex items-center justify-center gap-[8px] md:gap-[16px]">
        <!-- In RTL, the first element appears on the right. -->
        <div id="lw-milestone-icon" class="shrink-0 w-[44px] h-[44px] md:w-[65px] md:h-[65px] lg:w-[75px] lg:h-[75px] flex items-center justify-center"></div>
        <p id="lw-milestone-text" class="font-messiri font-semibold text-white text-[14px] md:text-[22px] lg:text-[26px] leading-snug text-right m-0"></p>
      </div>
    </div>"""

content = re.sub(
    r'<div id="lw-milestone-overlay".*?</p>\s*</div>\s*</div>',
    new_html,
    content,
    flags=re.DOTALL
)

with open('resources/views/landing/life-wheel-assessment.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
