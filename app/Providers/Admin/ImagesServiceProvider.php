<?php

namespace App\Providers\Admin;

use App\Services\Admin\Images;
use Illuminate\Support\ServiceProvider;

class ImagesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('images', Images::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
