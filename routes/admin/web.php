<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\UserController;
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
// Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['is_admin']], function() {
        Route::resource('role', RoleController::class);
        Route::resource('dashboard', DashboardController::class);
        Route::resource('user', UserController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('attribute', AttributeController::class);
        Route::resource('product', ProductController::class);
        Route::resource('order', OrderController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('policy', PolicyController::class);
        Route::resource('term', TermController::class);
        Route::resource('tag', TagController::class);

        // Category status update
        Route::get('category/cat_status/{id}/{status}', [CategoryController::class, 'changeCatStatus']);

        // Sub Category status update
        Route::get('subcategory/subcat_status/{id}/{status}', [SubCategoryController::class, 'changeSubCatStatus']);

        // Brand status update
        Route::get('brand/brand_status/{id}/{status}', [BrandController::class, 'changeBrandStatus']);

        // Attribute status update
        Route::get('attribute/attribute_status/{id}/{status}', [AttributeController::class, 'changeAttributeStatus']);

        // Get Subcategory by Category ID
        Route::get('/submission/getsubcatid/{id}', [ProductController::class, 'getSubCategoryList']);

        // Order confirm update
        Route::get('order/order_confirm/{id}/{status}', [OrderController::class, 'changeOrderConfirmStatus']);

        // Order confirm update
        Route::get('order/order_status/{id}/{status}', [OrderController::class, 'changeOrderStatus']);

        // Banner status update
        Route::get('banner/banner_status/{id}/{status}', [BannerController::class, 'changeBannerStatus']);

        // Faq status update
        Route::get('faq/faq_status/{id}/{status}', [FaqController::class, 'changeFaqStatus']);
    });
});


require __DIR__.'/auth.php';
