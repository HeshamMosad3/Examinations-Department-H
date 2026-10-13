/* ============================================================
   محاكاة 5 سنين من حياة شخص على عجلة الحياة
   - بتبدأ من المستوى الحالي (startVals) وبتخلص كل الجوانب بين 75% و95% (شبه دايرة).
   - كل سنة فيها جانب أو اتنين "في الصدارة" (الأولوية ماشية عليهم): بينموا نمو كبير،
     والجوانب المرتبطة بيهم في جدول التأثير (لوحة الإدارة) بتنمو معاهم بنسبة من نموهم،
     والجوانب اللي مالهاش ارتباط بيهم بتتراجع شوية لأن الاهتمام مش عليها (الثمن).
   - فيه كمان "أزمة" بتحصل لجانب بعد ما يكبر (إرهاق) وبعدها بيرجع يتعافى، وجوانب بتتأخر لحد دورها.
   - السنة الخامسة هي سنة التثبيت: كل جانب بيوصل لقيمته النهائية.
   الناتج: keyframes[i][y] لكل جانب وكل سنة (0..5) + الجوانب اللي في الصدارة كل سنة (sources) + وصف لكل سنة.
   ============================================================ */

const DEFAULT_RANGE = [75, 95];
const DEFAULT_YEARS = 5;

// شدة التراجع (من إعدادات الأدمن): عدد الجوانب اللي بتتراجع قبل دورها، وحجم التراجع، وإرهاق جانب بعد نجاحه، وتراجع الجوانب المهملة
const SETBACKS = [
  { dips: 0, dipSize: 0, burnout: false, neglect: 0 },
  { dips: 1, dipSize: 0.6, burnout: false, neglect: 0.5 },
  { dips: 2, dipSize: 1, burnout: true, neglect: 1 },
  { dips: 3, dipSize: 1.4, burnout: true, neglect: 1.5 }
];

const rand = (a, b) => a + Math.random() * (b - a);
const clamp = (v, a, b) => Math.max(a, Math.min(b, v));
const shuffle = (arr) => arr.map((v) => [Math.random(), v]).sort((a, b) => a[0] - b[0]).map((x) => x[1]);

// الجوانب اللي غالبًا الناس بتبدأ بيها (المهني، الصحي، الشخصي، المالي): بيبقوا أقرب لأول السنين
const EARLY_BIAS = new Set([7, 2, 0, 6]);

/**
 * @param {number[]} startVals    المستوى الحالي لكل جانب (بنفس ترتيب العجلة)
 * @param {{levels: object, matrix: Array}} influence  جدول التأثير (لوحة الإدارة)
 * @param {{range?: [number, number], labels?: string[], years?: number, setbackLevel?: number, priority?: number[]}} [options]
 *        years: عدد السنين (3..8)، setbackLevel: 0..3 شدة التراجع، priority: أرقام الجوانب اللي بتنمو الأول (فاضية = عشوائي)
 */
