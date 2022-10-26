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

Route::get('/', function () {
    return view('index');
});

Route::resource('worships', App\Http\Controllers\WorshipController::class)->except('store');
Route::resource('news', App\Http\Controllers\NewsController::class);

Route::group(['middleware' => ['auth', 'role:Jemaat,Simpatisan']], function () {
    Route::resource('worships', App\Http\Controllers\WorshipController::class)->only('store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'role:Admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('worships', App\Http\Controllers\Admin\WorshipController::class);
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
