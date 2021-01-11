<?php


namespace App\Facades\Admin;


use Illuminate\Support\Facades\Facade;

class ImagesService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'images';
    }
}
