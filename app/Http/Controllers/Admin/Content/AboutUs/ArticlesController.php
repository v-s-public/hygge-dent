<?php

namespace App\Http\Controllers\Admin\Content\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Content\AboutUs\Article;
use App\Traits\Translation;
use App\Http\Requests\Admin\AboutUs\ArticleRequest;
use Illuminate\Contracts\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.about-us.articles';
    protected string $routePrefix = 'admin.content.about-us.articles';

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
    public function resourceList()
    {
        $model = Article::all();
        $routePrefix = $this->routePrefix;
        $primaryKey = 'article_id';
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
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request) : RedirectResponse
    {
        $shortCode = Article::generateArticleShortCode();

        Article::create($this->fillData($request, $shortCode));

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
        $model = Article::find($id);
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
        $model = Article::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'activeLanguages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, int $id) : RedirectResponse
    {
        $model = Article::find($id);
        $shortCode = $model->short_code;

        $model->update($this->fillData($request, $shortCode));

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
        $model = Article::find($id);
        $model->delete();
    }

    /**
     * Fill data for store/update actions
     *
     * @param ArticleRequest $request
     * @param string $shortCode
     * @return array
     */
    private function fillData(ArticleRequest $request, string $shortCode) : array
    {
        return [
            'title' =>$this->prepareTranslatesForInsertByFieldName($request, 'title'),
            'text' => $this->prepareTranslatesForInsertByFieldName($request, 'text'),
            'short_code' => $shortCode
        ];
    }
}
