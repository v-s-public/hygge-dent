<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Models\Employee;
use Yajra\DataTables\DataTables;
use App\Traits\Locale;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Facades\Admin\ImagesService;

class EmployeesController extends Controller
{
    use Locale;

    protected string $folderPrefix = 'admin.employees';
    protected string $routePrefix = 'admin.employees';
    protected string $diskName = 'employees';

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
     * Returns JSON with all Employee entities
     *
     * @return mixed
     * @throws \Exception
     */
    public function employeesList()
    {
        $model = Employee::all();
        $routePrefix = $this->routePrefix;
        $diskName = $this->diskName;
        $primaryKey = 'employee_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('fio', function ($model){
                return $model->fio;
            })
            ->editColumn('position', function ($model){
                return $model->position;
            })
            ->editColumn('description', function ($model){
                return $model->description;
            })
            ->addColumn('image', function ($instance) use ($diskName) {
                $url = ImagesService::getOne($diskName, $instance->image);
                return "<img src='{$url}' class='rounded-circle' width='50px'/>";
            })
            ->addColumn('actions', function($instance) use ($routePrefix, $actions, $primaryKey) {
                return view('admin.common.actions.grid_actions', compact('instance', 'routePrefix', 'actions', 'primaryKey'));
            })
            ->rawColumns(['actions', 'image'])
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
        return view($this->folderPrefix . '.create', compact('routePrefix'));
    }

    /**
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request) : RedirectResponse
    {
        $imageName = ImagesService::saveOne($this->diskName, $request->image);

        Employee::create($this->fillData($request, $imageName));

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
        $model = Employee::find($id);
        $routePrefix = $this->routePrefix;

        return view($this->folderPrefix . '.show', compact('model', 'routePrefix'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id) : View
    {
        $model = Employee::find($id);
        $routePrefix = $this->routePrefix;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, int $id) : RedirectResponse
    {
        $model = Employee::find($id);
        $model->deleteImage();

        $imageName = ImagesService::saveOne($this->diskName, $request->image);

        $model->update($this->fillData($request, $imageName));

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
        $model = Employee::find($id);
        $model->deleteImage();
        $model->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param EmployeeRequest $request
     * @param string $imageName
     * @return array
     */
    private function fillData(EmployeeRequest $request, string $imageName) : array
    {
        return [
            'fio' => [
                'ua' => $request->get('fio_ua'),
                'en' => $request->get('fio_en'),
                'ru' => $request->get('fio-ru')
            ],
            'position' => [
                'ua' => $request->get('position_ua'),
                'en' => $request->get('position_en'),
                'ru' => $request->get('position_ru')
            ],
            'description' => [
                'ua' => $request->get('description_ua'),
                'en' => $request->get('description_en'),
                'ru' => $request->get('description_ru')
            ],
            'image' => $imageName
        ];
    }
}
