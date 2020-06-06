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

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//method create is saved with store method
Route::get('/entries/create', 'EntryController@create')->name('create');
Route::post('entries', 'EntryController@store');

Route::get('/entries/{entry}', 'GuestController@show');

//method edit is saved with update method
Route::get('/entries/{entry}/edit', 'EntryController@edit');
Route::put('entries/{entry}', 'EntryController@update');
Route::get('users/{user}', 'UserController@show');
