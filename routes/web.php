<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/redirects', 'index')->name('redirects');
    });
});

// SubscriberController
Route::middleware('auth')->group(function () {
    Route::controller(SubscriberController::class)->group(function(){
        //Route::get('/bn_subscriber/index', 'index')->name('bn_subscriber.index');
       // Route::get('/bn_subscriber/create', 'create')->name('bn_subscriber.create');
        //Route::post('/bn_subscriber/store', 'store')->name('bn_subscriber.store');
        //Route::get('/bn_subscriber/edit/{id}', 'edit')->name('bn_subscriber.edit');
        //Route::post('/bn_subscriber/update', 'update')->name('bn_subscriber.update');
        //Route::get('/bn_subscriber/delete/{id}', 'delete')->name('bn_subscriber.delete');

    });
});

require __DIR__.'/auth.php';
