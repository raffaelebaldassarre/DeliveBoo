<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('restaurants', 'RestaurantController');
/*     Route::resource('restaurant/{slug}/dishes', 'DishController');
 */    Route::get('restaurants/{slug}/dishes', 'DishController@index')->name('dishes.index');
    Route::get('restaurants/{slug}/dishes/create', 'DishController@create')->name('dishes.create');
    Route::post('restaurants/dishes', 'DishController@store')->name('dishes.store');
    Route::get('restaurants/{slug}/dishes/{dish}', 'DishController@show')->name('dishes.show');
    Route::get('restaurants/{slug}/dishes/{dish}/edit', 'DishController@edit')->name('dishes.edit');
    Route::put('restaurants/dishes/{dish}', 'DishController@update')->name('dishes.update');
    Route::patch('restaurants/dishes/{dish}', 'DishController@update')->name('dishes.update');
    Route::delete('restaurants/dishes/{dish}', 'DishController@destroy')->name('dishes.destroy');

    Route::get('restaurants/{slug}/orders', 'OrderController@index')->name('orders.index');
    Route::get('restaurants/{slug}/orders/{order}', 'OrderController@show')->name('orders.show');
});
