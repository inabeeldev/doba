<?php

use App\Http\Controllers\DobaController;
use App\Http\Controllers\shop\ShopController;
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

// Route::get('/abc', function () {
//     return view('welcome');
// });

Route::get('/404', [App\Http\Controllers\shop\ShopController::class, 'error'])->name('404-page');
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);




Route::get('doba', [DobaController::class, 'someMethod'])->name('doba.index');

Route::get('/', [App\Http\Controllers\shop\ShopController::class, 'home'])->name('home-page');
Route::get('/shop', [App\Http\Controllers\shop\ShopController::class, 'shop'])->name('shop-page');
Route::get('/trending-products', [App\Http\Controllers\shop\ShopController::class, 'trending'])->name('trending-products');


Route::get('/search/autocomplete', [App\Http\Controllers\shop\ShopController::class, 'autocomplete'])->name('search-autocomplete');
Route::get('/search', [App\Http\Controllers\shop\ShopController::class, 'search'])->name('search');


Route::get('/product-detail/{spuId}', [App\Http\Controllers\shop\ShopController::class, 'productDetail'])->name('product-detail');

// Route::get('/get-product-data', [App\Http\Controllers\shop\ShopController::class, 'getProductData'])->name('get.product.data');


Route::get('/cat-products/{catId}/{catName}', [App\Http\Controllers\shop\ShopController::class, 'catProduct'])->name('cat-products');
Route::post('/add-to-cart', [App\Http\Controllers\shop\ShopController::class, 'addToCart'])->name('add-to-cart');
Route::get('/shopping-cart', [App\Http\Controllers\shop\ShopController::class, 'cart'])->name('shopping-cart');
Route::post('/update-cart-item', [App\Http\Controllers\shop\ShopController::class, 'updateCartItem'])->name('update-cart-item');
Route::post('/remove-cart-item', [App\Http\Controllers\shop\ShopController::class, 'removeCartItem'])->name('remove-cart-item');

Route::get('/checkout', [App\Http\Controllers\shop\ShopController::class, 'checkoutPage'])->name('checkout-page');
Route::post('/checkout/store', [App\Http\Controllers\shop\ShopController::class, 'checkoutStore'])->name('checkout-store');

Route::get('/order-list', [App\Http\Controllers\shop\ShopController::class, 'orderList'])->name('order-list');

Route::get('/thank-you-page', [App\Http\Controllers\shop\ShopController::class, 'thankYou'])->name('thank-you-page');

Route::get('/ships', [App\Http\Controllers\shop\ShopController::class, 'ship'])->name('ships');


Route::get('/privacy-policy', [App\Http\Controllers\shop\ShopController::class, 'privacy'])->name('privacy-policy');
Route::get('/terms-conditions', [App\Http\Controllers\shop\ShopController::class, 'terms'])->name('terms-conditions');
// Route::get('/ships', [App\Http\Controllers\shop\ShopController::class, 'ship'])->name('ships');




Route::group(['prefix' => 'admin'], function () {

    Auth::routes();


    Route::middleware('auth:web')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-home');
        Route::get('/business-settings', [App\Http\Controllers\HomeController::class, 'setting'])->name('business-settings');
        Route::post('/update-setting', [App\Http\Controllers\HomeController::class, 'updateSetting'])->name('update-setting');


        Route::get('/orders', [App\Http\Controllers\HomeController::class, 'order'])->name('my-orders');
        Route::get('/doba-orders', [App\Http\Controllers\HomeController::class, 'dobaOrder'])->name('doba-orders');
        Route::get('/doba-order-detail/{ordBusiId}', [App\Http\Controllers\HomeController::class, 'dobaOrderDetail'])->name('doba-order-detail');


    });

});
