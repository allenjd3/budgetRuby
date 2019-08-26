<?php

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/api/transaction', 'TransactionController@index');
Route::get('/api/{id}/transaction', 'TransactionController@show');
Route::post('/api/transaction', 'TransactionController@store');
Route::delete('api/{id}/transaction', 'TransactionController@delete');
Route::put('/api/{id}/transaction', 'TransactionController@update');
Route::get('/api/bitem', 'BitemController@index');
Route::get('/api/{id}/bitem', 'BitemController@show');
Route::put('/api/{id}/bitem', 'BitemController@update');
Route::delete('/api/{id}/bitem', 'BitemController@delete');
Route::get('/api/budget', 'BudgetController@index');
Route::get('/api/{id}/budget', 'BudgetController@show');
Route::put('/api/{id}/budget', 'BudgetController@update');
Route::delete('/api/{id}/budget', 'BudgetController@delete');

