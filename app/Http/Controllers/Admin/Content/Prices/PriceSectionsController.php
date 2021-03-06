<?php

namespace App\Http\Controllers\Admin\Content\Prices;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Prices\PriceSectionRequest;
use App\Models\Content\Prices\PriceSection;
use App\Traits\Translation;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PriceSectionsController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.prices.price-sections';
    protected string $routePrefix = 'admin.content.prices.price-sections';

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
     * Returns JSON with all Price Section entities
     *
     * @return mixed
     * @throws \Exception
     */
    public function resourceList()
    {
        $model = PriceSection::all();
        $routePrefix = $this->routePrefix;
        $primaryKey = 'price_section_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('price_section_name', function ($model){
                return $model->price_section_name;
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
     * @param PriceSectionRequest $request
     * @return RedirectResponse
     */
    public function store(PriceSectionRequest $request) : RedirectResponse
    {
        PriceSection::create($this->fillData($request));

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
        $model = PriceSection::find($id);
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
        $model = PriceSection::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'activeLanguages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PriceSectionRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(PriceSectionRequest $request, int $id) : RedirectResponse
    {
        PriceSection::find($id)->update($this->fillData($request));

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
        PriceSection::find($id)->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param PriceSectionRequest $request
     * @return array
     */
    private function fillData(PriceSectionRequest $request) : array
    {
        return [
            'price_section_name' =>
                $this->prepareTranslatesForInsertByFieldName($request, 'price_section_name')
        ];
    }
}
