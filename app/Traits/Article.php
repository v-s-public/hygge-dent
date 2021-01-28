<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Article
{
    public static function generateArticleShortCode() : string
    {
        return self::$shortCodePrefix . Str::random(10);
    }
}
