import re

with open('resources/views/landing/life-wheel-assessment.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

overlay_html = """<div id="lw-milestone-overlay" role="status" aria-live="polite" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/40 px-4">
      <div id="lw-milestone-card" class="bg-brand-primary rounded-[16px] shadow-2xl px-5 py-4 max-w-[352px] w-full flex flex-row-reverse items-center justify-center gap-[12px]">
        <!-- Flex row reverse because we want Lottie on the right in RTL, or just flex-row with proper dir -->
        <div id="lw-milestone-icon" class="shrink-0 w-[44px] h-[44px] md:w-[55px] md:h-[55px] flex items-center justify-center"></div>
        <div class="flex-1 text-right">
          <p id="lw-milestone-text" class="font-messiri font-semibold text-white text-[14px] leading-snug"></p>
        </div>
      </div>
    </div>"""

content = re.sub(
    r'<div id="lw-milestone-overlay".*?</p>\s*</div>\s*</div>',
    overlay_html,
    content,
    flags=re.DOTALL
)

if 'dotlottie-player.mjs' not in content:
    script_tag = '<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>\n</body>'
    content = content.replace('</body>', script_tag)

with open('resources/views/landing/life-wheel-assessment.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
