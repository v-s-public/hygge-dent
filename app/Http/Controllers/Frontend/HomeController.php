<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Language;
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
        app()->setLocale('ru');
        $employees = Employee::all();
        $activeLanguages = Language::where('language_status', true)->get();
        return view('frontend.home', compact('employees', 'activeLanguages'));
    }
}
