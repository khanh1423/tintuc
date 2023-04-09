<?php

use App\Http\Controllers\Administrator\CategoryController;
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
//     return view('administrator.modules.category.index');
// });

// Route::resource('category', 'Administrator\CategoryController');

// Route::get('admin', 'Administrator\CategoryController@index');

// Route::namespace('Administrator')->prefix('admin')->name('admin.')->group( function() {

//     Route::resource('category', 'CategoryController');
//     Route::resource('new', 'NewController');
    
// });

Route::get('login', 'Administrator\AuthController@ViewLogin')->name('ViewLogin');
Route::post('login', 'Administrator\AuthController@PostLogin')->name('PostLogin');
Route::get('logout', 'Administrator\AuthController@PostLogout')->name('PostLogout');

Route::middleware('check_login')->group(function () {

    Route::get('/', 'Administrator\AdminController@index')->name('index');

    Route::namespace('Administrator')->prefix('admin')->name('admin.')->group( function () {
        
        Route::prefix('category')->name('category.')->group(function (){
            
            Route::get('/','CategoryController@index')->name('index');
    
            Route::get('create','CategoryController@create')->name('create');
            Route::post('create','CategoryController@store')->name('store');
    
            Route::get('edit/{slug}', 'CategoryController@edit')->name('edit');
            Route::post('update/{slug}', 'CategoryController@update')->name('update');
    
            Route::get('status/{slug}', 'CategoryController@status')->name('status');
            Route::get('destroy/{id}', 'CategoryController@destroy')->name('destroy');
        });
    
    
        Route::prefix('new')->name('new.')->group(function (){
            
            Route::get('/','NewController@index')->name('index');
    
            Route::get('create','NewController@create')->name('create');
            Route::post('create','NewController@store')->name('store');
    
            Route::get('edit/{slug}', 'NewController@edit')->name('edit');
            Route::post('update/{slug}', 'NewController@update')->name('update');
    
            Route::get('status/{slug}', 'NewController@status')->name('status');
            Route::get('destroy/{id}', 'NewController@destroy')->name('destroy');
        });
    
        Route::prefix('user')->name('user.')->group(function (){
            
            Route::get('/','UserController@index')->name('index');
    
            Route::get('create','UserController@create')->name('create');
            Route::post('create','UserController@store')->name('store');
    
            Route::get('edit/{id}', 'UserController@edit')->name('edit');
            Route::post('update/{id}', 'UserController@update')->name('update');
    
            Route::get('status/{slug}', 'UserController@status')->name('status');
            Route::get('destroy/{id}', 'UserController@destroy')->name('destroy');
        });
    });
});