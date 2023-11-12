<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\View\View;

class PublicListingController extends Controller
{
    public function __invoke(): View
    {
        $ads = Ad::where('score', '>', 40)
            ->orderBy('score', 'DESC')
            ->get();

        return view('public-listing', [
            'ads' => $ads,
        ]);
    }
}
