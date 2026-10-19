import { cms } from './cms.js';
import { generateFiveYearJourney, sampleKeyframes, easeProgress } from './lifeJourney.js';

export function initNewLifeWheel(options = {}) {
const isResultPage = options.isResultPage || false;
// شكل الصفحة الرئيسية الجديد (Figma #3403:8899): قطاع ملوّن واحد لكل محور فوق خلفية فاتحة بنفس لونه، والأسماء ثابتة حوالين العجلة
const isHomeDesign = options.variant === "home";

// حركة العجلة من لوحة الإدارة (window.LIFE_WHEEL_JOURNEY): محاكاة سنين من المستوى الحالي لنطاق النهاية بحركة سلسة متصلة.
// لو اتقفلت من الأدمن، أو العجلة مش بتاعة الرئيسية، أو الصفحة (المختبر) محددة حركتها بنفسها: بتشتغل الحركة القديمة زي ما هي.
const adminJourney = !isResultPage && !options.journeyFactory && typeof window !== "undefined" ? window.LIFE_WHEEL_JOURNEY : null;
if (adminJourney && adminJourney.enabled) {
  const randInt = (a, b) => Math.round(a + Math.random() * (b - a));
  options = {
    ...options,
    continuousJourney: true,
    journeyMs: adminJourney.durationMs,
    maxPercent: adminJourney.finalMax,
    startValues: adminJourney.startMode === "fixed"
      ? adminJourney.startValues
      : Array.from({ length: 8 }, () => randInt(adminJourney.startMin, adminJourney.startMax)),
    journeyFactory: (startVals, influence) => generateFiveYearJourney(startVals, influence, {
      range: [adminJourney.finalMin, adminJourney.finalMax],
      years: adminJourney.years,
      setbackLevel: adminJourney.setbackLevel,
      priority: adminJourney.priorityAxes
    })
  };
}

/* ============================================================
   إعدادات عامة للعجلة
   ============================================================ */
const SETTINGS = isHomeDesign ? {
  center: { x: 417.215, y: 434.875 },
  centerImageRadius: 52, // البوصلة (Figma: 104px)
  innerRadius: 62,       // الدائرة الفاتحة حوالين البوصلة (Figma: 124px)
  outerRadius: 305,      // الخلفية الفاتحة (Figma: 610px)
  numRings: 1,
  gapWidth: 0,
  showLabels: true,
  labelRadius: 372,      // مكان الاسم والأيقونة الثابت حوالين العجلة
  gridStrokeColor: "#2c3e50",
  emptyGridStrokeOpacity: 0,
  filledGridStrokeOpacity: 0
} : {
  center: { x: 417.215, y: 434.875 }, // تم التعديل لتتناسب مع أبعاد figma
  centerImageRadius: 60, // نصف قطر صورة البوصلة
  innerRadius: 74,       // الفاصل الدائري 14px بنفس مقاس الفاصل بين المحاور تماماً (74 - 60 = 14px)
  outerRadius: isResultPage ? 300 : 330, // قطر متوازن للعجلة لإعطاء فجوات واسعة وواضحة للنصوص والنسب
  numRings: 5,
  gapWidth: 14,
  showLabels: true,
  labelOffset: isResultPage ? 54 : 68,  // مسافة ثابتة ومتوازنة للنصوص والأيقونات
  iconOffset: 20,   // (لم تعد مستخدمة بشكل منفصل، لكن نبقيها)
  iconSize: 34,     // تكبير حجم الأيقونات
  gridStrokeColor: "#2c3e50",
  emptyGridStrokeOpacity: 0,
  filledGridStrokeOpacity: 0.18
};

/* شرح كل محور اللي بيظهر في الـ Tooltip لما المستخدم يشاور على المحور (الصفحة الرئيسية وصفحة "اكتشف عجلة الحياة") */
// أسماء المحاور وشرحها من محتوى الموقع (لوحة الإدارة)، والشرح مربوط بالاسم بنفس دالة cms
const AXIS_LABELS = {
  personal: cms('home.wheel.label_personal', 'الشخصي'),
  spiritual: cms('home.wheel.label_spiritual', 'الروحاني'),
  health: cms('home.wheel.label_health', 'الصحي'),
  social: cms('home.wheel.label_social', 'الاجتماعي'),
  family: cms('home.wheel.label_family', 'العائلي'),
  leisure: cms('home.wheel.label_leisure', 'الترفيهي'),
  financial: cms('home.wheel.label_financial', 'المالي'),
  career: cms('home.wheel.label_career', 'المهني'),
};
const AXIS_DESCRIPTIONS = {
  [AXIS_LABELS.spiritual]: cms('home.wheel.tooltip_spiritual', 'يقيس مدى التزام الفرد بالعبادات والممارسات الإيمانية، وانعكاس القيم الروحية على سلوكه بما يمنحه السكينة والاستقرار النفسي.'),
  [AXIS_LABELS.health]: cms('home.wheel.tooltip_health', 'يقيس مدى تبني الفرد لعادات صحية متكاملة تشمل التغذية، النشاط البدني، كفاية النوم، والتدابير الوقائية لدعم العافية الجسدية.'),
  [AXIS_LABELS.personal]: cms('home.wheel.tooltip_personal', 'يقيس مستوى سعي الفرد للتعلم المستمر، وفاعليته في تنظيم وقته، ووضع الأهداف الشخصية والعمل على تحقيقها.'),
  [AXIS_LABELS.family]: cms('home.wheel.tooltip_family', 'يقيس جودة التواصل الأسري، ومستوى تحمل المسؤوليات، والدعم المتبادل، والقدرة على إدارة الخلافات العائلية بحوار وإيجابية.'),
  [AXIS_LABELS.social]: cms('home.wheel.tooltip_social', 'يقيس مدى اهتمام الفرد بصلة الأرحام وبناء علاقات إيجابية مع المحيط، والمشاركة الفاعلة في المناسبات والمبادرات المجتمعية.'),
  [AXIS_LABELS.career]: cms('home.wheel.tooltip_career', 'يقيس انضباط الفرد والتزامه بأنظمة العمل، وجودة أدائه المهني، وسعيه لتطوير مهاراته وبناء علاقات عمل إيجابية.'),
  [AXIS_LABELS.financial]: cms('home.wheel.tooltip_financial', 'يقيس مدى كفاءة الفرد في التخطيط المالي، وإدارة الدخل والمصروفات، والقدرة على الادخار والاستثمار والوفاء بالالتزامات المالية.'),
  [AXIS_LABELS.leisure]: cms('home.wheel.tooltip_leisure', 'يقيس قدرة الفرد على التوازن بين العمل والحياة، وممارسة الهوايات والأنشطة الترفيهية لتجديد الطاقة وتخفيف ضغوط الحياة.')
};
const tooltipsEnabled = !isResultPage;

/* بيانات كل محور - الترتيب يبدأ من المحور الشخصي في أعلى العجلة مع عقارب الساعة تماماً كما في Figma */
let axesState = [
  { label: AXIS_LABELS.personal, color: "#7844D0", percent: 30, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/personal.png" },
  { label: AXIS_LABELS.spiritual, color: "#5875E5", percent: 45, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/spiritual.png" },
  { label: AXIS_LABELS.health, color: "#43A074", percent: 38, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/health.png" },
  { label: AXIS_LABELS.social, color: "#C53664", percent: 40, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/social.png" },
  { label: AXIS_LABELS.family, color: "#D98344", percent: 50, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/family.png" },
  { label: AXIS_LABELS.leisure, color: "#C9B642", percent: 30, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/leisure.png" },
  { label: AXIS_LABELS.financial, color: "#3CB1B3", percent: 35, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/financial.png" },
  { label: AXIS_LABELS.career, color: "#4474D0", percent: 45, direction: "dark-to-light", icon: "custom", customIconUrl: "/landing/icons/wheel_of_life/career.png" }
];

// ألوان وأيقونات تصميم الرئيسية الجديد بنفس ترتيب axesState (fill: القطاع، bg: الخلفية الفاتحة، text: لون الاسم)
const HOME_AXIS_STYLE = [
  { fill: "#693CC7", bg: "#D9D0ED", text: "#5C3E9B", icon: "personal", iconW: 55, iconH: 55 },
  { fill: "#6262E0", bg: "#D7DBF9", text: "#5B6ECC", icon: "spiritual", iconW: 48, iconH: 39 },
  { fill: "#328C65", bg: "#D1EBE0", text: "#489674", icon: "health", iconW: 48, iconH: 48 },
  { fill: "#C73269", bg: "#F8D1DF", text: "#963056", icon: "social", iconW: 48, iconH: 38 },
  { fill: "#D87F3C", bg: "#FDE5D2", text: "#BC7B4A", icon: "family", iconW: 48, iconH: 48 },
  { fill: "#DACB5E", bg: "#F5F1D3", text: "#B8AA44", icon: "leisure", iconW: 48, iconH: 48 },
  { fill: "#59CFD6", bg: "#D2F2F4", text: "#27797E", icon: "financial", iconW: 48, iconH: 48 },
  { fill: "#244973", bg: "#CDDAED", text: "#21487B", icon: "career", iconW: 48, iconH: 48 }
];
// ألوان وأيقونات المحاور وصورة البوصلة من لوحة الإدارة (window.LIFE_WHEEL_STYLE)، ولو مش متاحة بتفضل الافتراضية
const adminStyle = typeof window !== "undefined" ? window.LIFE_WHEEL_STYLE : null;
if (isHomeDesign) {
  axesState.forEach((axis, i) => {
    const key = HOME_AXIS_STYLE[i].icon;
    const custom = adminStyle && adminStyle.axes ? adminStyle.axes[key] : null;
    if (custom) {
      HOME_AXIS_STYLE[i].fill = custom.fill || HOME_AXIS_STYLE[i].fill;
      HOME_AXIS_STYLE[i].bg = custom.bg || HOME_AXIS_STYLE[i].bg;
      HOME_AXIS_STYLE[i].text = custom.text || HOME_AXIS_STYLE[i].text;
    }
    axis.customIconUrl = (custom && custom.icon) || `/landing/icons/wheel_of_life/home/${key}.svg`;
  });
}

/* حالة الدوران والصورة في المنتصف */
let rotationAngle = 0;      // بالدرجات - قيمة معروضة محصورة 0-360
let autoSpinOn = typeof window !== "undefined" && localStorage.getItem("dar_alruya_wheel_auto_spin_360") === "true";
let autoSpinSpeed = 20;     // درجة/ثانية
let spinDirection = (typeof window !== "undefined" && localStorage.getItem("dar_alruya_wheel_spin_direction")) || "cw";
let centerImageDataUrl = (typeof window !== "undefined" && window.LIFE_WHEEL_STYLE && window.LIFE_WHEEL_STYLE.compass) || "/landing/images/Frame%202147238562.png";
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
const svg = document.getElementById(options.svgId || "wheelSvg");
const controlsEl = document.getElementById("controls");
const wheelWrap = document.getElementById(options.wrapId || "wheel-wrap");
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
  if (isResultPage) {
    return {
      effectiveFontSize: 25,
      effectiveIconSize: 48,
      effectivePercentSize: 28,
      effectiveLabelOffset: 54,
      textYOffset: -10,
      iconYOffset: 0
    };
  }
  if (isHomeDesign) {
    // Figma: El Messiri Bold 26px وتحته الأيقونة بمسافة 6px، وبنكبرهم على الموبايل عشان العجلة بتصغر
    return {
      effectiveFontSize: isMobile ? 34 : 26,
      iconScale: isMobile ? 1.25 : 1,
      labelGap: 6,
      // الموبايل: مسافة ثابتة بين حافة العجلة وأقرب نقطة في الاسم/الأيقونة (بدل مركز ثابت)، فالكلمات الطويلة ما تدخلش على العجلة
      equalGap: isMobile
    };
  }
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
  rotatableGroup.setAttribute("transform", `rotate(${rotationAngle} ${cx} ${cy})`);

  const centerCircle = document.createElementNS(svgNS, "circle");
  centerCircle.setAttribute("cx", cx);
  centerCircle.setAttribute("cy", cy);
  centerCircle.setAttribute("r", innerRadius);
  centerCircle.setAttribute("class", "center-circle");
  centerCircle.setAttribute("stroke", gridStrokeColor);
  centerCircle.setAttribute("stroke-opacity", filledGridStrokeOpacity);
  if (isHomeDesign) centerCircle.style.fill = "#F8FAFC"; // نفس خلفية الصفحة
  rotatableGroup.appendChild(centerCircle);

  // خلفية فاتحة كاملة لكل محور (تصميم الرئيسية)
  if (isHomeDesign) {
    const sectorAngle = 360 / n;
    axesState.forEach((axis, i) => {
      const bg = document.createElementNS(svgNS, "path");
      bg.setAttribute("class", "bg-cell");
      bg.setAttribute("fill", HOME_AXIS_STYLE[i].bg);
      bg.setAttribute("d", ringSectorPath(cx, cy, innerRadius, outerRadius, i * sectorAngle, (i + 1) * sectorAngle, 0));
      rotatableGroup.appendChild(bg);
    });
  }

  // Axis sector elements
  const axisElements = [];

  axesState.forEach((axis, i) => {
    const { start: colorStart, end: colorEnd } = getGradientEnds(axis);
    const fillPaths = [];
    const gridPaths = [];

    for (let k = 0; k < numRings; k++) {
      const t = numRings > 1 ? k / (numRings - 1) : 0;
      const shade = isHomeDesign ? HOME_AXIS_STYLE[i].fill : lerpColor(colorStart, colorEnd, t);

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
      icon: null,
      percentText: null
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
      text.setAttribute("fill", isHomeDesign ? HOME_AXIS_STYLE[i].text : getAxisAccentColor(axis, 0.38));
      text.setAttribute("font-family", "'El Messiri', sans-serif");
      text.setAttribute("font-size", `${metrics.effectiveFontSize}px`);
      text.setAttribute("font-weight", "bold");
      text.setAttribute("text-anchor", "middle");
      text.textContent = axis.label || "";
      if (isResultPage) {
        text.setAttribute("dominant-baseline", "central");
      }
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

      // Percentage Text (Under icon for Result Page)
      if (isResultPage) {
        const pText = document.createElementNS(svgNS, "text");
        pText.setAttribute("class", "axis-percent");
        pText.setAttribute("fill", getAxisAccentColor(axis, 0.38));
        pText.setAttribute("font-family", "'El Messiri', 'Cairo', sans-serif");
        pText.setAttribute("font-size", `${metrics.effectivePercentSize}px`);
        pText.setAttribute("font-weight", "bold");
        pText.setAttribute("text-anchor", "middle");
        pText.setAttribute("dominant-baseline", "central");
        pText.textContent = `${Math.round(axis.percent || 0)}%`;
        labelsGroup.appendChild(pText);
        axisElements[i].percentText = pText;
      }
    });

    svg.appendChild(labelsGroup);
  }

  // 5. Tooltip hit areas: one invisible sector per axis covering its rings, label and icon (rotates with the wheel)
  let hitGroup = null;
  if (tooltipsEnabled) {
    hitGroup = document.createElementNS(svgNS, "g");
    hitGroup.setAttribute("class", "tooltip-hits");
    hitGroup.setAttribute("transform", `rotate(${rotationAngle} ${cx} ${cy})`);
    const sectorAngle = 360 / n;
    axesState.forEach((axis, i) => {
      const hit = document.createElementNS(svgNS, "path");
      hit.setAttribute("d", ringSectorPath(cx, cy, innerRadius, outerRadius + 130, i * sectorAngle, (i + 1) * sectorAngle, 0));
      hit.setAttribute("fill", "transparent");
      hit.setAttribute("tabindex", "0");
      hit.setAttribute("role", "button");
      hit.setAttribute("aria-label", `${axis.label}: ${AXIS_DESCRIPTIONS[axis.label] || ""}`);
      hit.style.cursor = "pointer";
      hit.style.outline = "none";
      hit.dataset.axis = i;
      hitGroup.appendChild(hit);
    });
    svg.appendChild(hitGroup);
  }

  // 6. Center Hit Area for Spin
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
    centerHit,
    hitGroup
  };
  if (activeAxis !== null) setAxisHighlight(activeAxis);
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
  wheelDom.rotatableGroup.setAttribute("transform", `rotate(${rotationAngle} ${cx} ${cy})`);
  if (wheelDom.hitGroup) wheelDom.hitGroup.setAttribute("transform", `rotate(${rotationAngle} ${cx} ${cy})`);

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
    const mid = i * sectorAngle + sectorAngle / 2 + rotationAngle;
    const fillFrac = Math.max(0, Math.min(100, axis.percent !== undefined ? axis.percent : 50)) / 100;
    const currentFillRadius = innerRadius + fillFrac * (outerRadius - innerRadius);
    
    let dynamicOffset = metrics.effectiveLabelOffset || 54;
    if (isResultPage) {
      const H_half = 68;
      const W_half = 45;
      const rad = mid * Math.PI / 180;
      dynamicOffset = Math.abs(Math.cos(rad)) * H_half + Math.abs(Math.sin(rad)) * W_half + 15;
    }
    
    const targetRadius = Math.max(innerRadius + 50, currentFillRadius + dynamicOffset);
    const basePos = polarToCartesian(cx, cy, targetRadius, mid);

    if (isResultPage) {
      const iconSize = metrics.effectiveIconSize || 48;
      const fontSize = metrics.effectiveFontSize || 25;
      const percentSize = metrics.effectivePercentSize || 28;
      const gap = 16; // Generous 16px gap between text, icon, and percent matching Figma

      if (el.text) {
        el.text.setAttribute("x", basePos.x);
        el.text.setAttribute("y", basePos.y - (iconSize / 2 + gap + fontSize / 2));
        el.text.setAttribute("font-size", `${fontSize}px`);
        el.text.setAttribute("dominant-baseline", "central");
      }

      if (el.icon) {
        el.icon.setAttribute("x", basePos.x - iconSize / 2);
        el.icon.setAttribute("y", basePos.y - iconSize / 2);
        el.icon.setAttribute("width", iconSize);
        el.icon.setAttribute("height", iconSize);
      }

      if (el.percentText) {
        el.percentText.setAttribute("x", basePos.x);
        el.percentText.setAttribute("y", basePos.y + (iconSize / 2 + gap + percentSize / 2));
        el.percentText.setAttribute("font-size", `${percentSize}px`);
        el.percentText.setAttribute("dominant-baseline", "central");
        el.percentText.textContent = `${Math.round(axis.percent || 0)}%`;
      }
    } else if (isHomeDesign) {
      // الاسم والأيقونة ثابتين على دائرة حوالين العجلة (مش بيتحركوا مع النسبة)، والأيقونة تحت الاسم
      const style = HOME_AXIS_STYLE[i];
      const iconW = style.iconW * metrics.iconScale;
      const iconH = style.iconH * metrics.iconScale;
      const lineH = metrics.effectiveFontSize * 1.5;
      if (el.text) {
        el.text.setAttribute("font-size", `${metrics.effectiveFontSize}px`);
      }
      let labelRadius = SETTINGS.labelRadius;
      if (metrics.equalGap) {
        // نصف عرض وارتفاع صندوق الاسم+الأيقونة بيتحسبوا على اتجاه المحور، فأقرب نقطة منه للعجلة تبقى على نفس المسافة دايمًا
        const u = polarToCartesian(0, 0, 1, mid);
        const textW = el.text && el.text.getComputedTextLength ? el.text.getComputedTextLength() : 0;
        const halfW = Math.max(textW, iconW) / 2;
        const halfH = (lineH + metrics.labelGap + iconH) / 2;
        labelRadius = SETTINGS.outerRadius + 8 + halfW * Math.abs(u.x) + halfH * Math.abs(u.y);
      }
      const pos = polarToCartesian(cx, cy, labelRadius, mid);
      const top = pos.y - (lineH + metrics.labelGap + iconH) / 2;

      if (el.text) {
        el.text.setAttribute("x", pos.x);
        el.text.setAttribute("y", top + lineH / 2);
        el.text.setAttribute("dominant-baseline", "central");
      }

      if (el.icon) {
        el.icon.setAttribute("x", pos.x - iconW / 2);
        el.icon.setAttribute("y", top + lineH + metrics.labelGap);
        el.icon.setAttribute("width", iconW);
        el.icon.setAttribute("height", iconH);
      }
    } else {
      if (el.text) {
        el.text.setAttribute("x", basePos.x);
        el.text.setAttribute("y", basePos.y + metrics.textYOffset);
      }

      if (el.icon) {
        el.icon.setAttribute("x", basePos.x - metrics.effectiveIconSize / 2);
        el.icon.setAttribute("y", basePos.y + metrics.iconYOffset);
      }
    }
  });

  // Labels move with the breathing/spin animation: keep the open tooltip attached to its axis
  if (activeAxis !== null) positionTooltip();
}

/* ============================================================
   Tooltip شرح المحاور: بيظهر بالـ hover على الكمبيوتر وباللمس على الموبايل، وبالـ Tab من الكيبورد
   ============================================================ */
let activeAxis = null;
let lastPointerType = "mouse";
let tooltipEl = null;

function ensureTooltip() {
  if (tooltipEl || !tooltipsEnabled) return tooltipEl;
  tooltipEl = document.createElement("div");
  tooltipEl.id = "wheel-tooltip";
  tooltipEl.setAttribute("role", "tooltip");
  tooltipEl.setAttribute("dir", "rtl");
  // العنصر الخارجي للمكان (transform) والداخلي للظهور (opacity/scale)
  tooltipEl.className = "fixed left-0 top-0 z-[60] w-[260px] sm:w-[300px] pointer-events-none font-messiri";
  tooltipEl.innerHTML = `
    <div data-tt-inner class="relative opacity-0 scale-95 transition-[opacity,transform] duration-150 ease-out">
      <div class="bg-white rounded-[16px] border border-[#e9edf2] shadow-[0_14px_36px_rgba(32,74,122,0.18)] overflow-hidden">
        <div data-tt-bar class="h-[4px] w-full"></div>
        <div class="flex items-start gap-[12px] p-[14px] sm:p-[16px]">
          <span data-tt-iconbox class="size-[40px] sm:size-[44px] rounded-[12px] flex items-center justify-center shrink-0">
            <img data-tt-icon alt="" class="size-[26px] sm:size-[28px] object-contain" />
          </span>
          <div class="min-w-0">
            <p data-tt-title class="font-bold text-[15px] sm:text-[17px] leading-tight mb-[6px]"></p>
            <p data-tt-desc class="font-medium text-[12.5px] sm:text-[14px] leading-[1.65] text-[#565656]"></p>
          </div>
        </div>
      </div>
      <span data-tt-arrow class="absolute size-[12px] bg-white rotate-45 border-solid border-[#e9edf2]"></span>
    </div>`;
  document.body.appendChild(tooltipEl);
  return tooltipEl;
}

// يبرز المحور النشط ويخفف الباقي
function setAxisHighlight(index) {
  if (!wheelDom) return;
  wheelDom.axisElements.forEach((el, i) => {
    const opacity = index === null || i === index ? "1" : "0.35";
    [...el.fillPaths, el.text, el.icon].forEach((node) => {
      if (!node) return;
      node.style.transition = "opacity 150ms ease-out";
      node.style.opacity = opacity;
    });
  });
}

function positionTooltip() {
  if (!tooltipEl || activeAxis === null || !wheelDom) return;
  const el = wheelDom.axisElements[activeAxis];
  const hit = wheelDom.hitGroup?.children[activeAxis];
  const rects = [el?.text, el?.icon].filter(Boolean).map((n) => n.getBoundingClientRect()).filter((r) => r.width);
  const anchorRect = rects.length
    ? rects.reduce((a, r) => ({ left: Math.min(a.left, r.left), right: Math.max(a.right, r.right), top: Math.min(a.top, r.top), bottom: Math.max(a.bottom, r.bottom) }))
    : hit.getBoundingClientRect();

  const vw = document.documentElement.clientWidth;
  const vh = window.innerHeight;
  const w = tooltipEl.offsetWidth;
  const h = tooltipEl.offsetHeight;
  const gap = 12;
  const centerX = (anchorRect.left + anchorRect.right) / 2;

  // فوق المحور لو فيه مكان (تحت الـ navbar)، وإلا تحته
  const above = anchorRect.top - h - gap >= 80 || anchorRect.bottom + h + gap > vh;
  const top = above ? anchorRect.top - h - gap : anchorRect.bottom + gap;
  const left = Math.max(12, Math.min(vw - w - 12, centerX - w / 2));

  tooltipEl.style.transform = `translate(${Math.round(left)}px, ${Math.round(top)}px)`;
  tooltipEl.querySelector("[data-tt-inner]").style.transformOrigin = above ? "bottom center" : "top center";

  const arrow = tooltipEl.querySelector("[data-tt-arrow]");
  arrow.style.left = `${Math.max(18, Math.min(w - 30, centerX - left - 6))}px`;
  arrow.style.top = above ? "auto" : "-6px";
  arrow.style.bottom = above ? "-6px" : "auto";
  arrow.style.borderWidth = above ? "0 1px 1px 0" : "1px 0 0 1px";
}

function showTooltip(index) {
  const axis = axesState[index];
  const desc = axis && AXIS_DESCRIPTIONS[axis.label];
  if (!desc || !ensureTooltip()) return;

  const accent = getAxisAccentColor(axis, 0.2);
  tooltipEl.querySelector("[data-tt-bar]").style.background = axis.color;
  tooltipEl.querySelector("[data-tt-iconbox]").style.background = lighten(axis.color, 0.86);
  const icon = tooltipEl.querySelector("[data-tt-icon]");
  icon.src = axis.customIconUrl || "";
  icon.style.display = axis.customIconUrl ? "" : "none";
  const title = tooltipEl.querySelector("[data-tt-title]");
  title.textContent = `${cms('home.wheel.tooltip_title_prefix', 'الجانب')} ${axis.label}`;
  title.style.color = accent;
  tooltipEl.querySelector("[data-tt-desc]").textContent = desc;

  activeAxis = index;
  setAxisHighlight(index);
  positionTooltip();
  tooltipEl.querySelector("[data-tt-inner]").classList.replace("opacity-0", "opacity-100");
  tooltipEl.querySelector("[data-tt-inner]").classList.replace("scale-95", "scale-100");
}

function hideTooltip() {
  if (activeAxis === null) return;
  activeAxis = null;
  setAxisHighlight(null);
  const inner = tooltipEl?.querySelector("[data-tt-inner]");
  if (inner) {
    inner.classList.replace("opacity-100", "opacity-0");
    inner.classList.replace("scale-100", "scale-95");
  }
}

if (tooltipsEnabled && svg) {
  const hitIndex = (target) => {
    const hit = target.closest?.("[data-axis]");
    return hit && svg.contains(hit) ? Number(hit.dataset.axis) : null;
  };

  document.addEventListener("pointerdown", (e) => {
    lastPointerType = e.pointerType || "mouse";
    // لمسة برا العجلة بتقفل الـ tooltip على الموبايل
    if (activeAxis !== null && hitIndex(e.target) === null) hideTooltip();
  }, { passive: true });

  svg.addEventListener("pointerover", (e) => {
    if (e.pointerType !== "mouse") return;
    const i = hitIndex(e.target);
    if (i !== null && i !== activeAxis) showTooltip(i);
  });
  svg.addEventListener("pointerout", (e) => {
    if (e.pointerType !== "mouse") return;
    if (hitIndex(e.target) !== null && hitIndex(e.relatedTarget || document.body) === null) hideTooltip();
  });

  // اللمس: ضغطة تفتح، وضغطة تانية على نفس المحور تقفل
  svg.addEventListener("click", (e) => {
    if (lastPointerType === "mouse") return;
    const i = hitIndex(e.target);
    if (i === null) return;
    if (i === activeAxis) hideTooltip(); else showTooltip(i);
  });

  svg.addEventListener("focusin", (e) => {
    const i = hitIndex(e.target);
    if (i !== null) showTooltip(i);
  });
  svg.addEventListener("focusout", (e) => {
    if (hitIndex(e.relatedTarget || document.body) === null) hideTooltip();
  });
  document.addEventListener("keydown", (e) => { if (e.key === "Escape") hideTooltip(); });
  window.addEventListener("scroll", () => { if (lastPointerType === "mouse") hideTooltip(); else positionTooltip(); }, { passive: true });
  window.addEventListener("resize", hideTooltip);
}

function drawWheel(forceRebuild = false) {
  if (forceRebuild || !wheelDom) {
    buildWheelDom();
  }
  updateWheelGeometry();
}

/* ============================================================
   محرك رحلة الحياة (Life Journey Engine)
   العجلة بتعرض حياة شخص عشوائي كاملة في ~5 ثواني: أحداث تطور وانتكاسات في جوانب مختلفة،
   وكل حدث بيأثر على باقي الجوانب حسب مصفوفة التأثير (generatePersonaJourney تحت).
   بعد ما الحياة تخلص العجلة تثبت على النتيجة مع تذبذب طبيعي بسيط جداً.
   الحركة نفسها "ملاحقة" مستمرة (exponential smoothing) للهدف الحالي عشان تبقى ناعمة
   من غير أي وقفة سرعة عند كل نقطة تحول.
   ============================================================ */
let dynamicBreathingOn = true;
let isWheelVisible = true;
let isTabVisible = true;
let breathingLoopId = null;

let JOURNEY_TOTAL_MS = options.journeyMs || 5000; // حياة الشخص كلها (من العشرينات لحد 45-60 سنة) مضغوطة في 5 ثواني (أو مدة المختبر)
const CONTINUOUS_JOURNEY = !!options.continuousJourney; // حركة متصلة من غير قفزات (بتتحسب من منحنى سلس بدل ملاحقة أهداف)
const SETTLE_JITTER_RANGE = 2.5;   // تذبذب صغير جداً حول القيمة النهائية بعد الاستقرار
const SETTLE_DURATION_MIN = 1000;
const SETTLE_DURATION_MAX = 2000;

const AXIS_STAGGER_MAX_MS = 50;       // فرق بداية عشوائي بسيط بين المحاور عشان ميبقوش متزامنين
const SEGMENT_DURATION_VARIANCE_MS = 50; // تنويع بسيط في سرعة كل خطوة
const SEGMENT_JITTER_RANGE = 0.8;     // تذبذب صغير حوالين كل هدف مرحلي
const PAUSE_CHANCE = 0;               // مفيش وقفات: الـ 5 ثواني كلها للأحداث
const PAUSE_DURATION_MIN = 150;
const PAUSE_DURATION_MAX = 420;
const SMOOTHING_TAU_MS = 200; // ثابت زمني للملاحقة الناعمة (صغير عشان العجلة تلحق الأحداث في الـ 5 ثواني)
const MAX_FRAME_DT_MS = 100;  // سقف لأي قفزة زمن كبيرة (تبديل تابات مثلاً) عشان الحركة تفضل ناعمة

// ثوابت دوران العجلة الثابت (تم إلغاء الاهتزاز)
const WHEEL_WOBBLE_AMPLITUDE_1 = 0;
const WHEEL_WOBBLE_SPEED_1 = 0;
const WHEEL_WOBBLE_AMPLITUDE_2 = 0;
const WHEEL_WOBBLE_SPEED_2 = 0;

/**
 * ============================================================
 * محاكاة حياة شخص حقيقي على العجلة، مضغوطة في ~5 ثواني.
 * كل زيارة = شخص عشوائي مختلف، ليه جانب أساسي واحد اشتغل عليه في حياته (مثلاً الصحي).
 * الجانب ده بيكبر على مراحل (وأحياناً بتيجي أزمة بيرجع فيها شوية وبعدين يقوم)،
 * وكل جانب تاني بيكبر معاه في نفس اللحظة بنسبة عشوائية من نموه جوه نطاق المستوى
 * اللي في جدول التأثير في لوحة الإدارة (صف الجانب الأساسي):
 * لو الصحي زاد 60 نقطة والاجتماعي "متوسط" (26-50%) → الاجتماعي بيزيد من 16 لـ 30 نقطة بس.
 * فالجانب الأساسي دايماً الأكبر، والشكل النهائي للعجلة بيعكس الجدول زي ما الأدمن حاطه.
 * الجوانب اللي مالهاش تأثير في الجدول بتتراجع شوية من الإهمال.
 * ============================================================
 */
// ترتيب المحاور: 0: الشخصي, 1: الروحاني, 2: الصحي, 3: الاجتماعي, 4: العائلي, 5: الترفيهي, 6: المالي, 7: المهني
const DEFAULT_INFLUENCE = {
  levels: { weak: [0.05, 0.25], medium: [0.26, 0.50], strong: [0.51, 0.75], very_strong: [0.76, 0.92] },
  matrix: [
    [null, "strong", "strong", "strong", "strong", "medium", "medium", "strong"],                      // الشخصي
    ["strong", null, "very_strong", "medium", "strong", "weak", "medium", "medium"],                  // الروحاني
    ["very_strong", "medium", null, "medium", "strong", "strong", "strong", "very_strong"],           // الصحي
    ["strong", "medium", "strong", null, "medium", "strong", "medium", "strong"],                     // الاجتماعي
    ["very_strong", "medium", "strong", "medium", null, "medium", "very_strong", "strong"],           // العائلي
    ["strong", "weak", "medium", "strong", "strong", null, "medium", "medium"],                       // الترفيهي
    ["strong", "medium", "medium", "medium", "very_strong", "strong", null, "strong"],                // المالي
    ["very_strong", "medium", "weak", "medium", "very_strong", "strong", "very_strong", null]         // المهني
  ]
};
// الإعدادات من لوحة الإدارة (window.LIFE_WHEEL_INFLUENCE)، ولو مش موجودة أو ناقصة بنستخدم الافتراضي
const INFLUENCE = (() => {
  const cfg = typeof window !== "undefined" ? window.LIFE_WHEEL_INFLUENCE : null;
  const ok = cfg && cfg.levels && Array.isArray(cfg.matrix) && cfg.matrix.length === 8 && cfg.matrix.every((r) => Array.isArray(r) && r.length === 8);
  return ok ? cfg : DEFAULT_INFLUENCE;
})();
// نطاق تأثير جانب على جانب ([min, max] كنسبة من التغيير) أو null لو مفيش تأثير
const influenceRange = (source, target) => {
  const key = INFLUENCE.matrix[source] && INFLUENCE.matrix[source][target];
  return key && INFLUENCE.levels[key] ? INFLUENCE.levels[key] : null;
};

const LIFE_EVENTS = 6;          // عدد مراحل الحياة
const LIFE_MIN = 8;             // أقل قيمة لأي جانب
const LIFE_MAX = 92;            // مفيش بني آدم "كامل"

// الجانب صاحب كل مرحلة، عشان العجلة تحرّكه الأول والباقي يتبعه (التأثير بيبان بالعين)
const LIFE_SOURCES = [];

const randBetween = (a, b) => a + Math.random() * (b - a);

function simulateLife() {
  const n = 8;
  const hero = Math.floor(Math.random() * n);

  // بداية الحياة: كل الجوانب في مستوى منخفض متقارب، عشان الشكل النهائي يبيّن التأثير مش البداية
  const base = randBetween(16, 26);
  const start = Array.from({ length: n }, () => base + randBetween(-3, 3));
  // الجانب الأساسي بيبدأ من أعلى مستوى، فحتى "قوي جداً" (لحد 92%) يفضل أقل منه بفرق باين في الآخر
  start[hero] = Math.max(...start);

  // نمو الجانب الأساسي، وحصة كل جانب منه: نسبة عشوائية جوه نطاق مستواه في الجدول
  const growth = randBetween(76, 90) - start[hero];
  const share = start.map((_, t) => {
    if (t === hero) return 1;
    const r = influenceRange(hero, t);
    return r ? randBetween(r[0], r[1]) : 0;
  });
  const neglect = share.map((s, t) => (t !== hero && s === 0 ? randBetween(2, 6) : 0));

  // خطوات نمو الجانب الأساسي على المراحل، وفي 40% من الحيوات أزمة في النص بيرجع فيها 12-22% وبعدين يعوّضها
  const setback = Math.random() < 0.4 ? 2 + Math.floor(Math.random() * (LIFE_EVENTS - 3)) : -1;
  const dip = setback >= 0 ? randBetween(0.12, 0.22) : 0;
  const weights = Array.from({ length: LIFE_EVENTS }, (_, e) => (e === setback ? 0 : randBetween(0.6, 1.4)));
  const totalWeight = weights.reduce((a, b) => a + b, 0);
  const steps = weights.map((w, e) => (e === setback ? -dip * growth : (w / totalWeight) * growth * (1 + dip)));

  const journey = start.map((v) => [Math.round(v)]);
  let heroValue = start[hero];
  for (let e = 0; e < LIFE_EVENTS; e++) {
    heroValue += steps[e];
    const progress = Math.min(LIFE_MAX, heroValue) - start[hero];
    const last = e === LIFE_EVENTS - 1;
    for (let t = 0; t < n; t++) {
      // تذبذب بسيط في المراحل اللي في النص عشان الحركة تبان طبيعية، والنهاية بالظبط على نسبة الجدول
      const wobble = t === hero || last ? 0 : randBetween(-1.5, 1.5);
      const v = start[t] + share[t] * progress - neglect[t] * ((e + 1) / LIFE_EVENTS) + wobble;
      journey[t].push(Math.round(Math.max(LIFE_MIN, Math.min(LIFE_MAX, v))));
    }
    LIFE_SOURCES.push([hero]);
  }

  return journey;
}

function generatePersonaJourney() {
  LIFE_SOURCES.length = 0;
  return simulateLife();
}

// خيارات اختيارية (بيستخدمها المختبر): options.journeyFactory(startVals, INFLUENCE) بتبني رحلة من المستوى الحالي،
// وoptions.startValues المستوى الحالي، وoptions.maxPercent السقف، وoptions.autoPlay=false عشان الرحلة ماتبدأش لوحدها.
// من غير الخيارات دي العجلة بتشتغل زي ما هي (رحلة عشوائية بتبدأ مع فتح الصفحة).
let AXIS_JOURNEY = [];
let JOURNEY_SEGMENTS = 0; // عدد أحداث الحياة (LIFE_EVENTS)
let JOURNEY_SEGMENT_MS = JOURNEY_TOTAL_MS;
const MAX_AUTO_PERCENT = options.maxPercent || 90; // سقف صارم: مفيش جانب بيوصل له تلقائيًا (مفيش بني آدم "كامل")
let holdJourney = options.autoPlay === false; // الرحلة واقفة لحد ما play() تتندهي
let journeyStartedAt = performance.now();
let journeyClockStarted = !(CONTINUOUS_JOURNEY && !holdJourney); // الحركة التلقائية بتبدأ ساعتها لما العجلة تبان فعلًا على الشاشة

function loadJourney(startVals) {
  if (typeof options.journeyFactory === "function") {
    const journey = options.journeyFactory(startVals || axesState.map((a) => a.percent), INFLUENCE);
    AXIS_JOURNEY = journey.keyframes;
    LIFE_SOURCES.length = 0;
    (journey.sources || []).forEach((src) => LIFE_SOURCES.push(src));
  } else {
    AXIS_JOURNEY = generatePersonaJourney();
  }
  JOURNEY_SEGMENTS = AXIS_JOURNEY[0].length - 1;
  JOURNEY_SEGMENT_MS = JOURNEY_TOTAL_MS / JOURNEY_SEGMENTS;
}
loadJourney(options.startValues);

// مزامنة النسب الابتدائية للعجلة مع السنة صفر لهذه الشخصية
if (!isResultPage) {
  axesState.forEach((axis, i) => {
    axis.percent = AXIS_JOURNEY[i][0];
  });
}

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
  // استقرار هادئ وثابت على النتيجة النهائية بعد انتهاء الـ 5 سنوات
  const target = jitteredTarget(base, 0.6, isManualOverride ? 100 : MAX_AUTO_PERCENT);
  const duration = 2500 + Math.random() * 1500;
  return { target, duration };
}

// بيحدد هدف/مدة الخطوة الجاية في الرحلة، أو يحوّل المحور لوضع الاستقرار لو خلصت كل الخطوات
function scheduleNextJourneySegment(anim, i) {
  if (anim.segmentsCompleted < JOURNEY_SEGMENTS) {
    anim.target = jitteredTarget(AXIS_JOURNEY[i][anim.segmentsCompleted + 1], SEGMENT_JITTER_RANGE, MAX_AUTO_PERCENT);
    anim.duration = JOURNEY_SEGMENT_MS + (Math.random() * 2 - 1) * SEGMENT_DURATION_VARIANCE_MS;
    delayIfRipple(anim, i, anim.segmentsCompleted);
  } else {
    anim.journeyDone = true;
    const step = settledStep(i);
    anim.target = step.target;
    anim.duration = step.duration;
  }
}

// الجوانب صاحبة المرحلة بتتحرك الأول، والجوانب اللي بتتأثر بيها بتتبعها بعد لحظة (عشان التأثير يبان بالعين)
const RIPPLE_DELAY_MS = 200;
function delayIfRipple(anim, i, eventIndex) {
  const sources = LIFE_SOURCES[eventIndex];
  if (!sources || sources.includes(i)) return;
  anim.segmentStartTime += RIPPLE_DELAY_MS;
  anim.duration -= RIPPLE_DELAY_MS;
}

function buildAnimState() {
  return axesState.map((axis, i) => {
    const kf = AXIS_JOURNEY[i];
    const anim = {
      current: kf[0],
      target: kf[1],
      segmentsCompleted: 0,
      journeyDone: false,
      pausing: false,
      segmentStartTime: performance.now() + Math.random() * AXIS_STAGGER_MAX_MS,
      duration: JOURNEY_SEGMENT_MS
    };
    delayIfRipple(anim, i, 0);
    return anim;
  });
}
let axisAnimState = buildAnimState();

let lastBreathingTime = performance.now();
let lastFrameTime = performance.now();

function breathingStep(now) {
  const dt = Math.max(0, Math.min(now - lastFrameTime, MAX_FRAME_DT_MS));
  lastFrameTime = now;

  if (typeof options.onProgress === "function" && !holdJourney) {
    options.onProgress(Math.min(1, (now - journeyStartedAt) / JOURNEY_TOTAL_MS));
  }

  if (dynamicBreathingOn && isWheelVisible && isTabVisible && !isSpinning && !holdJourney) {
    let changed = false;

    // تم إلغاء حركة الدوران رايح جاي تماماً بناءً على طلب التصميم (العجلة ثابتة الاتجاه)
    idleWobbleDeg = 0;

    // الحركة المتصلة: كل جانب بيمشي على منحنى سلس واحد طول الرحلة (مفيش وقفات ولا قفزات ولا تذبذب عشوائي)
    if (CONTINUOUS_JOURNEY) {
      if (!journeyClockStarted) { journeyStartedAt = now; journeyClockStarted = true; }
      const eased = easeProgress((now - journeyStartedAt) / JOURNEY_TOTAL_MS);
      AXIS_JOURNEY.forEach((keys, i) => {
        const value = Math.max(10, Math.min(100, sampleKeyframes(keys, eased)));
        if (Math.abs(axesState[i].percent - value) > 0.01) {
          axesState[i].percent = value;
          changed = true;
        }
      });
    }

    axisAnimState.forEach((anim, i) => {
      if (CONTINUOUS_JOURNEY) return;
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
  if (!controlsEl) return;
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
if (controlsEl) controlsEl.addEventListener("change", (e) => {
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

if (spinDirectionSelect) spinDirectionSelect.value = spinDirection;

function setRotation(angle) {
  rotationAngle = ((angle % 360) + 360) % 360;
  if (rotationSlider) rotationSlider.value = Math.round(rotationAngle);
  if (rotationVal) rotationVal.textContent = Math.round(rotationAngle) + "°";
  drawWheel();
}

if (rotationSlider) rotationSlider.addEventListener("input", (e) => {
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

if (centerImageInput) {
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
}

if (removeImageBtn) {
  removeImageBtn.addEventListener("click", () => {
    centerImageDataUrl = null;
    if (centerImageInput) centerImageInput.value = "";
    drawWheel();
  });
}

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

// ====== RESULT PAGE LOGIC ======
if (isResultPage) {
  autoSpinOn = false;
  dynamicBreathingOn = false; // Turn off wobble
  
  // Try to get actual user scores
  const answersJson = typeof window !== "undefined" ? localStorage.getItem('lwAnswers') : null;
  if (answersJson) {
    const answers = JSON.parse(answersJson);
    const categoryScores = answers.map((catAnswers) => {
      const sum = catAnswers.reduce((a, b) => a + (b || 0), 0);
      return Math.round((sum * 100) / 40); // integer math first: (23 / 40) * 100 is 57.49999999999999
    });
    // Mapping: Personal(2), Spiritual(0), Health(1), Social(4), Family(3), Recreational(7), Financial(6), Professional(5)
    const visualOrderIndices = [2, 0, 1, 4, 3, 7, 6, 5];
    const userScores = visualOrderIndices.map(origIdx => categoryScores[origIdx]);
    axesState.forEach((axis, i) => {
      axis.percent = userScores[i];
    });
  } else {
    // Exact fallback scores matching Figma design:
    // Personal(92%), Spiritual(89%), Health(74%), Social(69%), Family(61%), Recreational(73%), Financial(63%), Professional(85%)
    const figmaScores = [92, 89, 74, 69, 61, 73, 63, 85];
    axesState.forEach((axis, i) => {
      axis.percent = figmaScores[i];
    });
  }
  
  // Set up startup animation
  axesState.forEach((axis, i) => {
    axisAnimState[i].target = axis.percent;
    axisAnimState[i].current = 0; // Start from 0
  });
  
  const startupDuration = 1800; // 1.8 seconds
  const startupStartTime = performance.now();
  
  function startupAnim(now) {
    let progress = (now - startupStartTime) / startupDuration;
    if (progress > 1) progress = 1;
    
    // easeOutQuart
    const ease = 1 - Math.pow(1 - progress, 4);
    
    axesState.forEach((axis, i) => {
      axisAnimState[i].current = axisAnimState[i].target * ease;
      axis.percent = axisAnimState[i].current; // Update the actual percent for drawing
    });
    updateWheelGeometry();
    
    if (progress < 1) {
      requestAnimationFrame(startupAnim);
    }
  }
  requestAnimationFrame(startupAnim);
}

buildControls();
drawWheel(true);

if (autoSpinOn) {
  startAutoSpin();
}

// واجهة التحكم من برّه: تشغيل الرحلة من مستوى حالي (startVals) أو الرجوع للمستوى الحالي من غير تشغيل
return {
  play(startVals, durationMs) {
    if (durationMs) JOURNEY_TOTAL_MS = durationMs;
    loadJourney(startVals);
    axesState.forEach((axis, i) => { axis.percent = AXIS_JOURNEY[i][0]; });
    axisAnimState = buildAnimState();
    isWheelVisible = true;
    holdJourney = false;
    journeyClockStarted = true;
    journeyStartedAt = lastFrameTime = performance.now();
    drawWheel();
  },
  setStart(startVals) {
    holdJourney = true;
    loadJourney(startVals);
    axesState.forEach((axis, i) => { axis.percent = AXIS_JOURNEY[i][0]; });
    axisAnimState = buildAnimState();
    drawWheel();
  },
  values() {
    return axesState.map((axis) => axis.percent);
  }
};

}

