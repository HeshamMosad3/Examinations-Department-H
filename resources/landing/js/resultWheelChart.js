// عجلة صفحة "نتيجة التقييم" (Figma desktop #3414:6351 / mobile #3418:6284).
// بترسم في SVG بنفس إحداثيات الكارت في فيجما (كارت 630x698 للكمبيوتر و361x450 للموبايل)،
// فالمسافات والأحجام بتطلع زي التصميم بالظبط وبتتصغر/تتكبر مع عرض الكارت.

const SVG_NS = 'http://www.w3.org/2000/svg';
const ICON_DIR = '/landing/icons/wheel_of_life/home';
const COMPASS_URL = '/landing/images/Frame%202147238562.png';

// ترتيب المحاور بيبدأ من الشخصي أعلى يمين العجلة مع عقارب الساعة (نفس الصفحة الرئيسية)
export const AXES = [
  { key: 'personal',  fill: '#693CC7', bg: '#D9D0ED', text: '#5C3E9B', pill: ['168,85,247', '#693cc7'], iconW: 55, iconH: 55 },
  { key: 'spiritual', fill: '#6262E0', bg: '#D7DBF9', text: '#5963D9', pill: ['99,102,241', '#6262e0'], iconW: 48, iconH: 39 },
  { key: 'health',    fill: '#328C65', bg: '#D1EBE0', text: '#489674', pill: ['16,185,129', '#328c65'], iconW: 48, iconH: 48 },
  { key: 'social',    fill: '#C73269', bg: '#F8D1DF', text: '#963056', pill: ['236,72,153', '#c73269'], iconW: 48, iconH: 38 },
  { key: 'family',    fill: '#D87F3C', bg: '#FDE5D2', text: '#BC7B4A', pill: ['249,115,22', '#d87f3c'], iconW: 48, iconH: 48 },
  { key: 'leisure',   fill: '#DACB5E', bg: '#F5F1D3', text: '#B8AA44', pill: ['234,179,8', '#b8aa44'], iconW: 48, iconH: 48 },
  { key: 'financial', fill: '#59CFD6', bg: '#D2F2F4', text: '#27797E', pill: ['6,182,212', '#3dafb5'], iconW: 48, iconH: 48 },
  { key: 'career',    fill: '#244973', bg: '#CDDAED', text: '#21487B', pill: ['59,130,246', '#204a7a'], iconW: 48, iconH: 48 }
];

export const axisIconUrl = (axis) => `${ICON_DIR}/${axis.key}.svg`;

// إحداثيات فيجما: مركز العجلة ونصف القطر، ومكان كل اسم (cx = منتصف الاسم، top = أعلى النسبة المئوية)
const LAYOUTS = {
  desktop: {
    viewBox: [630, 698],
    center: [318.5, 383.5], outer: 218.5, inner: 44.5, compass: 36.5,
    pill: { w: 60, h: 24, font: 14 },
    name: { font: 16, lineH: 24, gap: 4 },
    pillToRow: 6,
    iconW: { personal: 24, spiritual: 18, health: 20, social: 20, family: 20, leisure: 20, financial: 20, career: 20 },
    labels: [[453, 117], [576, 250], [576, 435], [434, 600], [197, 600], [66, 435], [59, 254], [197, 117]]
  },
  mobile: {
    viewBox: [361, 450],
    center: [183, 252], outer: 120, inner: 24.5, compass: 20,
    pill: { w: 47, h: 20, font: 12 },
    name: { font: 11, lineH: 16.5, gap: 2 },
    pillToRow: 6,
    iconW: { personal: 18, spiritual: 13, health: 18, social: 16, family: 18, leisure: 18, financial: 18, career: 16 },
    labels: [[254.5, 86], [325.5, 168], [326.5, 285], [255.5, 373], [125, 375], [38.5, 291], [28, 164], [127.5, 83]]
  }
};

const el = (tag, attrs = {}, parent) => {
  const node = document.createElementNS(SVG_NS, tag);
  Object.entries(attrs).forEach(([k, v]) => node.setAttribute(k, v));
  if (parent) parent.appendChild(node);
  return node;
};

const polar = (cx, cy, r, deg) => {
  const rad = (deg * Math.PI) / 180;
  return [cx + r * Math.sin(rad), cy - r * Math.cos(rad)];
};

function sectorPath(cx, cy, r0, r1, a0, a1) {
  const [x1, y1] = polar(cx, cy, r0, a0);
  const [x2, y2] = polar(cx, cy, r1, a0);
  const [x3, y3] = polar(cx, cy, r1, a1);
  const [x4, y4] = polar(cx, cy, r0, a1);
  return `M ${x1} ${y1} L ${x2} ${y2} A ${r1} ${r1} 0 0 1 ${x3} ${y3} L ${x4} ${y4} A ${r0} ${r0} 0 0 0 ${x1} ${y1} Z`;
}

/**
 * @param {SVGSVGElement} svg
 * @param {{label: string, score: number}[]} data بنفس ترتيب AXES
 */
