<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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


// listado de posts
Route::get('/post/list', PostController::class . '@showList');
//Route::get('/post/list', 'PostController@showList');

// formulario para crear un post
Route::get('/post/new', 'App\Http\Controllers\PostController@showForm');

// metodo para guardar un post
Route::post('/post/save', 'App\Http\Controllers\PostController@save')->name('savepost');

// editar un post
Route::get('/post-show-form-edit/{id}', 'App\Http\Controllers\PostController@showFormEdit');

Route::post('/post-save-edit', 'App\Http\Controllers\PostController@savePostEdit')->name('savepostedit');

Route::get('/post-save', PostController::class . '@save')->name('savepost');

Route::get('/post/delete/{id}', 'App\Http\Controllers\PostController@deleteForm');

Route::get('send-mail', function () {

});


