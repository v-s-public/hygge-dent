<?php

namespace App\Models\Content\ForPatients;
use App\Models\Content\Article as BasicArticle;


class Article extends BasicArticle
{
    public $attributes = [
        'section' => 'for_patients'
    ];
}
