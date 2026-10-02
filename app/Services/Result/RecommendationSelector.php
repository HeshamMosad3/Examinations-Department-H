<?php

namespace App\Services\Result;

use App\Models\Assessment;
use App\Models\Recommendation;

class RecommendationSelector
{
    /**
     * Select the appropriate recommendation based on scoring type and thresholds.
     */
    public function select(Assessment $assessment, array $scoreData): ?Recommendation
    {
        $scoringType = $assessment->scoring_type ?? 'overall_score';

        if ($scoringType === 'perceptual_styles') {
            return $this->selectForPerceptualStyles($assessment, $scoreData['dimensions']);
        }

        if ($scoringType === 'highest_dimension') {
            return $this->selectByHighestDimension($assessment, $scoreData['dimensions']);
        }

        if ($scoringType === 'overall_score') {
            return $this->selectByThresholds($assessment, $scoreData['total_score']);
        }

        return null;
    }

    /**
     * Classification logic for Perceptual Styles (Visual, Auditory, Kinesthetic).
     */
    private function selectForPerceptualStyles(Assessment $assessment, array $dimensions): ?Recommendation
    {
        $vScore = 0;
        $aScore = 0;
        $kScore = 0;

        foreach ($dimensions as $dim) {
            $name = $dim['name'] ?? '';
            if (mb_strpos($name, 'بصري') !== false) {
                $vScore = $dim['score'];
            } elseif (mb_strpos($name, 'سمعي') !== false) {
                $aScore = $dim['score'];
            } elseif (mb_strpos($name, 'حسي') !== false) {
                $kScore = $dim['score'];
            }
        }

        $targetLevel = self::classifyPerceptual($vScore, $aScore, $kScore);
        $rec =$assessment->recommendations->firstWhere('level', $targetLevel);
        if (!$rec) {
            $dataFile = database_path('data/assessments/28/recommendations.php');
            if (!file_exists($dataFile)) {
                $dataFile = database_path('data/assessments/perceptual_styles/recommendations.php');
            }
            if (file_exists($dataFile)) {
                $allRecs = require $dataFile;
                $found = collect($allRecs)->firstWhere('level', $targetLevel);
                if ($found) {
                    $rec = new Recommendation(array_merge($found, ['assessment_id' => $assessment->id]));
                }
            }
        }
        return $rec;
    }

    /**
     * Classify Visual/Auditory/Kinesthetic scores into one of the 7 perceptual levels.
     */
    public static function classifyPerceptual(int $vScore, int $aScore, int $kScore): string
    {
        $styles = [
            ['key' => 'visual', 'score' => $vScore],
            ['key' => 'auditory', 'score' => $aScore],
            ['key' => 'kinesthetic', 'score' => $kScore],
        ];

        usort($styles, fn($a, $b) => $b['score'] <=> $a['score']);

        [$s1, $s2, $s3] = $styles;

        // Rule 1: Balanced Style (difference across all 3 <= 2)
        if (($s1['score'] - $s3['score']) <= 2) {
            return 'balanced';
        }

        // Rule 2: Dual Style (difference between top 2 <= 2 and top 2 vs 3rd >= 3)
        if (($s1['score'] - $s2['score']) <= 2 && ($s2['score'] - $s3['score']) >= 3) {
            $keys = [$s1['key'], $s2['key']];
            sort($keys);
            $pair = implode('_', $keys);
            return match ($pair) {
                'auditory_visual' => 'dual_visual_auditory',
                'kinesthetic_visual' => 'dual_visual_kinesthetic',
                'auditory_kinesthetic' => 'dual_auditory_kinesthetic',
                default => 'dual_' . $pair,
            };
        }

        // Rule 3: Single Dominant Style
        return $s1['key'];
    }

    /**
     * Finds the highest scoring dimension and matches a recommendation by name.
     */
    private function selectByHighestDimension(Assessment $assessment, array $dimensions): ?Recommendation
    {
        if (empty($dimensions)) {
            return null;
        }

        // Find the dimension with the highest score
        $highestDim = null;
        $highestScore = -1;

        foreach ($dimensions as $dim) {
            if ($dim['score'] > $highestScore) {
                $highestScore = $dim['score'];
                $highestDim = $dim;
            }
        }

        if (!$highestDim) {
            return null;
        }

        $highestDimName = trim(str_replace('محور', '', $highestDim['name']));

        return $assessment->recommendations->first(function($rec) use ($highestDimName) {
            return strpos(trim($rec->level), $highestDimName) !== false 
                || strpos($highestDimName, trim($rec->level)) !== false;
        });
    }

    /**
     * Selects recommendation strictly based on database thresholds.
     */
    private function selectByThresholds(Assessment $assessment, int $totalScore): ?Recommendation
    {
        foreach ($assessment->recommendations as $rec) {
            if ($rec->low_threshold !== null && $rec->high_threshold !== null) {
                if ($totalScore >= $rec->low_threshold && $totalScore <= $rec->high_threshold) {
                    return $rec;
                }
            }
        }

        return null;
    }
}
