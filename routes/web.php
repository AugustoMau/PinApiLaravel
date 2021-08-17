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

Route::get('/post-list', PostController::class . '@showList');
// formulario para crear un post
Route::get('/post-show-form', PostController::class . '@showForm');
// metodo para guardar un post
Route::get('/post-save', PostController::class . '@save')->name('savepost');

// editar un post
Route::get('/post-show-form-edit/{id}', PostController::class . '@showFormEdit');

Route::get('/post-save-edit', PostController::class . '@savePostEdit')->name('savepost_edit');

//Route::get('/post-save', PostController::class . '@save')->name('savepost');
Route::get('/post-delete/{id}', PostController::class . '@delete');
