<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ClaintController;
use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//frontend/Home Pages
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'homePage')->name('homePage');   
});



// Bakent/Role
Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/redirects', 'index')->name('redirects');
        
    });
});


//Frontend  Pages without middleware
Route::controller(ClaintController::class)->group(function(){
    Route::get('/front/pages/categoryPage/{id}/{slug}', 'CategoryPage')->name('front.pages.categoryPage');
    Route::get('/front/pages/singleProduct/{id}/{slug}', 'SingleProduct')->name('front.pages.singleProduct');
    Route::get('/front/pages/newReleasePage/', 'NewReleasePage')->name('front.pages.newReleasePage');
    
});


//Frontend/Pages with middleware
Route::middleware('auth')->group(function () {
Route::controller(ClaintController::class)->group(function(){
    Route::get('/front/pages/addToCard', 'AddToCard')->name('front.pages.addToCard');
    Route::post('/front/pages/addProductToCard', 'AddProductToCard')->name('front.pages.addProductToCard');
    Route::get('/front/pages/checkout', 'Checkout')->name('front.pages.checkout');
    Route::get('/front/pages/todaysDeal', 'TodaysDeal')->name('front.pages.todaysDeal');
    Route::get('/front/pages/customService', 'CustomService')->name('front.pages.customService');
   
    
   });

});


//Testing page
Route::middleware('auth')->group(function () {
Route::controller(ClaintController::class)->group(function(){
    Route::get('/products', 'Index')->name('products');
    Route::get('/cart', 'Cart')->name('cart');
    Route::post('/remove-from-cart', 'RemoveFromCart')->name('remove.from.cart');
    
   
    
   });

});

//UserProfile
Route::middleware('auth')->group(function () {
Route::controller(ClaintController::class)->group(function(){
    Route::get('/front/userProfile/dashboard', 'UserProfile')->name('front.userProfile.dashboard');
    Route::get('/front/userProfile/history', 'History')->name('front.userProfile.history');
    Route::get('/front/userProfile/pendingOrders', 'PendingOrders')->name('front.userProfile.pendingOrders');
    
   });

});


// Category
Route::middleware('auth')->group(function () {
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/category/index', 'index')->name('admin.category.index');
        Route::get('/admin/category/create', 'create')->name('admin.category.create');
        Route::post('/admin/category/store', 'store')->name('admin.category.store');
        Route::get('/admin/category/edit/{id}', 'edit')->name('admin.category.edit');
        Route::post('/admin/category/update', 'update')->name('admin.category.update');
        Route::get('/admin/category/delete/{id}', 'delete')->name('admin.category.delete');

    });
});


// Color
Route::middleware('auth')->group(function () {
    Route::controller(ColorController::class)->group(function(){
        Route::get('/admin/color/index', 'index')->name('admin.color.index');
        Route::get('/admin/color/create', 'create')->name('admin.color.create');
        Route::post('/admin/color/store', 'store')->name('admin.color.store');
        Route::get('/admin/color/edit/{id}', 'edit')->name('admin.color.edit');
        Route::post('/admin/color/update', 'update')->name('admin.color.update');
        Route::get('/admin/color/delete/{id}', 'delete')->name('admin.color.delete');

    });
});


// Size
Route::middleware('auth')->group(function () {
    Route::controller(SizeController::class)->group(function(){
        Route::get('/admin/size/index', 'index')->name('admin.size.index');
        Route::get('/admin/size/create', 'create')->name('admin.size.create');
        Route::post('/admin/size/store', 'store')->name('admin.size.store');
        Route::get('/admin/size/edit/{id}', 'edit')->name('admin.size.edit');
        Route::post('/admin/size/update', 'update')->name('admin.size.update');
        Route::get('/admin/size/delete/{id}', 'delete')->name('admin.size.delete');

    });
});




// Product
Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/product/index', 'index')->name('admin.product.index');
        Route::get('/admin/product/create', 'create')->name('admin.product.create');
        Route::post('/admin/product/store', 'store')->name('admin.product.store');
        Route::get('/admin/product/edit/{id}', 'edit')->name('admin.product.edit');
        Route::post('/admin/product/update/', 'update')->name('admin.product.update');
        Route::get('/admin/product/editImage/{id}', 'editImage')->name('admin.product.editImage');
        Route::post('/admin/product/updateImage/', 'updateImage')->name('admin.product.updateImage');
        Route::get('/admin/product/delete/{id}', 'delete')->name('admin.product.delete');

    });
});


require __DIR__.'/auth.php';
