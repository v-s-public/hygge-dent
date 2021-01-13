<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Facades\Admin\ImagesService;

class Language extends Model
{
    use HasFactory;

    protected $primaryKey = 'language_id';
    protected string $diskName = 'flags';

    /**
     * Get language flag
     *
     * @return string
     */
    public function getFlag() : string
    {
        return ImagesService::getOne($this->diskName, $this->language_flag_image);
    }

    public function toggleStatus()
    {
        $this->language_status = !($this->language_status);
        $this->save();
    }
}
