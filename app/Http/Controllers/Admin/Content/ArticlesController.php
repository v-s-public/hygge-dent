<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Traits\Translation;
use App\Http\Requests\Admin\Content\ArticleRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Http\RedirectResponse;

class ArticlesController extends Controller
{
    use Translation;

    protected string $folderPrefix = 'admin.content.articles';
    protected string $routePrefix;
    protected string $section;
    protected string $articleModel;

    protected string $titleIndex;
    protected string $titleCreate;
    protected string $titleShow;
    protected string $titleEdit;

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $routePrefix = $this->routePrefix;
        $title = $this->titleIndex;
        return view($this->folderPrefix . '.index', compact('routePrefix', 'title'));
    }

    /**
     * Returns JSON with all Employee entities
     *
     * @return mixed
     * @throws \Exception
     */
    public function resourceList()
    {
        $model = $this->articleModel::where('section', $this->section);
        $routePrefix = $this->routePrefix;
        $primaryKey = 'article_id';
        $actions = ['edit', 'show', 'destroy'];

        return Datatables::of($model)
            ->editColumn('title', function ($model){
                return $model->title;
            })
            ->editColumn('text', function ($model){
                return $this->getNWordsOfArticle($model->text);
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
        $title = $this->titleCreate;

        return view($this->folderPrefix . '.create', compact('routePrefix', 'activeLanguages', 'title'));
    }

    /**
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request) : RedirectResponse
    {
        $shortCode = $this->generateArticleShortcode();

        $this->articleModel::create($this->fillData($request, $shortCode));

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
        $model = $this->articleModel::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;
        $title = $this->titleShow;

        return view($this->folderPrefix . '.show', compact('model', 'routePrefix', 'activeLanguages', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id) : View
    {
        $model = $this->articleModel::find($id);
        $routePrefix = $this->routePrefix;
        $activeLanguages = $this->activeLanguages;
        $title = $this->titleEdit;

        return view($this->folderPrefix . '.edit', compact('model', 'routePrefix', 'activeLanguages', 'title'));
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
        $model = $this->articleModel::find($id);
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
        $model = $this->articleModel::find($id);
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

    /**
     * Generate shortcode for article
     *
     * @return string
     */
    private function generateArticleShortcode() : string
    {
        return $this->section . '_' . Str::random(10);
    }

    /**
     * Get n first words of article
     *
     * @param string $text
     * @param int $wordsNumber
     * @return string
     */
    private function getNWordsOfArticle(string $text, int $wordsNumber = 5) : string
    {
        $text = implode(' ', array_slice(explode(' ', $text), 0, $wordsNumber));
        $text = strip_tags($text) . '...';
        return $text;
    }
}
