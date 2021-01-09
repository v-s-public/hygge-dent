<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Employee;
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
        $employees = Employee::all();
        return view('frontend.home', compact('employees'));
    }
}
