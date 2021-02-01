<?php

namespace App\Models\Content\AboutUs;
use App\Models\Content\Article as BasicArticle;


class Article extends BasicArticle
{
    public $attributes = [
        'section' => 'about_us'
    ];
}
