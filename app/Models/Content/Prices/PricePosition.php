<?php

namespace App\Models\Content\Prices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PricePosition extends Model
{
    use HasFactory, HasTranslations;

    protected $primaryKey = 'price_position_id';

    public array $translatable = ['price_position_name'];

    protected $fillable = ['price_position_name', 'price', 'price_section_id'];

    public function priceSection()
    {
        return$this->belongsTo(PriceSection::class, 'price_section_id');
    }
}
