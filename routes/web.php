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

Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from MundosE app',
        'body' => 'Este esta es una prueba smtp'
    ];
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\sendContact($details));
});