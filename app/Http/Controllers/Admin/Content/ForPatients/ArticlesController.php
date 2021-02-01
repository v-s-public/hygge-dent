<?php

namespace App\Http\Controllers\Admin\Content\ForPatients;

use App\Http\Controllers\Admin\Content\ArticlesController as BasicArticleController;
use App\Models\Content\ForPatients\Article;

class ArticlesController extends BasicArticleController
{
    protected string $routePrefix = 'admin.content.for-patients.articles';
    protected string $section = 'for_patients';

    protected string $titleIndex  = 'Пациентам - Статьи';
    protected string $titleCreate = 'Пациентам - Статьи - Добавить статью';
    protected string $titleShow =   'Пациентам - Статьи - Статья';
    protected string $titleEdit =   'Пациентам - Статьи - Редактировать статью';

    public function __construct()
    {
        parent::__construct();
        $this->articleModel = Article::class;
    }
}