export function generateFiveYearJourney(startVals, influence, options = {}) {
  const n = startVals.length;
  const [lo, hi] = options.range || DEFAULT_RANGE;
  const labels = options.labels || [];
  const YEARS = clamp(Math.round(options.years || DEFAULT_YEARS), 2, 12);
  const setback = SETBACKS[clamp(Math.round(options.setbackLevel ?? 2), 0, 3)];
  const earlyBias = new Set(options.priority ?? [...EARLY_BIAS]);
  const start = startVals.map((v) => clamp(Math.round(v), 5, 100));

  const linkRange = (source, target) => {
    const key = influence?.matrix?.[source]?.[target];
    return key && influence.levels?.[key] ? influence.levels[key] : null;
  };

  // 1) القيم النهائية: كلها جوه [lo, hi] وقريبة من بعض (شبه دايرة) مع فروق بسيطة
  const margin = Math.min(2, Math.floor((hi - lo) / 2));
  const finals = Array.from({ length: n }, () => Math.round(rand(lo + margin, hi - margin)));

  // 2) سنة الصدارة لكل جانب (1..5): ترتيب عشوائي فيه ميل لأن المهني والصحي والشخصي والمالي يسبقوا
  const order = [...Array(n).keys()].sort((a, b) => (Math.random() - (earlyBias.has(a) ? 0.4 : 0)) - (Math.random() - (earlyBias.has(b) ? 0.4 : 0)));
  const base = Math.floor(n / YEARS);
  const perYear = Array(YEARS).fill(base);
  for (let r = 0; r < n - base * YEARS; r++) perYear[Math.floor(Math.random() * YEARS)] += 1;
  const peak = new Array(n);
  let cursor = 0;
  perYear.forEach((count, yearIdx) => {
    for (let k = 0; k < count; k++) peak[order[cursor++]] = yearIdx + 1;
  });

  // 3) أحداث درامية: جانبين على الأقل بيتراجعوا قبل دورهم، وجانب بيتعب بعد نجاحه
  const lateAt = (minPeak) => shuffle([...Array(n).keys()].filter((i) => peak[i] >= minPeak));
  let late = lateAt(3);
  if (late.length < setback.dips) late = lateAt(2);
  const dipYear = {};
  late.slice(0, setback.dips).forEach((i) => { dipYear[i] = 1 + Math.floor(Math.random() * (peak[i] - 1)); });
  const early = shuffle([...Array(n).keys()].filter((i) => peak[i] <= YEARS - 2));
  const burnout = setback.burnout && early.length ? early[0] : -1;

  // 4) بناء المسارات سنة بسنة
  const keyframes = start.map((v) => [v]);
  const sources = [];
  const events = []; // لكل سنة: اللي اتقدّم واللي تراجع (للوصف)

  for (let y = 1; y <= YEARS; y++) {
    const leaders = [...Array(n).keys()].filter((i) => peak[i] === y);
    sources.push(leaders);
    const rose = [];
    const fell = [];

    for (let i = 0; i < n; i++) {
      const prev = keyframes[i][y - 1];
      let next;

      if (y === YEARS) {
        next = finals[i]; // سنة التثبيت
      } else if (peak[i] === y) {
        next = prev + (finals[i] - prev) * rand(0.4, 0.58); // نمو أساسي (موزّع، مش قفزة واحدة)
      } else if (peak[i] < y) {
        // بعد الصدارة: تقارب تدريجي من القيمة النهائية، وإرهاق مؤقت لجانب واحد
        next = i === burnout && y === peak[i] + 1
          ? prev - rand(6, 10) * setback.dipSize
          : prev + (finals[i] - prev) * rand(0.4, 0.6);
      } else if (dipYear[i] === y) {
        next = prev - rand(6, 11) * setback.dipSize; // تراجع واضح: الاهتمام مشغول بغيره
      } else {
        // لسه مجاش دوره: بياخد جزء من نمو جيرانه المرتبطين بيه، وإلا بيتراجع شوية من الإهمال
        let gain = 0;
        let linked = false;
        leaders.forEach((leader) => {
          const range = linkRange(leader, i);
          if (range) {
            linked = true;
            gain += rand(range[0], range[1]) * rand(7, 15);
          }
        });
        next = linked ? prev + Math.min(gain, 13) : prev - rand(3, 8) * setback.neglect + (setback.neglect === 0 ? rand(0, 2) : 0);
      }

      // الجانب ما بيعدّيش قيمته النهائية في الطريق (غير الإرهاق/التراجع المقصودين) عشان النمو يفضل نمو
      if (y < YEARS && prev <= finals[i] && next > finals[i]) next = finals[i];
      next = Math.round(clamp(next, 12, y === YEARS ? hi : hi - 2));
      keyframes[i].push(next);
      if (next - prev >= 4) rose.push(i);
      if (prev - next >= 3) fell.push(i);
    }
    events.push({ rose, fell });
  }

  // 5) وصف كل سنة
  const name = (list) => list.map((i) => labels[i] || `#${i + 1}`).join(' و');
  const narrative = events.map(({ rose, fell }, idx) => {
    const y = idx + 1;
    if (y === YEARS) return `السنة ${y}: تثبيت وتوازن، كل الجوانب بين ${lo}% و${hi}%`;
    const leaders = sources[idx];
    let text = `السنة ${y}: ${leaders.length ? `نمو في ${name(leaders)}` : 'مرحلة هدوء وترتيب'}`;
    if (fell.length) text += ` · تراجع في ${name(fell)}`;
    return text;
  });

  return {
    keyframes,
    sources,
    finals,
    narrative,
    years: YEARS,
    // نفس شكل المسارات القديمة ({t, v}) عشان نسخة المختبر الأولى تستخدمها
    tracks: keyframes.map((values) => values.map((v, y) => ({ t: y / YEARS, v }))),
    phases: narrative.map((title, y) => ({ t: y / YEARS, title }))
  };
}

/** تقدّم الرحلة بتسارع وتباطؤ ناعمين (بداية ونهاية هادية) بدل سرعة ثابتة تبدأ وتقف فجأة */
export function easeProgress(p) {
  return 0.5 - 0.5 * Math.cos(Math.PI * clamp(p, 0, 1));
}

/**
 * قيمة المسار عند التقدّم p (0..1): منحنى سلس (Hermite أحادي الاتجاه / PCHIP) بين قيم السنين:
 * السرعة متصلة (مفيش وقفة ولا قفزة عند أي سنة)، والقمم والقيعان بتتدوّر بنعومة، ومن غير ما المنحنى يتخطى القيم اللي بيعدّي عليها.
 */
export function sampleKeyframes(values, p) {
  const last = values.length - 1;
  const x = clamp(p, 0, 1) * last;
  const k = Math.min(last - 1, Math.floor(x));
  const t = x - k;

  const d = values.slice(1).map((v, i) => v - values[i]); // فرق كل سنة (المسافة بين السنين = 1)
  const slope = (i) => {
    if (i === 0 || i === last) {
      const a = i === 0 ? d[0] : d[last - 1];
      const b = i === 0 ? d[1] ?? d[0] : d[last - 2] ?? d[last - 1];
      let m = (3 * a - b) / 2;
      if (Math.sign(m) !== Math.sign(a)) m = 0;
      else if (Math.sign(a) !== Math.sign(b) && Math.abs(m) > 3 * Math.abs(a)) m = 3 * a;
      return m;
    }
    const a = d[i - 1];
    const b = d[i];
    return a * b <= 0 ? 0 : (2 * a * b) / (a + b);
  };

  const y0 = values[k];
  const y1 = values[k + 1];
  const m0 = slope(k);
  const m1 = slope(k + 1);
  const t2 = t * t;
  const t3 = t2 * t;
  const v = (2 * t3 - 3 * t2 + 1) * y0 + (t3 - 2 * t2 + t) * m0 + (-2 * t3 + 3 * t2) * y1 + (t3 - t2) * m1;
  return clamp(v, 5, 100);
}
