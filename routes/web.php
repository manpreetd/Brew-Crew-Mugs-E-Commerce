<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');
Route::get('/wish-list', [PagesController::class, 'wishlist'])->name('wishlist');
Route::get('/account', [PagesController::class, 'account'])->name('account')->middleware('auth');
Route::get('/products/{id}', [PagesController::class, 'product'])->name('product');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');




Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route:: group(['prefix' => 'adminpanel', 'middleware' =>'admin'], function(){

   Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel'); 

   //Products
   Route:: group(['prefix' => 'products'], function (){
        Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products'); 
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create'); 
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
        Route::get('/{id}', [ProductController::class, 'edit'])->name('adminpanel.products.edit'); 
        Route::put('/{id}', [ProductController::class, 'update'])->name('adminpanel.products.update'); 
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('adminpanel.products.destroy'); 

   });

   //Products
   Route:: group(['prefix' => 'categories'], function (){
        Route::get('/', [CategoryController::class, 'index'])->name('adminpanel.categories'); 
        Route::post('create', [CategoryController::class, 'store'])->name('adminpanel.category.store'); 
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('adminpanel.category.destroy'); 
    });

    //Colors
    Route:: group(['prefix' => 'colors'], function (){
        Route::get('/', [ColorController::class, 'index'])->name('adminpanel.colors'); 
        Route::post('create', [ColorController::class, 'store'])->name('adminpanel.color.store'); 
        Route::delete('/{id}', [ColorController::class, 'destroy'])->name('adminpanel.color.destroy'); 
    });

});


