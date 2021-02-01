<?php

namespace App\Http\Controllers\Admin\Content\OurTeam;

use App\Http\Controllers\Admin\Content\ArticlesController as BasicArticleController;
use App\Models\Content\OurTeam\Article;

class ArticlesController extends BasicArticleController
{
    protected string $routePrefix = 'admin.content.our-team.articles';
    protected string $section = 'our_team';

    protected string $titleIndex  = 'Наша команда - Статьи';
    protected string $titleCreate = 'Наша команда - Статьи - Добавить статью';
    protected string $titleShow =   'Наша команда - Статьи - Статья';
    protected string $titleEdit =   'Наша команда - Статьи - Редактировать статью';

    public function __construct()
    {
        parent::__construct();
        $this->articleModel = Article::class;
    }
}
