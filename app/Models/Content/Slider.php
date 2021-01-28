<?php

namespace App\Models\Content;

use App\Traits\HasOneImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, HasTranslations, HasOneImage;

    protected $table = 'slider';

    protected $primaryKey = 'frame_id';

    public array $translatable = ['frame_title', 'frame_description'];

    protected $fillable = ['frame_title', 'frame_description', 'image'];

    protected string $diskName = 'slider';
}
