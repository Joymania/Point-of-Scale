<?php

use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('users')->group(function(){
    Route::get('/view','Backend\UserController@view')->name('users.view');
    Route::get('/add','Backend\UserController@add')->name('users.add');
    Route::post('/store','Backend\UserController@store')->name('users.store');
    Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
    Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
    Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
});

Route::prefix('profile')->group(function(){
    Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
    Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
    Route::post('/store','Backend\ProfileController@store')->name('profiles.store');
    Route::get('/password/edit','Backend\ProfileController@passEdit')->name('password.edit');
    Route::post('/password/store','Backend\ProfileController@passStore')->name('password.store');

});

Route::prefix('Suppliers')->group(function(){
    Route::get('/view','Backend\SuppliersController@view')->name('suppliers.view');
    Route::get('/add','Backend\SuppliersController@add')->name('suppliers.add');
    Route::post('/store','Backend\SuppliersController@store')->name('suppliers.store');
    Route::get('/edit/{id}','Backend\SuppliersController@edit')->name('suppliers.edit');
    Route::post('/update/{id}','Backend\SuppliersController@update')->name('suppliers.update');
    Route::get('/delete/{id}','Backend\SuppliersController@delete')->name('suppliers.delete');
});

Route::prefix('Customers')->group(function(){
    Route::get('/view','Backend\CustomerController@view')->name('customers.view');
    Route::get('/add','Backend\CustomerController@add')->name('customers.add');
    Route::post('/store','Backend\CustomerController@store')->name('customers.store');
    Route::get('/edit/{id}','Backend\CustomerController@edit')->name('customers.edit');
    Route::post('/update/{id}','Backend\CustomerController@update')->name('customers.update');
    Route::get('/delete/{id}','Backend\CustomerController@delete')->name('customers.delete');
});

Route::prefix('Unit')->group(function(){
    Route::get('/view','Backend\UnitController@view')->name('unit.view');
    Route::get('/add','Backend\UnitController@add')->name('unit.add');
    Route::post('/store','Backend\UnitController@store')->name('unit.store');
    Route::get('/edit/{id}','Backend\UnitController@edit')->name('unit.edit');
    Route::post('/update/{id}','Backend\UnitController@update')->name('unit.update');
    Route::get('/delete/{id}','Backend\UnitController@delete')->name('unit.delete');
});

});




