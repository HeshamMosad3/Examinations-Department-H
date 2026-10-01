import Chart from 'chart.js/auto';
import { CATEGORIES } from './lifeWheelAssessmentData.js';

function initResult() {
  const answersJson = localStorage.getItem('lwAnswers');
  let answers = [];
  if (answersJson) {
    answers = JSON.parse(answersJson);
  } else {
    // Fallback dummy data if accessed directly
    answers = CATEGORIES.map(() => Array(10).fill(3));
  }

  // Calculate scores for each category
  const categoryScores = answers.map((catAnswers) => {
    const sum = catAnswers.reduce((a, b) => a + (b || 0), 0);
    return Math.round((sum / 40) * 100);
  });

  const overallScore = Math.round(categoryScores.reduce((a, b) => a + b, 0) / categoryScores.length);

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
    '/icons/wheel_of_life/personal.png',
    '/icons/wheel_of_life/spiritual.png',
    '/icons/wheel_of_life/health.png',
    '/icons/wheel_of_life/social.png',
    '/icons/wheel_of_life/family.png',
    '/icons/wheel_of_life/leisure.png',
    '/icons/wheel_of_life/financial.png',
    '/icons/wheel_of_life/career.png'
  ];

  const visualData = visualOrderIndices.map((originalIndex, i) => ({
    label: CATEGORIES[originalIndex].label.replace('الجانب ', ''),
    iconUrl: CATEGORIES[originalIndex].iconUrl,
    solidIconUrl: visualIcons[i],
    score: categoryScores[originalIndex],
    color: visualColors[i],
    originalIndex
  }));

  // Draw Wheel SVG
  const svgNS = "http://www.w3.org/2000/svg";
  const svg = document.getElementById("wheelSvg");
  const wheelContainer = document.getElementById("wheel-container");
  
  if (svg && wheelContainer) {
    const cx = 417;
    const cy = 417;
    const innerRadius = 74;
    const maxOuterRadius = 330;
    const gapWidth = 14;
    
    // Clear SVG
    svg.innerHTML = '';
    
    function polarToCartesian(cx, cy, r, angleDeg) {
      const rad = angleDeg * Math.PI / 180;
      return { x: cx + r * Math.sin(rad), y: cy - r * Math.cos(rad) };
    }
    
    function gapOffsetDeg(r, gapPx) {
      const half = gapPx / 2;
      if (r <= half) return 89.9;
      return Math.asin(half / r) * 180 / Math.PI;
    }
    
    function ringSectorPath(cx, cy, rInner, rOuter, sectorStartDeg, sectorEndDeg, gapWidth) {
      const aInStart  = sectorStartDeg + gapOffsetDeg(rInner, gapWidth);
      const aOutStart = sectorStartDeg + gapOffsetDeg(rOuter, gapWidth);
      const aOutEnd   = sectorEndDeg   - gapOffsetDeg(rOuter, gapWidth);
      const aInEnd    = sectorEndDeg   - gapOffsetDeg(rInner, gapWidth);

      const p1 = polarToCartesian(cx, cy, rInner, aInStart);
      const p2 = polarToCartesian(cx, cy, rOuter, aOutStart);
      const p3 = polarToCartesian(cx, cy, rOuter, aOutEnd);
      const p4 = polarToCartesian(cx, cy, rInner, aInEnd);

      const largeArcOuter = (aOutEnd - aOutStart) > 180 ? 1 : 0;
      const largeArcInner = (aInEnd - aInStart) > 180 ? 1 : 0;

      return [
        `M ${p1.x} ${p1.y}`,
        `L ${p2.x} ${p2.y}`,
        `A ${rOuter} ${rOuter} 0 ${largeArcOuter} 1 ${p3.x} ${p3.y}`,
        `L ${p4.x} ${p4.y}`,
        `A ${rInner} ${rInner} 0 ${largeArcInner} 0 ${p1.x} ${p1.y}`,
        "Z"
      ].join(" ");
    }
    
    function hexToRgb(hex) {
      hex = hex.replace("#", "");
      if (hex.length === 3) hex = hex.split('').map(c => c+c).join('');
      return {
        r: parseInt(hex.substring(0, 2), 16),
        g: parseInt(hex.substring(2, 4), 16),
        b: parseInt(hex.substring(4, 6), 16)
      };
    }

    function mixHex(hexA, hexB, t) {
      const a = hexToRgb(hexA), b = hexToRgb(hexB);
      const r = Math.round(a.r + (b.r - a.r) * t);
      const g = Math.round(a.g + (b.g - a.g) * t);
      const bl = Math.round(a.b + (b.b - a.b) * t);
      const toHex = (v) => v.toString(16).padStart(2, "0");
      return `#${toHex(r)}${toHex(g)}${toHex(bl)}`;
    }

    function lighten(hex, amt) { return mixHex(hex, "#ffffff", amt); }
    function darken(hex, amt)  { return mixHex(hex, "#000000", amt); }

    function getGradientEnds(colorHex) {
      const lightShade = lighten(colorHex, 0.35); 
      const darkShade  = darken(colorHex, 0.05);  
      return { start: darkShade, end: lightShade }; 
    }

    function lerpColor(hexA, hexB, t) {
      return mixHex(hexA, hexB, t);
    }
    
    // Draw the slices
    const sliceAngle = 360 / visualData.length;
    const numRings = 5;
    const ringThickness = (maxOuterRadius - innerRadius) / numRings;
    
    // Remove old labels
    wheelContainer.querySelectorAll('.chart-custom-label').forEach(el => el.remove());
    
    visualData.forEach((cat, i) => {
      // 0 degrees is TOP.
      const startDeg = (i * sliceAngle) - (sliceAngle / 2);
      const endDeg = startDeg + sliceAngle;
      
      const { start: colorStart, end: colorEnd } = getGradientEnds(cat.color);
      const value = Math.max(0, Math.min(numRings, (cat.score / 100) * numRings));
      
      for (let k = 0; k < numRings; k++) {
        const t = numRings > 1 ? k / (numRings - 1) : 0;
        const shade = lerpColor(colorStart, colorEnd, t);
        
        const rInnerSeg = innerRadius + k * ringThickness;
        const rOuterSeg = innerRadius + (k + 1) * ringThickness;
        const fillFraction = Math.max(0, Math.min(1, value - k));
        
        if (fillFraction > 0) {
          const rMid = rInnerSeg + fillFraction * (rOuterSeg - rInnerSeg);
          const path = document.createElementNS(svgNS, "path");
          path.setAttribute("d", ringSectorPath(cx, cy, rInnerSeg, rMid, startDeg, endDeg, gapWidth));
          path.setAttribute("fill", shade);
          path.setAttribute("stroke", "rgba(44,62,80,0.18)");
          path.setAttribute("stroke-width", "1");
          path.style.transition = "all 0.5s ease-out";
          svg.appendChild(path);
        }
      }
      
      // HTML Label
      const centerAngleDeg = (startDeg + endDeg) / 2;
      const centerAngleRad = centerAngleDeg * Math.PI / 180;
      
      // Dynamic distance based on slice score
      const fillFrac = cat.score / 100;
      const currentRadiusSvg = innerRadius + (maxOuterRadius - innerRadius) * fillFrac;
      // Increased offsets: minimum 120 units from inner radius, and 110 units from current slice edge
      const labelRadiusSvg = Math.max(innerRadius + 120, currentRadiusSvg + 110);
      const labelRadiusPct = labelRadiusSvg * (50 / 417);
      
      const leftPct = 50 + Math.sin(centerAngleRad) * labelRadiusPct;
      const topPct = 50 - Math.cos(centerAngleRad) * labelRadiusPct;
      
      const el = document.createElement('div');
      el.className = 'chart-custom-label absolute transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center gap-1 z-10';
      el.style.left = leftPct + '%';
      el.style.top = topPct + '%';
      el.style.color = cat.color;
      
      el.innerHTML = `
        <span class="font-messiri font-bold text-[14px] md:text-[18px] leading-none whitespace-nowrap">${cat.label}</span>
        <img src="${cat.solidIconUrl}" class="w-[24px] h-[24px] md:w-[32px] md:h-[32px] object-contain my-1" alt="" />
        <span class="font-messiri font-bold text-[14px] md:text-[18px] leading-none">${cat.score}%</span>
      `;
      wheelContainer.appendChild(el);
    });
  }

  // Set overall score center text
  const centerScoreEl = document.getElementById('center-score');
  if (centerScoreEl) centerScoreEl.textContent = overallScore + '%';

  // Render Gauge Chart
  const gaugeCtx = document.getElementById('gaugeChart');
  let gaugeColor = '#20AD70';
  let gaugeText = 'مستوى متميز';
  if (overallScore < 50) {
    gaugeColor = '#E33E5A';
    gaugeText = 'يحتاج تطوير';
  } else if (overallScore < 70) {
    gaugeColor = '#D4AE30';
    gaugeText = 'مستوى جيد';
  } else if (overallScore < 80) {
    gaugeColor = '#20AD70';
    gaugeText = 'مستوى جيد جداً';
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
    hIcon.style.setProperty('--icon-url', `url('${highest.iconUrl}')`);
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
    lIcon.style.setProperty('--icon-url', `url('${lowest.iconUrl}')`);
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
