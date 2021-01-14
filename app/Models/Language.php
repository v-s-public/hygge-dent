<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Facades\Admin\ImagesService;
use Illuminate\Support\Collection;

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

    /**
     * Language status toggle
     *
     * @return void
     */
    public function toggleStatus() : void
    {
        $this->language_status = !($this->language_status);
        $this->save();
    }

    /**
     * Get Active Languages
     *
     * @return Collection
     */
    public static function getActiveLanguages() : Collection
    {
        return self::where('language_status', true)->get();
    }

    /**
     * Get Active Languages Locale Ids
     *
     * @return array
     */
    public static function getActiveLanguagesLocaleIds() : array
    {
        return self::where('language_status', true)->pluck('language_locale_id')->toArray();
    }
}
