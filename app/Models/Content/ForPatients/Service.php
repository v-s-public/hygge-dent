<?php

namespace App\Models\Content\ForPatients;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected $primaryKey = 'service_id';

    protected $fillable = ['title'];

    public array $translatable = ['title'];
}
