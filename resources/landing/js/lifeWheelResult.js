import { CATEGORIES } from './lifeWheelAssessmentData.js';
import { initNavigation } from './navigation.js';
import { readStoredAnswers, saveLifeWheelAnswers } from './lifeWheelSave.js';
import { cms } from './cms.js';
import { AXES, axisIconUrl, initResultWheelChart } from './resultWheelChart.js';

initNavigation();

// "عرض جوانب التقرير": a signed-in user (button carries data-details-url) goes straight to the details page, after
// saving the test they just finished. For guests the button has no data-details-url and opens the quick sign-up dialog (landing.partials.auth-dialogs, via data-auth-gate) instead.
function initViewReportButton() {
  const button = document.getElementById('viewReportBtn');
  if (!button || !button.dataset.detailsUrl) return;

  button.addEventListener('click', async () => {
    if (button.disabled) return;
    button.disabled = true;
    button.setAttribute('aria-busy', 'true');

    let target = button.dataset.detailsUrl;
    const answers = readStoredAnswers();
    if (answers && button.dataset.saveUrl) {
      const saved = await saveLifeWheelAnswers(button.dataset.saveUrl, answers);
      if (saved?.redirect) target = saved.redirect;
    }

    window.location.href = target;
  });
}

initViewReportButton();

function initResult() {
  const answersJson = typeof window !== "undefined" ? localStorage.getItem('lwAnswers') : null;
  let categoryScores = [];
  let overallScore = 84;
  if (answersJson) {
    const answers = JSON.parse(answersJson);
    categoryScores = answers.map((catAnswers) => {
      const sum = catAnswers.reduce((a, b) => a + (b || 0), 0);
      return Math.round((sum * 100) / 40); // integer math first: (23 / 40) * 100 is 57.49999999999999
    });
    overallScore = Math.round(categoryScores.reduce((a, b) => a + b, 0) / categoryScores.length);
  } else {
    // Exact fallback matching Figma design:
    // CATEGORIES indices: 0: Spiritual(89), 1: Health(74), 2: Personal(92), 3: Family(61), 4: Social(69), 5: Professional(85), 6: Financial(63), 7: Recreational(73)
    categoryScores = [89, 74, 92, 61, 69, 85, 63, 73];
    overallScore = 84;
  }

  // Figma Visual Order Mapping (نفس ترتيب AXES: الشخصي، الروحاني، الصحي، الاجتماعي، العائلي، الترفيهي، المالي، المهني)
  const visualOrderIndices = [2, 0, 1, 4, 3, 7, 6, 5];

  const visualData = visualOrderIndices.map((originalIndex, i) => ({
    label: CATEGORIES[originalIndex].label.replace('الجانب ', ''),
    score: categoryScores[originalIndex],
    axis: AXES[i],
    originalIndex
  }));

  // العجلة (الأحجام والمسافات بإحداثيات فيجما، شوف resultWheelChart.js)
  initResultWheelChart(document.getElementById('wheelSvg'), visualData);

  // Highest / Lowest
  let highest = visualData[0];
  let lowest = visualData[0];
  visualData.forEach(d => {
    if (d.score > highest.score) highest = d;
    if (d.score < lowest.score) lowest = d;
  });

  // لون أغمق للنص لو الخلفية فاتحة (الأقل جانب)
  const darken = (hex, amt) => {
    const n = parseInt(hex.slice(1), 16);
    const ch = (v) => Math.round(v * (1 - amt)).toString(16).padStart(2, '0');
    return `#${ch((n >> 16) & 255)}${ch((n >> 8) & 255)}${ch(n & 255)}`;
  };
  const rgba = (hex, alpha) => {
    const n = parseInt(hex.slice(1), 16);
    return `rgba(${(n >> 16) & 255},${(n >> 8) & 255},${n & 255},${alpha})`;
  };
  const setText = (id, value) => { const node = document.getElementById(id); if (node) node.textContent = value; };

  // أعلى جانب: لون النص + تدرج بنفس زاوية فيجما، وأقل جانب: لون التعبئة
  const fillCard = (prefix, item, { border, tint, tintAlpha, whiteStop, angle, valueColor }) => {
    const card = document.getElementById(`${prefix}-card`);
    if (!card) return;
    card.style.borderColor = border;
    card.style.background = `linear-gradient(${angle}deg, ${rgba(tint, tintAlpha)} 0%, #ffffff ${whiteStop}%)`;
    const iconBox = document.getElementById(`${prefix}-icon-box`);
    if (iconBox) iconBox.style.backgroundColor = rgba(item.axis.text, 0.2);
    const icon = document.getElementById(`${prefix}-icon`);
    if (icon) icon.src = axisIconUrl(item.axis);
    setText(`${prefix}-name`, item.label);
    setText(`${prefix}-percent`, item.score + '%');
    ['name', 'percent'].forEach((part) => {
      const node = document.getElementById(`${prefix}-${part}`);
      if (node) node.style.color = valueColor;
    });
  };
  fillCard('highest', highest, { border: highest.axis.text, tint: highest.axis.text, tintAlpha: 0.33, whiteStop: 71.284, angle: 224.88, valueColor: highest.axis.text });
  fillCard('lowest', lowest, { border: lowest.axis.text, tint: lowest.axis.fill, tintAlpha: 0.5, whiteStop: 70, angle: 221.27, valueColor: darken(lowest.axis.text, 0.2) });

  const analysisText = document.getElementById('analysis-text');
  if (analysisText) {
    // نص مستوى النتيجة الكلية من قاعدة البيانات (بيتعدل من لوحة الإدارة)، ولو مفيش مستوى مناسب بنرجع للجملة العامة
    let levels = [];
    try { levels = JSON.parse(analysisText.dataset.levels || '[]'); } catch (e) { levels = []; }
    const level = levels.find((l) => overallScore >= l.min && overallScore <= l.max);
    if (level) {
      analysisText.textContent = level.text;
    } else analysisText.textContent = `${cms('wheel_result.analysis.part_1', 'تشير نتيجتك إلى توازن بنسبة')} ${overallScore}% ${cms('wheel_result.analysis.part_2', 'في حياتك بشكل عام. وهناك بعض الجوانب التي تحتاج إلى مزيد من الاهتمام خاصة الجانب')} ${lowest.label}${cms('wheel_result.analysis.part_3', '، بينما تتميز بقوة في الجانب')} ${highest.label}.`;
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initResult);
} else {
  initResult();
}
