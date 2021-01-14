<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Language;
use App\Models\PriceSection;
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

        return view('frontend.home', compact('employees', 'activeLanguages', 'priceSections'));
    }
}
