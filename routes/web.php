<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CartController as Coza_storeCartController;
use App\Http\Controllers\MainController as Coza_storeMainController;
use App\Http\Controllers\MenuController as Coza_storeMenuController;
use App\Http\Controllers\ProductController as Coza_storeProductController;
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

Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login.index');
Route::post('admin/users/login/store', [LoginController::class, 'store'])->name('admin.store');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        //    Route::get('main',[MainController::class,'index']);
    });
    #menu
    Route::prefix('menus')->group(function () {
        Route::get('add', [MenuController::class, 'create'])->name('menus.add');
        Route::post('add', [MenuController::class, 'store']);
        Route::get('list', [MenuController::class, 'index'])->name('menus.list');
        Route::get('edit/{menu}', [MenuController::class, 'show']);
        Route::post('edit/{menu}', [MenuController::class, 'update']);
        Route::delete('destroy', [MenuController::class, 'destroy']);
    });
    #product
    Route::resource('products', ProductController::class);
    Route::post('/create', [ProductController::class, 'store']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/destroy', [ProductController::class, 'destroy']);
    #upload anh
    Route::post('upload/service', [UploadController::class, 'store']);
    #slider
    Route::resource('sliders', SliderController::class);
    Route::post('/create', [SliderController::class, 'store']);
    Route::post('/update/{id}', [SliderController::class, 'update']);
    Route::delete('/destroy', [SliderController::class, 'destroy']);
});

//========================================================
#coza_store
// Main
Route::get('/', [Coza_storeMainController::class, 'index']);
Route::post('services/load-product', [Coza_storeMainController::class, 'loadProduct']);
// Menu
// Route::resource('Menus', Coza_storeMenuController::class);
Route::get('menu/{id}--{slug}.html', [Coza_storeMenuController::class, 'index'])->name('menu.index');
// Product
Route::get('product/{id}--{slug}.html', [Coza_storeProductController::class, 'index'])->name('product.index');
// cart
Route::post('/addCart', [Coza_storeCartController::class, 'store']);
Route::resource('carts', Coza_storeCartController::class);
Route::post('/update-carts', [Coza_storeCartController::class, 'update']);
Route::get('/destroy-cart/{id}', [Coza_storeCartController::class, 'destroy']);
Route::post('/order', [Coza_storeCartController::class, 'completeCart']);
Route::get('/admin/carts', [CartController::class, 'index']);
Route::get('admin/carts/{id}', [CartController::class, 'show'])->name('admin.carts.show');
