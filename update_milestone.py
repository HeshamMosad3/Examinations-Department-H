import re

with open('resources/landing/js/lifeWheelAssessment.js', 'r', encoding='utf-8') as f:
    content = f.read()

replacement = """const milestoneAssets = [
  { text: 'خطوة جديدة اكتملت! كمّل رحلتك.', lottieId: 'OAHxNuU4Si' }, // Will fallback to generic
  { text: 'رائع! أنت تتقدم خطوة بخطوة، استمر.', lottieId: '1sqUkEmSHl' }, // generic
  { text: 'ممتاز! تقدّمك واضح، خلّينا نكمل.', lottieId: '6NSSGC1Ans' }, // generic
  { text: 'أنت في منتصف الطريق! كمّل بنفس الحماس.', lottieId: '1sqUkEmSHl' }, // midpoint
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottieId: '7657sr3SyT' }, // generic
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottieId: 'qtvo8wJqH2' }, // generic
  { text: 'باقي خطوة واحدة! أنت قريب من النهاية.', lottieId: '6-1mo3C04OXC' }, // almost done
  { text: 'أحسنت! اكتملت رحلتك، اكتشف نتيجتك.', lottieId: 'OAHxNuU4Si' } // complete
];

function showMilestone() {
  const overlay = document.getElementById('lw-milestone-overlay');
  const text = document.getElementById('lw-milestone-text');
  const iconContainer = document.getElementById('lw-milestone-icon');
  
  if (!overlay || !text || !iconContainer) return;
  
  const isLast = currentCategoryIndex === TOTAL_CATEGORIES - 1;
  const asset = milestoneAssets[currentCategoryIndex] || milestoneAssets[0];
  
  text.textContent = asset.text;
  
  // Try to load the Lottie animation via embed URL
  iconContainer.innerHTML = `<dotlottie-player src="https://lottie.host/embed/${asset.lottieId}/" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></dotlottie-player>`;
  
  overlay.classList.remove('hidden');
  overlay.classList.add('flex');
  
  // Also fire confetti for extra celebration
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
