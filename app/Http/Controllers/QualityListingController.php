<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QualityListingController extends Controller
{
    public function __invoke(): View
    {
        return view('quality-listing', [
            'ads' => Ad::where('score', '<=', 40)->get()
        ]);
    }}
