<?php

namespace App\Http\Controllers\Admin\Content\Prices;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PricePositionRequest;
use App\Models\Content\Prices\PriceSection;
use App\Models\Content\Prices\PricePosition;
use App\Traits\Translation;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PricePositionsController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.prices.price-positions';
    protected string $routePrefix = 'admin.content.prices.price-positions';

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
        $model = PricePosition::all();
        $routePrefix = $this->routePrefix;
        $primaryKey = 'price_position_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('price_position_name', function ($model){
                return $model->price_position_name;
            })
            ->addColumn('price_section_name', function($model) {
                return $model->priceSection->price_section_name;
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
        $sections = PriceSection::all();
        $activeLanguages = $this->activeLanguages;
        return view($this->folderPrefix . '.create', compact('routePrefix', 'sections', 'activeLanguages'));
    }

    /**
     * @param PricePositionRequest $request
     * @return RedirectResponse
     */
    public function store(PricePositionRequest $request) : RedirectResponse
    {
        PricePosition::create($this->fillData($request));

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
        $model = PricePosition::find($id);
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
        $model = PricePosition::find($id);
        $routePrefix = $this->routePrefix;
        $sections = PriceSection::all();
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'sections', 'activeLanguages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PricePositionRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(PricePositionRequest $request, int $id) : RedirectResponse
    {
        PricePosition::find($id)->update($this->fillData($request));

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
        PricePosition::find($id)->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param PricePositionRequest $request
     * @return array
     */
    private function fillData(PricePositionRequest $request) : array
    {
        return [
            'price_position_name' => $this->prepareTranslatesForInsertByFieldName($request, 'price_position_name'),
            'price' => $request->get('price'),
            'price_section_id' => $request->get('price_section_id'),
        ];
    }
}
