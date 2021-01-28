<?php

namespace App\Models\Content\AboutUs;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Article as ArticleTrait;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use ArticleTrait, HasTranslations;

    protected $table = 'about_us_articles';

    protected $primaryKey = 'article_id';

    protected $fillable = ['title', 'text', 'short_code'];

    public array $translatable = ['title', 'text'];

    private static string $shortCodePrefix = 'about_us_';
}
