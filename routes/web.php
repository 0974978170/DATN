<?php

use Illuminate\Support\Facades\Route;

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

Route::get('admin/users/login', [\App\Http\Controllers\Admin\Users\LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [\App\Http\Controllers\Admin\Users\LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
        Route::get('main', [\App\Http\Controllers\Admin\MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [\App\Http\Controllers\Admin\MenuController::class, 'create']);
        });

    });


});
