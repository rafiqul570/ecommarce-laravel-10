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

// Category
Route::middleware('auth')->group(function () {
    Route::controller(SubscriberController::class)->group(function(){
        //Route::get('/ecom_category/index', 'index')->name('ecom_category.index');
        Route::get('/ecom_category/create', 'create')->name('ecom_category.create');
        Route::post('/ecom_category/store', 'store')->name('ecom_category.store');
        //Route::get('/ecom_category/edit/{id}', 'edit')->name('ecom_category.edit');
        //Route::post('/ecom_category/update', 'update')->name('ecom_category.update');
        //Route::get('/ecom_category/delete/{id}', 'delete')->name('ecom_category.delete');

    });
});

require __DIR__.'/auth.php';
