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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'App\Http\Controllers\HomeController@PostList')->name('all_posts');
Route::get('/create/post', 'App\Http\Controllers\HomeController@createPost')->name('create_post');
Route::post('/store/post', 'App\Http\Controllers\HomeController@storePost')->name('store_new_post');
Route::post('/delete/post/{post_id}', 'App\Http\Controllers\HomeController@deletePost')->name('delete_post');
