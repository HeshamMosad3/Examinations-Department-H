import re

with open('resources/landing/js/lifeWheelAssessment.js', 'r', encoding='utf-8') as f:
    content = f.read()

replacement = """const milestoneAssets = [
  { text: 'خطوة جديدة اكتملت! كمّل رحلتك.', lottieId: 'complete-MKKKNzoUXV' },
  { text: 'رائع! أنت تتقدم خطوة بخطوة، استمر.', lottieId: 'growing-plant-1sqUkEmSHl' },
  { text: 'ممتاز! تقدّمك واضح، خلّينا نكمل.', lottieId: 'fanndrop-spark-6NSSGC1Ans' },
  { text: 'أنت في منتصف الطريق! كمّل بنفس الحماس.', lottieId: 'growing-plant-1sqUkEmSHl' },
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottieId: 'flower-animation-7657sr3SyT' },
  { text: 'أحسنت! جانب جديد اكتمل، ورحلتك بتكبر.', lottieId: 'flower-animation-qtvo8wJqH2' },
  { text: 'باقي خطوة واحدة! أنت قريب من النهاية.', lottieId: '6-1mo3C04OXC' },
  { text: 'أحسنت! اكتملت رحلتك، اكتشف نتيجتك.', lottieId: 'untitled-file-OAHxNuU4Si' }
];

function showMilestone() {
  const overlay = document.getElementById('lw-milestone-overlay');
  const text = document.getElementById('lw-milestone-text');
  const iconContainer = document.getElementById('lw-milestone-icon');
  
  if (!overlay || !text || !iconContainer) return;
  
  const isLast = currentCategoryIndex === TOTAL_CATEGORIES - 1;
  const asset = milestoneAssets[currentCategoryIndex] || milestoneAssets[0];
  
  text.textContent = asset.text;
  
  // Use Lottiefiles embed iframe
  iconContainer.innerHTML = `<iframe src="https://lottie.host/embed/${asset.lottieId}" style="width: 100%; height: 100%; border: none; background: transparent;" allowTransparency="true"></iframe>`;
  
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
