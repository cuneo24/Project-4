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


Auth::routes();

Route::get('/', 'ModController@showMods');
Route::get('/search', 'ModController@search');
Route::get('/add', 'ModController@add');

Route::get('/{id}', 'ModController@showModsSingle');
Route::get('/{id}/search', 'ModController@showModsSection');
Route::get('/{id}/edit', 'ModController@edit');

Route::post('/{id}/delconfirm', 'Modcontroller@delConfirm');
Route::post('/store', 'ModController@store');
Route::post('/{id}/comment', 'ModController@comment');
Route::put('/{id}/update', 'ModController@update');
Route::delete('/{id}/delete', 'ModController@delete');
Route::delete('/{id}/deletecomment', 'ModController@deleteComment');

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});
