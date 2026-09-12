@extends('layouts.user')
@section('title', 'تقرير نتيجة المقياس - ' . (is_array($assessment) ? $assessment['title_ar'] : $assessment->title_ar))

@push('styles')
<link href="{{ asset('css/report-pdf.css') }}?v={{ filemtime(public_path('css/report-pdf.css')) }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endpush

@section('content')
@php
    // 1. Recover Eloquent Models from Session
    $assessmentObj = $session->assessment;
    $resObj = $session->result;
    $recObj = $assessmentObj->recommendations()->where('level', $resObj->level)->first();

    // 2. Map basic variables
    $pct = $max_score > 0 ? round($total_score / $max_score * 100) : 0;
    
    $lvlData = [
        'excellent' => ['label' => 'متميز', 'degree' => 'متميز'],
        'advanced'  => ['label' => 'متقدم', 'degree' => 'متقدم'],
        'good'      => ['label' => 'جيد', 'degree' => 'جيد'],
        'average'   => ['label' => 'متوسط', 'degree' => 'متوسط'],
        'weak'      => ['label' => 'ضعيف', 'degree' => 'ضعيف'],
        'high'   => ['label' => 'متميز', 'degree' => 'متميز'],
        'medium' => ['label' => 'جيد', 'degree' => 'جيد'],
        'low'    => ['label' => 'ضعيف', 'degree' => 'ضعيف'],
    ];

    $isHighestDimension = $assessmentObj->scoring_type === 'highest_dimension';
    if ($isHighestDimension) {
        $highestLabel = $level;
        if (empty(trim($highestLabel))) {
            $highestScore = -1;
            foreach ($resObj->dimensionScores as $ds) {
                if ($ds->score > $highestScore) {
                    $highestScore = $ds->score;
                    $highestLabel = trim(str_replace('محور', '', $ds->dimension->name_ar));
                }
            }
        }
        $mainLvl = ['label' => $highestLabel, 'degree' => $highestLabel];
        
        // Define levelKey based on the overall percentage score to align color themes (Green/Yellow/Red) with the gauge and progress bar
        if ($pct >= 70) $levelKey = 'high';
        elseif ($pct >= 40) $levelKey = 'medium';
        else $levelKey = 'low';
    } else {
        $levelKey = $resObj->level ?? $level ?? 'medium';
        if (!array_key_exists($levelKey, $lvlData)) {
            if ($pct >= 70) $levelKey = 'high';
            elseif ($pct >= 40) $levelKey = 'medium';
            else $levelKey = 'low';
        }
        $mainLvl = $lvlData[$levelKey];
    }

    // 3. Strengths & Weaknesses
    $strengths = [];
    $weaknesses = [];
    foreach($resObj->dimensionScores as $ds) {
        $ds_score_pct = $ds->max_score > 0 ? round(($ds->score / $ds->max_score) * 100) : 0;
        if (in_array($ds->level, ['excellent', 'advanced', 'high']) || $ds_score_pct >= 60) {
            $strengths[] = (object)['title' => $ds->dimension->name_ar, 'desc' => 'تمتلك قدرة عالية في هذا الجانب.'];
        } elseif (in_array($ds->level, ['weak', 'low']) || $ds_score_pct < 40) {
            $weaknesses[] = (object)['title' => $ds->dimension->name_ar, 'desc' => 'تحتاج إلى تطوير واهتمام لتحسين الأداء.'];
        } else {
            $weaknesses[] = (object)['title' => $ds->dimension->name_ar, 'desc' => 'فرصة لتعزيز وتنمية المهارة.'];
        }
    }

    // 4. Recommendation text parsing
    $parsedRecommendation = '';
    $improvementPoints = [];
    if ($recObj && !empty($recObj->description_ar)) {
        $text = strip_tags(Str::markdown($recObj->description_ar));
        if (mb_strpos($text, ':') !== false) {
            $parts = explode(':', $text, 2);
            if (mb_strlen($parts[0]) < 100 && (mb_strpos($parts[0], 'درجة') !== false || mb_strpos($parts[0], 'مستوى') !== false)) {
                $text = trim($parts[1]);
            }
        }
        $introWords = ['تشير نتيجتك', 'تشير نتائجك', 'أنت مستثمر'];
        foreach($introWords as $iw) {
            $pos = mb_strpos($text, $iw);
            if ($pos !== false && $pos < 50) {
                $text = $iw . explode($iw, $text, 2)[1];
                break;
            }
        }
        if (!empty($text) && !in_array(mb_substr(trim($text), -1), ['.', '!', '؟', ':'])) {
            $text = trim($text) . '.';
        } else {
            $text = trim($text);
        }
        $parsedRecommendation = $text;
    }
    // 5. Lists (Certificates, Programs, Roadmap)
    // Convert arrays to objects for the views to consume seamlessly
    $certs = json_decode(json_encode($certificates ?? []));
    $progs = json_decode(json_encode($programs ?? []));
    $planSteps = $roadmap ?? [];

    $tempPlanSteps = json_decode(json_encode($planSteps), true);
    $planSteps = [];
    if (!empty($tempPlanSteps)) {
        foreach($tempPlanSteps as $k => $step) {
            if(is_array($step)) {
                $planSteps[] = (object)[
                    'period' => $step['period'] ?? ('الخطوة ' . ($k + 1)),
                    'title' => $step['title'] ?? '',
                    'icon' => $step['icon'] ?? 'bi-calendar-check',
                ];
            } else if (is_string($step)) {
                $planSteps[] = (object)[
                    'period' => 'الخطوة ' . ($k + 1),
                    'title' => $step,
                    'icon' => 'bi-calendar-check',
                ];
            }
        }
    }

    $radarLabels = $chart_data['labels'] ?? [];
    $radarData = $chart_data['data'] ?? [];

    // Replace the global $assessment array with the Object!
    $assessment = $assessmentObj;
    $result = $resObj;

    // Calculate colors based on result level
    $circleColor = '#1a2b56';
    $lc = 'primary'; 
    if (isset($levelKey)) {
        if ($levelKey === 'high' || $levelKey === 'excellent' || $levelKey === 'advanced') {
            $circleColor = '#22c55e';
            $lc = 'success';
        } elseif ($levelKey === 'medium' || $levelKey === 'good' || $levelKey === 'average') {
            $circleColor = '#f59e0b';
            $lc = 'warning';
        } elseif ($levelKey === 'low' || $levelKey === 'poor' || $levelKey === 'weak') {
            $circleColor = '#ef4444';
            $lc = 'danger';
        }
    } else {
        // For highest_dimension scoring (e.g. Leadership Style)
        $lbl = $mainLvl['label'] ?? '';
        if (mb_strpos($lbl, 'ديمقراط') !== false || mb_strpos($lbl, 'متميز') !== false || mb_strpos($lbl, 'مرتفع') !== false) {
            $circleColor = '#22c55e';
            $lc = 'success';
        } elseif (mb_strpos($lbl, 'أوتوقراط') !== false || mb_strpos($lbl, 'تسلط') !== false || mb_strpos($lbl, 'ضعيف') !== false || mb_strpos($lbl, 'منخفض') !== false) {
            $circleColor = '#ef4444';
            $lc = 'danger';
        } else {
            $circleColor = '#f59e0b';
            $lc = 'warning';
        }
    }

    $practicalTips = is_array($recObj?->practical_tips_ar) && !empty($recObj->practical_tips_ar) 
        ? $recObj->practical_tips_ar 
        : (!empty($practical_tips) && is_array($practical_tips) ? $practical_tips : []);
