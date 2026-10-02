import re

with open('resources/landing/js/lifeWheelAssessment.js', 'r', encoding='utf-8') as f:
    content = f.read()

replacement = """const milestoneAssets = [
  { text: 'خطوة جديدة اكتملت! كمّل رحلتك.', lottie: 'aspect-1.json' },
  { text: 'رائع! أنت تتقدم خطوة بخطوة، استمر.', lottie: 'aspect-2.json' },
  { text: 'ممتاز! تقدّمك واضح، خلّينا نكمل.', lottie: 'aspect-3.json' },
  { text: 'أنت في منتصف الطريق! كمّل بنفس الحماس.', lottie: 'aspect-4.json' },
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottie: 'aspect-5.json' },
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottie: 'aspect-6.json' },
  { text: 'باقي خطوة واحدة! أنت قريب من النهاية.', lottie: 'aspect-7.json' },
  { text: 'أحسنت! اكتملت رحلتك، اكتشف نتيجتك.', lottie: 'aspect-8.json' }
];

function showMilestone() {
  const overlay = document.getElementById('lw-milestone-overlay');
  const text = document.getElementById('lw-milestone-text');
  const iconContainer = document.getElementById('lw-milestone-icon');
  
  if (!overlay || !text || !iconContainer) return;
  
  const isLast = currentCategoryIndex === TOTAL_CATEGORIES - 1;
  const asset = milestoneAssets[currentCategoryIndex] || milestoneAssets[0];
  
  text.textContent = asset.text;
  
  // Render the dotlottie player (if the user downloaded the JSON to public/landing/lotties)
  // Or it will just silently fail to load the animation if the file is missing, but the text will show.
  iconContainer.innerHTML = `<dotlottie-player src="/landing/lotties/${asset.lottie}" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></dotlottie-player>`;
  
  overlay.classList.remove('hidden');
  overlay.classList.add('flex');
  
  fireConfetti();

  setTimeout(() => {
    overlay.classList.add('hidden');
    overlay.classList.remove('flex');
    if (isLast) {
      showCompletionScreen();
    } else {
      goToCategory(currentCategoryIndex + 1);
    }
  }, 2500);
}"""

content = re.sub(
    r'function showMilestone\(\) \{[\s\S]*?^  \}\n',
    replacement + '\n',
    content,
    flags=re.MULTILINE
)

with open('resources/landing/js/lifeWheelAssessment.js', 'w', encoding='utf-8') as f:
    f.write(content)
