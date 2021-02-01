<?php

namespace App\Http\Controllers\Admin\Content\AboutUs;

use App\Http\Controllers\Admin\Content\ArticlesController as BasicArticleController;
use App\Models\Content\AboutUs\Article;

class ArticlesController extends BasicArticleController
{
    protected string $routePrefix = 'admin.content.about-us.articles';
    protected string $section = 'about_us';

    protected string $titleIndex =  'О нас - Статьи';
    protected string $titleCreate = 'О нас - Статьи - Добавить статью';
    protected string $titleShow =   'О нас - Статьи - Статья';
    protected string $titleEdit =   'О нас - Статьи - Редактировать статью';

    public function __construct()
    {
        parent::__construct();
        $this->articleModel = Article::class;
    }
}
