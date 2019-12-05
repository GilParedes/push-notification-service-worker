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
// retorna la vista de home
// Route::get('/home', function() {
//     return view('home');
// });

// crea o actualiza una suscripción para un usuario
Route::get('/suscripcion', 'SubscriptionController@store');

// Elimina la suscripción para un usuario
Route::get('/suscripcion', 'SubscriptionController@destroy');