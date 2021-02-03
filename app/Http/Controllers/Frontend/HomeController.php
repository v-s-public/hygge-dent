<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Content\ForPatients\Service;
use App\Models\Content\OurTeam\Employee;
use App\Models\Settings\Language;
use App\Models\Content\Prices\PriceSection;
use App\Models\Content\Slider;
use Illuminate\Contracts\View\View;
use App\Models\Content\AboutUs\Result;

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
        $results = Result::all();
        $patientServices = Service::all();

        return view('frontend.home', compact('employees', 'activeLanguages', 'priceSections',
            'sliderFrames', 'results', 'patientServices'));
    }
}
