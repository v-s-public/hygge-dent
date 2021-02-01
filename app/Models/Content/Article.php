<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasTranslations;

    protected $table = 'articles';

    protected $primaryKey = 'article_id';

    protected $fillable = ['title', 'text', 'short_code'];

    public array $translatable = ['title', 'text'];
}
