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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/sign-up', ['as'=>'sign-up','uses'=> 'AuthController@getSignup']);
Route::post('/sign-up', ['as'=>'sign-up','uses'=> 'AuthController@postSignup']);

Route::get('/sign-in', ['as'=>'sign-in','uses'=> 'AuthController@getLogin']);
Route::post('/sign-in', ['as'=>'sign-in','uses'=> 'AuthController@postLogin']);
Route::get('/logout', ['as'=>'logout','uses'=> 'AuthController@getLogOut']);

Route::middleware(['auth'])->group(function (){
    Route::get('/', 'HomeAdminController@index')->name('home-dashboard');
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
    Route::get('/product', 'ProductController@getList')->name('product');
    Route::post('/product', 'ProductController@addProduct')->name('addProduct');
    Route::get('/deletePro/{id}', 'ProductController@delete')->name('deleteProduct');
    Route::get('/product/update/{id}', 'ProductController@getListUpdate')->name('product.update');
    Route::post('/product/update/{id}', 'ProductController@Update')->name('product.update.post');
    Route::get('/ActiveStatusPro/{id}', 'ProductController@ActiveStatusPro')->name('ActiveStatusPro');
    Route::get('/UnactiveStatusPro/{id}', 'ProductController@UnactiveStatusPro')->name('UnactiveStatusPro');
    // cấu hình sản phẩm
    Route::get('/product-config/{id}', 'ConfigController@getList')->name('product.config');
    Route::post('/product-config/{id}', 'ConfigController@addConfig')->name('product.config.add');
    Route::get('/ActiveStatusConfig/{id}', 'ConfigController@ActiveStatusConfig')->name('ActiveStatusConfig');
    Route::get('/UnactiveStatusConfig/{id}', 'ConfigController@UnactiveStatusConfig')->name('UnactiveStatusConfig');
    Route::get('/deleteConfig/{id}', 'ConfigController@delete')->name('deleteConfig');
    Route::get('/product-config/update/{id}', 'ConfigController@getListUpdate')->name('product.config.update');
    Route::post('/product-config/update/{id}', 'ConfigController@Update')->name('product.config.update.post');
});
