<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/transactions', 'TransactionController@all')->name('transactions.all');

Route::post('/transactions', 'TransactionController@store')->name('transactions.store');

Route::get('/transactions/{transaction}', 'TransactionController@show')->name('transactions.show');

Route::put('/transactions/{transaction}', 'TransactionController@update')->name('transactions.update');

Route::delete('/transactions/{transaction}', 'TransactionController@destroy')->name('transactions.destroy');
