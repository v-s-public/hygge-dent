<?php

namespace App\Models\Content\AboutUs;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasTranslations;

    protected $table = 'about_us_results';

    protected $primaryKey = 'result_id';

    protected $fillable = ['title', 'icon', 'count'];

    public array $translatable = ['title'];
}
