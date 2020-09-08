<?php

use App\Order;
use Illuminate\Support\Facades\Auth;
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
Auth::routes([
    'reset' => false,
    'verify' => false,
]);

Route::get('/account', 'HomeController@index')->name('account');

// Route::group(['middleware' => 'auth'], function() {
    
// });

Route::get('/cart/checkout','CartController@checkout')->name('checkout');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth','MainController@auth')->name('auth');  
});

Route::group(['prefix' => 'account'], function() {
Route::get('/orders', 'Account\OrderController@index')->name('account_orders');
Route::get('/orders/{order}', 'Account\OrderController@show')->name('account_show_order');
});


// Route::group(['prefix' => 'admin'], function() {
// Route::get('/orders', 'Admin\OrderController@index')->name('orders')->middleware('is_admin');  
// Route::get('/orders/{order}', 'Admin\OrderController@show')->name('order_show')->middleware('is_admin');
// Route::resource('categories', 'Admin\CategoryController')->middleware('is_admin');
// Route::resource('products', 'Admin\ProductController')->middleware('is_admin');
        
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/orders', 'Admin\OrderController@index')->name('orders');  
    Route::get('/orders/{order}', 'Admin\OrderController@show')->name('order_show');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('products', 'Admin\ProductController');
});


Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth','MainController@auth')->name('auth');  
});

Route::get('/cart','CartController@cart')->name('cart');

Route::post('/cart/checkout','CartController@confirm')->name('confirmed');
Route::post('/cart/add/{product}','CartController@cartAdd')->name('cart-add');
Route::post('/cart/remove/{product}','CartController@cartRemove')->name('cart-remove');

Route::get('/','MainController@index');
// Route::get('/account','MainController@account');
Route::get('/{category}','MainController@category')->name('category');
Route::get('/{category}/{id}','MainController@product')->name('product');





