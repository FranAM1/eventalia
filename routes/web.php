<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Models\Province;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $provinces = Province::take(4)->get();

    return  view('dashboard', compact('provinces'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/subscribe', [RoleController::class, 'subscribe'])->name('subscribe');
    Route::resource('comment', CommentController::class)->except(['index']);
    Route::resource('reply', ReplyController::class);
    Route::resource('event', EventController::class)->except(['index']);
    Route::resource('province', ProvinceController::class);
    Route::get('/event/{id}/subscribe', [EventController::class, 'subscribe'])->name('event.subscribe');
    Route::get('/event/{id}/unsubscribe', [EventController::class, 'unsubscribe'])->name('event.unsubscribe');
});

Route::get('/event', [EventController::class, 'index'])->name('event.index');

Route::fallback(function () {
    return redirect('/');
});

Route::get('/getcities', [CityController::class, 'getCities'])->name('getcities');

require __DIR__.'/auth.php';
