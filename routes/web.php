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

Route::resource('jobs', 'JobController');
Route::resource('posts', 'PostController');
Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category/add', 'CategoryController@addCategory')->name('addCategory');
Route::post('/subcategory/add', 'CategoryController@addSubCategories')->name('addSubCategory');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
