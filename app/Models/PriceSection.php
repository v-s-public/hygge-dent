<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PriceSection extends Model
{
    use HasFactory, HasTranslations;

    protected $primaryKey = 'price_section_id';

    public array $translatable = ['price_section_name'];

    protected $fillable = ['price_section_name'];

    public function pricePositions()
    {
        return $this->hasMany(PricePosition::class, 'price_section_id');
    }
}
