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
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('employees', App\Http\Controllers\Admin\EmployeesController::class);
        Route::get('employees/list/all', [App\Http\Controllers\Admin\EmployeesController::class, 'employeesList'])->name('employees.list');
    });
});

