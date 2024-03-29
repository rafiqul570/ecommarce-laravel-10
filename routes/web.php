<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ClaintController;
use Illuminate\Support\Facades\Route;


//frontend/Home Pages
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'homePage')->name('frontend.homePage');   
});

//Frontend/Category Pages
Route::controller(ClaintController::class)->group(function(){
    Route::get('/frontend/categoryPage/{id}/{slug}', 'CategoryPage')->name('frontend.categoryPage');
    Route::get('/frontend/subcategoryPage/{id}/{slug}', 'SubcategoryPage')->name('frontend.subcategoryPage');
    Route::get('/frontend/singlePage/{id}/{slug}', 'SinglePage')->name('frontend.singlePage');
    
});

// Bakent/Role
Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/redirects', 'index')->name('redirects');
        
    });
});





// Category
Route::middleware('auth')->group(function () {
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/ecom_category/index', 'index')->name('ecom_category.index');
        Route::get('/ecom_category/create', 'create')->name('ecom_category.create');
        Route::post('/ecom_category/store', 'store')->name('ecom_category.store');
        Route::get('/ecom_category/edit/{id}', 'edit')->name('ecom_category.edit');
        Route::post('/ecom_category/update', 'update')->name('ecom_category.update');
        Route::get('/ecom_category/delete/{id}', 'delete')->name('ecom_category.delete');

    });
});

// Sub-Category
Route::middleware('auth')->group(function () {
    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('/ecom_subcategory/index', 'index')->name('ecom_subcategory.index');
        Route::get('/ecom_subcategory/create', 'create')->name('ecom_subcategory.create');
        Route::post('/ecom_subcategory/store', 'store')->name('ecom_subcategory.store');
        Route::get('/ecom_subcategory/edit/{id}', 'edit')->name('ecom_subcategory.edit');
        Route::post('/ecom_subcategory/update', 'update')->name('ecom_subcategory.update');
        Route::get('/ecom_subcategory/delete/{id}', 'delete')->name('ecom_subcategory.delete');

    });
});

// Product
Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function(){
        Route::get('/ecom_product/index', 'index')->name('ecom_product.index');
        Route::get('/ecom_product/create', 'create')->name('ecom_product.create');
        Route::post('/ecom_product/store', 'store')->name('ecom_product.store');
        Route::get('/ecom_product/edit/{id}', 'edit')->name('ecom_product.edit');
        Route::post('/ecom_product/update/', 'update')->name('ecom_product.update');
        Route::get('/ecom_product/editImage/{id}', 'editImage')->name('ecom_product.editImage');
        Route::post('/ecom_product/updateImage/', 'updateImage')->name('ecom_product.updateImage');
        Route::get('/ecom_product/delete/{id}', 'delete')->name('ecom_product.delete');

        // json data

        Route::get('/get/subcat/{id}', 'getSubcat');
    });
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
