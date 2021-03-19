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
//    return view('home');
//})->name('home');

Auth::routes();

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', 'App\Http\Controllers\FlatsController@index')->name('home');
Route::get('/property/{id}', 'App\Http\Controllers\FlatsController@showFlat')->name('property');

Route::post('form/request', 'App\Http\Controllers\Forms\RequestController@submit')->name('form.request');

Route::get('get/showListFlats', 'App\Http\Controllers\FlatsController@showListFlats')->name('show.list');
Route::get('form/filter', 'App\Http\Controllers\Forms\FilterController@test')->name('filter');

