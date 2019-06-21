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
    $campanhas =  Solidariun\Entities\Campanha::where('flg_active', 1)
                                                    ->take(3)
                                                    ->orderBy('created_at', 'desc')
                                                    ->get();
    return view('welcome', compact('campanhas'));
})->name('site');

Route::get('/login', "AuthenticateController@login")->name('login');
Route::get('/logout', "AuthenticateController@logout")->name('logout');
Route::post('/auth', "AuthenticateController@auth")->name('auth');

Route::get('/campanhas/recentes', 'CampanhasController@recentes');
Route::resource('campanhas', 'CampanhasController');

Route::resource('users', 'UsersController');
