<?php

namespace App\Http\Controllers\Admin\Content\AboutUs;

use App\Http\Controllers\Controller;
use App\Traits\Translation;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Content\AboutUs\ResultRequest;
use App\Models\Content\AboutUs\Result;

class ResultsController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.about-us.results';
    protected string $routePrefix = 'admin.content.about-us.results';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $routePrefix = $this->routePrefix;
        return view($this->folderPrefix . '.index', compact('routePrefix'));
    }

    /**
     * Returns JSON with all Price Position entities
     *
     * @return mixed
     * @throws \Exception
     */
    public function resourceList()
    {
        $model = Result::all();
        $routePrefix = $this->routePrefix;
        $primaryKey = 'result_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('title', function ($model){
                return $model->title;
            })
            ->addColumn('icon', function($model) {
                return "<i class='{$model->icon}'></i>";
            })
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $primaryKey) {
                return view('admin.common.actions.grid_actions', compact('model', 'routePrefix', 'actions', 'primaryKey'));
            })
            ->rawColumns(['actions', 'icon'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;
        return view($this->folderPrefix . '.create', compact('routePrefix', 'activeLanguages'));
    }

    /**
     * @param ResultRequest $request
     * @return RedirectResponse
     */
    public function store(ResultRequest $request) : RedirectResponse
    {
        Result::create($this->fillData($request));

        return redirect(route($this->routePrefix . '.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id) : View
    {
        $model = Result::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.show', compact('model', 'routePrefix', 'activeLanguages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id) : View
    {
        $model = Result::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'activeLanguages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ResultRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(ResultRequest $request, int $id) : RedirectResponse
    {
        Result::find($id)->update($this->fillData($request));

        return redirect(route($this->routePrefix . '.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id) : void
    {
        Result::find($id)->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param ResultRequest $request
     * @return array
     */
    private function fillData(ResultRequest $request) : array
    {
        return [
            'title' => $this->prepareTranslatesForInsertByFieldName($request, 'title'),
            'icon' => $request->get('icon'),
            'count' => $request->get('count'),
        ];
    }
}
