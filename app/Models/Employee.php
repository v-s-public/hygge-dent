<?php

namespace App\Models;

use App\Facades\Admin\ImagesService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Employee extends Model
{
    use HasFactory, HasTranslations;

    protected $primaryKey = 'employee_id';

    public array $translatable = ['fio', 'position', 'description'];

    protected $fillable = ['fio', 'position', 'description', 'image'];

    protected string $diskName = 'employees';

    /**
     * Get Employee Image
     *
     * @return string
     */
    public function getImage() : string
    {
        return ImagesService::getOne($this->diskName, $this->image);
    }

    public function deleteImage()
    {
        ImagesService::deleteOne($this->diskName, $this->image);
    }
}
