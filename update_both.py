import re

with open('resources/landing/js/lifeWheelAssessment.js', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Patch renderCategoryHeader
patch_header = """function renderCategoryHeader() {
  const el = document.getElementById('lw-category-header');
  if (!el) return;
  const cat = CATEGORIES[currentCategoryIndex];
  const fallbackDescs = [
    'يقيس مدى التزام الفرد بالعبادات والممارسات الإيمانية، وانعكاس القيم الروحية على سلوكه بما يمنحه السكينة والاستقرار النفسي.',
    'يقيس مدى اهتمام الفرد بصحته البدنية والنفسية، من خلال العادات الغذائية وممارسة الرياضة والوقاية من الأمراض.',
    'يقيس مدى وعي الفرد بذاته وسعيه لتطوير مهاراته وقدراته، واهتمامه بالنمو المستمر وتحقيق الأهداف الشخصية.',
    'يقيس جودة علاقة الفرد بأفراد أسرته، ومدى تواصله وتفاعله معهم، واهتمامه ببناء أسرة متماسكة ومستقرة.',
    'يقيس مدى تفاعل الفرد مع مجتمعه، ومشاركته في الأنشطة الاجتماعية، وبناء علاقات إيجابية مع الآخرين.',
    'يقيس مدى كفاءة الفرد في أداء مهامه الوظيفية، وتطوير مهاراته المهنية، وتحقيق طموحاته في مسيرته العملية.',
    'يقيس مدى قدرة الفرد على إدارة أمواله، والتخطيط المالي السليم، وتوفير احتياجاته، والاستعداد للمستقبل.',
    'يقيس مدى قدرة الفرد على الترويح عن نفسه، وممارسة هواياته وأنشطته المفضلة، وتحقيق التوازن في حياته.'
  ];
  const desc = cat.description || fallbackDescs[currentCategoryIndex] || '';
  const titleLabel = cat.label.replace('الجانب ', '');

  el.innerHTML = `
    <div class="flex flex-col items-start gap-1.5 md:gap-2 mb-2 md:mb-3 w-full">
      <span class="font-messiri font-semibold text-[#ce9d42] text-[13px] sm:text-[14px] md:text-[18px] whitespace-nowrap">الجانب ${currentCategoryIndex + 1} من ${TOTAL_CATEGORIES}</span>
      <div class="flex items-center gap-2.5 md:gap-3">
        <div class="w-[38px] h-[38px] md:w-[54px] md:h-[54px] rounded-full bg-[#EFF3F8] flex items-center justify-center shrink-0">
          <span class="lw-icon-mask w-[18px] h-[18px] md:w-[24px] md:h-[24px] text-brand-primary" style="--icon-url:url('${cat.iconUrl}')"></span>
        </div>
        <h2 class="font-messiri font-bold text-brand-primary text-[20px] sm:text-[22px] md:text-[28px]">${titleLabel}</h2>
      </div>
    </div>
    <p class="font-messiri text-[#565656] text-[13.5px] sm:text-[14.5px] md:text-[17px] leading-relaxed text-right w-full">${desc}</p>
  `;

  const reminderBox = document.getElementById('lw-reminder-box');
  const scaleLegend = document.getElementById('lw-scale-legend');
  if (reminderBox) {
      reminderBox.style.display = currentCategoryIndex === 0 ? 'flex' : 'none';
  }
  if (scaleLegend) {
      scaleLegend.style.display = currentCategoryIndex === 0 ? 'flex' : 'none';
  }
}"""
content = re.sub(
    r'^function renderCategoryHeader\(\) \{[\s\S]*?^}\n',
    patch_header + '\n',
    content,
    flags=re.MULTILINE
)


# 2. Patch showMilestone
patch_milestone = """const milestoneAssets = [
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

# Specifically match ONLY the showMilestone function!
content = re.sub(
    r'^function showMilestone\(\) \{[\s\S]*?^}\n',
    patch_milestone + '\n',
    content,
    flags=re.MULTILINE
)

with open('resources/landing/js/lifeWheelAssessment.js', 'w', encoding='utf-8') as f:
    f.write(content)
