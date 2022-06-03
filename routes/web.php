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

Route::get('/posts','PostController@index')->name('posts.index');
Route::get('/posts/create','PostController@create')->name('posts.create');
Route::post('/posts','PostController@store')->name('posts.store');
Route::get('/posts/{post}','PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}','PostController@update')->name('posts.update');
Route::delete('/posts/{post}','PostController@destroy')->name('posts.destroy');
Route::post('/posts/search','PostController@search')->name('posts.search');

Route::get('/about','PostController@about')->name('posts.about');
Route::get('/feedback','PostController@feedback')->name('posts.feedback');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
