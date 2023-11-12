<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Picture;
use App\Providers\TextFormatProvider;
use Carbon\Carbon;
use Illuminate\View\View;

class CalculateScoreController extends Controller
{
    public function __invoke(): View
    {
        $ads = Ad::all();

        foreach ($ads as $ad) {
            $this->calculateScore($ad);
        }

        return view('calculate-score', [
            'ads' => $ads,
        ]);
    }

    private function calculateScore(Ad $ad): void
    {
        $score = $this->scorePictures($ad) + $this->scoreDescription($ad) + $this->scoreCompleted($ad);

        if ($score > 100) {
            $score = 100;
        }
        if ($score < 0) {
            $score = 0;
        }

        if ($score < 40) {
            $ad->update([
                'score' => $score,
                'irrelevantSince' => Carbon::today()->format('Y-m-d')
            ]);
        } else {
            $ad->update([
                'score' => $score
            ]);
        }
    }

    private function scorePictures(Ad $ad): int
    {
        $score = 0;
        $pictures = json_decode($ad->pictures());

        if (empty($pictures)) {
            $score -= 10;
        } else {
            foreach ($pictures as $picture) {
                if (Picture::findOrFail($picture)->quality() == 'HD') {
                    $score += 20;
                } else {
                    $score += 10;
                }
            }
        }

        return $score;
    }

    private function scoreDescription(Ad $ad): int
    {
        $score = 0;
        $description = $ad->description();

        if (! empty($description)) {
            $score += 5;
            $lengthDescription = strlen($description);

            switch ($ad->typology()) {
                case 'FLAT':
                    if ($lengthDescription >= 20 && $lengthDescription <=49) {
                        $score += 10;
                    } elseif ($lengthDescription >= 50) {
                        $score += 30;
                    }
                    break;
                case 'CHALET':
                    if ($lengthDescription > 50) {
                        $score += 20;
                    }
                    break;
            }

            $formattedText = TextFormatProvider::format($description);
            $options = ['luminoso', 'nuevo', 'centrico', 'reformado', 'atico'];
            $count = 0;

            foreach ($options as $option) {
                $count += substr_count($formattedText, $option);
            }

            $score += ($count * 5);
        }

        return $score;
    }

    private function scoreCompleted(Ad $ad): int
    {
        $score = 0;
        $pictures = !empty(json_decode($ad->pictures()));

        $description = false;
        if (! empty($ad->description())) {
            $description = true;
        }

        $typology = false;
        switch ($ad->typology()) {
            case 'FLAT':
                if ($ad->houseSize()) {
                    $typology = true;
                }
                break;
            case 'CHALET':
                if ($ad->houseSize() && $ad->gardenSize()) {
                    $typology = true;
                }
                break;
        }

        if ($ad->typology() == 'GARAGE' && $pictures || $description && $pictures && $typology) {
            $score += 40;
        }

        return $score;
    }
}
