<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// listado json de posts
Route::get('/post-list', 'App\Http\Controllers\ApiPostController@showList');

// data json para editar un post
Route::get('/edit-form/{id}', 'App\Http\Controllers\ApiPostController@showDataForm');

// metodo para guardar un post
Route::post('/post-save', 'App\Http\Controllers\ApiPostController@create')->name('api_save_post');

// guardar edicion de post
Route::post('/post-save-edit', 'App\Http\Controllers\ApiPostController@update')->name('api_save_edit_post');

//Route::get('/post-save', PostController::class . '@save')->name('savepost');
Route::post('/post-delete', 'App\Http\Controllers\ApiPostController@delete')->name('api_delete_post');