@endphp


<div class="infographic-report">
    <!-- ==================== PAGE 1 ==================== -->
    <div class="a4-page">
        
        <!-- Header -->
        <div class="report-header px-4 pt-3">
            <div class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="dar al rouaa" style="height: 50px; filter: brightness(0) invert(1); margin: 0;">
            </div>
            <div class="header-badge">
                <i class="bi bi-patch-check-fill me-1"></i> تقرير احترافي مدعوم بالتحليل العلمي
            </div>
        </div>

        <div class="text-center mt-3 px-4">
            <h1 class="report-main-title mb-2">تقرير نتائج {{ $assessment->title_ar }}</h1>
            <p class="report-subtitle mb-0">{{ $assessment->subtitle_ar ?? 'تقرير احترافي يساعدك على فهم نتائجك واتخاذ قرارات تطوير أكثر وضوحاً.' }}</p>
        </div>

        <div class="page-padding mt-4">
            
            <!-- Metadata - Print View Only (1x3 Grid) -->
            <div class="d-none d-print-block print-metadata-wrapper mb-4">
                <table class="print-metadata-table w-100">
                    <tr>
                        <td style="width: 33.33%; border-left: 1px solid rgba(8, 145, 178, 0.08) !important;">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="print-meta-icon print-meta-solid"><i class="bi bi-person-fill"></i></div>
                                <div class="ms-3 text-end">
                                    <div class="print-meta-label">المستفيد</div>
                                    <div class="print-meta-value">{{ auth()->user()?->name ?? 'معاينة بالنظام' }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 33.33%; border-left: 1px solid rgba(8, 145, 178, 0.08) !important;">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="print-meta-icon print-meta-soft"><i class="bi bi-calendar3-fill"></i></div>
                                <div class="ms-3 text-end">
                                    <div class="print-meta-label">تاريخ التنفيذ</div>
                                    <div class="print-meta-value">{{ \Carbon\Carbon::parse($result->created_at ?? $result->calculated_at ?? now())->format('d M Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 33.33%;">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="print-meta-icon print-meta-soft"><i class="bi bi-clipboard-fill"></i></div>
                                <div class="ms-3 text-end">
                                    <div class="print-meta-label">رقم التقرير</div>
                                    <div class="print-meta-value">{{ !empty($assessment->report_code) ? strtoupper($assessment->report_code) : 'REP' }}-{{ strtoupper(substr($result->id, 0, 8)) }}</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Metadata - Screen View Only (3 horizontal cards with vertical dividers) -->
            <div class="meta-container-card mb-4 d-print-none">
                <div class="row g-0 align-items-center">
                    <div class="col-4 py-2 border-left-divider">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center text-center">
                            <div class="meta-icon-box meta-icon-solid mb-2 mb-sm-0"><i class="bi bi-person-fill"></i></div>
                            <div class="text-sm-end ms-sm-3">
                                <div class="meta-label">المستفيد</div>
                                <div class="meta-value" style="font-size: 0.8rem; white-space: normal;">{{ auth()->user()?->name ?? 'معاينة بالنظام' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-2 border-left-divider">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center text-center">
                            <div class="meta-icon-box meta-icon-soft mb-2 mb-sm-0"><i class="bi bi-calendar3-fill"></i></div>
                            <div class="text-sm-end ms-sm-3">
                                <div class="meta-label">تاريخ التنفيذ</div>
                                <div class="meta-value" style="font-size: 0.8rem; white-space: normal;">{{ \Carbon\Carbon::parse($result->created_at ?? $result->calculated_at ?? now())->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-2">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center text-center">
                            <div class="meta-icon-box meta-icon-soft mb-2 mb-sm-0"><i class="bi bi-clipboard-fill"></i></div>
                            <div class="text-sm-end ms-sm-3">
                                <div class="meta-label">رقم التقرير</div>
                                <div class="meta-value" style="font-size: 0.8rem; white-space: normal;">{{ !empty($assessment->report_code) ? strtoupper($assessment->report_code) : 'REP' }}-{{ strtoupper(substr($result->id, 0, 8)) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($assessmentObj->scoring_type === 'perceptual_styles')
            @php
                $styleScores = ['visual' => 0, 'auditory' => 0, 'kinesthetic' => 0];
                foreach($resObj->dimensionScores as $ds) {
                    $n = $ds->dimension->name_ar;
                    if (mb_strpos($n, 'بصري') !== false) $styleScores['visual'] = $ds->score;
                    elseif (mb_strpos($n, 'سمعي') !== false) $styleScores['auditory'] = $ds->score;
                    elseif (mb_strpos($n, 'حسي') !== false) $styleScores['kinesthetic'] = $ds->score;
                }

                $recTitle = $recObj?->title_ar ?? $recommendation_title ?? 'النمط الإدراكي الغالب';
                $recDesc = $recObj?->description_ar ?? (!empty($parsedRecommendation) ? $parsedRecommendation : '');

                $howToLearn = is_array($recObj?->how_to_learn_ar) && !empty($recObj->how_to_learn_ar) 
                    ? $recObj->how_to_learn_ar 
                    : (!empty($how_to_learn) && is_array($how_to_learn) ? $how_to_learn : []);

                $strengthsData = is_array($recObj?->strengths_ar) && !empty($recObj->strengths_ar) 
                    ? $recObj->strengths_ar 
                    : (isset($strengths_list) && is_array($strengths_list) ? $strengths_list : []);

                $devAreasData = is_array($recObj?->development_areas_ar) && !empty($recObj->development_areas_ar) 
                    ? $recObj->development_areas_ar 
                    : (!empty($development_areas) && is_array($development_areas) ? $development_areas : []);

                $progsData = is_array($recObj?->programs_ar) && !empty($recObj->programs_ar) 
                    ? $recObj->programs_ar 
                    : (!empty($programs) && is_array($programs) ? $programs : []);

                $progsIntro = $recObj?->programs_intro_ar ?? $programs_intro ?? 'البرامج التدريبية المقترحة لك';
                $progsOutro = $recObj?->programs_outro_ar ?? $programs_outro ?? '';

                $parseStringItem = function($val) {
                    if (is_object($val)) {
                        return $val->title ?? $val->name ?? $val->desc ?? '';
                    }
                    if (is_array($val)) {
                        return $val['title'] ?? $val['name'] ?? $val['desc'] ?? '';
                    }
                    return (string) $val;
                };

                // Main icon for dominant style
                $mainIcon = 'bi-brain';
                if (mb_strpos($recTitle, 'بصري') !== false && mb_strpos($recTitle, 'سمعي') === false && mb_strpos($recTitle, 'حسي') === false) {
                    $mainIcon = 'bi-eye-fill';
                } elseif (mb_strpos($recTitle, 'سمعي') !== false && mb_strpos($recTitle, 'بصري') === false && mb_strpos($recTitle, 'حسي') === false) {
                    $mainIcon = 'bi-headphones';
                } elseif (mb_strpos($recTitle, 'حسي') !== false && mb_strpos($recTitle, 'بصري') === false && mb_strpos($recTitle, 'سمعي') === false) {
                    $mainIcon = 'bi-hand-index-thumb-fill';
                } elseif (mb_strpos($recTitle, 'متوازن') !== false) {
                    $mainIcon = 'bi-diagram-3-fill';
                } else {
                    $mainIcon = 'bi-intersect';
                }
            @endphp

            <!-- Perceptual Styles Custom Report View -->
            <div class="perceptual-styles-report">
                
                <!-- Main Style Summary Banner -->
                <div class="row g-4 mb-4 align-items-stretch">
                    <!-- Dominant Style Info Card -->
                    <div class="col-md-7 col-12 d-flex">
                        <div class="main-score-card w-100 p-4 d-flex flex-column justify-content-between border-0 shadow-sm rounded-4" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); color: #ffffff;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-bold" style="font-size: 0.8rem;">
                                        <i class="bi bi-star-fill text-warning me-1"></i> النمط الإدراكي الغالب لديك
                                    </span>
                                </div>
                                <div class="fs-2 text-warning"><i class="bi {{ $mainIcon }}"></i></div>
                            </div>

                            <div class="my-2">
                                <h2 class="fw-extrabold text-white mb-2" style="font-size: 1.8rem; font-family: 'Tajawal', sans-serif;">{{ $recTitle }}</h2>
                                <p class="text-light opacity-90 lh-base mb-0" style="font-size: 0.92rem; text-align: justify;">
                                    {{ $recDesc }}
                                </p>
                            </div>

                            <div class="d-flex align-items-center justify-content-between pt-3 mt-2 border-top border-white border-opacity-10">
                                <div class="small text-light opacity-75">مقياس ثلاثي الأنماط المعيارية (20 درجة لكل نمط)</div>
                                <div class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold fs-6">
                                    <i class="bi bi-check-circle-fill me-1"></i> تشخيص مؤكد
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Scores Breakdown Card -->
                    <div class="col-md-5 col-12 d-flex">
                        <div class="card w-100 p-4 border-0 shadow-sm rounded-4 d-flex flex-column justify-content-between" style="background: #ffffff;">
                            <h5 class="fw-bold text-darkblue mb-3">
                                <i class="bi bi-bar-chart-steps text-primary me-2"></i> درجاتك في الأنماط الإدراكية
                            </h5>

                            <div class="d-flex flex-column gap-3 my-auto">
                                <!-- Visual -->
                                <div class="style-progress-item p-3 rounded-3" style="background: #f0f7ff; border: 1px solid #dbeafe;">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold text-navy"><i class="bi bi-eye-fill text-primary me-2"></i> النمط البصري</span>
                                        <span class="fw-extrabold text-primary">{{ $styleScores['visual'] }} / 20</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background-color: #dbeafe; border-radius: 10px;">
                                        <div class="progress-bar bg-primary rounded-pill" style="width: {{ round(($styleScores['visual'] / 20) * 100) }}%;"></div>
                                    </div>
                                </div>

                                <!-- Auditory -->
                                <div class="style-progress-item p-3 rounded-3" style="background: #f0fdf4; border: 1px solid #dcfce7;">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold text-navy"><i class="bi bi-headphones text-success me-2"></i> النمط السمعي</span>
                                        <span class="fw-extrabold text-success">{{ $styleScores['auditory'] }} / 20</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background-color: #dcfce7; border-radius: 10px;">
                                        <div class="progress-bar bg-success rounded-pill" style="width: {{ round(($styleScores['auditory'] / 20) * 100) }}%;"></div>
                                    </div>
                                </div>

                                <!-- Kinesthetic -->
                                <div class="style-progress-item p-3 rounded-3" style="background: #fffbebfb; border: 1px solid #fef3c7;">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold text-navy"><i class="bi bi-hand-index-thumb-fill text-warning me-2"></i> النمط الحسي (العملي)</span>
                                        <span class="fw-extrabold text-warning-emphasis">{{ $styleScores['kinesthetic'] }} / 20</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background-color: #fef3c7; border-radius: 10px;">
                                        <div class="progress-bar bg-warning rounded-pill" style="width: {{ round(($styleScores['kinesthetic'] / 20) * 100) }}%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- How to Learn Best Section -->
                @if(!empty($howToLearn))
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #ffffff;">
                    <h5 class="fw-bold text-darkblue mb-3">
                        <i class="bi bi-lightbulb-fill text-warning me-2"></i> كيف تتعلم بشكل أفضل؟
                    </h5>
                    <div class="row g-3">
                        @foreach($howToLearn as $item)
                        <div class="col-md-6 col-12">
                            <div class="d-flex align-items-center p-3 rounded-3 h-100" style="background: #f8fafc; border: 1px solid #f1f5f9;">
                                <div class="badge bg-primary-subtle text-primary rounded-circle p-2 me-3" style="width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <i class="bi bi-check2-circle fs-5"></i>
                                </div>
                                <span class="fw-semibold text-dark fs-6" style="line-height: 1.4;">{{ $parseStringItem($item) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Strengths & Development Areas Side-by-Side -->
                <div class="row g-4 mb-4">
                    <!-- Strengths -->
                    @if(!empty($strengthsData))
                    <div class="col-md-6 col-12 d-flex">
                        <div class="card w-100 border-0 shadow-sm rounded-4 p-4" style="background: #ffffff; border-top: 4px solid #10b981 !important;">
                            <h5 class="fw-bold text-success mb-3">
                                <i class="bi bi-patch-check-fill me-2"></i> نقاط القوة لديك
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                @foreach($strengthsData as $s)
                                <div class="d-flex align-items-start p-2 rounded-2" style="background: #f0fdf4;">
                                    <i class="bi bi-check-circle-fill text-success me-2 mt-1"></i>
                                    <span class="fw-medium text-dark small" style="line-height: 1.5;">{{ $parseStringItem($s) }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Development Areas -->
                    @if(!empty($devAreasData))
                    <div class="col-md-6 col-12 d-flex">
                        <div class="card w-100 border-0 shadow-sm rounded-4 p-4" style="background: #ffffff; border-top: 4px solid #f59e0b !important;">
                            <h5 class="fw-bold text-warning-emphasis mb-3">
                                <i class="bi bi-graph-up-arrow me-2"></i> الجوانب التي يمكن تطويرها
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                @foreach($devAreasData as $d)
                                <div class="d-flex align-items-start p-2 rounded-2" style="background: #fffbeb;">
                                    <i class="bi bi-arrow-up-right-circle-fill text-warning me-2 mt-1"></i>
                                    <span class="fw-medium text-dark small" style="line-height: 1.5;">{{ $parseStringItem($d) }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Suggested Training Programs -->
                @if(!empty($progsData))
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #ffffff;">
                    <h5 class="fw-bold text-darkblue mb-1">
                        <i class="bi bi-journal-bookmark-fill text-primary me-2"></i> البرامج التدريبية المقترحة لك
                    </h5>
                    @if($progsIntro)
                    <p class="text-muted small mb-3">{{ $progsIntro }}</p>
                    @endif
                    <div class="row g-3">
                        @foreach($progsData as $prog)
                        @php
                            $pTitle = $parseStringItem($prog);
                            $pIcon = is_array($prog) ? ($prog['icon'] ?? 'bi-book') : (is_object($prog) ? ($prog->icon ?? 'bi-book') : 'bi-book');
                        @endphp
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="p-3 rounded-3 h-100 d-flex align-items-center gap-3 border shadow-2hover" style="background: #f8fafc; border-color: #e2e8f0 !important; transition: all 0.2s;">
                                <div class="rounded-circle p-2 bg-white text-primary shadow-sm flex-shrink-0" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                                    <i class="bi {{ $pIcon }}"></i>
                                </div>
                                <span class="fw-bold text-navy small" style="line-height: 1.3;">{{ $pTitle }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($progsOutro)
                    <div class="alert alert-light border border-opacity-50 mt-3 mb-0 text-muted small text-center rounded-3" style="background: #f8fafc;">
                        <i class="bi bi-info-circle text-primary me-1"></i> {{ $progsOutro }}
                    </div>
                    @endif
                </div>
                @endif

                <!-- Practical Tips Section -->
                @if(!empty($practicalTips))
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-2" style="background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%); border: 1px solid #dbeafe !important;">
                    <h5 class="fw-bold text-darkblue mb-3">
                        <i class="bi bi-gear-wide-connected text-primary me-2"></i> نصائح عملية لك
                    </h5>
                    <div class="row g-3">
                        @foreach($practicalTips as $tip)
                        <div class="col-md-6 col-12">
                            <div class="d-flex align-items-start p-3 bg-white rounded-3 border shadow-sm">
                                <i class="bi bi-shield-check text-primary fs-5 me-2 mt-0"></i>
                                <span class="fw-semibold text-dark small" style="line-height: 1.4;">{{ $parseStringItem($tip) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            @else
            <!-- Score & Summary side-by-side row -->
            <div class="row g-4 mb-4 align-items-start score-summary-row">
                <!-- Score Card -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="main-score-card w-100 p-4 d-flex flex-column justify-content-between">
                        <!-- Card Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-section-title mb-0">النتيجة العامة</h4>
                            <div class="card-section-icon"><i class="bi bi-award"></i></div>
                        </div>

                        <div class="row align-items-center">
                            <!-- Gauge -->
                            <div class="col-sm-5 col-5 text-center py-2 d-flex justify-content-center align-items-center">
                                <div class="rounded-circle d-flex justify-content-center align-items-center shadow-sm score-gauge-wrapper" 
                                     style="width: 120px; height: 120px; background: conic-gradient({{ $circleColor }} 0% {{ $pct }}%, #f3f4f6 {{ $pct }}% 100%); padding: 9px; position: relative;">
                                    <div class="rounded-circle bg-white d-flex flex-column justify-content-center align-items-center" style="width: 100%; height: 100%;">
                                        <span style="font-size: 1.9rem; font-weight: 900; color: #1a2b56; line-height: 1;">{{ $pct }}%</span>
                                        <span style="font-size: 0.58rem; color: #64748b; font-weight: bold; margin-top: 4px; white-space: nowrap;">النتيجة الكلية</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Level Info -->
                            <div class="col-sm-7 col-7 py-2 text-start px-2">
                                <div class="score-level-label">{{ $isHighestDimension ? 'النمط السائد:' : 'مستوى الجاهزية:' }}</div>
                                <div class="score-level-value text-{{ $lc }} mb-1">{{ $mainLvl['label'] }}</div>
                                <div class="score-level-range text-muted" style="font-size: 0.72rem; font-weight: 500;">
                                    @if($lc === 'success')
                                        النطاق (70 - 100)
                                    @elseif($lc === 'warning')
                                        النطاق (40 - 69)
                                    @else
                                        النطاق (0 - 39)
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress-container mt-4 mb-2">
                            @php
                                $pinPos = $pct; 
                            @endphp
                            <div class="progress-pin text-darkblue" style="right: {{ $pinPos }}%;"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="progress-track">
                                <div class="progress-segment" style="background-color: #ef4444;"></div>
                                <div class="progress-segment" style="background-color: #f59e0b;"></div>
                                <div class="progress-segment" style="background-color: #22c55e;"></div>
                            </div>
                            <div class="progress-labels d-flex justify-content-between mt-2" style="font-size: 0.68rem; font-weight: 500;">
                                <div class="progress-label text-danger" style="text-align: right;">منخفض<br>(0 - 39)</div>
                                <div class="progress-label text-warning" style="text-align: center;">متوسط<br>(40 - 69)</div>
                                <div class="progress-label text-success" style="text-align: left;">مرتفع<br>(70 - 100)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Card -->
                <div class="col-md-6 col-12 d-flex">
                    <div class="summary-card w-100 p-4 d-flex flex-column">
                        <!-- Card Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-section-title mb-0">ملخص التقرير</h4>
                            <div class="card-section-icon"><i class="bi bi-file-text"></i></div>
                        </div>
                        <div class="flex-grow-1">
                            @php
                                $sentences = array_filter(array_map('trim', explode('.', $parsedRecommendation)));
                            @endphp
                            <div class="summary-text mb-0" style="text-align: justify; font-size: 0.88rem; line-height: 1.7; color: #475569;">
                                @foreach($sentences as $sentence)
                                    @if(!empty($sentence))
                                        <div class="mb-2 d-flex align-items-start gap-2">
                                            <span class="text-primary" style="font-weight: bold;">•</span>
                                            <span>{{ $sentence }}.</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Radar Chart -->
            @if(!$isHighestDimension && count($radarLabels) > 1)
            <div class="row gx-4 mb-4">
                @if(count($radarLabels) >= 3)
                <div class="col-12 mb-4">
                    <div class="radar-card text-center">
                        <div class="fw-bold text-darkblue mb-3" style="font-size: 1.3rem;">مستوى المهارات</div>
                        <div style="position: relative; height: 350px; max-width: 500px; margin: 0 auto; width: 100%;">
                            <canvas id="skillsRadar"></canvas>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Dimensions Results Accordion -->
            @if(!empty($dimensions) && count($dimensions) > 0)
                @php
                    $hasAnyInterpretation = false;
                    foreach($dimensions as $d) {
                        if(!empty($d['interpretation'])) {
                            $hasAnyInterpretation = true;
                            break;
                        }
                    }
                @endphp
                @if($hasAnyInterpretation)
                <h2 class="p2-main-title mt-4 mb-3"><i class="bi bi-layers text-darkblue"></i>تفسير المهارات</h2>
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-0">
                        <div class="accordion" id="dimensionsAccordion">
                            @foreach($dimensions as $index => $dim)
                            @php $hasInterp = !empty($dim['interpretation']); @endphp
                            <div class="accordion-item border-0 {{ !$loop->last ? 'border-bottom' : '' }} dimension-detail-item">
                                @if($hasInterp)
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed px-4 py-3 fw-bold text-darkblue bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}" style="box-shadow: none;">
                                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center w-100 pe-3 gap-2">
                                                <span style="font-size: 1.05rem;">{{ $dim['name'] }}</span>
                                                <span class="badge bg-primary rounded-pill px-3 py-2" style="font-size: 0.85rem; font-weight: normal;">
                                                     الدرجة: {{ $dim['score'] }} من {{ $dim['max_score'] }}@if(!$isHighestDimension) | المستوى: {{ $dim['display_level'] ?? $dim['level'] }}@endif
                                                 </span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#dimensionsAccordion">
                                        <div class="accordion-body px-4 pb-4 pt-1">
                                            <p class="text-muted mb-0" style="line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                                                {{ $dim['interpretation'] }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="px-4 py-3 fw-bold text-darkblue bg-white d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center w-100 gap-2">
                                        <span style="font-size: 1.05rem;">{{ $dim['name'] }}</span>
                                        <span class="badge bg-primary rounded-pill px-3 py-2" style="font-size: 0.85rem; font-weight: normal; margin-left: 20px;">
                                             الدرجة: {{ $dim['score'] }} من {{ $dim['max_score'] }}@if(!$isHighestDimension) | المستوى: {{ $dim['display_level'] ?? $dim['level'] }}@endif
                                         </span>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            @endif

        </div>
    </div>


    <!-- ==================== PAGE 2 ==================== -->
    <div class="a4-page">
        <div class="page-padding pt-5 mt-4">
            
            <!-- Practical Tips Section -->
            @if(!empty($practicalTips))
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%); border: 1px solid #dbeafe !important;">
                <h5 class="fw-bold text-darkblue mb-3">
                    <i class="bi bi-gear-wide-connected text-primary me-2"></i> التوجيهات والنصائح العملية
                </h5>
                <div class="row g-3">
                    @foreach($practicalTips as $tip)
                    <div class="col-md-12 col-12">
                        <div class="d-flex align-items-start p-3 bg-white rounded-3 border shadow-sm">
                            <i class="bi bi-shield-check text-primary fs-5 me-2 mt-0"></i>
                            <span class="fw-semibold text-dark small" style="line-height: 1.6; font-size: 0.95rem;">{{ is_object($tip) ? ($tip->title ?? $tip->name ?? $tip->desc ?? '') : (is_array($tip) ? ($tip['title'] ?? $tip['name'] ?? $tip['desc'] ?? '') : (string) $tip) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Training Programs Section -->
            @if(!empty($progs))
            <div class="mb-4">
                <div class="p2-section-title mb-3"><i class="bi bi-mortarboard-fill text-darkblue"></i> البرامج التدريبية المقترحة</div>
                
                @if(!empty($programs_intro))
                    <p class="mb-3" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $programs_intro }}
                    </p>
                @endif

                <!-- Training Programs Grid View (All Viewports) -->
                <div>
                    <div class="row row-cols-3 row-cols-sm-3 row-cols-md-4 g-2 g-md-3 justify-content-center">
                        @foreach($progs as $prog)
                        <div class="col">
                            <div class="program-card h-100 text-center">
                                <div class="program-icon-wrapper">
                                    @if(isset($prog->icon) && (str_starts_with($prog->icon, 'http') || str_starts_with($prog->icon, '/')))
                                        <img src="{{ str_starts_with($prog->icon, '/') ? asset($prog->icon) : $prog->icon }}" alt="{{ $prog->title ?? '' }}" class="program-img-icon">
                                    @else
                                        <i class="bi {{ $prog->icon ?? 'bi-journal-bookmark' }} program-bi-icon"></i>
                                    @endif
                                </div>
                                <h5 class="program-title">{{ $prog->title ?? '' }}</h5>
                                <p class="program-desc mb-0 d-none d-sm-block">{{ $prog->description ?? 'برنامج تدريبي مخصص لتنمية المهارات وتعزيز الكفاءة المهنية.' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if(!empty($programs_outro))
                    <p class="mt-3 mb-2" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $programs_outro }}
                    </p>
                @endif
            </div>
            @endif

            <!-- Certificates Section -->
            @if(!empty($certs))
            <div class="mb-4">
                <div class="p2-section-title mb-3"><i class="bi bi-award-fill text-darkblue"></i> الشهادات الاحترافية المناسبة</div>
                <div class="p2-section-subtitle mb-3 text-muted small">قد تكون مناسبة لك بناءً على نتائج هذا المقياس</div>
                
                @if(!empty($certificates_intro))
                    <p class="mb-3" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $certificates_intro }}
                    </p>
                @endif
                
                <div class="row row-cols-3 row-cols-sm-3 row-cols-md-4 g-2 g-md-3 justify-content-center pt-2">
                    @foreach($certs as $cert)
                    <div class="col">
                        <div class="program-card h-100 text-center">
                            <div class="program-icon-wrapper">
                                @if(isset($cert->icon) && (str_starts_with($cert->icon, 'http') || str_starts_with($cert->icon, '/')))
                                    <img src="{{ str_starts_with($cert->icon, '/') ? asset($cert->icon) : $cert->icon }}" alt="{{ $cert->title ?? '' }}" class="program-img-icon">
                                @else
                                    <div class="cert-icon-inner {{ $cert->icon ?? 'blue-hexagon' }}">
                                        {{ substr(strtoupper($cert->title ?? ''), 0, 4) }}
                                    </div>
                                @endif
                            </div>
                            <h5 class="program-title">{{ $cert->title ?? '' }}</h5>
                            @if(!empty($cert->subtitle))
                                <p class="program-desc d-none d-sm-block">{{ $cert->subtitle }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- 30 Day Plan Section -->
            @if(count($planSteps) > 0)
            <div class="mb-4">
                <div class="p2-section-title mb-3"><i class="bi bi-calendar3 text-darkblue"></i> خطة تطوير مقترحة</div>
                
                @if(!empty($roadmap_intro))
                    <p class="mb-3" style="color: #1a2b56; line-height: 1.8; font-size: 0.95rem; text-align: justify;">
                        {{ $roadmap_intro }}
                    </p>
                @endif

                <div class="row gx-2 gy-3 mt-3 justify-content-center align-items-stretch">
                    @foreach($planSteps as $index => $step)
                    <div class="col-lg-{{ count($planSteps) >= 4 ? '3' : (count($planSteps) == 3 ? '4' : (count($planSteps) == 2 ? '6' : '12')) }} col-md-6 col-4 d-flex align-items-stretch position-relative">
                        <div class="plan-card w-100">
                            <div class="plan-card-header d-flex justify-content-between align-items-center">
                                <span class="plan-card-period">{{ $step->period }}</span>
                                <div class="plan-card-icon"><i class="bi {{ $step->icon ?? 'bi-calendar-check' }}"></i></div>
                            </div>
                            <div class="plan-card-body">
                                <p class="plan-card-text">{{ $step->title }}</p>
                            </div>
                        </div>
                        @if(!$loop->last && count($planSteps) > 1 && count($planSteps) <= 4)
                        <div class="plan-arrow d-none d-lg-flex"><i class="bi bi-chevron-left text-muted"></i></div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endif

        </div>

        <!-- Footer Page 2 -->
        <div class="mt-auto py-4 text-center quote-footer-card">
            <h6 class="text-darkblue fw-bold mb-2">رسالتنا لك</h6>
            <p class="mb-0 mx-auto quote-footer-text">
                نتائج هذا المقياس تمثل نقطة بداية لفهم قدراتك. وننصحك بالاستفادة منها في وضع خطة تطوير مستمرة تتناسب مع أهدافك المهنية والشخصية.
            </p>
        </div>
    </div>
</div>

<div class="container mt-4 mb-5 no-print d-flex justify-content-center" style="gap: 15px;">
    <a href="{{ route('dashboard.assessments') }}" class="btn btn-light rounded-circle shadow-sm text-darkblue" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;" title="العودة للرئيسية">
        <i class="bi bi-house-door-fill"></i>
    </a>
    <button onclick="window.print()" class="btn btn-primary rounded-circle shadow-lg" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;" title="طباعة التقرير">
        <i class="bi bi-printer-fill"></i>
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('skillsRadar');
    if(ctx) {
        const labels = {!! json_encode($radarLabels) !!};
        const data = {!! json_encode($radarData) !!};
        
        // If there are less than 3 dimensions, a radar chart won't render a polygon. Use bar instead.
        const chartType = labels.length < 3 ? 'bar' : 'radar';
        
        const config = {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: 'النسبة المئوية',
                    data: data,
                    backgroundColor: chartType === 'bar' ? '#1e3a8a' : 'rgba(196, 209, 228, 0.7)',
                    borderColor: '#1e3a8a',
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#1e3a8a',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverBackgroundColor: '#1e3a8a',
                    pointHoverBorderColor: '#ffffff'
                }]
            },
            options: {
                layout: { padding: 35 },
                responsive: true,
                maintainAspectRatio: false,
                animation: false,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        display: false
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        if (chartType === 'radar') {
            config.options.scales = {
                r: {
                    min: 0,
                    max: 100,
                    angleLines: { color: '#e2e8f0' },
                    grid: { color: '#e2e8f0' },
                    pointLabels: {
                        font: { family: 'Tajawal', size: 11, weight: 'bold' },
                        color: '#0f172a',
                        callback: function(label, index) {
                            if (typeof index !== 'undefined' && data && typeof data[index] !== 'undefined') {
                                return [label, data[index] + '%'];
                            }
                            return label;
                        }
                    },
                    ticks: { display: false, stepSize: 20 }
                }
            };
        } else {
            config.options.scales = {
                y: {
                    min: 0, max: 100,
                    grid: { color: '#e2e8f0' },
                    ticks: { font: { family: 'Tajawal' } }
                },
                x: {
                    grid: { display: false },
                    ticks: { font: { family: 'Tajawal', weight: 'bold' }, color: '#0f172a' }
                }
            };
        }

        new Chart(ctx, config);
    }
});
</script>
@endsection
