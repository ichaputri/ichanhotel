<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;

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
})->name('home');

Route::view('kamar','kamar')->name('kamar');



Route::group([
    'prefix'=>config('admin.path'),
], function(){
     
    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::group(['middleware'=>'auth:admin'], function(){
        Route::view('/','dashboard')->name('dashboard');
        Route::view('admin','admin.index')->name('admin.index');
    });   
});


 
