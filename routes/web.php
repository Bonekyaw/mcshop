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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resources([
		'categories'	=> 'CategoryController',
		'brands' => 'BrandController',
		'tags' => 'TagController',
		'products' => 'ProductController',
]);

Route::post('/sold','ProductController@sold');
Route::get('/histories','HistoryController@index');
Route::get('/histories/{history}/edit','HistoryController@edit');
Route::post('/histories/{history}/update','HistoryController@update');
Route::post('/histories/{history}/delete','HistoryController@destroy');
Route::post('/histories','HistoryController@getByDate');
Route::post('/histories/delete','HistoryController@deleteByMonth');
Route::get('/histories/outOfStock','HistoryController@getByOutStock');
Route::get('/histories/edited','HistoryController@displayEdited');

Route::post('/search','HomeController@search');
