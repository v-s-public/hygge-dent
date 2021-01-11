<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Traits\Locale;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeesController extends Controller
{
    use Locale;

    protected string $folderPrefix = 'admin.employees';
    protected string $routePrefix = 'admin.employees';

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
            ->addColumn('actions', function($instance) use ($routePrefix, $actions, $primaryKey) {
                return view('admin.actions.grid_actions', compact('instance', 'routePrefix', 'actions', 'primaryKey'));
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
        return view($this->folderPrefix . '.create', compact('routePrefix'));
    }

    /**
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request) : RedirectResponse
    {
        $imageName = 'employee-' . time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        dd($imageName);

        /* Store $imageName name in DATABASE from HERE */

        Employee::create([
            'fio' => [
                'ua' => $request->get('fio-ua'),
                'en' => $request->get('fio-en'),
                'ru' => $request->get('fio-ru')
            ],
            'position' => [
                'ua' => $request->get('position-ua'),
                'en' => $request->get('position-en'),
                'ru' => $request->get('position-ru')
            ],
            'description' => [
                'ua' => $request->get('description-ua'),
                'en' => $request->get('description-en'),
                'ru' => $request->get('description-ru')
            ]
        ]);

        return redirect(route($this->routePrefix . '.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
