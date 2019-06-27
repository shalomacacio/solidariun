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

// Route::get('/', function () {
//     $campanhas =  Solidariun\Entities\Campanha::where('flg_active', 1)
//                                                     ->take(3)
//                                                     ->orderBy('created_at', 'desc')
//                                                     ->get();
//     return view('welcome', compact('campanhas'));
// })->name('site');

Route::get('/', 'CampanhasController@home')->name('site');
Route::get('/campanhas/recentes', 'CampanhasController@recentes');
Route::resource('campanhas', 'CampanhasController');

Route::get('/login', "AuthenticateController@login")->name('login');
Route::get('/logout', "AuthenticateController@logout")->name('logout');
Route::post('/auth', "AuthenticateController@auth")->name('auth');




Route::resource('users', 'UsersController');

Route::get('payments/{id}/solidarizar_se', 'PaymentsController@solidarizar_se')->name('payment');
Route::resource('payments', 'PaymentsController');