export function initResultWheelChart(svg, data) {
  if (!svg || !data?.length) return;

  const query = window.matchMedia('(min-width: 1024px)');
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let frame = null;

  function build() {
    if (frame) cancelAnimationFrame(frame);
    const L = query.matches ? LAYOUTS.desktop : LAYOUTS.mobile;
    const [cx, cy] = L.center;
    svg.innerHTML = '';
    svg.setAttribute('viewBox', `0 0 ${L.viewBox[0]} ${L.viewBox[1]}`);
    svg.setAttribute('role', 'img');
    svg.setAttribute('aria-label', data.map((d) => `${d.label} ${d.score}%`).join('، '));

    const defs = el('defs', {}, svg);
    const clip = el('clipPath', { id: 'resultCompassClip' }, defs);
    el('circle', { cx, cy, r: L.compass }, clip);

    // خلفية فاتحة لكل محور
    const bgGroup = el('g', {}, svg);
    AXES.forEach((axis, i) => {
      el('path', {
        d: sectorPath(cx, cy, L.inner, L.outer, i * 45, (i + 1) * 45),
        fill: axis.bg, stroke: axis.bg, 'stroke-width': 0.6, 'stroke-linejoin': 'round'
      }, bgGroup);
    });

    // الجزء الملوّن (نصف قطره حسب النسبة)
    const fillPaths = AXES.map((axis, i) => el('path', {
      fill: axis.fill, stroke: axis.fill, 'stroke-width': 0.6, 'stroke-linejoin': 'round'
    }, svg));

    // دائرة المنتصف + البوصلة
    el('circle', { cx, cy, r: L.inner, fill: '#F6F6F6' }, svg);
    el('image', {
      href: COMPASS_URL, x: cx - L.compass, y: cy - L.compass, width: L.compass * 2, height: L.compass * 2,
      preserveAspectRatio: 'xMidYMid slice', 'clip-path': 'url(#resultCompassClip)'
    }, svg);

    // الأسماء والنسب والأيقونات حوالين العجلة
    const nameNodes = [];
    AXES.forEach((axis, i) => {
      const [lx, top] = L.labels[i];
      const score = data[i].score;
      const g = el('g', {}, svg);

      // الحد داخل المربع (border-box) زي فيجما: بنصغّر المستطيل نص بكسل من كل ناحية
      el('rect', {
        x: lx - L.pill.w / 2 + 0.5, y: top + 0.5, width: L.pill.w - 1, height: L.pill.h - 1, rx: (L.pill.h - 1) / 2,
        fill: `rgba(${axis.pill[0]},0.2)`, stroke: `rgba(${axis.pill[0]},0.3)`, 'stroke-width': 1
      }, g);
      const pct = el('text', {
        x: lx, y: top + L.pill.h / 2 + 0.5, 'text-anchor': 'middle', 'dominant-baseline': 'central',
        fill: axis.pill[1], 'font-family': "'Plus Jakarta Sans', 'Cairo', sans-serif", 'font-weight': 700,
        'font-size': L.pill.font, 'letter-spacing': -0.3
      }, g);
      pct.textContent = `${Math.round(score)}%`;

      const rowY = top + L.pill.h + L.pillToRow + L.name.lineH / 2;
      const name = el('text', {
        y: rowY, 'text-anchor': 'middle', 'dominant-baseline': 'central', fill: axis.text,
        'font-family': "'El Messiri', sans-serif", 'font-weight': 700, 'font-size': L.name.font
      }, g);
      name.textContent = data[i].label;

      const iw = L.iconW[axis.key];
      const ih = (iw * axis.iconH) / axis.iconW;
      const icon = el('image', {
        href: axisIconUrl(axis), width: iw, height: ih, y: rowY - ih / 2, preserveAspectRatio: 'xMidYMid meet'
      }, g);
      nameNodes.push({ name, icon, lx, iw });
    });

    // بعد ما الخط يتحمّل نقيس عرض الاسم ونوسّط (الاسم + الأيقونة) تحت النسبة، الاسم على الشمال والأيقونة على اليمين زي فيجما
    const place = () => nameNodes.forEach(({ name, icon, lx, iw }) => {
      const textW = name.getComputedTextLength();
      const start = lx - (textW + L.name.gap + iw) / 2;
      name.setAttribute('x', start + textW / 2);
      icon.setAttribute('x', start + textW + L.name.gap);
    });
    place();
    if (document.fonts?.ready) document.fonts.ready.then(place);

    // رسم الأجزاء الملوّنة (مع أنيميشن بداية قصير)
    const paint = (progress) => fillPaths.forEach((path, i) => {
      const r = L.inner + (L.outer - L.inner) * Math.max(0, Math.min(1, (data[i].score / 100) * progress));
      path.setAttribute('d', r > L.inner + 0.01 ? sectorPath(cx, cy, L.inner, r, i * 45, (i + 1) * 45) : '');
    });
    if (reduceMotion) {
      paint(1);
      return;
    }
    const start = performance.now();
    const duration = 1200;
    const step = (now) => {
      const t = Math.min(1, (now - start) / duration);
      paint(1 - Math.pow(1 - t, 4));
      if (t < 1) frame = requestAnimationFrame(step);
    };
    paint(0);
    frame = requestAnimationFrame(step);
  }

  build();
  query.addEventListener('change', build);
}
