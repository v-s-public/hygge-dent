<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(env('SITE_URL'))->group(function () {
    Route::get('locale/{locale}', function ($locale) {
        Session::put('locale', $locale);

        return redirect()->back();
    })->name('locale');

    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
});

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::domain('admin.' . env('SITE_URL'))->group(function () {
    Route::middleware('auth')->name('admin.')->group(function () {
        /** Dashboard **/
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        /** Content **/
        Route::prefix('content')->name('content.')->group(function () {
            Route::resource('slider-frames', App\Http\Controllers\Admin\Content\SliderController::class);
            Route::get('slider-frames/list/all', [App\Http\Controllers\Admin\Content\SliderController::class, 'resourceList'])->name('slider-frames.list');

            Route::prefix('prices')->name('prices.')->group(function () {
                Route::resource('price-sections', App\Http\Controllers\Admin\Content\Prices\PriceSectionsController::class);
                Route::get('price-sections/list/all', [App\Http\Controllers\Admin\Content\Prices\PriceSectionsController::class, 'resourceList'])->name('price-sections.list');

                Route::resource('price-positions', App\Http\Controllers\Admin\Content\Prices\PricePositionsController::class);
                Route::get('price-positions/list/all', [App\Http\Controllers\Admin\Content\Prices\PricePositionsController::class, 'resourceList'])->name('price-positions.list');
            });

            Route::prefix('about-us')->name('about-us.')->group(function () {
                Route::resource('articles', App\Http\Controllers\Admin\Content\AboutUs\ArticlesController::class);
                Route::get('articles/list/all', [App\Http\Controllers\Admin\Content\AboutUs\ArticlesController::class, 'resourceList'])->name('articles.list');

                Route::resource('results', App\Http\Controllers\Admin\Content\AboutUs\ResultsController::class);
                Route::get('results/list/all', [App\Http\Controllers\Admin\Content\AboutUs\ResultsController::class, 'resourceList'])->name('results.list');
            });

            Route::prefix('for-patients')->name('for-patients.')->group(function () {
                Route::resource('articles', App\Http\Controllers\Admin\Content\ForPatients\ArticlesController::class);
                Route::get('articles/list/all', [App\Http\Controllers\Admin\Content\ForPatients\ArticlesController::class, 'resourceList'])->name('articles.list');

                Route::resource('services', App\Http\Controllers\Admin\Content\ForPatients\ServicesController::class);
                Route::get('services/list/all', [App\Http\Controllers\Admin\Content\ForPatients\ServicesController::class, 'resourceList'])->name('services.list');
            });

            Route::prefix('our-team')->name('our-team.')->group(function () {
                Route::resource('articles', App\Http\Controllers\Admin\Content\OurTeam\ArticlesController::class);
                Route::get('articles/list/all', [App\Http\Controllers\Admin\Content\OurTeam\ArticlesController::class, 'resourceList'])->name('articles.list');

                Route::resource('employees', App\Http\Controllers\Admin\Content\OurTeam\EmployeesController::class);
                Route::get('employees/list/all', [App\Http\Controllers\Admin\Content\OurTeam\EmployeesController::class, 'resourceList'])->name('employees.list');
            });
        });

        /** Settings **/
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('languages', [App\Http\Controllers\Admin\Settings\LanguagesController::class, 'index'])->name('languages');
            Route::post('languages/toggle-status', [App\Http\Controllers\Admin\Settings\LanguagesController::class, 'toggleStatus'])->name('languages.toggle-status');
        });

        /** Notifications **/
        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::resource('appointments', App\Http\Controllers\Admin\Notifications\AppointmentController::class)
                ->only(['index', 'show', 'destroy']);
            Route::get('appointments/list/all', [App\Http\Controllers\Admin\Notifications\AppointmentController::class, 'resourceList'])->name('appointments.list');

            Route::resource('messages', App\Http\Controllers\Admin\Notifications\MessagesController::class)
                ->only(['index', 'show', 'destroy']);
            Route::get('messages/list/all', [App\Http\Controllers\Admin\Notifications\MessagesController::class, 'resourceList'])->name('messages.list');
        });
    });
});

