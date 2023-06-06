<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

// Route::resource('worships', App\Http\Controllers\WorshipController::class)->except('store');
Route::resource('worships', App\Http\Controllers\WorshipController::class)->only('index');
Route::resource('news', App\Http\Controllers\NewsController::class);
Route::get('news/download/{file}', [App\Http\Controllers\NewsController::class, 'download'])->name('news.download');

Route::group(['middleware' => ['auth', 'role:Simpatisan,Jemaat']], function () {
    Route::get('worships/{id}/seat-count', [App\Http\Controllers\WorshipChooseSeatCountController::class, 'index'])->name('worships.seat-count');
    Route::post('worships/{id}/seat-count', [App\Http\Controllers\WorshipChooseSeatCountController::class, 'store'])->name('worships.seat-count.store');
    Route::resource('worships', App\Http\Controllers\WorshipController::class)->except('index');
    // Route::get('worships/{id}/show', [App\Http\Controllers\WorshipController::class, 'show'])->name('worships.show');
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::resource('bookings', App\Http\Controllers\BookingController::class)->except('create');
        Route::get('create/{worship_id}/{booking_id}', [App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
        Route::get('show/{worship_id}/{booking_id}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth', 'role:Admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('worships', App\Http\Controllers\Admin\WorshipController::class);
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('carousel', App\Http\Controllers\Admin\CarouselController::class);

    Route::get('attendance', [App\Http\Controllers\Admin\AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('attendance/validate', [App\Http\Controllers\Admin\AttendanceController::class, 'validateQRCode'])->name('attendance.validate');
});
