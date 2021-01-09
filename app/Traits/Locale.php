<?php

namespace App\Traits;

trait Locale
{
    public function __construct()
    {
        app()->setLocale('ru');
    }
}
