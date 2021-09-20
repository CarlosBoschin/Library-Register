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

Route::post('login', ['App\Http\Controllers\UserController', 'login']);
Route::get('weather',   ['App\Http\Controllers\WeatherController', 'weather']);

Route::middleware('auth:sanctum')->group(function (){

    //AUTH
    Route::get('user', ['App\Http\Controllers\UserController', 'user']);
    Route::get('logout', ['App\Http\Controllers\UserController', 'logout']);

    //BOOKS
    Route::post('storeBook', ['App\Http\Controllers\BooksController', 'store']);
    Route::get('getBooks',   ['App\Http\Controllers\BooksController', 'index']);
    Route::post('deletar',   ['App\Http\Controllers\BooksController', 'destroy']);
    Route::put('editBook',   ['App\Http\Controllers\BooksController', 'update']);
});

