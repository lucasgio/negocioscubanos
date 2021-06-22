<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

<<<<<<< HEAD
=======

//
>>>>>>> bc543f04fd163cef150e42a6c247eb3b91b36c8a
Route::get('/categorias', 'ApiController@allCategory')->name('categorias');
Route::get('/categoria/{categoria}', 'ApiController@categoria')->name('categoria');
Route::get('/negocios/{negocios}', 'ApiController@show')->name('negocio.show');
Route::get('/negocios', 'ApiController@index')->name('negocios.index');
<<<<<<< HEAD

//
=======
>>>>>>> bc543f04fd163cef150e42a6c247eb3b91b36c8a
