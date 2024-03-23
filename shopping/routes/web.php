<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/recommendations/{id}', 'RecommendationController@getRecommendations');




Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/shop', 'HomeController@shop')->name('home.shop');
Route::get('/shop/{category}', 'HomeController@category')->name('home.category');
Route::get('/product_detail/{id}', 'HomeController@productdetail')->name('productdetail');
Route::get('/ajax-search-product', 'HomeController@ajaxSearch')->name('ajax-search-product');
Route::post('/comment/{product_id}', 'HomeController@ajaxcomment')->name('comment');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verifyAdmin']], function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::resources([
        'category' => 'CategoryController',
        'user' => 'UserController',
        'order' => 'OrderController',
        'product' => 'ProductController'
    ]);
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {
    Route::get('view', 'CartController@view')->name('cart.view');
    Route::get('add/{id}', 'CartController@add')->name('cart.add');
    Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'CartController@update')->name('cart.update');
    Route::get('clear', 'CartController@clear')->name('cart.clear');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resources(['checkout' => 'CheckoutController']);
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
