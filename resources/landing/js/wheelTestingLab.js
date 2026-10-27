import { cms } from './cms.js';
import { initNewLifeWheel } from './newLifeWheel.js';
import { generateFiveYearJourney, sampleKeyframes, easeProgress } from './lifeJourney.js';

/* ============================================================
   Wheel Geometry & Color Constants (Matching Figma & newLifeWheel.js)
   ============================================================ */
const SETTINGS = {
  center: { x: 417.215, y: 434.875 },
  centerImageRadius: 60,
  innerRadius: 74,
  outerRadius: 330,
  numRings: 5,
  gapWidth: 14,
  gridStrokeColor: "#2c3e50",
  emptyGridStrokeOpacity: 0.08,
  filledGridStrokeOpacity: 0.18
};

const BASE_AXES = [
  { key: 'personal',  label: cms('home.wheel.label_personal', 'الشخصي'),   color: '#7844D0', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/personal.png',  desc: cms('home.wheel.tooltip_personal', 'يقيس مستوى سعي الفرد للتعلم المستمر، وفاعليته في تنظيم وقته، ووضع الأهداف الشخصية والعمل على تحقيقها.') },
  { key: 'spiritual', label: cms('home.wheel.label_spiritual', 'الروحاني'), color: '#5875E5', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/spiritual.png', desc: cms('home.wheel.tooltip_spiritual', 'يقيس مدى التزام الفرد بالعبادات والممارسات الإيمانية، وانعكاس القيم الروحية على سلوكه بما يمنحه السكينة والاستقرار النفسي.') },
  { key: 'health',    label: cms('home.wheel.label_health', 'الصحي'),      color: '#43A074', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/health.png',    desc: cms('home.wheel.tooltip_health', 'يقيس مدى تبني الفرد لعادات صحية متكاملة تشمل التغذية، النشاط البدني، كفاية النوم، والتدابير الوقائية لدعم العافية الجسدية.') },
  { key: 'social',    label: cms('home.wheel.label_social', 'الاجتماعي'),  color: '#C53664', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/social.png',    desc: cms('home.wheel.tooltip_social', 'يقيس مدى اهتمام الفرد بصلة الأرحام وبناء علاقات إيجابية مع المحيط، والمشاركة الفاعلة في المناسبات والمبادرات المجتمعية.') },
  { key: 'family',    label: cms('home.wheel.label_family', 'العائلي'),    color: '#D98344', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/family.png',    desc: cms('home.wheel.tooltip_family', 'يقيس جودة التواصل الأسري، ومستوى تحمل المسؤوليات، والدعم المتبادل، والقدرة على إدارة الخلافات العائلية بحوار وإيجابية.') },
  { key: 'leisure',   label: cms('home.wheel.label_leisure', 'الترفيهي'),  color: '#C9B642', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/leisure.png',   desc: cms('home.wheel.tooltip_leisure', 'يقيس قدرة الفرد على التوازن بين العمل والحياة، وممارسة الهوايات والأنشطة الترفيهية لتجديد الطاقة وتخفيف ضغوط الحياة.') },
  { key: 'financial', label: cms('home.wheel.label_financial', 'المالي'),    color: '#3CB1B3', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/financial.png', desc: cms('home.wheel.tooltip_financial', 'يقيس مدى كفاءة الفرد في التخطيط المالي، وإدارة الدخل والمصروفات، والقدرة على الادخار والاستثمار والوفاء بالالتزامات المالية.') },
  { key: 'career',    label: cms('home.wheel.label_career', 'المهني'),      color: '#4474D0', direction: 'dark-to-light', iconUrl: '/assets/website/icons/wheel_of_life/career.png',    desc: cms('home.wheel.tooltip_career', 'يقيس انضباط الفرد والتزامه بأنظمة العمل، وجودة أدائه المهني، وسعيه لتطوير مهاراته وبناء علاقات عمل إيجابية.') }
];

const svgNS = "http://www.w3.org/2000/svg";

/* Math & Color Helpers */
function polarToCartesian(cx, cy, r, angleDeg) {
  const rad = angleDeg * Math.PI / 180;
  return { x: cx + r * Math.sin(rad), y: cy - r * Math.cos(rad) };
}

function gapOffsetDeg(r, gapPx) {
  if (gapPx <= 0) return 0;
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
  if (hex.length === 3) hex = hex.split("").map(c => c + c).join("");
  const num = parseInt(hex, 16);
  return { r: (num >> 16) & 255, g: (num >> 8) & 255, b: num & 255 };
}

function lerpColor(hexA, hexB, t) {
  const a = hexToRgb(hexA), b = hexToRgb(hexB);
  const r = Math.round(a.r + (b.r - a.r) * t);
  const g = Math.round(a.g + (b.g - a.g) * t);
  const bl = Math.round(a.b + (b.b - a.b) * t);
  return `rgb(${r}, ${g}, ${bl})`;
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

function getGradientEnds(axis) {
  const lightShade = lighten(axis.color, 0.35);
  const darkShade  = darken(axis.color, 0.05);
  return { start: darkShade, end: lightShade };
}

function playClickSound() {
  try {
    const AC = window.AudioContext || window.webkitAudioContext;
    if (!AC) return;
    const ctx = new AC();
    const osc = ctx.createOscillator();
    const gain = ctx.createGain();
    osc.type = "sine";
    osc.frequency.setValueAtTime(600, ctx.currentTime);
    osc.frequency.exponentialRampToValueAtTime(200, ctx.currentTime + 0.04);
    gain.gain.setValueAtTime(0.08, ctx.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.04);
    osc.connect(gain);
    gain.connect(ctx.destination);
    osc.start();
    osc.stop(ctx.currentTime + 0.04);
  } catch (e) {}
}

/* ============================================================
   Dashboard Influence Matrix & Realistic Multi-Directional Journey
   ============================================================ */
const DEFAULT_INFLUENCE = {
  levels: {
    weak: [0.05, 0.25],
    medium: [0.26, 0.50],
    strong: [0.51, 0.75],
    very_strong: [0.76, 0.92]
  },
  matrix: [
    [null, "strong", "strong", "strong", "strong", "medium", "medium", "strong"],                      // 0: الشخصي (personal)
    ["strong", null, "very_strong", "medium", "strong", "weak", "medium", "medium"],                  // 1: الروحاني (spiritual)
    ["very_strong", "medium", null, "medium", "strong", "strong", "strong", "very_strong"],           // 2: الصحي (health)
    ["strong", "medium", "strong", null, "medium", "strong", "medium", "strong"],                     // 3: الاجتماعي (social)
    ["very_strong", "medium", "strong", "medium", null, "medium", "very_strong", "strong"],           // 4: العائلي (family)
    ["strong", "weak", "medium", "strong", "strong", null, "medium", "medium"],                       // 5: الترفيهي (leisure)
    ["strong", "medium", "medium", "medium", "very_strong", "strong", null, "strong"],                // 6: المالي (financial)
    ["very_strong", "medium", "weak", "medium", "very_strong", "strong", "very_strong", null]         // 7: المهني (career)
  ]
};

function getInfluenceConfig() {
  const cfg = typeof window !== "undefined" ? window.LIFE_WHEEL_INFLUENCE : null;
  const ok = cfg && cfg.levels && Array.isArray(cfg.matrix) && cfg.matrix.length === 8 && cfg.matrix.every((r) => Array.isArray(r) && r.length === 8);
  return ok ? cfg : DEFAULT_INFLUENCE;
}

function generateRealisticLifeJourney(startVals, targetRange = [80, 95]) {
  const cfg = getInfluenceConfig();
  const n = startVals.length;
  const [lo, hi] = targetRange;
  const rand = (a, b) => a + Math.random() * (b - a);
  const clamp = (v, a, b) => Math.max(a, Math.min(b, v));
  const shuffle = (arr) => arr.map((v) => [Math.random(), v]).sort((a, b) => a[0] - b[0]).map((x) => x[1]);

  // Pick primary driver axis (7=career, 2=health, 0=personal, 6=financial)
  const heroCandidates = [7, 2, 0, 6];
  const hero = heroCandidates[Math.floor(Math.random() * heroCandidates.length)];
  const relRank = { very_strong: 3, strong: 2, medium: 1, weak: 0 };
  const rank = (i) => relRank[cfg.matrix[hero]?.[i]] ?? 1;
  const others = [...Array(n).keys()].filter((i) => i !== hero);

  // Leaders: the hero + (often) its strongest synergy partner reach the top early and stay there.
  const leaders = [hero];
  if (Math.random() < 0.65) {
    const partner = [...others].sort((a, b) => rank(b) - rank(a) || startVals[b] - startVals[a])[0];
    leaders.push(partner);
  }

  // Laggards: 1-2 aspects least tied to the hero (and lowest to begin with) stay behind until the very end.
  const laggards = others
    .filter((i) => !leaders.includes(i))
    .sort((a, b) => rank(a) - rank(b) || startVals[a] - startVals[b])
    .slice(0, Math.random() < 0.5 ? 1 : 2);

  const middle = others.filter((i) => !leaders.includes(i) && !laggards.includes(i));

  // Final values: leaders highest, laggards just make it into range, the rest in between.
  const finals = new Array(n);
  leaders.forEach((i) => { finals[i] = Math.round(rand(hi - 5, hi)); });
  laggards.forEach((i) => { finals[i] = Math.round(rand(lo, lo + 5)); });
  middle.forEach((i) => { finals[i] = Math.round(rand(lo + 3, hi - 4)); });

  // Per-axis keyframe tracks ({ t, v }), so aspects arrive at different moments.
  const tracks = new Array(n);

  // Hero: surges first and locks at the top.
  tracks[hero] = [
    { t: 0, v: startVals[hero] },
    { t: rand(0.26, 0.32), v: finals[hero] },
    { t: 1, v: finals[hero] }
  ];

  // Partner: carried by the hero's momentum, arrives shortly after.
  leaders.slice(1).forEach((i) => {
    tracks[i] = [
      { t: 0, v: startVals[i] },
      { t: rand(0.04, 0.1), v: startVals[i] },
      { t: rand(0.4, 0.48), v: finals[i] },
      { t: 1, v: finals[i] }
    ];
  });

  // Middle: react to the hero first (synergy rises, trade-offs dip), then arrive one by one.
  const arrivalSlots = shuffle(middle.map((_, k) => 0.56 + (k / Math.max(1, middle.length - 1)) * 0.24));
  middle.forEach((i, k) => {
    const r = rank(i);
    const reaction = r >= 2 ? rand(6, 12) : -rand(6, 12);
    tracks[i] = [
      { t: 0, v: startVals[i] },
      { t: rand(0.24, 0.32), v: clamp(Math.round(startVals[i] + reaction), 20, 72) },
      { t: arrivalSlots[k], v: finals[i] },
      { t: 1, v: finals[i] }
    ];
  });

  // Laggards: neglected while focus is elsewhere, recover only slightly, then catch up at the last moment.
  laggards.forEach((i) => {
    const dip = clamp(Math.round(startVals[i] - rand(8, 14)), 18, 60);
    tracks[i] = [
      { t: 0, v: startVals[i] },
      { t: rand(0.28, 0.36), v: dip },
      { t: rand(0.8, 0.86), v: dip + Math.round(rand(4, 9)) },
      { t: 1, v: finals[i] }
    ];
  });

  // Narrative Titles for live status
  let heroLabel = 'المهني والمالي';
  if (hero === 2) heroLabel = 'الصحي والبدني';
  if (hero === 0) heroLabel = 'الشخصي والتطويري';
  if (hero === 6) heroLabel = 'المالي والاستثماري';

  return {
    hero,
    tracks,
    finals,
    phases: [
      { t: 0.0,  title: `المرحلة 1: انطلاق ${heroLabel} نحو القمة مع تراجع جوانب أخرى مؤقتاً 🚀📉` },
      { t: 0.3,  title: `المرحلة 2: ${heroLabel} يثبت في القمة وبدء استعادة التوازن ⚖️` },
      { t: 0.55, title: 'المرحلة 3: بقية الجوانب تلحق تباعاً، كلٌ بإيقاعه 🌿' },
      { t: 0.84, title: 'المرحلة الأخيرة: الجوانب المتأخرة تلحق في اللحظات الأخيرة 🎯' }
    ]
  };
}

/* ============================================================
   Modular LifeWheelLabInstance Class
   ============================================================ */
export class LifeWheelLabInstance {
  constructor(config) {
    this.id = config.id;
    this.name = config.name;
    this.initialPercents = [...config.initialPercents];
    this.targetPercents = config.targetPercents ? [...config.targetPercents] : null;
    this.svg = document.getElementById(config.svgId);
    this.cardEl = document.getElementById(config.cardId);
    this.centerBadgeEl = document.getElementById(`${config.id}-center-badge`);
    this.centerScoreEl = document.getElementById(`${config.id}-center-score`);
    this.centerLabelEl = document.getElementById(`${config.id}-center-label`);

    // Geometry custom parameters
    this.gapWidth = config.gapWidth !== undefined ? config.gapWidth : SETTINGS.gapWidth;
    this.innerRadius = config.innerRadius !== undefined ? config.innerRadius : SETTINGS.innerRadius;
    this.outerRadius = config.outerRadius !== undefined ? config.outerRadius : SETTINGS.outerRadius;
    this.seamlessNoGap = !!config.seamlessNoGap;
    this.whiteSeparators = config.whiteSeparators !== undefined ? config.whiteSeparators : true;
    this.animationDuration = config.animationDuration !== undefined ? config.animationDuration : 6000;

    // State
    this.uiApproach = config.uiApproach || 'result'; // 'result' | 'explore' | 'minimal'
    this.centerType = config.centerType || (this.uiApproach === 'result' ? 'score' : 'compass');
    this.showPercents = config.showPercents !== undefined ? config.showPercents : true;
    this.autoSpinOn = false;
    this.autoSpinSpeed = 20;
    this.spinDirection = 'cw';
    this.dynamicBreathingOn = false;
    this.isSpinning = false;
    this.rotationAngle = 0;
    this.idleWobbleDeg = 0;
    this.centerImageDataUrl = "/assets/website/images/Frame%202147238562.png";

    // Fluid Water animation state
    this.isFluidAnimating = false;
    this.fluidRaf = null;
    this.continuousWaterOn = false;
    this.waterLoopTimeout = null;
    this.currentFluidDirection = 'initial';

    // Setup axes with initial percents
    this.axes = BASE_AXES.map((axis, i) => ({
      ...axis,
      percent: this.initialPercents[i] !== undefined ? this.initialPercents[i] : 50
    }));

    // Animation state
    this.axisAnimState = this.axes.map(a => ({ current: a.percent, target: a.percent }));
    this.autoSpinTimer = null;
    this.breathingRaf = null;

    this.initDom();
    this.initControls();
    this.updateGeometry();
    this.updateCenterDisplay();
  }

  initDom() {
    if (!this.svg) return;
    this.svg.innerHTML = '';
    const center = SETTINGS.center;
    const innerRadius = this.innerRadius;
    const outerRadius = this.outerRadius;
    const numRings = SETTINGS.numRings;
    const cx = center.x, cy = center.y;

    // 1. Defs & clip path for center image
    const defs = document.createElementNS(svgNS, 'defs');
    const clipId = `${this.id}-centerClip`;
    const clipPath = document.createElementNS(svgNS, 'clipPath');
    clipPath.setAttribute('id', clipId);
    const clipCircle = document.createElementNS(svgNS, 'circle');
    clipCircle.setAttribute('cx', cx);
    clipCircle.setAttribute('cy', cy);
    clipCircle.setAttribute('r', SETTINGS.centerImageRadius);
    clipPath.appendChild(clipCircle);
    defs.appendChild(clipPath);
    this.svg.appendChild(defs);

    // 2. Rotatable Group
    this.rotatableGroup = document.createElementNS(svgNS, 'g');
    this.rotatableGroup.setAttribute('class', 'rotatable-group');
    this.rotatableGroup.setAttribute('transform', `rotate(${this.rotationAngle} ${cx} ${cy})`);

    // Center divider circle
    this.centerCircle = document.createElementNS(svgNS, 'circle');
    this.centerCircle.setAttribute('cx', cx);
    this.centerCircle.setAttribute('cy', cy);
    this.centerCircle.setAttribute('r', innerRadius);
    if (this.seamlessNoGap) {
      this.centerCircle.setAttribute('stroke', 'transparent');
      this.centerCircle.setAttribute('stroke-opacity', '0');
    } else {
      this.centerCircle.setAttribute('stroke', SETTINGS.gridStrokeColor);
      this.centerCircle.setAttribute('stroke-opacity', SETTINGS.filledGridStrokeOpacity);
    }
    this.rotatableGroup.appendChild(this.centerCircle);

    // Axis sectors
    this.axisElements = [];
    this.axes.forEach((axis) => {
      const { start: colorStart, end: colorEnd } = getGradientEnds(axis);
      const fillPaths = [];
      const gridPaths = [];

      for (let k = 0; k < numRings; k++) {
        const t = numRings > 1 ? k / (numRings - 1) : 0;
        const shade = lerpColor(colorStart, colorEnd, t);

        const pathColored = document.createElementNS(svgNS, 'path');
        pathColored.setAttribute('class', 'fill-cell transition-all duration-75');
        pathColored.setAttribute('fill', shade);

        if (this.seamlessNoGap) {
          // Zero gaps: stroke matches shade with 0.8px width to eliminate subpixel gaps seamlessly
          pathColored.setAttribute('stroke', shade);
          pathColored.setAttribute('stroke-width', '0.8');
          pathColored.setAttribute('stroke-linejoin', 'round');
          pathColored.setAttribute('stroke-opacity', '1');
        } else {
          pathColored.setAttribute('stroke', SETTINGS.gridStrokeColor);
          pathColored.setAttribute('stroke-opacity', SETTINGS.filledGridStrokeOpacity);
        }

        this.rotatableGroup.appendChild(pathColored);
        fillPaths.push(pathColored);

        const pathEmpty = document.createElementNS(svgNS, 'path');
        pathEmpty.setAttribute('class', 'grid-cell');
        pathEmpty.setAttribute('fill', 'transparent');

        if (this.seamlessNoGap) {
          pathEmpty.setAttribute('stroke', 'rgba(32, 74, 122, 0.08)');
          pathEmpty.setAttribute('stroke-width', '0.6');
          pathEmpty.setAttribute('stroke-opacity', '0.12');
        } else {
          pathEmpty.setAttribute('stroke', SETTINGS.gridStrokeColor);
          pathEmpty.setAttribute('stroke-opacity', SETTINGS.emptyGridStrokeOpacity);
        }

        this.rotatableGroup.appendChild(pathEmpty);
        gridPaths.push(pathEmpty);
      }

      this.axisElements.push({
        fillPaths,
        gridPaths,
        text: null,
        icon: null,
        percentText: null
      });
    });

    // Radial separation lines between aspects ("thin line with white color")
    if (this.whiteSeparators) {
      this.separatorsGroup = document.createElementNS(svgNS, 'g');
      this.separatorsGroup.setAttribute('class', 'axis-separators');
      const numAxes = this.axes.length;
      const sectorAngle = 360 / numAxes;

      for (let i = 0; i < numAxes; i++) {
        const angleDeg = i * sectorAngle;
        const pIn = polarToCartesian(cx, cy, innerRadius, angleDeg);
        const pOut = polarToCartesian(cx, cy, outerRadius, angleDeg);

        const line = document.createElementNS(svgNS, 'line');
        line.setAttribute('x1', pIn.x);
        line.setAttribute('y1', pIn.y);
        line.setAttribute('x2', pOut.x);
        line.setAttribute('y2', pOut.y);
        line.setAttribute('stroke', '#ffffff');
        line.setAttribute('stroke-width', '1.5');
        line.setAttribute('stroke-linecap', 'round');
        this.separatorsGroup.appendChild(line);
      }

      // Inner circle white boundary
      const innerBorder = document.createElementNS(svgNS, 'circle');
      innerBorder.setAttribute('cx', cx);
      innerBorder.setAttribute('cy', cy);
      innerBorder.setAttribute('r', innerRadius);
      innerBorder.setAttribute('stroke', '#ffffff');
      innerBorder.setAttribute('stroke-width', '1.5');
      innerBorder.setAttribute('fill', 'none');
      this.separatorsGroup.appendChild(innerBorder);

      this.rotatableGroup.appendChild(this.separatorsGroup);
    }

    this.svg.appendChild(this.rotatableGroup);

    // 3. Center Compass Image
    this.centerImg = document.createElementNS(svgNS, 'image');
    this.centerImg.setAttributeNS('http://www.w3.org/1999/xlink', 'href', this.centerImageDataUrl);
    this.centerImg.setAttribute('href', this.centerImageDataUrl);
    this.centerImg.setAttribute('x', cx - SETTINGS.centerImageRadius);
    this.centerImg.setAttribute('y', cy - SETTINGS.centerImageRadius);
    this.centerImg.setAttribute('width', SETTINGS.centerImageRadius * 2);
    this.centerImg.setAttribute('height', SETTINGS.centerImageRadius * 2);
    this.centerImg.setAttribute('preserveAspectRatio', 'xMidYMid slice');
    this.centerImg.setAttribute('clip-path', `url(#${clipId})`);
    this.svg.appendChild(this.centerImg);

    // 4. Labels and Icons Group
    this.labelsGroup = document.createElementNS(svgNS, 'g');
    this.labelsGroup.setAttribute('class', 'labels-group');

    this.axes.forEach((axis, i) => {
      // Text
      const text = document.createElementNS(svgNS, 'text');
      text.setAttribute('class', 'axis-label select-none');
      text.setAttribute('fill', darken(axis.color, 0.25));
      text.setAttribute('font-family', "'El Messiri', sans-serif");
      text.setAttribute('font-size', '24px');
      text.setAttribute('font-weight', 'bold');
      text.setAttribute('text-anchor', 'middle');
      text.setAttribute('dominant-baseline', 'central');
      text.textContent = axis.label || '';
      this.labelsGroup.appendChild(text);
      this.axisElements[i].text = text;

      // Icon
      if (axis.iconUrl) {
        const img = document.createElementNS(svgNS, 'image');
        img.setAttribute('class', 'axis-icon select-none');
        img.setAttributeNS('http://www.w3.org/1999/xlink', 'href', axis.iconUrl);
        img.setAttribute('href', axis.iconUrl);
        img.setAttribute('width', 44);
        img.setAttribute('height', 44);
        img.setAttribute('preserveAspectRatio', 'xMidYMid meet');
        this.labelsGroup.appendChild(img);
        this.axisElements[i].icon = img;
      }

      // Percentage Text
      const pText = document.createElementNS(svgNS, 'text');
      pText.setAttribute('class', 'axis-percent font-cairo select-none');
      pText.setAttribute('fill', darken(axis.color, 0.2));
      pText.setAttribute('font-family', "'Cairo', sans-serif");
      pText.setAttribute('font-size', '26px');
      pText.setAttribute('font-weight', '700');
      pText.setAttribute('text-anchor', 'middle');
      pText.setAttribute('dominant-baseline', 'central');
      pText.textContent = `${Math.round(axis.percent || 0)}%`;
      this.labelsGroup.appendChild(pText);
      this.axisElements[i].percentText = pText;
    });
    this.svg.appendChild(this.labelsGroup);

    // 5. Center hit area for manual spin
    const centerHit = document.createElementNS(svgNS, 'circle');
    centerHit.setAttribute('cx', cx);
    centerHit.setAttribute('cy', cy);
    centerHit.setAttribute('r', innerRadius);
    centerHit.setAttribute('fill', 'transparent');
    centerHit.style.cursor = 'pointer';
    centerHit.addEventListener('click', () => this.spinWheelRandom());
    this.svg.appendChild(centerHit);
  }

  updateGeometry() {
    if (!this.svg || !this.rotatableGroup) return;
    const center = SETTINGS.center;
    const innerRadius = this.innerRadius;
    const outerRadius = this.outerRadius;
    const numRings = SETTINGS.numRings;
    const gapWidth = this.gapWidth;
    const cx = center.x, cy = center.y;
    const n = this.axes.length;
    const sectorAngle = 360 / n;
    const ringThickness = (outerRadius - innerRadius) / numRings;

    const angle = this.rotationAngle + this.idleWobbleDeg;
    this.rotatableGroup.setAttribute('transform', `rotate(${angle} ${cx} ${cy})`);

    this.axes.forEach((axis, i) => {
      const el = this.axisElements[i];
      if (!el) return;

      const sectorStartDeg = i * sectorAngle;
      const sectorEndDeg = (i + 1) * sectorAngle;
      const value = Math.max(0, Math.min(numRings, (axis.percent / 100) * numRings));

      // 1. Ring paths
      for (let k = 0; k < numRings; k++) {
        const rInner = innerRadius + k * ringThickness;
        const rOuter = innerRadius + (k + 1) * ringThickness;
        const fillFraction = Math.max(0, Math.min(1, value - k));

        const fillP = el.fillPaths[k];
        const gridP = el.gridPaths[k];

        if (fillFraction > 0) {
          const rMid = rInner + fillFraction * (rOuter - rInner);
          fillP.setAttribute('d', ringSectorPath(cx, cy, rInner, rMid, sectorStartDeg, sectorEndDeg, gapWidth));
          fillP.style.display = '';
        } else {
          fillP.setAttribute('d', '');
          fillP.style.display = 'none';
        }

        if (fillFraction < 1) {
          const rStart = rInner + fillFraction * (rOuter - rInner);
          gridP.setAttribute('d', ringSectorPath(cx, cy, rStart, rOuter, sectorStartDeg, sectorEndDeg, gapWidth));
          gridP.style.display = '';
        } else {
          gridP.setAttribute('d', '');
          gridP.style.display = 'none';
        }
      }

      // 2. Labels, Icons and Percentages
      const mid = i * sectorAngle + sectorAngle / 2 + angle;
      const fillFrac = Math.max(0, Math.min(100, axis.percent || 0)) / 100;
      const currentFillRadius = innerRadius + fillFrac * (outerRadius - innerRadius);

      let dynamicOffset = 60;
      if (this.uiApproach === 'result') {
        const H_half = 66, W_half = 44;
        const rad = mid * Math.PI / 180;
        dynamicOffset = Math.abs(Math.cos(rad)) * H_half + Math.abs(Math.sin(rad)) * W_half + 14;
      }
      const targetRadius = Math.max(innerRadius + 50, currentFillRadius + dynamicOffset);
      const basePos = polarToCartesian(cx, cy, targetRadius, mid);

      const iconSize = 44;
      const fontSize = 24;
      const percentSize = 25;
      const gap = 14;

      if (this.uiApproach === 'result') {
        // Result layout: Label above, Icon middle, Percent below
        if (el.text) {
          el.text.setAttribute('x', basePos.x);
          el.text.setAttribute('y', basePos.y - (iconSize / 2 + gap + fontSize / 2));
          el.text.style.display = '';
        }
        if (el.icon) {
          el.icon.setAttribute('x', basePos.x - iconSize / 2);
          el.icon.setAttribute('y', basePos.y - iconSize / 2);
          el.icon.style.display = '';
        }
        if (el.percentText) {
          el.percentText.setAttribute('x', basePos.x);
          el.percentText.setAttribute('y', basePos.y + (iconSize / 2 + gap + percentSize / 2));
          el.percentText.textContent = `${Math.round(axis.percent || 0)}%`;
          el.percentText.style.display = this.showPercents ? '' : 'none';
        }
      } else if (this.uiApproach === 'explore') {
        // Explore layout: Exactly typical to the homepage! (Title above, icon below, no % numbers)
        if (el.text) {
          el.text.setAttribute('x', basePos.x);
          el.text.setAttribute('y', basePos.y - 12);
          el.text.style.display = '';
        }
        if (el.icon) {
          el.icon.setAttribute('x', basePos.x - iconSize / 2);
          el.icon.setAttribute('y', basePos.y + 4);
          el.icon.style.display = '';
        }
        if (el.percentText) {
          el.percentText.style.display = 'none';
        }
      } else {
        // Minimalist layout
        if (el.text) {
          el.text.style.display = 'none';
        }
        if (el.icon) {
          el.icon.setAttribute('x', basePos.x - iconSize / 2);
          el.icon.setAttribute('y', basePos.y - iconSize / 2);
          el.icon.style.display = '';
        }
        if (el.percentText) {
          el.percentText.setAttribute('x', basePos.x);
          el.percentText.setAttribute('y', basePos.y + iconSize / 2 + 16);
          el.percentText.textContent = `${Math.round(axis.percent || 0)}%`;
          el.percentText.style.display = this.showPercents ? '' : 'none';
        }
      }
    });

    this.updateCenterDisplay();
  }

  updateCenterDisplay() {
    const avg = this.getAverageScore();
    if (this.centerScoreEl) {
      this.centerScoreEl.textContent = `${avg}%`;
    }

    if (this.centerLabelEl) {
      if (avg >= 85) this.centerLabelEl.textContent = 'توازن متميز';
      else if (avg >= 60) this.centerLabelEl.textContent = 'توازن جيد';
      else if (avg > 0) this.centerLabelEl.textContent = 'بحاجة لتطوير';
      else this.centerLabelEl.textContent = 'جاهز للبدء';
    }

    // Toggle center compass vs center badge overlay vs empty hole
    if (this.centerImg) {
      this.centerImg.style.display = this.centerType === 'compass' ? '' : 'none';
    }
    if (this.centerBadgeEl) {
      this.centerBadgeEl.style.display = this.centerType === 'score' ? 'flex' : 'none';
    }

    // Update summary stat badges on card
    const cardAvg = this.cardEl?.querySelector('[data-stat-average]');
    if (cardAvg) cardAvg.textContent = `${avg}%`;

    const highAxis = [...this.axes].sort((a, b) => b.percent - a.percent)[0];
    const lowAxis = [...this.axes].sort((a, b) => a.percent - b.percent)[0];

    const cardHigh = this.cardEl?.querySelector('[data-stat-high]');
    if (cardHigh && highAxis) {
      cardHigh.textContent = `${highAxis.label} (${Math.round(highAxis.percent)}%)`;
    }

    const cardLow = this.cardEl?.querySelector('[data-stat-low]');
    if (cardLow && lowAxis) {
      cardLow.textContent = `${lowAxis.label} (${Math.round(lowAxis.percent)}%)`;
    }
  }

  getAverageScore() {
    const sum = this.axes.reduce((acc, a) => acc + (a.percent || 0), 0);
    return Math.round(sum / this.axes.length);
  }

  setPercent(idx, val) {
    val = Math.max(0, Math.min(100, Math.round(val)));
    this.axes[idx].percent = val;
    this.axisAnimState[idx].target = val;
    this.axisAnimState[idx].current = val;

    // Update slider & badge
    const slider = this.cardEl?.querySelector(`input[data-axis-slider="${idx}"]`);
    if (slider && Number(slider.value) !== val) slider.value = val;

    const valBadge = this.cardEl?.querySelector(`[data-axis-val="${idx}"]`);
    if (valBadge) valBadge.textContent = `${val}%`;

    this.updateGeometry();
  }

  setAllPercents(val) {
    this.axes.forEach((_, i) => this.setPercent(i, val));
  }

  setPercentsArray(arr) {
    arr.forEach((val, i) => {
      if (i < this.axes.length) this.setPercent(i, val);
    });
  }

  replayStartupAnimation(duration = 1600) {
    const targets = this.axes.map(a => a.percent);
    const startTime = performance.now();

    const animFrame = (now) => {
      let progress = (now - startTime) / duration;
      if (progress > 1) progress = 1;
      // easeOutQuart
      const ease = 1 - Math.pow(1 - progress, 4);

      this.axes.forEach((axis, i) => {
        axis.percent = targets[i] * ease;
      });
      this.updateGeometry();

      if (progress < 1) {
        requestAnimationFrame(animFrame);
      } else {
        this.setPercentsArray(targets);
      }
    };
    requestAnimationFrame(animFrame);
  }

  /* ============================================================
     Realistic Multi-Directional Life Journey Animation
     - Aspects move dynamically in DIFFERENT directions:
       * Aspects improve on some while declining on others logically
         governed by the dashboard influence matrix (INFLUENCE)
       * Smooth hydrodynamic transition (like water in a glass)
       * Zero harsh stops, C2 smootherstep continuous acceleration
       * Staggered arrival: leaders lock at the top early, laggards
         catch up only at the very end; ALL settle in 75% - 95% (5 years in 5 seconds)
     ============================================================ */
  runRealisticLifeJourney(duration = null) {
    if (this.isFluidAnimating) {
      cancelAnimationFrame(this.fluidRaf);
      this.isFluidAnimating = false;
    }
    this.isFluidAnimating = true;

    const animDuration = duration !== null ? duration : (this.animationDuration || 6000);
    const startVals = this.axes.map(a => a.percent);
    const journey = generateFiveYearJourney(startVals, getInfluenceConfig(), { range: [75, 95], labels: this.axes.map((a) => a.label) });
    const { keyframes, finals, phases } = journey;
    const startTime = performance.now();
    const waterStatus = this.cardEl?.querySelector('[data-water-status]');

    const step = (now) => {
      let progress = (now - startTime) / animDuration;
      if (progress > 1) progress = 1;

      this.axes.forEach((axis, i) => {
        const currentVal = sampleKeyframes(keyframes[i], easeProgress(progress));
        axis.percent = currentVal;

        // Sync slider & readout live
        const slider = this.cardEl?.querySelector(`input[data-axis-slider="${i}"]`);
        if (slider && document.activeElement !== slider) slider.value = Math.round(currentVal);
        const valBadge = this.cardEl?.querySelector(`[data-axis-val="${i}"]`);
        if (valBadge) valBadge.textContent = `${Math.round(currentVal)}%`;
      });

      this.updateGeometry();

      // Update narrative status live
      if (waterStatus) {
        const phase = [...phases].reverse().find((ph) => easeProgress(progress) >= ph.t);
        if (phase) waterStatus.textContent = phase.title;
      }

      if (progress < 1 && this.isFluidAnimating) {
        this.fluidRaf = requestAnimationFrame(step);
      } else {
        this.isFluidAnimating = false;
        const finalVals = finals;
        this.setPercentsArray(finalVals);
        this.currentFluidDirection = 'up';

        if (waterStatus) {
          waterStatus.textContent = 'اكتملت الخمس سنين: كل الجوانب بين 75% و95% 💧';
        }
      }
    };

    this.fluidRaf = requestAnimationFrame(step);
  }

  fluidWaterAnimation(direction = 'up', duration = null) {
    const targetDuration = duration !== null ? duration : (this.animationDuration || 6000);

    if (direction === 'up') {
      this.runRealisticLifeJourney(targetDuration);
      return;
    }

    if (this.isFluidAnimating) {
      cancelAnimationFrame(this.fluidRaf);
      this.isFluidAnimating = false;
    }
    this.isFluidAnimating = true;

    // Return to baseline 30% - 60%
    const lowLevels = this.initialPercents;
    const fromVals = this.axes.map(a => a.percent);
    const toVals = lowLevels;

    const downDuration = Math.round(targetDuration * 0.6);
    const startTime = performance.now();
    const n = this.axes.length;

    // Smootherstep (Ken Perlin's C2 polynomial)
    const smootherstep = (t) => t * t * t * (t * (6 * t - 15) + 10);

    const step = (now) => {
      let progress = (now - startTime) / downDuration;
      if (progress > 1) progress = 1;

      this.axes.forEach((axis, i) => {
        // Natural surface ripple delay
        const ripplePhase = Math.sin((i / n) * 2 * Math.PI) * 0.05;
        const localT = Math.max(0, Math.min(1, (progress - ripplePhase) / (1 - 0.05)));
        const ease = smootherstep(localT);

        const currentVal = fromVals[i] + (toVals[i] - fromVals[i]) * ease;
        axis.percent = currentVal;

        const slider = this.cardEl?.querySelector(`input[data-axis-slider="${i}"]`);
        if (slider && document.activeElement !== slider) slider.value = Math.round(currentVal);
        const valBadge = this.cardEl?.querySelector(`[data-axis-val="${i}"]`);
        if (valBadge) valBadge.textContent = `${Math.round(currentVal)}%`;
      });

      this.updateGeometry();

      if (progress < 1 && this.isFluidAnimating) {
        this.fluidRaf = requestAnimationFrame(step);
      } else {
        this.isFluidAnimating = false;
        this.setPercentsArray(toVals);
        this.currentFluidDirection = 'down';

        const waterStatus = this.cardEl?.querySelector('[data-water-status]');
        if (waterStatus) {
          waterStatus.textContent = 'استقرار عند الوضع الأولي (30% - 60%) 💧';
        }
      }
    };

    this.fluidRaf = requestAnimationFrame(step);
  }

  toggleContinuousWaterFlow() {
    this.continuousWaterOn = !this.continuousWaterOn;
    const btn = this.cardEl?.querySelector('[data-action-water-loop]');
    if (this.continuousWaterOn) {
      if (btn) {
        btn.classList.add('bg-cyan-600', 'text-white', 'shadow-md');
        btn.classList.remove('bg-white', 'text-cyan-800');
      }
      let cycle = 0;
      const nextCycle = () => {
        if (!this.continuousWaterOn) return;
        const isUp = (cycle % 2 === 0);
        cycle++;
        const currentDur = this.animationDuration || 6000;
        if (isUp) {
          this.runRealisticLifeJourney(currentDur);
          this.waterLoopTimeout = setTimeout(nextCycle, currentDur + 1400);
        } else {
          const downDur = Math.round(currentDur * 0.6);
          this.fluidWaterAnimation('down', downDur);
          this.waterLoopTimeout = setTimeout(nextCycle, downDur + 1200);
        }
      };
      nextCycle();
    } else {
      if (btn) {
        btn.classList.remove('bg-cyan-600', 'text-white', 'shadow-md');
        btn.classList.add('bg-white', 'text-cyan-800');
      }
      clearTimeout(this.waterLoopTimeout);
      if (this.isFluidAnimating) {
        cancelAnimationFrame(this.fluidRaf);
        this.isFluidAnimating = false;
      }
    }
  }

  toggleAutoSpin(forcedState) {
    this.autoSpinOn = forcedState !== undefined ? forcedState : !this.autoSpinOn;
    if (this.autoSpinOn) {
      let lastTime = performance.now();
      const spinStep = (now) => {
        if (!this.autoSpinOn) return;
        const dt = (now - lastTime) / 1000;
        lastTime = now;
        const delta = this.autoSpinSpeed * dt * (this.spinDirection === 'cw' ? 1 : -1);
        this.rotationAngle = (this.rotationAngle + delta + 360) % 360;
        this.updateGeometry();
        this.autoSpinTimer = requestAnimationFrame(spinStep);
      };
      this.autoSpinTimer = requestAnimationFrame(spinStep);
    } else {
      if (this.autoSpinTimer) cancelAnimationFrame(this.autoSpinTimer);
      this.autoSpinTimer = null;
    }

    const btn = this.cardEl?.querySelector('[data-action-autospin]');
    if (btn) {
      btn.classList.toggle('bg-blue-600', this.autoSpinOn);
      btn.classList.toggle('text-white', this.autoSpinOn);
    }
  }

  toggleBreathing(forcedState) {
    this.dynamicBreathingOn = forcedState !== undefined ? forcedState : !this.dynamicBreathingOn;
    if (this.dynamicBreathingOn) {
      let start = performance.now();
      const wobbleStep = (now) => {
        if (!this.dynamicBreathingOn) {
          this.idleWobbleDeg = 0;
          this.updateGeometry();
          return;
        }
        const elapsed = (now - start) / 1000;
        this.idleWobbleDeg = Math.sin(elapsed * 1.5) * 4; // +/- 4 degrees wobble
        this.updateGeometry();
        this.breathingRaf = requestAnimationFrame(wobbleStep);
      };
      this.breathingRaf = requestAnimationFrame(wobbleStep);
    } else {
      if (this.breathingRaf) cancelAnimationFrame(this.breathingRaf);
      this.breathingRaf = null;
      this.idleWobbleDeg = 0;
      this.updateGeometry();
    }

    const btn = this.cardEl?.querySelector('[data-action-breathing]');
    if (btn) {
      btn.classList.toggle('bg-emerald-600', this.dynamicBreathingOn);
      btn.classList.toggle('text-white', this.dynamicBreathingOn);
    }
  }

  spinWheelRandom() {
    if (this.isSpinning) return;
    this.isSpinning = true;

    const extraSpins = 3 + Math.floor(Math.random() * 3);
    const randomStopDeg = Math.random() * 360;
    const targetAngle = this.rotationAngle + extraSpins * 360 + randomStopDeg;
    const startAngle = this.rotationAngle;
    const duration = 3000;
    const startTime = performance.now();
    let lastSoundAngle = startAngle;

    const spinAnim = (now) => {
      const p = Math.min(1, (now - startTime) / duration);
      // easeOutCubic
      const ease = 1 - Math.pow(1 - p, 3);
      this.rotationAngle = startAngle + (targetAngle - startAngle) * ease;

      // Play tick sound on sector crossing
      if (Math.abs(this.rotationAngle - lastSoundAngle) > 45) {
        playClickSound();
        lastSoundAngle = this.rotationAngle;
      }

      this.updateGeometry();

      if (p < 1) {
        requestAnimationFrame(spinAnim);
      } else {
        this.rotationAngle = this.rotationAngle % 360;
        this.isSpinning = false;
        this.updateGeometry();

        // Calculate top winning axis
        const n = this.axes.length;
        const sectorAngle = 360 / n;
        const normalizedAngle = (360 - (this.rotationAngle % 360)) % 360;
        const winningIdx = Math.floor(normalizedAngle / sectorAngle) % n;
        const winner = this.axes[winningIdx];

        const resultDisplay = this.cardEl?.querySelector('[data-spin-result]');
        if (resultDisplay) {
          resultDisplay.textContent = `الفائز: ${winner.label} (${Math.round(winner.percent)}%)`;
          resultDisplay.classList.add('animate-bounce');
          setTimeout(() => resultDisplay.classList.remove('animate-bounce'), 1000);
        }
      }
    };
    requestAnimationFrame(spinAnim);
  }

  setUIApproach(approach) {
    this.uiApproach = approach;
    if (approach === 'result') {
      this.centerType = 'score';
      this.showPercents = true;
    } else if (approach === 'explore') {
      this.centerType = 'compass';
      this.showPercents = false;
    } else if (approach === 'minimal') {
      this.centerType = 'empty';
      this.showPercents = true;
    }
    this.updateGeometry();
  }

  setCenterType(type) {
    this.centerType = type;
    this.updateCenterDisplay();
  }

  initControls() {
    if (!this.cardEl) return;

    // Sliders for each aspect
    this.axes.forEach((axis, idx) => {
      const slider = this.cardEl.querySelector(`input[data-axis-slider="${idx}"]`);
      if (slider) {
        slider.value = axis.percent;
        slider.addEventListener('input', (e) => {
          this.setPercent(idx, Number(e.target.value));
        });
      }
    });

    // Preset buttons on card
    this.cardEl.querySelector('[data-preset="zero"]')?.addEventListener('click', () => {
      this.setAllPercents(0);
    });
    this.cardEl.querySelector('[data-preset="half"]')?.addEventListener('click', () => {
      this.setAllPercents(50);
    });
    this.cardEl.querySelector('[data-preset="full"]')?.addEventListener('click', () => {
      this.setAllPercents(100);
    });
    this.cardEl.querySelector('[data-preset="staggered"]')?.addEventListener('click', () => {
      this.setPercentsArray([85, 25, 90, 35, 80, 20, 75, 40]);
    });
    this.cardEl.querySelector('[data-preset="random"]')?.addEventListener('click', () => {
      const randoms = Array.from({ length: 8 }, () => Math.floor(Math.random() * 95) + 5);
      this.setPercentsArray(randoms);
    });
    this.cardEl.querySelector('[data-action-reset]')?.addEventListener('click', () => {
      this.setPercentsArray(this.initialPercents);
    });

    // Customizable animation duration selector
    const durationSelect = this.cardEl.querySelector('[data-action-duration]');
    if (durationSelect) {
      durationSelect.value = String(this.animationDuration || 6000);
      durationSelect.addEventListener('change', (e) => {
        this.animationDuration = Number(e.target.value);
      });
    }

    // Replay animation button
    this.cardEl.querySelector('[data-action-replay]')?.addEventListener('click', () => {
      this.replayStartupAnimation();
    });

    // Water fluid animation buttons
    this.cardEl.querySelector('[data-action-water-up]')?.addEventListener('click', () => {
      this.fluidWaterAnimation('up', this.animationDuration);
    });
    this.cardEl.querySelector('[data-action-water-down]')?.addEventListener('click', () => {
      this.fluidWaterAnimation('down', Math.round((this.animationDuration || 6000) * 0.6));
    });
    this.cardEl.querySelector('[data-action-water-loop]')?.addEventListener('click', () => {
      this.toggleContinuousWaterFlow();
    });

    // Spin button
    this.cardEl.querySelector('[data-action-spin]')?.addEventListener('click', () => {
      this.spinWheelRandom();
    });

    // Auto-spin button
    this.cardEl.querySelector('[data-action-autospin]')?.addEventListener('click', () => {
      this.toggleAutoSpin();
    });

    // Dynamic breathing toggle
    this.cardEl.querySelector('[data-action-breathing]')?.addEventListener('click', () => {
      this.toggleBreathing();
    });

    // Approach selector
    const approachSelect = this.cardEl.querySelector('[data-select-approach]');
    if (approachSelect) {
      approachSelect.value = this.uiApproach;
      approachSelect.addEventListener('change', (e) => {
        this.setUIApproach(e.target.value);
      });
    }

    // Center type selector
    const centerSelect = this.cardEl.querySelector('[data-select-center]');
    if (centerSelect) {
      centerSelect.value = this.centerType;
      centerSelect.addEventListener('change', (e) => {
        this.setCenterType(e.target.value);
      });
    }

    // Toggle percentages checkbox
    const percentToggle = this.cardEl.querySelector('[data-toggle-percents]');
    if (percentToggle) {
      percentToggle.checked = this.showPercents;
      percentToggle.addEventListener('change', (e) => {
        this.showPercents = e.target.checked;
        this.updateGeometry();
      });
    }
  }
}

/* ============================================================
   Global Testing Lab Controller
   ============================================================ */
/**
 * النسخة 5: نفس عجلة الرئيسية الحالية (محرك newLifeWheel بشكل فيجما) + محاكاة 5 سنين في 5 ثواني.
 * بتبدأ من المستوى الحالي (السلايدرز) وبتخلص كل الجوانب بين 75% و95%.
 */
function initJourneyWheel() {
  const card = document.getElementById('card-wheel-5');
  if (!card || !document.getElementById('wheelSvg-5')) return null;

  const labels = BASE_AXES.map((a) => a.label);
  const startInputs = [...card.querySelectorAll('input[data-j-start]')];
  const q = (sel) => card.querySelector(sel);
  const bar = q('[data-j-bar]');
  const yearEl = q('[data-j-year]');
  const textEl = q('[data-j-text]');
  const resultEl = q('[data-j-result]');
  const readStart = () => startInputs.map((input) => Number(input.value));
  const durationSelect = q('[data-j-duration]');
  const readMs = () => Number(durationSelect?.value || 7000);
  const hint = q('[data-j-hint]');
  const syncHint = () => { if (hint) hint.textContent = `5 سنين = ${readMs() / 1000} ثواني`; };
  let journey = null;
  let running = false;

  const showResults = () => {
    const finals = wheel.values().map((v) => Math.round(v));
    const starts = readStart();
    const min = Math.min(...finals);
    const max = Math.max(...finals);
    resultEl.innerHTML = `
      <div class="font-bold text-[#173357] mb-2">النتيجة بعد 5 سنين: أقل جانب ${min}% وأعلى جانب ${max}% ${min >= 75 && max <= 95 ? '✅' : '⚠️'}</div>
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs">
        ${labels.map((label, i) => {
          const delta = finals[i] - starts[i];
          return `<div class="bg-white border border-gray-200 rounded-xl px-2.5 py-1.5 flex items-center justify-between gap-2">
            <span class="font-bold text-gray-700">${label}</span>
            <span class="font-bold ${delta >= 0 ? 'text-emerald-700' : 'text-rose-600'}" dir="ltr">${starts[i]}% → ${finals[i]}%</span>
          </div>`;
        }).join('')}
      </div>`;
    resultEl.classList.remove('hidden');
  };

  const updateUi = (p) => {
    if (!running) return;
    const year = Math.min(5, Math.floor(easeProgress(p) * 5) + 1);
    if (bar) bar.style.width = `${Math.round(p * 100)}%`;
    if (yearEl) yearEl.textContent = p >= 1 ? 'اكتملت الخمس سنين' : `السنة ${year} من 5`;
    if (textEl && journey) textEl.textContent = journey.narrative[year - 1];
    if (p >= 1) {
      running = false;
      showResults();
    }
  };

  const wheel = initNewLifeWheel({
    variant: 'home',
    svgId: 'wheelSvg-5',
    wrapId: 'wheel-wrap-5',
    autoPlay: false,
    startValues: readStart(),
    maxPercent: 95,
    continuousJourney: true,
    journeyMs: readMs(),
    journeyFactory: (startVals, influence) => {
      journey = generateFiveYearJourney(startVals, influence, { range: [75, 95], labels });
      return journey;
    },
    onProgress: updateUi
  });

  const resetUi = () => {
    running = false;
    if (bar) bar.style.width = '0%';
    if (yearEl) yearEl.textContent = 'المستوى الحالي';
    if (textEl) textEl.textContent = 'اضغط «تشغيل» لمحاكاة 5 سنين من حياة شخص يبدأ من هذا المستوى.';
    resultEl?.classList.add('hidden');
  };

  const reset = () => {
    wheel.setStart(readStart());
    resetUi();
  };

  const play = () => {
    resetUi();
    running = true;
    wheel.play(readStart(), readMs());
  };

  startInputs.forEach((input, i) => {
    input.addEventListener('input', () => {
      const out = q(`[data-j-start-val="${i}"]`);
      if (out) out.textContent = `${input.value}%`;
      reset();
    });
  });
  durationSelect?.addEventListener('change', syncHint);
  syncHint();
  q('[data-j-play]')?.addEventListener('click', play);
  q('[data-j-reset]')?.addEventListener('click', reset);
  q('[data-j-random]')?.addEventListener('click', () => {
    startInputs.forEach((input, i) => {
      input.value = String(30 + Math.round(Math.random() * 30));
      const out = q(`[data-j-start-val="${i}"]`);
      if (out) out.textContent = `${input.value}%`;
    });
    reset();
  });
  resetUi();

  // نفس واجهة نسخ المختبر عشان التبويبات والأزرار العامة تتعامل معاها
  return {
    id: 'wheel-5',
    cardEl: card,
    axes: labels.map((label, i) => ({ key: BASE_AXES[i].key, label, get percent() { return wheel.values()[i]; } })),
    updateGeometry() {},
    spinWheelRandom() {},
    toggleAutoSpin() {},
    replayStartupAnimation() { play(); },
    play,
    onShow() { reset(); setTimeout(play, 350); }
  };
}

function initTestingLab() {
  if (!document.getElementById('wheel-test-lab')) return;

  // 1. Initialize the 4 copies:
  // Copy 1: Staggered High / Low
  const wheel1 = new LifeWheelLabInstance({
    id: 'wheel-1',
    name: 'نسخة 1: تفاوت المستويات (عالي / منخفض)',
    svgId: 'wheelSvg-1',
    cardId: 'card-wheel-1',
    initialPercents: [85, 25, 90, 35, 80, 20, 75, 40],
    uiApproach: 'result',
    centerType: 'score',
    showPercents: true
  });

  // Copy 2: Zero Baseline (0%)
  const wheel2 = new LifeWheelLabInstance({
    id: 'wheel-2',
    name: 'نسخة 2: البداية من الصفر (0%)',
    svgId: 'wheelSvg-2',
    cardId: 'card-wheel-2',
    initialPercents: [0, 0, 0, 0, 0, 0, 0, 0],
    uiApproach: 'explore',
    centerType: 'compass',
    showPercents: true
  });

  // Copy 3: Full Saturation (100%)
  const wheel3 = new LifeWheelLabInstance({
    id: 'wheel-3',
    name: 'نسخة 3: الاكتمال التام (100%)',
    svgId: 'wheelSvg-3',
    cardId: 'card-wheel-3',
    initialPercents: [100, 100, 100, 100, 100, 100, 100, 100],
    uiApproach: 'result',
    centerType: 'score',
    showPercents: true
  });

  // Copy 4: Homepage Typical with Thin White Separator Lines & Dynamic Journey
  const wheel4 = new LifeWheelLabInstance({
    id: 'wheel-4',
    name: 'نسخة 4: واجهة الرئيسية بخط فاصل أبيض وحركة واقعية',
    svgId: 'wheelSvg-4',
    cardId: 'card-wheel-4',
    initialPercents: [38, 54, 44, 58, 48, 36, 52, 42], // All strictly between 30% and 60%
    targetPercents: [90, 94, 88, 85, 93, 84, 89, 92],  // All strictly between 75% and 95%
    animationDuration: 7000, // 5 سنين بحركة سلسة
    uiApproach: 'explore', // Exactly typical to homepage
    centerType: 'compass', // Center compass illustration
    showPercents: false,
    gapWidth: 0,           // No gaps between sectors
    innerRadius: 60,       // Starts right at center compass
    seamlessNoGap: true,
    whiteSeparators: true
  });

  const wheel5 = initJourneyWheel() || { cardEl: null, updateGeometry() {}, spinWheelRandom() {}, toggleAutoSpin() {}, replayStartupAnimation() {}, play() {}, onShow() {}, axes: [] };

  const wheels = [wheel1, wheel2, wheel3, wheel4, wheel5];
  window.__lifeWheelLab = { wheel5 }; // للفحص من الكونسول (صفحة المختبر بس)

  // 2. Global Actions
  document.getElementById('btn-global-replay-all')?.addEventListener('click', () => {
    wheels.slice(0, 3).forEach(w => w.replayStartupAnimation());
    wheel4.fluidWaterAnimation('up', 7000);
    wheel5.play();
  });

  document.getElementById('btn-global-spin-all')?.addEventListener('click', () => {
    wheels.forEach(w => w.spinWheelRandom());
  });

  let allSpinning = false;
  document.getElementById('btn-global-autospin-all')?.addEventListener('click', () => {
    allSpinning = !allSpinning;
    wheels.forEach(w => w.toggleAutoSpin(allSpinning));
  });

  // 3. Tab & Display Controller (Centered on Screen, Full Size Matching Homepage)
  let currentActiveTab = 4; // Default to Variant 5 (الرئيسية الحالية + محاكاة 5 سنين)
  let isStackMode = false;

  const viewSingleBtn = document.getElementById('view-mode-single');
  const viewStackBtn = document.getElementById('view-mode-stack');

  function setActiveTab(activeIdx) {
    currentActiveTab = activeIdx;
    document.querySelectorAll('[data-tab-idx]').forEach(btn => {
      const idx = Number(btn.dataset.tabIdx);
      if (idx === activeIdx) {
        btn.classList.add('bg-[#1a3b62]', 'text-white', 'shadow-md', 'scale-[1.02]');
        btn.classList.remove('bg-white', 'text-gray-700', 'hover:bg-gray-50');
      } else {
        btn.classList.remove('bg-[#1a3b62]', 'text-white', 'shadow-md', 'scale-[1.02]');
        btn.classList.add('bg-white', 'text-gray-700', 'hover:bg-gray-50');
      }
    });

    if (!isStackMode) {
      wheels.forEach((w, idx) => {
        if (idx === activeIdx) {
          w.cardEl?.classList.remove('hidden');
          w.updateGeometry();
          if (idx === 4) w.onShow();
        } else {
          w.cardEl?.classList.add('hidden');
        }
      });
    }
  }

  function setDisplayMode(mode) {
    isStackMode = (mode === 'stack');
    if (isStackMode) {
      viewStackBtn?.classList.add('bg-[#1a3b62]', 'text-white');
      viewStackBtn?.classList.remove('bg-white', 'text-gray-600');
      viewSingleBtn?.classList.remove('bg-[#1a3b62]', 'text-white');
      viewSingleBtn?.classList.add('bg-white', 'text-gray-600');

      wheels.forEach(w => {
        w.cardEl?.classList.remove('hidden');
        w.updateGeometry();
      });
    } else {
      viewSingleBtn?.classList.add('bg-[#1a3b62]', 'text-white');
      viewSingleBtn?.classList.remove('bg-white', 'text-gray-600');
      viewStackBtn?.classList.remove('bg-[#1a3b62]', 'text-white');
      viewStackBtn?.classList.add('bg-white', 'text-gray-600');

      setActiveTab(currentActiveTab);
    }
  }

  viewSingleBtn?.addEventListener('click', () => setDisplayMode('single'));
  viewStackBtn?.addEventListener('click', () => setDisplayMode('stack'));

  document.querySelectorAll('[data-tab-idx]').forEach(btn => {
    btn.addEventListener('click', () => {
      if (isStackMode) setDisplayMode('single');
      setActiveTab(Number(btn.dataset.tabIdx));
    });
  });

  // 4. Background Canvas Contrast Switcher
  const bgToggleBtn = document.getElementById('btn-toggle-canvas-bg');
  let isDarkCanvas = false;
  bgToggleBtn?.addEventListener('click', () => {
    isDarkCanvas = !isDarkCanvas;
    document.querySelectorAll('.wheel-canvas-card').forEach(c => {
      if (isDarkCanvas) {
        c.classList.add('bg-[#101b2b]', 'border-blue-900', 'text-white');
        c.classList.remove('bg-white', 'border-gray-200');
      } else {
        c.classList.remove('bg-[#101b2b]', 'border-blue-900', 'text-white');
        c.classList.add('bg-white', 'border-gray-200');
      }
    });
    bgToggleBtn.textContent = isDarkCanvas ? 'الخلفية: داكنة' : 'الخلفية: فاتحة';
  });

  // 5. JSON Drawer / Scores Inspector
  const jsonOutput = document.getElementById('json-scores-output');
  const updateJsonInspector = () => {
    if (!jsonOutput) return;
    const data = {
      variant_1_asymmetric: wheel1.axes.reduce((acc, a) => ({ ...acc, [a.key]: a.percent }), {}),
      variant_2_zero: wheel2.axes.reduce((acc, a) => ({ ...acc, [a.key]: a.percent }), {}),
      variant_3_full: wheel3.axes.reduce((acc, a) => ({ ...acc, [a.key]: a.percent }), {}),
      variant_4_seamless_water: wheel4.axes.reduce((acc, a) => ({ ...acc, [a.key]: a.percent }), {})
    };
    jsonOutput.textContent = JSON.stringify(data, null, 2);
  };

  document.getElementById('btn-inspect-json')?.addEventListener('click', () => {
    updateJsonInspector();
    document.getElementById('json-inspector-modal')?.classList.remove('hidden');
  });

  document.getElementById('btn-close-json-modal')?.addEventListener('click', () => {
    document.getElementById('json-inspector-modal')?.classList.add('hidden');
  });

  document.getElementById('btn-copy-json')?.addEventListener('click', () => {
    if (jsonOutput) {
      navigator.clipboard.writeText(jsonOutput.textContent).then(() => {
        const copyBadge = document.getElementById('copy-feedback');
        if (copyBadge) {
          copyBadge.classList.remove('hidden');
          setTimeout(() => copyBadge.classList.add('hidden'), 2000);
        }
      });
    }
  });

  // Initialize with Variant 4 active by default in full homepage size centered on screen!
  setActiveTab(4);

  // Handle window resize
  window.addEventListener('resize', () => {
    wheels.forEach(w => w.updateGeometry());
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initTestingLab);
} else {
  initTestingLab();
}

