<?php

namespace App\Http\Controllers\Admin\Content\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use App\Traits\Translation;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Yajra\DataTables\DataTables;
use App\Facades\Admin\ImagesService;
use Illuminate\Http\RedirectResponse;

class SliderController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.slider-frames';
    protected string $routePrefix = 'admin.content.slider-frames';
    protected string $diskName = 'slider';

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
     * Returns JSON with all Slider entities
     *
     * @return mixed
     * @throws \Exception
     */
    public function resourceList()
    {
        $model = Slider::all();
        $routePrefix = $this->routePrefix;
        $diskName = $this->diskName;
        $primaryKey = 'frame_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('title', function ($model){
                return $model->frame_title;
            })
            ->addColumn('image', function ($model) use ($diskName) {
                $url = ImagesService::getOne($diskName, $model->image);
                return "<img src='{$url}' class='rounded' width='100px'/>";
            })
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $primaryKey) {
                return view('admin.common.actions.grid_actions', compact('model', 'routePrefix', 'actions', 'primaryKey'));
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
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.create', compact('routePrefix', 'activeLanguages'));
    }

    /**
     * @param SliderRequest $request
     * @return RedirectResponse
     */
    public function store(SliderRequest $request) : RedirectResponse
    {
        $imageName = ImagesService::saveOne($this->diskName, $request->image);

        Slider::create($this->fillData($request, $imageName));

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
        $model = Slider::find($id);
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
        $model = Slider::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'activeLanguages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SliderRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(SliderRequest $request, int $id) : RedirectResponse
    {
        $model = Slider::find($id);
        $imageName = $model->image;

        if($request->image) {
            $model->deleteImage();
            $imageName = ImagesService::saveOne($this->diskName, $request->image);
        }

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
        $model = Slider::find($id);
        $model->deleteImage();
        $model->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param SliderRequest $request
     * @param string $imageName
     * @return array
     */
    private function fillData(SliderRequest $request, string $imageName) : array
    {
        return [
            'frame_title' =>$this->prepareTranslatesForInsertByFieldName($request, 'frame_title'),
            'frame_description' => $this->prepareTranslatesForInsertByFieldName($request, 'frame_description'),
            'image' => $imageName
        ];
    }
}
