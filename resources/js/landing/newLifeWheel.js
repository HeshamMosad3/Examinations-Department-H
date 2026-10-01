export function initNewLifeWheel() {

/* ============================================================
   إعدادات عامة للعجلة
   ============================================================ */
const SETTINGS = {
  center: { x: 417.215, y: 434.875 }, // تم التعديل لتتناسب مع أبعاد figma
  centerImageRadius: 60, // نصف قطر صورة البوصلة
  innerRadius: 74,       // الفاصل الدائري 14px بنفس مقاس الفاصل بين المحاور تماماً (74 - 60 = 14px)
  outerRadius: 330, // تصغير العجلة قليلا لإعطاء مساحة أكبر للنصوص والأيقونات
  numRings: 5,
  gapWidth: 14,
  showLabels: true,
  labelOffset: 68,  // مسافة ثابتة بين طرف المحور الفعلي والأيقونة والاسم
  iconOffset: 20,   // (لم تعد مستخدمة بشكل منفصل، لكن نبقيها)
  iconSize: 34,     // تكبير حجم الأيقونات
  gridStrokeColor: "#2c3e50",
  emptyGridStrokeOpacity: 0,
  filledGridStrokeOpacity: 0.18
};

/* بيانات كل محور - الترتيب يبدأ من المحور الشخصي في أعلى العجلة مع عقارب الساعة تماماً كما في Figma */
let axesState = [
  { label: "الشخصي", color: "#7844D0", percent: 30, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/personal.png" },
  { label: "الروحي", color: "#5875E5", percent: 45, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/spiritual.png" },
  { label: "الصحي", color: "#43A074", percent: 38, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/health.png" },
  { label: "الاجتماعي", color: "#C53664", percent: 40, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/social.png" },
  { label: "العائلي", color: "#D98344", percent: 50, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/family.png" },
  { label: "الترفيهي", color: "#C9B642", percent: 30, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/leisure.png" },
  { label: "المالي", color: "#3CB1B3", percent: 35, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/financial.png" },
  { label: "المهني", color: "#4474D0", percent: 45, direction: "dark-to-light", icon: "custom", customIconUrl: "/icons/wheel_of_life/career.png" }
];

/* حالة الدوران والصورة في المنتصف */
let rotationAngle = 0;      // بالدرجات - قيمة معروضة محصورة 0-360
let autoSpinOn = typeof window !== "undefined" && localStorage.getItem("dar_alruya_wheel_auto_spin_360") === "true";
let autoSpinSpeed = 20;     // درجة/ثانية
let spinDirection = (typeof window !== "undefined" && localStorage.getItem("dar_alruya_wheel_spin_direction")) || "cw";
let centerImageDataUrl = "/images/Frame%202147238562.png";
let autoSpinTimer = null;
let isSpinning = false;     // true أثناء تشغيل أنيميشن السبين العشوائي
let audioCtx = null;
let idleWobbleDeg = 0;      // ميل بسيط دايم على العجلة (فوق rotationAngle) بيدي إحساس إنها "لسه شغالة"

/* ============================================================
   مكتبة أيقونات بسيطة مرسومة بـ SVG (كل أيقونة عبارة عن أشكال بسيطة تتلون بلون المحور)
   ============================================================ */
const ICONS = {
  heart: (c) => [
    { tag: "path", attrs: { d: "M12 21c-.3 0-.6-.1-.8-.3C7.4 17.8 3 13.9 3 9.8 3 7 5.2 4.8 8 4.8c1.5 0 3 .7 4 1.9 1-1.2 2.5-1.9 4-1.9 2.8 0 5 2.2 5 5 0 4.1-4.4 8-8.2 10.9-.2.2-.5.3-.8.3z", fill: c } }
  ],
  work: (c) => [
    { tag: "rect", attrs: { x: 3, y: 8, width: 18, height: 11, rx: 2, fill: c } },
    { tag: "path", attrs: { d: "M9 8V6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2h-2V6h-2v2H9z", fill: c } },
    { tag: "rect", attrs: { x: 3, y: 12, width: 18, height: 2, fill: "var(--wheel-center-bg)" } }
  ],
  money: (c) => [
    { tag: "ellipse", attrs: { cx: 12, cy: 17.3, rx: 8, ry: 2.6, fill: c } },
    { tag: "ellipse", attrs: { cx: 12, cy: 13, rx: 8, ry: 2.6, fill: c } },
    { tag: "ellipse", attrs: { cx: 12, cy: 8.7, rx: 8, ry: 2.6, fill: c } }
  ],
  social: (c) => [
    { tag: "circle", attrs: { cx: 8.5, cy: 8, r: 3.2, fill: c } },
    { tag: "path", attrs: { d: "M2.5 20c0-3.9 2.7-6.6 6-6.6s6 2.7 6 6.6z", fill: c } },
    { tag: "circle", attrs: { cx: 17, cy: 9, r: 2.4, fill: c, opacity: 0.8 } },
    { tag: "path", attrs: { d: "M14.8 20c.2-3 2.1-5 4.7-5s4.5 2 4.7 5z", fill: c, opacity: 0.8 } }
  ],
  family: (c) => [
    { tag: "circle", attrs: { cx: 7, cy: 7, r: 2.6, fill: c } },
    { tag: "circle", attrs: { cx: 17, cy: 7, r: 2.6, fill: c } },
    { tag: "circle", attrs: { cx: 12, cy: 11, r: 2.1, fill: c, opacity: 0.85 } },
    { tag: "path", attrs: { d: "M2 20c0-3.4 2.3-5.8 5-5.8s5 2.4 5 5.8z", fill: c } },
    { tag: "path", attrs: { d: "M12 20c0-3.4 2.3-5.8 5-5.8s5 2.4 5 5.8z", fill: c } }
  ],
  fun: (c) => [
    { tag: "path", attrs: { d: "M6 8h12a4 4 0 0 1 4 4.6l-.7 4A3 3 0 0 1 15.9 19l-1.6-2.4a2 2 0 0 0-1.7-.9h-1.2a2 2 0 0 0-1.7.9L8.1 19a3 3 0 0 1-5.4-1.4l-.7-4A4 4 0 0 1 6 8z", fill: c } },
    { tag: "circle", attrs: { cx: 16.5, cy: 11, r: 1, fill: "var(--wheel-center-bg)" } },
    { tag: "circle", attrs: { cx: 18.5, cy: 13, r: 1, fill: "var(--wheel-center-bg)" } },
    { tag: "rect", attrs: { x: 6.2, y: 10.3, width: 3.6, height: 1.3, rx: 0.6, fill: "var(--wheel-center-bg)" } },
    { tag: "rect", attrs: { x: 7.3, y: 9.2, width: 1.3, height: 3.6, rx: 0.6, fill: "var(--wheel-center-bg)" } }
  ],
  growth: (c) => [
    { tag: "path", attrs: { d: "M12 21V11", stroke: c, "stroke-width": 2, "stroke-linecap": "round", fill: "none" } },
    { tag: "path", attrs: { d: "M12 12C12 7.5 8.7 5 4.5 5 4.5 9.5 7.8 12 12 12z", fill: c } },
    { tag: "path", attrs: { d: "M12 14c0-4 3-6.3 6.8-6.3 0 4-3 6.3-6.8 6.3z", fill: c } }
  ],
  spiritual: (c) => [
    { tag: "path", attrs: { d: "M14.5 3.5a7.8 7.8 0 1 0 6 12.7A9 9 0 0 1 14.5 3.5z", fill: c } },
    { tag: "path", attrs: { d: "M19 3.2l.6 1.6 1.6.6-1.6.6-.6 1.6-.6-1.6-1.6-.6 1.6-.6.6-1.6z", fill: c } }
  ]
};
const ICON_LABELS = {
  none: "بدون أيقونة",
  heart: "صحة (قلب)",
  work: "عمل (حقيبة)",
  money: "مال (عملات)",
  social: "اجتماعي (أشخاص)",
  family: "عائلة (منزل)",
  fun: "ترفيه (تحكم)",
  growth: "تطور ذاتي (نمو)",
  spiritual: "روحانيات (هلال)",
  custom: "صورة مخصصة"
};

/* ============================================================
   كود الرسم والتحكم
   ============================================================ */
const svgNS = "http://www.w3.org/2000/svg";
const svg = document.getElementById("wheelSvg");
const controlsEl = document.getElementById("controls");
const wheelWrap = document.getElementById("wheel-wrap");
const spinResultEl = document.getElementById("spinResult");

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

// يفتح/يغمّق اللون وبيرجع hex سليم (مهم عشان مايتحسبش غلط تاني)
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
  const lightShade = lighten(axis.color, 0.35); // تفتيح أقل للحفاظ على زهوة اللون
  const darkShade  = darken(axis.color, 0.05);  // تغميق بسيط جداً
  if (axis.direction === "light-to-dark") {
    return { start: lightShade, end: darkShade };
  }
  return { start: darkShade, end: lightShade }; // الافتراضي: من الغامق للفاتح
}

// بيقرأ لون الخطوط/الحدود من متغيرات CSS عشان يتأقلم مع الوضع الداكن
function getGridColor() {
  const val = getComputedStyle(document.documentElement).getPropertyValue("--grid-color").trim();
  return val || SETTINGS.gridStrokeColor;
}

// بيحدد هل احنا في الوضع الداكن ولا لأ (بياخد في الاعتبار اختيار صريح من المستخدم لو موجود)
function isDarkMode() {
  const explicit = document.documentElement.getAttribute("data-theme");
  if (explicit === "dark") return true;
  if (explicit === "light") return false;
  return !!(window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches);
}

// لون النص/الأيقونة الخاص بكل محور: مشتق من لون المحور نفسه عشان يفضل متناسق
function getAxisAccentColor(axis, amt) {
  return isDarkMode() ? lighten(axis.color, amt) : darken(axis.color, amt);
}

function getMetrics() {
  const isMobile = window.innerWidth < 640 || (svg && svg.clientWidth && svg.clientWidth < 500);
  return {
    effectiveFontSize: isMobile ? 31 : 24,
    effectiveIconSize: isMobile ? 62 : 42,
    effectiveLabelOffset: isMobile ? 68 : 62,
    textYOffset: isMobile ? -12 : -10,
    iconYOffset: isMobile ? 2 : 2
  };
}

let wheelDom = null;

function buildWheelDom() {
  if (!svg) return;
  svg.innerHTML = "";

  const { center, innerRadius, outerRadius, numRings, gapWidth, showLabels } = SETTINGS;
  const gridStrokeColor = getGridColor();
  const filledGridStrokeOpacity = SETTINGS.filledGridStrokeOpacity;
  const emptyGridStrokeOpacity = SETTINGS.emptyGridStrokeOpacity;
  const cx = center.x, cy = center.y;
  const n = axesState.length;
  const ringThickness = (outerRadius - innerRadius) / numRings;

  // 1. defs with clipPath for center image
  const defs = document.createElementNS(svgNS, "defs");
  const clipId = "centerClip";
  const clipPath = document.createElementNS(svgNS, "clipPath");
  clipPath.setAttribute("id", clipId);
  const imgRadius = SETTINGS.centerImageRadius || 60;
  const clipCircle = document.createElementNS(svgNS, "circle");
  clipCircle.setAttribute("cx", cx);
  clipCircle.setAttribute("cy", cy);
  clipCircle.setAttribute("r", imgRadius);
  clipPath.appendChild(clipCircle);
  defs.appendChild(clipPath);
  svg.appendChild(defs);

  // 2. Rotatable Group (Colored sectors + center circle)
  const rotatableGroup = document.createElementNS(svgNS, "g");
  rotatableGroup.setAttribute("class", "rotatable-group");
  rotatableGroup.setAttribute("transform", `rotate(${rotationAngle + idleWobbleDeg} ${cx} ${cy})`);

  const centerCircle = document.createElementNS(svgNS, "circle");
  centerCircle.setAttribute("cx", cx);
  centerCircle.setAttribute("cy", cy);
  centerCircle.setAttribute("r", innerRadius);
  centerCircle.setAttribute("class", "center-circle");
  centerCircle.setAttribute("stroke", gridStrokeColor);
  centerCircle.setAttribute("stroke-opacity", filledGridStrokeOpacity);
  rotatableGroup.appendChild(centerCircle);

  // Axis sector elements
  const axisElements = [];

  axesState.forEach((axis, i) => {
    const { start: colorStart, end: colorEnd } = getGradientEnds(axis);
    const fillPaths = [];
    const gridPaths = [];

    for (let k = 0; k < numRings; k++) {
      const t = numRings > 1 ? k / (numRings - 1) : 0;
      const shade = lerpColor(colorStart, colorEnd, t);

      // Filled cell path
      const pathColored = document.createElementNS(svgNS, "path");
      pathColored.setAttribute("class", "fill-cell");
      pathColored.setAttribute("fill", shade);
      pathColored.setAttribute("stroke", gridStrokeColor);
      pathColored.setAttribute("stroke-opacity", filledGridStrokeOpacity);
      rotatableGroup.appendChild(pathColored);
      fillPaths.push(pathColored);

      // Empty grid cell path
      const pathEmpty = document.createElementNS(svgNS, "path");
      pathEmpty.setAttribute("class", "grid-cell");
      pathEmpty.setAttribute("fill", "transparent");
      pathEmpty.setAttribute("stroke", gridStrokeColor);
      pathEmpty.setAttribute("stroke-opacity", emptyGridStrokeOpacity);
      rotatableGroup.appendChild(pathEmpty);
      gridPaths.push(pathEmpty);
    }

    axisElements.push({
      fillPaths,
      gridPaths,
      text: null,
      icon: null
    });
  });

  svg.appendChild(rotatableGroup);

  // 3. Center Compass Image
  let centerImg = null;
  if (centerImageDataUrl) {
    centerImg = document.createElementNS(svgNS, "image");
    centerImg.setAttributeNS("http://www.w3.org/1999/xlink", "href", centerImageDataUrl);
    centerImg.setAttribute("href", centerImageDataUrl);
    centerImg.setAttribute("x", cx - imgRadius);
    centerImg.setAttribute("y", cy - imgRadius);
    centerImg.setAttribute("width", imgRadius * 2);
    centerImg.setAttribute("height", imgRadius * 2);
    centerImg.setAttribute("preserveAspectRatio", "xMidYMid slice");
    centerImg.setAttribute("clip-path", `url(#${clipId})`);
    svg.appendChild(centerImg);
  }

  // 4. Labels and Icons Group
  if (showLabels) {
    const labelsGroup = document.createElementNS(svgNS, "g");
    labelsGroup.setAttribute("class", "labels-group");
    const metrics = getMetrics();

    axesState.forEach((axis, i) => {
      // Label Text
      const text = document.createElementNS(svgNS, "text");
      text.setAttribute("class", "axis-label");
      text.setAttribute("fill", getAxisAccentColor(axis, 0.38));
      text.setAttribute("font-family", "'El Messiri', sans-serif");
      text.setAttribute("font-size", `${metrics.effectiveFontSize}px`);
      text.setAttribute("font-weight", "bold");
      text.setAttribute("text-anchor", "middle");
      text.textContent = axis.label || "";
      labelsGroup.appendChild(text);
      axisElements[i].text = text;

      // Icon Image
      if (axis.icon === "custom" && axis.customIconUrl) {
        const img = document.createElementNS(svgNS, "image");
        img.setAttribute("class", "axis-icon");
        img.setAttributeNS("http://www.w3.org/1999/xlink", "href", axis.customIconUrl);
        img.setAttribute("href", axis.customIconUrl);
        img.setAttribute("width", metrics.effectiveIconSize);
        img.setAttribute("height", metrics.effectiveIconSize);
        img.setAttribute("preserveAspectRatio", "xMidYMid meet");
        labelsGroup.appendChild(img);
        axisElements[i].icon = img;
      }
    });

    svg.appendChild(labelsGroup);
  }

  // 5. Center Hit Area for Spin
  const centerHit = document.createElementNS(svgNS, "circle");
  centerHit.setAttribute("cx", cx);
  centerHit.setAttribute("cy", cy);
  centerHit.setAttribute("r", innerRadius);
  centerHit.setAttribute("fill", "transparent");
  centerHit.setAttribute("class", "center-hit");
  centerHit.style.cursor = "default";
  centerHit.addEventListener("click", (e) => {
    e.stopPropagation();
    const adminControls = document.getElementById("admin-wheel-controls");
    const isAdminActive = adminControls && !adminControls.classList.contains("hidden");
    if (autoSpinOn || isAdminActive) {
      spinWheelRandom();
    }
  });
  svg.appendChild(centerHit);

  wheelDom = {
    rotatableGroup,
    centerCircle,
    centerImg,
    axisElements,
    centerHit
  };
}

function updateWheelGeometry() {
  if (!wheelDom) {
    buildWheelDom();
    if (!wheelDom) return;
  }

  const { center, innerRadius, outerRadius, numRings, gapWidth } = SETTINGS;
  const cx = center.x, cy = center.y;
  const n = axesState.length;
  const sectorAngle = 360 / n;
  const ringThickness = (outerRadius - innerRadius) / numRings;
  const metrics = getMetrics();

  // Rotate group
  wheelDom.rotatableGroup.setAttribute("transform", `rotate(${rotationAngle + idleWobbleDeg} ${cx} ${cy})`);

  axesState.forEach((axis, i) => {
    const el = wheelDom.axisElements[i];
    if (!el) return;

    const sectorStartDeg = i * sectorAngle;
    const sectorEndDeg = (i + 1) * sectorAngle;
    const value = Math.max(0, Math.min(numRings, (axis.percent / 100) * numRings));

    // Update ring paths
    for (let k = 0; k < numRings; k++) {
      const rInner = innerRadius + k * ringThickness;
      const rOuter = innerRadius + (k + 1) * ringThickness;
      const fillFraction = Math.max(0, Math.min(1, value - k));

      const fillP = el.fillPaths[k];
      const gridP = el.gridPaths[k];

      if (fillFraction > 0) {
        const rMid = rInner + fillFraction * (rOuter - rInner);
        fillP.setAttribute("d", ringSectorPath(cx, cy, rInner, rMid, sectorStartDeg, sectorEndDeg, gapWidth));
        fillP.style.display = "";
      } else {
        fillP.setAttribute("d", "");
        fillP.style.display = "none";
      }

      if (fillFraction < 1) {
        const rStart = rInner + fillFraction * (rOuter - rInner);
        gridP.setAttribute("d", ringSectorPath(cx, cy, rStart, rOuter, sectorStartDeg, sectorEndDeg, gapWidth));
        gridP.style.display = "";
      } else {
        gridP.setAttribute("d", "");
        gridP.style.display = "none";
      }
    }

    // Update Text and Icon positions
    const mid = i * sectorAngle + sectorAngle / 2 + rotationAngle + idleWobbleDeg;
    const fillFrac = Math.max(0, Math.min(100, axis.percent !== undefined ? axis.percent : 50)) / 100;
    const currentFillRadius = innerRadius + fillFrac * (outerRadius - innerRadius);
    const targetRadius = Math.max(innerRadius + 50, currentFillRadius + metrics.effectiveLabelOffset);
    const basePos = polarToCartesian(cx, cy, targetRadius, mid);

    if (el.text) {
      el.text.setAttribute("x", basePos.x);
      el.text.setAttribute("y", basePos.y + metrics.textYOffset);
    }

    if (el.icon) {
      el.icon.setAttribute("x", basePos.x - metrics.effectiveIconSize / 2);
      el.icon.setAttribute("y", basePos.y + metrics.iconYOffset);
    }
  });
}

function drawWheel(forceRebuild = false) {
  if (forceRebuild || !wheelDom) {
    buildWheelDom();
  }
  updateWheelGeometry();
}

/* ============================================================
   محرك رحلة النمو الواقعية (Realistic Growth Journey Engine)
   مستوحى من محاكاة حقيقية لـ 1000 اختبار عجلة حياة على مدار 5 سنين:
   كل محور بيمشي على منحنى نموه الفعلي (بداية منخفضة → انتكاسة/تذبذب → نمو)
   مضغوط في ~10 ثواني، وبعدها العجلة تثبت مع تذبذب طبيعي بسيط جداً.
   كل محور له إيقاعه الخاص (مش كلهم بيتحركوا مع بعض بالظبط): تعشيق زمني بسيط
   في البداية + مدة كل خطوة عشوائية شوية + وقفات قصيرة أحياناً + تذبذب صغير
   حوالين كل هدف مرحلي عشان تحس إنها بتتنفس وتقف وتترجع شوية زي البيانات الحقيقية.
   الحركة نفسها بقت "ملاحقة" مستمرة (exponential smoothing) للهدف الحالي بدل
   تحريك من نقطة لنقطة بمدة ثابتة، عشان تبقى سايحة/ناعمة من غير أي وقفة سرعة
   عند كل نقطة تحول (زي ما كان بيحصل مع easing لكل قطعة لوحدها).
   ============================================================ */
let dynamicBreathingOn = true;
let isWheelVisible = true;
let isTabVisible = true;
let breathingLoopId = null;

const JOURNEY_TOTAL_MS = 10000; // مدة الرحلة التقريبية من البداية لحد الاستقرار
const SETTLE_JITTER_RANGE = 2.5;   // تذبذب صغير جداً حول القيمة النهائية بعد الاستقرار
const SETTLE_DURATION_MIN = 1000;
const SETTLE_DURATION_MAX = 2000;

const AXIS_STAGGER_MAX_MS = 450;      // فرق بداية عشوائي بين المحاور عشان ميبقوش متزامنين
const SEGMENT_DURATION_VARIANCE_MS = 180; // تنويع بسيط في سرعة كل خطوة
const SEGMENT_JITTER_RANGE = 2.2;     // تذبذب صغير حوالين كل هدف مرحلي (ممكن يعمل نزول خفيف مؤقت)
const PAUSE_CHANCE = 0.3;             // احتمال وقفة قصيرة بعد الوصول لهدف قبل الاستمرار
const PAUSE_DURATION_MIN = 150;
const PAUSE_DURATION_MAX = 420;
const SMOOTHING_TAU_MS = 480; // ثابت زمني للملاحقة الناعمة (أكبر = حركة أنعم وأبطأ في اللحاق بالهدف)
const MAX_FRAME_DT_MS = 100;  // سقف لأي قفزة زمن كبيرة (تبديل تابات مثلاً) عشان الحركة تفضل ناعمة

// إيقاع خفيف دايم على دوران العجلة نفسها (فوق rotationAngle) بيدي إحساس إن
// "لسه حد بيمتحن" حتى بعد ما القيم تستقر - مش مرتبط بمرحلة الرحلة، بيفضل شغال دايمًا
const WHEEL_WOBBLE_AMPLITUDE_1 = 2.2;
const WHEEL_WOBBLE_SPEED_1 = 0.9;
const WHEEL_WOBBLE_AMPLITUDE_2 = 1.1;
const WHEEL_WOBBLE_SPEED_2 = 0.37;

// 12 نقطة لكل محور: القيمة الأولى + متوسط كل 6 شهور (10 فترات) + القيمة الفعلية النهائية
// (بالترتيب نفسه لمحاور axesState: شخصي، روحي، صحي، اجتماعي، عائلي، ترفيهي، مالي، مهني)
//
// شخصية الرحلة: مهني هو التركيز الأساسي الواضح، والصحي بيتحسن معاه كجزء من نفس
// انضباطه (مش بيضحي بيه) لكن برتبة أقل منه، والعائلي محمي/شبه مستقر لأنه بيعتبره
// التزام مش اختياري. المالي والروحي بيتحسنوا بهدوء من غير ما يبقوا أولوية. الشخصي
// (الوعي الذاتي/التأمل الداخلي) بيفضل متأخر لأنه غارق في الإنجاز الخارجي. الاجتماعي
// والترفيهي هما أكتر حاجتين بيضحي بيهم (أضعف ارتباط بالتزام، أسهل حاجة تتلغي وقت
// الانشغال) - ده متوافق مع أبحاث توازن الحياة/العمل. مفيش أي جانب بيتعدى 90،
// ومهم كمان إن القيم العالية والواطية موزعة حوالين العجلة مش متجمعة في نص واحد بس.
const AXIS_JOURNEY = [
  [30, 33, 36, 39, 41, 43, 44, 45, 46, 47, 47, 48], // شخصي — وعي ذاتي متأخر، مش أولوية
  [45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 54, 55], // الروحي — نمو هادئ ومستقل
  [38, 42, 47, 52, 57, 61, 65, 69, 72, 74, 76, 78], // الصحي — بيتحسن مع الانضباط، رتبة تانية بعد المهني
  [40, 36, 32, 29, 27, 26, 28, 31, 34, 37, 39, 40], // الاجتماعي — أول حاجة بتتلغي وقت الانشغال
  [50, 51, 53, 52, 55, 57, 59, 62, 65, 68, 70, 72], // العائلي — محمي/التزام، تحسن تدريجي مستقر
  [30, 26, 22, 19, 18, 19, 22, 25, 28, 31, 33, 34], // الترفيهي — أكتر جانب مُهمَل
  [35, 37, 40, 43, 46, 49, 51, 53, 55, 56, 57, 58], // المالي — بينمو أبطأ من المهني (إدارة مالية أضعف من الأداء الوظيفي)
  [45, 49, 54, 59, 64, 69, 73, 77, 80, 83, 85, 87]  // المهني — التركيز الأساسي الواضح
];
const JOURNEY_SEGMENTS = AXIS_JOURNEY[0].length - 1; // 11 قطعة
const JOURNEY_SEGMENT_MS = JOURNEY_TOTAL_MS / JOURNEY_SEGMENTS;
const MAX_AUTO_PERCENT = 90; // سقف صارم: مفيش جانب بيوصل له تلقائيًا (مفيش بني آدم "كامل")

function settleValueFor(i) {
  const kf = AXIS_JOURNEY[i];
  return kf[kf.length - 1];
}

function jitteredTarget(value, range, maxCap = 100) {
  return Math.max(0, Math.min(maxCap, value + (Math.random() * 2 - 1) * range));
}

// خطوة تذبذب طبيعي صغيرة حول قيمة الاستقرار (أو حول قيمة يدوية لو المستخدم عدّل السلايدر)
function settledStep(i, center) {
  const isManualOverride = center !== undefined;
  const base = isManualOverride ? center : settleValueFor(i);
  const target = jitteredTarget(base, SETTLE_JITTER_RANGE, isManualOverride ? 100 : MAX_AUTO_PERCENT);
  const duration = SETTLE_DURATION_MIN + Math.random() * (SETTLE_DURATION_MAX - SETTLE_DURATION_MIN);
  return { target, duration };
}

// بيحدد هدف/مدة الخطوة الجاية في الرحلة، أو يحوّل المحور لوضع الاستقرار لو خلصت كل الخطوات
function scheduleNextJourneySegment(anim, i) {
  if (anim.segmentsCompleted < JOURNEY_SEGMENTS) {
    anim.target = jitteredTarget(AXIS_JOURNEY[i][anim.segmentsCompleted + 1], SEGMENT_JITTER_RANGE, MAX_AUTO_PERCENT);
    anim.duration = JOURNEY_SEGMENT_MS + (Math.random() * 2 - 1) * SEGMENT_DURATION_VARIANCE_MS;
  } else {
    anim.journeyDone = true;
    const step = settledStep(i);
    anim.target = step.target;
    anim.duration = step.duration;
  }
}

let axisAnimState = axesState.map((axis, i) => {
  const kf = AXIS_JOURNEY[i];
  return {
    current: kf[0],
    target: kf[1],
    segmentsCompleted: 0,
    journeyDone: false,
    pausing: false,
    segmentStartTime: performance.now() + Math.random() * AXIS_STAGGER_MAX_MS,
    duration: JOURNEY_SEGMENT_MS
  };
});

let lastBreathingTime = performance.now();
let lastFrameTime = performance.now();

function breathingStep(now) {
  const dt = Math.max(0, Math.min(now - lastFrameTime, MAX_FRAME_DT_MS));
  lastFrameTime = now;

  if (dynamicBreathingOn && isWheelVisible && isTabVisible && !isSpinning) {
    let changed = false;

    // إيقاع الدوران الخفيف الدايم - بيفضل شغال حتى بعد ما القيم تستقر
    if (!dragging && !autoSpinOn) {
      const t = now / 1000;
      const nextWobble =
        Math.sin(t * WHEEL_WOBBLE_SPEED_1) * WHEEL_WOBBLE_AMPLITUDE_1 +
        Math.sin(t * WHEEL_WOBBLE_SPEED_2 + 1.7) * WHEEL_WOBBLE_AMPLITUDE_2;
      if (Math.abs(nextWobble - idleWobbleDeg) > 0.01) {
        idleWobbleDeg = nextWobble;
        changed = true;
      }
    } else if (idleWobbleDeg !== 0) {
      idleWobbleDeg = 0;
      changed = true;
    }

    axisAnimState.forEach((anim, i) => {
      if (now < anim.segmentStartTime) return;

      // ملاحقة ناعمة ومستمرة للهدف الحالي (بدل قفزة/إيزنج منفصلة لكل قطعة)
      if (dt > 0) {
        const alpha = 1 - Math.exp(-dt / SMOOTHING_TAU_MS);
        anim.current += (anim.target - anim.current) * alpha;
      }

      if (now - anim.segmentStartTime >= anim.duration) {
        anim.segmentStartTime = now;

        if (anim.pausing) {
          anim.pausing = false;
          scheduleNextJourneySegment(anim, i);
        } else if (!anim.journeyDone) {
          anim.segmentsCompleted++;
          if (anim.segmentsCompleted < JOURNEY_SEGMENTS && Math.random() < PAUSE_CHANCE) {
            // وقفة قصيرة طبيعية قبل ما يكمل الخطوة الجاية
            anim.pausing = true;
            anim.target = anim.current;
            anim.duration = PAUSE_DURATION_MIN + Math.random() * (PAUSE_DURATION_MAX - PAUSE_DURATION_MIN);
          } else {
            scheduleNextJourneySegment(anim, i);
          }
        } else {
          const step = settledStep(i);
          anim.target = step.target;
          anim.duration = step.duration;
        }
      }

      let newPercent = Math.max(10, Math.min(100, anim.current));

      if (Math.abs(axesState[i].percent - newPercent) > 0.05) {
        axesState[i].percent = newPercent;
        changed = true;

        const pVal = document.getElementById(`percent-val-${i}`);
        if (pVal && document.activeElement !== document.querySelector(`input[data-idx="${i}"][data-field="percent"]`)) {
          pVal.textContent = Math.round(axesState[i].percent) + "%";
          const slider = document.querySelector(`input[data-idx="${i}"][data-field="percent"]`);
          if (slider) slider.value = Math.round(axesState[i].percent);
        }
      }
    });

    if (changed) {
      updateWheelGeometry();
    }
  }

  breathingLoopId = requestAnimationFrame(breathingStep);
}

// Start breathing loop
requestAnimationFrame(breathingStep);

// IntersectionObserver for saving battery when wheel is not visible
if (typeof IntersectionObserver !== "undefined" && svg) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      isWheelVisible = entry.isIntersecting;
    });
  }, { threshold: 0.05 });
  observer.observe(svg);
}

// Visibility change (tab switch / backgrounding)
document.addEventListener("visibilitychange", () => {
  isTabVisible = !document.hidden;
  if (isTabVisible) {
    lastBreathingTime = performance.now();
  }
});

/* ====== لوحة تحكم كل محور ====== */
function buildControls() {
  controlsEl.innerHTML = "";
  const iconOptionsHtml = Object.keys(ICON_LABELS)
    .map(key => `<option value="${key}">${ICON_LABELS[key]}</option>`)
    .join("");

  axesState.forEach((axis, i) => {
    const card = document.createElement("div");
    card.className = "axis-card";
    card.innerHTML = `
      <h3>محور ${i + 1}</h3>
      <label>
        اسم المحور
        <input type="text" data-idx="${i}" data-field="label" value="${axis.label}">
      </label>
      <label>
        لون المحور
        <input type="color" data-idx="${i}" data-field="color" value="${axis.color}">
      </label>
      <label>
        اتجاه تدرج اللون
        <select data-idx="${i}" data-field="direction">
          <option value="dark-to-light" ${axis.direction === "dark-to-light" ? "selected" : ""}>من الغامق (جوه) للفاتح (برة)</option>
          <option value="light-to-dark" ${axis.direction === "light-to-dark" ? "selected" : ""}>من الفاتح (جوه) للغامق (برة)</option>
        </select>
      </label>
      <label>
        أيقونة المحور
        <select data-idx="${i}" data-field="icon">${iconOptionsHtml}</select>
      </label>
      <label id="icon-upload-row-${i}" style="${axis.icon === "custom" ? "" : "display:none;"}">
        ارفع صورة الأيقونة
        <input type="file" accept="image/*" data-idx="${i}" data-field="customIconUrl">
      </label>
      <label>
        النسبة المئوية
        <div class="percent-row">
          <input type="range" min="0" max="100" step="1" data-idx="${i}" data-field="percent" value="${axis.percent}">
          <span class="percent-val" id="percent-val-${i}">${axis.percent}%</span>
        </div>
      </label>
    `;
    controlsEl.appendChild(card);

    // مزامنة قيمة السيليكت الخاص بالأيقونة مع حالة المحور الحالية
    const iconSelect = card.querySelector('select[data-field="icon"]');
    iconSelect.value = axis.icon || "none";
  });

  controlsEl.querySelectorAll("input:not([type=file]), select").forEach(el => {
    el.addEventListener("input", (e) => {
      const idx = parseInt(e.target.dataset.idx, 10);
      const field = e.target.dataset.field;
      let value = e.target.value;
      if (field === "percent") {
        value = parseFloat(value);
        document.getElementById(`percent-val-${idx}`).textContent = value + "%";
        if (typeof axisAnimState !== "undefined" && axisAnimState[idx]) {
          // تعديل يدوي بالسلايدر = تجاوز صريح: يوقف رحلة النمو لهذا المحور
          // ويثبته حول القيمة اللي المستخدم اختارها مع تذبذب هادئ
          axisAnimState[idx].current = value;
          axisAnimState[idx].journeyDone = true;
          axisAnimState[idx].segmentsCompleted = JOURNEY_SEGMENTS;
          const step = settledStep(idx, value);
          axisAnimState[idx].target = step.target;
          axisAnimState[idx].segmentStartTime = performance.now();
          axisAnimState[idx].duration = step.duration;
        }
      }
      axesState[idx][field] = value;

      if (field === "icon") {
        const row = document.getElementById(`icon-upload-row-${idx}`);
        if (row) row.style.display = value === "custom" ? "" : "none";
      }
      drawWheel(field !== "percent");
    });
  });
}

// رفع صورة مخصصة كأيقونة لمحور معيّن (مُوكل على الحاوية عشان يفضل شغال بعد إعادة بناء اللوحة)
controlsEl.addEventListener("change", (e) => {
  const el = e.target;
  if (el.tagName === "INPUT" && el.type === "file" && el.dataset.field === "customIconUrl") {
    const idx = parseInt(el.dataset.idx, 10);
    const file = el.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = () => {
      axesState[idx].customIconUrl = reader.result;
      drawWheel(true);
    };
    reader.readAsDataURL(file);
  }
});

/* ====== إعدادات عامة: الدوران + اتجاهه + الصورة ====== */
const rotationSlider = document.getElementById("rotationSlider");
const rotationVal = document.getElementById("rotationVal");
const autoSpinToggle = document.getElementById("autoSpinToggle");
const dynamicBreathingToggle = document.getElementById("dynamicBreathingToggle");
const spinDirectionSelect = document.getElementById("spinDirectionSelect");
const centerImageInput = document.getElementById("centerImageInput");
const removeImageBtn = document.getElementById("removeImageBtn");

if (dynamicBreathingToggle) {
  dynamicBreathingToggle.checked = dynamicBreathingOn;
  dynamicBreathingToggle.addEventListener("change", (e) => {
    dynamicBreathingOn = e.target.checked;
    if (dynamicBreathingOn) {
      // استئناف من نفس نقطة الرحلة (من غير ما نعيدها من الأول ومن غير هدف عشوائي جديد)
      const resumeNow = performance.now();
      lastBreathingTime = resumeNow;
      axisAnimState.forEach((anim, i) => {
        anim.current = axesState[i].percent;
        anim.segmentStartTime = resumeNow;
      });
    }
  });
}

spinDirectionSelect.value = spinDirection;

function setRotation(angle) {
  rotationAngle = ((angle % 360) + 360) % 360;
  rotationSlider.value = Math.round(rotationAngle);
  rotationVal.textContent = Math.round(rotationAngle) + "°";
  drawWheel();
}

rotationSlider.addEventListener("input", (e) => {
  if (isSpinning) return;
  setRotation(parseFloat(e.target.value));
});

function startAutoSpin() {
  if (autoSpinTimer) cancelAnimationFrame(autoSpinTimer);
  let last = performance.now();
  const step = (now) => {
    if (!autoSpinOn) return;
    const dt = (now - last) / 1000;
    last = now;
    const dirMultiplier = spinDirection === "cw" ? 1 : -1;
    setRotation(rotationAngle + dirMultiplier * autoSpinSpeed * dt);
    autoSpinTimer = requestAnimationFrame(step);
  };
  autoSpinTimer = requestAnimationFrame(step);
}

function stopAutoSpin() {
  if (autoSpinTimer) {
    cancelAnimationFrame(autoSpinTimer);
    autoSpinTimer = null;
  }
}

if (spinDirectionSelect) {
  spinDirectionSelect.value = spinDirection;
  spinDirectionSelect.addEventListener("change", (e) => {
    spinDirection = e.target.value;
    if (typeof window !== "undefined") {
      localStorage.setItem("dar_alruya_wheel_spin_direction", spinDirection);
    }
  });
}

if (autoSpinToggle) {
  autoSpinToggle.checked = autoSpinOn;
  autoSpinToggle.addEventListener("change", (e) => {
    if (isSpinning) {
      e.target.checked = false;
      return;
    }
    autoSpinOn = e.target.checked;
    if (typeof window !== "undefined") {
      localStorage.setItem("dar_alruya_wheel_auto_spin_360", autoSpinOn ? "true" : "false");
    }
    if (autoSpinOn) {
      startAutoSpin();
    } else {
      stopAutoSpin();
    }
  });
}

centerImageInput.addEventListener("change", (e) => {
  const file = e.target.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = () => {
    centerImageDataUrl = reader.result;
    drawWheel();
  };
  reader.readAsDataURL(file);
});

removeImageBtn.addEventListener("click", () => {
  centerImageDataUrl = null;
  centerImageInput.value = "";
  drawWheel();
});

/* ============================================================
   الصوت أثناء اللف - مُصنَّع بالكامل بالـ Web Audio API (من غير ملفات خارجية)
   ============================================================ */
function ensureAudio() {
  const AC = window.AudioContext || window.webkitAudioContext;
  if (!AC) return null;
  if (!audioCtx) audioCtx = new AC();
  if (audioCtx.state === "suspended") audioCtx.resume();
  return audioCtx;
}

// تكة قصيرة كل ما المؤشر يعدي على حد بين محورين
function playTickSound() {
  const ctx = ensureAudio();
  if (!ctx) return;
  const t = ctx.currentTime;
  const osc = ctx.createOscillator();
  const gain = ctx.createGain();
  osc.type = "square";
  osc.frequency.setValueAtTime(720, t);
  gain.gain.setValueAtTime(0.12, t);
  gain.gain.exponentialRampToValueAtTime(0.001, t + 0.06);
  osc.connect(gain);
  gain.connect(ctx.destination);
  osc.start(t);
  osc.stop(t + 0.07);
}

// نغمة صغيرة لما العجلة توقف على النتيجة
function playWinSound() {
  const ctx = ensureAudio();
  if (!ctx) return;
  const t = ctx.currentTime;
  [523.25, 659.25, 783.99, 1046.5].forEach((freq, i) => {
    const start = t + i * 0.09;
    const osc = ctx.createOscillator();
    const gain = ctx.createGain();
    osc.type = "sine";
    osc.frequency.setValueAtTime(freq, start);
    gain.gain.setValueAtTime(0.001, start);
    gain.gain.exponentialRampToValueAtTime(0.22, start + 0.02);
    gain.gain.exponentialRampToValueAtTime(0.001, start + 0.35);
    osc.connect(gain);
    gain.connect(ctx.destination);
    osc.start(start);
    osc.stop(start + 0.36);
  });
}

/* ============================================================
   السبين العشوائي: بتضغط على منتصف العجلة فتلف بسرعة، تصدر تكات صوتية،
   وتقف تدريجيًا على محور عشوائي حسب اتجاه الدوران المختار
   ============================================================ */
function spinWheelRandom() {
  if (isSpinning) return;
  const n = axesState.length;
  if (n === 0) return;

  isSpinning = true;
  wheelWrap.classList.add("spinning");
  rotationSlider.disabled = true;
  spinDirectionSelect.disabled = true;
  if (autoSpinOn) {
    autoSpinOn = false;
    autoSpinToggle.checked = false;
    if (autoSpinTimer) cancelAnimationFrame(autoSpinTimer);
  }
  spinResultEl.textContent = "جاري اللف...";
  ensureAudio();

  const sectorAngle = 360 / n;
  const winnerIndex = Math.floor(Math.random() * n);
  const winnerAxis = axesState[winnerIndex];

  // نقطة هبوط عشوائية جوه قطاع الفايز (بعيد شوية عن حواف الفجوة)
  const margin = sectorAngle * 0.18;
  const landingOffset = margin + Math.random() * (sectorAngle - margin * 2);
  const landingAngleInWheel = winnerIndex * sectorAngle + landingOffset;

  // الدوران المطلوب عشان النقطة دي توصل تحت المؤشر الثابت (زاوية صفر)
  const requiredMod = ((-landingAngleInWheel) % 360 + 360) % 360;
  const dirMultiplier = spinDirection === "cw" ? 1 : -1;
  const extraTurns = 6 + Math.floor(Math.random() * 3); // 6-8 لفات كاملة إضافية

  const startRotation = rotationAngle;
  const forwardDelta = ((requiredMod - startRotation) % 360 + 360) % 360;
  const totalDelta = dirMultiplier === 1
    ? forwardDelta + extraTurns * 360
    : (forwardDelta - 360) - extraTurns * 360;

  const duration = 4200 + Math.random() * 900; // مللي ثانية
  const startTime = performance.now();
  let lastCrossing = 0;

  function frame(now) {
    const elapsed = now - startTime;
    const progress = Math.min(1, elapsed / duration);
    const eased = 1 - Math.pow(1 - progress, 3); // إبطاء تدريجي واقعي (ease-out)
    const currentAngle = startRotation + totalDelta * eased;
    setRotation(currentAngle);

    // تكة صوتية كل ما نعدي على حد بين محورين
    const traveled = Math.abs(totalDelta * eased);
    const crossings = Math.floor(traveled / sectorAngle);
    if (crossings > lastCrossing) {
      playTickSound();
      lastCrossing = crossings;
    }

    if (progress < 1) {
      requestAnimationFrame(frame);
    } else {
      isSpinning = false;
      wheelWrap.classList.remove("spinning");
      rotationSlider.disabled = false;
      spinDirectionSelect.disabled = false;
      spinResultEl.textContent = `${winnerAxis.label} (${Math.round(winnerAxis.percent)}%)`;
      playWinSound();

      // استئناف حركة التنفس الطبيعية بسلاسة بعد انتهاء اللف
      const resumeNow = performance.now();
      lastBreathingTime = resumeNow;
      axisAnimState.forEach((anim, i) => {
        anim.segmentStartTime = resumeNow + (i * 70);
        anim.duration = 1450 + Math.random() * 450;
      });
    }
  }
  requestAnimationFrame(frame);
}

/* ====== سحب العجلة بالماوس/باللمس عشان تلفها يدويًا ====== */
let dragging = false;
let dragStartAngle = 0;
let dragStartRotation = 0;

function getSvgCenterScreen() {
  const rect = svg.getBoundingClientRect();
  return { x: rect.left + rect.width / 2, y: rect.top + rect.height / 2 };
}
function angleFromCenter(clientX, clientY) {
  const c = getSvgCenterScreen();
  return Math.atan2(clientX - c.x, -(clientY - c.y)) * 180 / Math.PI;
}

function pointerDown(clientX, clientY) {
  if (isSpinning) return;
  const adminControls = document.getElementById("admin-wheel-controls");
  const isAdminActive = adminControls && !adminControls.classList.contains("hidden");
  if (!autoSpinOn && !isAdminActive) return;
  dragging = true;
  wheelWrap.classList.add("dragging");
  dragStartAngle = angleFromCenter(clientX, clientY);
  dragStartRotation = rotationAngle;
  if (autoSpinOn) {
    autoSpinToggle.checked = false;
    autoSpinOn = false;
    if (typeof window !== "undefined") {
      localStorage.setItem("dar_alruya_wheel_auto_spin_360", "false");
    }
    if (autoSpinTimer) cancelAnimationFrame(autoSpinTimer);
  }
}
function pointerMove(clientX, clientY) {
  if (!dragging) return;
  const currentAngle = angleFromCenter(clientX, clientY);
  setRotation(dragStartRotation + (currentAngle - dragStartAngle));
}
function pointerUp() {
  dragging = false;
  wheelWrap.classList.remove("dragging");
}

wheelWrap.addEventListener("mousedown", (e) => pointerDown(e.clientX, e.clientY));
window.addEventListener("mousemove", (e) => pointerMove(e.clientX, e.clientY));
window.addEventListener("mouseup", pointerUp);

wheelWrap.addEventListener("touchstart", (e) => {
  const t = e.touches[0];
  pointerDown(t.clientX, t.clientY);
}, { passive: true });
window.addEventListener("touchmove", (e) => {
  if (!dragging) return;
  const t = e.touches[0];
  pointerMove(t.clientX, t.clientY);
}, { passive: true });
window.addEventListener("touchend", pointerUp);

// إعادة رسم العجلة تلقائياً عند تغيير أبعاد الشاشة لضبط أحجام النصوص والأيقونات بدقة
window.addEventListener("resize", () => {
  drawWheel(true);
});

buildControls();
drawWheel(true);

if (autoSpinOn) {
  startAutoSpin();
}

}