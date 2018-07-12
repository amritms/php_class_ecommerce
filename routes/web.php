<?php

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
Route::get('/', function(){
    return redirect('/login');
});


Route::get('/test', 'TestController@index');

// Route::get('/products', 'ProductController@index')->name('products.list');
// Route::get('/products/create', 'ProductController@create');
// Route::post('/products', 'ProductController@store');
// Route::get('/products/{product}', 'ProductController@show');
// Route::get('/products/{product}/edit', 'ProductController@edit');
// Route::patch('/products/{product}', 'ProductController@update');
// Route::delete('/products/{product}', 'ProductController@destroy');

Route::middleware('auth')->prefix('admin')->namespace('admin')->group(function(){
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::get('dashboard', 'DashboardController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
