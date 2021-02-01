<?php

namespace App\Http\Controllers\Admin\Content\ForPatients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\ForPatients\ServiceRequest;
use App\Models\Content\ForPatients\Service;
use App\Traits\Translation;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ServicesController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.for-patients.services';
    protected string $routePrefix = 'admin.content.for-patients.services';

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
        $model = Service::all();
        $routePrefix = $this->routePrefix;
        $primaryKey = 'service_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('title', function ($model){
                return $model->title;
            })
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $primaryKey) {
                return view('admin.common.actions.grid_actions', compact('model', 'routePrefix', 'actions', 'primaryKey'));
            })
            ->rawColumns(['actions'])
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
     * @param ServiceRequest $request
     * @return RedirectResponse
     */
    public function store(ServiceRequest $request) : RedirectResponse
    {
        Service::create($this->fillData($request));

        if ($request->has('add_new')) {
            return redirect(route($this->routePrefix . '.create'));
        }

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
        $model = Service::find($id);
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
        $model = Service::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'activeLanguages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ServiceRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request, int $id) : RedirectResponse
    {
        Service::find($id)->update($this->fillData($request));

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
        Service::find($id)->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param ServiceRequest $request
     * @return array
     */
    private function fillData(ServiceRequest $request) : array
    {
        return [
            'title' => $this->prepareTranslatesForInsertByFieldName($request, 'title')
        ];
    }
}
