<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ShopController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::resource('shop', ShopController::class);
Route::resource('products', ProductController::class);
Route::resource('about-us', AboutController::class);
Route::resource('contact', ContactController::class);

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::put('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::resource('checkout', CheckoutController::class);

Route::get('product-search/{category_id}', [ProductController::class, 'category_product']);
Route::get('product-search/{category_id}/{subcat_id}', [ProductController::class, 'sub_category_product']);
Route::get('product-details/{product_slug}', [ProductController::class, 'show']);
Route::post('product-details-add-to-cart', [CartController::class, 'product_cart']);
Route::post('user/login/', [AccountController::class, 'user_sign_in']);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('account', AccountController::class);
    Route::get('change-password/', [AccountController::class, 'changePassword']);
    Route::put('update-password/{id}', [AccountController::class, 'updatePassword']);
    Route::get('my-order', [AccountController::class, 'getMyOrderList']);
    Route::post('shop', [ShopController::class, 'index']);
});