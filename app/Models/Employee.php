<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Employee extends Model
{
    use HasFactory, HasTranslations;

    protected $primaryKey = 'employee_id';

    public $translatable = ['fio', 'position', 'description'];

    protected $fillable = ['fio', 'position', 'description'];

    protected $attributes = [
        'image' => 'image'
    ];
}
