<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ThingController;

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

//Route::get('/','HomeController@index')->name('home');

//Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/main','MainController@index')->name('main');
Route::get('/mythings','MyThingController@index')->name('mythings');


Route::get('/things','ThingController@index')->name('things.index');
Route::get('/things/create','ThingController@create')->name('things.create');
Route::post('/things','ThingController@store')->name('things.store');
Route::get('/things/{thing}','ThingController@show')->name('things.show');
Route::get('/things/{thing}/edit','ThingController@edit')->name('things.edit');
Route::patch('/things/{thing}','ThingController@update')->name('things.update');
Route::delete('/things/{thing}','ThingController@destroy')->name('things.destroy');
Route::post('/things/search','ThingController@search')->name('things.search');

Route::get('/mythings/{thing}/edit','MyThingController@edit')->name('mythings.edit');
Route::get('/mythings/{thing}','MyThingController@show')->name('mythings.show');
Route::patch('/mythings/{thing}','MyThingController@update')->name('mythings.update');

Route::get('/places','PlaceController@index')->name('places.index');
Route::get('/places/create','PlaceController@create')->name('places.create');
Route::post('/places','PlaceController@store')->name('places.store');
Route::get('/places/{place}','PlaceController@show')->name('places.show');
Route::get('/places/{place}/edit','PlaceController@edit')->name('places.edit');
Route::patch('/places/{place}','PlaceController@update')->name('places.update');
Route::delete('/places/{place}','PlaceController@destroy')->name('places.destroy');
Route::post('/places/search','PlaceController@search')->name('places.search');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
