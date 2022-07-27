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


Route::get('/sign-up', ['as'=>'sign-up','uses'=> 'AuthController@getSignup']);
Route::post('/sign-up', ['as'=>'sign-up','uses'=> 'AuthController@postSignup']);

Route::get('/sign-in', ['as'=>'sign-in','uses'=> 'AuthController@getLogin']);
Route::post('/sign-in', ['as'=>'sign-in','uses'=> 'AuthController@postLogin']);
Route::get('/logout', ['as'=>'logout','uses'=> 'AuthController@getLogOut']);

Route::middleware(['auth'])->group(function (){
    Route::get('/home-dashboard', 'HomeAdminController@index')->name('home-dashboard');
    // danh mục
    Route::get('/category', 'CategoryController@getList')->name('category');
    Route::post('/category', 'CategoryController@addCategory')->name('addCategory');
    Route::get('/ActiveStatus/{id}', 'CategoryController@ActiveStatus')->name('ActiveStatus');
    Route::get('/UnactiveStatus/{id}', 'CategoryController@UnactiveStatus')->name('UnactiveStatus');
    Route::get('/deleteCate/{id}', 'CategoryController@delete')->name('deleteCategory');
    Route::get('/category/update/{id}', 'CategoryController@getListUpdate')->name('category.update');
    Route::post('/category/update/{id}', 'CategoryController@Update')->name('category.update.post');
    // sản phẩm
});
