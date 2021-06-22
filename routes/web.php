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

Route::get('/','HomeController' )->name('inicio');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/negocios', 'NegociosController@index')->name('negocios.index');
    Route::get('/negocios/create', 'NegociosController@create')->name('negocios.create');
    Route::get('/negocios/edit', 'NegociosController@edit')->name('negocios.edit');
    Route::post('/negocios/store', 'NegociosController@store')->name('negocios.store');


    //Imagenes subida
    Route::post('/imagenes/store', 'ImagenNegocioController@store')->name('imagenes.store');
    Route::post('/imagenes/destroy', 'ImagenNegocioController@destroy')->name('imagenes.destroy');

});


Auth::routes(['verify' => true]);

