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

Route::group(['middleware' => ['user']], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');

    // categories
    Route::resource('categories', 'CategoryController');
    Route::prefix('categories')->group(function (){
        Route::get('/delete-or-restore/{category}', 'CategoryController@deleteOrRestore')->name('categories.delete');
    });
});


Route::view('user/login', 'user.login')->name('user.login');
Route::post('user/do-login', 'UserController@doLogin')->name('user.doLogin');