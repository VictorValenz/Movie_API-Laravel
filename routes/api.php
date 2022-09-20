<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Streaming_MoviesController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\JwtMiddleware;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});


Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'auth'
], function ($router) {
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});



Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'categories'
], function ($router) {
    Route::get('/index', 'App\Http\Controllers\CategoryController@index'); //Shows all records (Tested)
    Route::get('/show/{id}', 'App\Http\Controllers\CategoryController@show'); //shows a single record (Tested)
    Route::post('/store', 'App\Http\Controllers\CategoryController@store'); // Create a record (Tested)
    Route::put('/update/{id}', 'App\Http\Controllers\CategoryController@update'); // Update a record (Tested)
    Route::delete('/destroy/{id}', 'App\Http\Controllers\CategoryController@destroy'); //Delete a record (Tested)
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'movie'
], function ($router) {
    Route::get('/index', [MovieController::class, 'index']); //Shows all records (Tested)
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'streaming'
], function ($router) {
    Route::get('/index', [Streaming_MoviesController::class, 'index']); //Shows all records (Tested)
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'favorite'
], function ($router) {
    Route::get('/index', [FavoriteController::class, 'index']); //Shows all records (Tested)
    Route::get('/show/{id_user}', [FavoriteController::class, 'show']); //shows a single record (Tested)
    });


    

