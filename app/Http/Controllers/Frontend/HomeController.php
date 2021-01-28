<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Content\Employee;
use App\Models\Settings\Language;
use App\Models\Content\Prices\PriceSection;
use App\Models\Content\Slider;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * App frontend
     *
     * @return View
     */
    public function index() : View
    {
        $activeLanguages = Language::where('language_status', true)->get();
        $employees = Employee::all();
        $priceSections = PriceSection::with('pricePositions')->get();
        $sliderFrames = Slider::all();

        return view('frontend.home', compact('employees', 'activeLanguages', 'priceSections', 'sliderFrames'));
    }
}
