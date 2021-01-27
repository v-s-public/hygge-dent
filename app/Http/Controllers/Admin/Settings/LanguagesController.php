<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    protected string $folderPrefix = 'admin.settings.languages';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $languages = Language::all();
        $toggleLanguageUrl = route('admin.settings.languages.toggle-status');

        return view($this->folderPrefix . '.index', compact('languages', 'toggleLanguageUrl'));
    }

    public function toggleStatus(Request $request) : void
    {
        $model = Language::find($request->get('language_id'));
        $model->toggleStatus();
    }
}
