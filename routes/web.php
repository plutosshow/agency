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
Auth::routes();
Route::get('/', 'App\Http\Controllers\FlatsController@index')->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

/*
 *Запросы к базе данных
*/
Route::get('/property/{id}', 'App\Http\Controllers\FlatsController@showFlat')->name('property');
Route::post('form/request', 'App\Http\Controllers\Forms\RequestController@submit')->name('form.request');
Route::get('get/showAllFlats', 'App\Http\Controllers\FlatsController@showAllFlats')->name('show.allFlats');

/*
 * Admin routes
*/
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
    Route::get('admin/forms/requests', 'App\Http\Controllers\Admin\FormRequest@index')->name('admin.form.request');

});
