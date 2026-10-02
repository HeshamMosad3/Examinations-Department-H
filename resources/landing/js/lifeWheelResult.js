import Chart from 'chart.js/auto';
import { CATEGORIES } from './lifeWheelAssessmentData.js';
import { initNavigation } from './navigation.js';
import { readStoredAnswers, saveLifeWheelAnswers } from './lifeWheelSave.js';

initNavigation();

// "عرض جوانب التقرير": a signed-in user (button carries data-details-url) goes straight to the details page, after
// saving the test they just finished. For guests the button has no data-details-url and opens the login modal instead.
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

  // Figma Visual Order Mapping
  const visualOrderIndices = [2, 0, 1, 4, 3, 7, 6, 5];
  const visualColors = [
    '#7E48CC', // Personal
    '#4C62D8', // Spiritual
    '#20AD70', // Health
    '#E33E5A', // Social
    '#D58641', // Family
    '#D4AE30', // Recreational
    '#4DC6B8', // Financial
    '#256699'  // Professional
  ];

  const visualIcons = [
    '/landing/icons/wheel_of_life/personal.png',
    '/landing/icons/wheel_of_life/spiritual.png',
    '/landing/icons/wheel_of_life/health.png',
    '/landing/icons/wheel_of_life/social.png',
    '/landing/icons/wheel_of_life/family.png',
    '/landing/icons/wheel_of_life/leisure.png',
    '/landing/icons/wheel_of_life/financial.png',
    '/landing/icons/wheel_of_life/career.png'
  ];

  const visualData = visualOrderIndices.map((originalIndex, i) => ({
    label: CATEGORIES[originalIndex].label.replace('الجانب ', ''),
    iconUrl: CATEGORIES[originalIndex].iconUrl,
    solidIconUrl: visualIcons[i],
    score: categoryScores[originalIndex],
    color: visualColors[i],
    originalIndex
  }));

  // Draw Wheel SVG (Disabled to use newLifeWheel.js instead)
  const svgNS = "http://www.w3.org/2000/svg";
  const svg = document.getElementById("wheelSvg_disabled");
  const wheelContainer = document.getElementById("wheel-container_disabled");
  
  if (svg && wheelContainer) {
    // This block is skipped
  }

  // Set overall score center text
  const centerScoreEl = document.getElementById('center-score');
  if (centerScoreEl) centerScoreEl.textContent = overallScore + '%';

  // Render Gauge Chart
  const gaugeCtx = document.getElementById('gaugeChart');
  let gaugeColor = '#38833C';
  let gaugeText = 'مستوى متميز';
  let gaugeDesc = 'أنت تسير في الطريق الصحيح حافظ على توازنك واستمر في تطوير نفسك';

  if (overallScore < 50) {
    gaugeColor = '#9E1515';
    gaugeText = 'مستوى منخفض';
    gaugeDesc = 'لديك فرصة كبيرة للتحسن، وخطوات بسيطة قد تصنع فرقًا.';
  } else if (overallScore < 70) {
    gaugeColor = '#D4AE30';
    gaugeText = 'مستوى جيد';
    gaugeDesc = 'أداؤك جيد ولديك مساحة جيدة لتعزيز توازنك وتطوير مجالاتك.';
  } else if (overallScore < 80) {
    gaugeColor = '#20AD70';
    gaugeText = 'مستوى جيد جداً';
    gaugeDesc = 'أنت تسير في الطريق الصحيح حافظ على توازنك واستمر في تطوير نفسك';
  }

  if (gaugeCtx) {
    // Custom plugin to draw both tracks perfectly aligned with rounded caps
    const gaugeBackgroundPlugin = {
      id: 'gaugeBackgroundPlugin',
      beforeDraw(chart) {
        const { ctx } = chart;
        const meta = chart.getDatasetMeta(0);
        const arc1 = meta.data[0];
        const arc2 = meta.data[1];
        if (!arc1 || !arc2) return;
        
        const radius = (arc1.outerRadius + arc1.innerRadius) / 2;
        const thickness = arc1.outerRadius - arc1.innerRadius;

        ctx.save();
        
        // Draw full background track (Gray)
        ctx.beginPath();
        ctx.arc(arc1.x, arc1.y, radius, arc1.startAngle, arc2.endAngle);
        ctx.lineWidth = thickness;
        ctx.strokeStyle = '#e2e8f0'; 
        ctx.lineCap = 'round';
        ctx.stroke();

        // Draw foreground track (Color)
        if (overallScore > 0) {
          ctx.beginPath();
          ctx.arc(arc1.x, arc1.y, radius, arc1.startAngle, arc1.endAngle);
          ctx.lineWidth = thickness;
          ctx.strokeStyle = gaugeColor; 
          ctx.lineCap = 'round';
          ctx.stroke();
        }

        ctx.restore();
      }
    };

    new Chart(gaugeCtx, {
      type: 'doughnut',
      data: {
        datasets: [{
          data: [overallScore, 100 - overallScore],
          backgroundColor: ['transparent', 'transparent'],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '80%', 
        circumference: 240, // Horseshoe shape
        rotation: 240, // Start from bottom-left
        plugins: {
          legend: { display: false },
          tooltip: { enabled: false }
        },
        events: [] // Disable interactions
      },
      plugins: [gaugeBackgroundPlugin]
    });
  }

  // Set gauge texts
  const gaugeScoreEl = document.getElementById('gauge-score');
  if (gaugeScoreEl) gaugeScoreEl.textContent = overallScore + '%';
  const gaugeLevelEl = document.getElementById('gauge-level');
  if (gaugeLevelEl) {
    gaugeLevelEl.textContent = gaugeText;
    gaugeLevelEl.style.color = gaugeColor;
  }
  const gaugeDescEl = document.getElementById('gauge-desc');
  if (gaugeDescEl) {
    gaugeDescEl.textContent = gaugeDesc;
  }

  // Analysis & Highest/Lowest
  // Find highest and lowest
  let highest = visualData[0];
  let lowest = visualData[0];
  visualData.forEach(d => {
    if (d.score > highest.score) highest = d;
    if (d.score < lowest.score) lowest = d;
  });

  const hCard = document.getElementById('highest-card');
  const hIconBox = document.getElementById('highest-icon-box');
  const hIcon = document.getElementById('highest-icon');
  const hValue = document.getElementById('highest-value');
  if (hCard) {
    hCard.style.borderColor = highest.color;
    hCard.style.background = `linear-gradient(to right, ${highest.color}15, #ffffff)`;
    hIconBox.style.backgroundColor = highest.color + '20'; // 20% opacity
    hIcon.style.setProperty('--icon-url', `url('${highest.solidIconUrl}')`);
    hIcon.style.color = highest.color;
    hValue.textContent = highest.label + ' ' + highest.score + '%';
    hValue.style.color = highest.color;
  }

  const lCard = document.getElementById('lowest-card');
  const lIconBox = document.getElementById('lowest-icon-box');
  const lIcon = document.getElementById('lowest-icon');
  const lValue = document.getElementById('lowest-value');
  if (lCard) {
    lCard.style.borderColor = lowest.color;
    lCard.style.background = `linear-gradient(to right, ${lowest.color}15, #ffffff)`;
    lIconBox.style.backgroundColor = lowest.color + '20';
    lIcon.style.setProperty('--icon-url', `url('${lowest.solidIconUrl}')`);
    lIcon.style.color = lowest.color;
    lValue.textContent = lowest.label + ' ' + lowest.score + '%';
    lValue.style.color = lowest.color;
  }

  const analysisText = document.getElementById('analysis-text');
  if (analysisText) {
    analysisText.textContent = `تشير نتيجتك إلى توازن بنسبة ${overallScore}% في حياتك بشكل عام. وهناك بعض الجوانب التي تحتاج إلى مزيد من الاهتمام خاصة الجانب ${lowest.label}، بينما تتميز بقوة في الجانب ${highest.label}.`;
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initResult);
} else {
  initResult();
}
