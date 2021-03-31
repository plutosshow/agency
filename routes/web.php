<?php

use App\Http\Controllers\Controller;
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
//Flats
Route::get('get/showAllFlats', 'App\Http\Controllers\FlatsController@showAllFlats')->name('show.allFlats');
Route::get('/property/{id}', 'App\Http\Controllers\FlatsController@showFlat')->name('property');
//Form.request
Route::post('form/request', 'App\Http\Controllers\Forms\RequestController@submit')->name('form.request');
//Filter
Route::get('get/uniqueCities', 'App\Http\Controllers\Forms\FilterController@uniqueCities')->name('uniqueCities');

/*
 * Admin routes
*/
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
    Route::get('admin/forms/requests', 'App\Http\Controllers\Admin\FormRequestController@index')->name('admin.form.request');
    Route::get('admin/tables/users', 'App\Http\Controllers\Admin\TableUserController@index')->name('admin.table.users');
    /*
    *Запросы к базе данных
    */

    //Requests
    Route::get('admin/forms/requests/getAll', 'App\Http\Controllers\Admin\FormRequestController@allRequests');
    Route::get('admin/forms/requests/destroyRequest/{id}', 'App\Http\Controllers\Admin\FormRequestController@destroyRequest');
    Route::get('admin/forms/requests/getRequest/{id}', 'App\Http\Controllers\Admin\FormRequestController@getRequest');
    Route::post('admin/forms/requests/updateRequest', 'App\Http\Controllers\Admin\FormRequestController@updateRequest');
    Route::post('admin/forms/requests/createRequest', 'App\Http\Controllers\Admin\FormRequestController@createRequest');
    //Users
    Route::get('admin/tables/users', 'App\Http\Controllers\Admin\TableUserController@index')->name('admin.table.users');
    Route::get('admin/tables/users/getAllUsers', 'App\Http\Controllers\Admin\TableUserController@allUsers')->name('table.users.getAll');
    Route::get('admin/tables/users/destroyUser/{id}', 'App\Http\Controllers\Admin\TableUserController@destroyUser')->name('table.users.destroyUser');
    Route::get('admin/tables/users/getUser/{id}', 'App\Http\Controllers\Admin\TableUserController@getUser')->name('table.users.getUser');
    Route::post('admin/tables/users/updateUser', 'App\Http\Controllers\Admin\TableUserController@updateUser')->name('table.users.updateUser');
    Route::post('admin/tables/users/createUser', 'App\Http\Controllers\Admin\TableUserController@createUser')->name('table.users.createUser');
    //Roles
    Route::get('admin/tables/roles/getAllRoles', 'App\Http\Controllers\Admin\RolesController@getAllRoles')->name('table.roles.getAllRoles');
    //Flats
    Route::get('admin/tables/flats', 'App\Http\Controllers\FlatsController@admin')->name('admin.table.flats');
    Route::get('admin/tables/flats/showAllFlats', 'App\Http\Controllers\FlatsController@destroyFlat')->name('admin.flats.showAll');
    Route::get('admin/tables/flats/destroyFlat/{id}', 'App\Http\Controllers\FlatsController@destroyFlat')->name('admin.flats.destroyFlat');





});
