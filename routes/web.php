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

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/logout', function() {
    return redirect('/login');
});

Route::resource('usuarios', 'UsuarioController');

Route::resource('estoque', 'EstoqueController');

Route::resource('drinks', 'DrinksController');

Route::resource('vender', 'VenderController');

Route::resource('login', 'LoginController');
