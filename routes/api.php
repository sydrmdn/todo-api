<?php

use Illuminate\Http\Request;

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

Route::get('/todos', 'TodoController@index');
Route::post('/todos', 'TodoController@store');
Route::patch('/todos/{todo}', 'TodoController@update');
Route::patch('/todos-check-all', 'TodoController@checkAll');
Route::delete('/todos/{todo}', 'TodoController@destroy');
Route::delete('/todos-delete-completed', 'TodoController@destroyCompleted');