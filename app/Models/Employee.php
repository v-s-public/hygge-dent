<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasOneImage;

class Employee extends Model
{
    use HasFactory, HasTranslations, HasOneImage;

    protected $primaryKey = 'employee_id';

    public array $translatable = ['fio', 'position', 'description'];

    protected $fillable = ['fio', 'position', 'description', 'image'];

    protected string $diskName = 'employees';
}
