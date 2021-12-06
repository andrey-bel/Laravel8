<?php

use App\Http\Controllers\ApiController;
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
Route::post('/test', function () {
    return 'Hello!!!';
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    // список всех сообщений
    Route::get('posts', [ApiController::class, 'post']);
    // получить сообщение
    Route::get('posts/{id}', [ApiController::class, 'singlePost']);
    // добавить сообщение
    Route::post('posts', [ApiController::class, 'createPost']);
    // обновить сообщение
    Route::put('posts/{id}', [ApiController::class, 'updatePost']);
    // удалить сообщение
    Route::delete('posts/{id}', [ApiController::class, 'deletePost']);
    // добавить нового пользователя с ролью Writer
    Route::post('users/writer', [ApiController::class, 'createWriter']);
    // добавить нового пользователя с Subscriber
    Route::post('users/subscriber', [ApiController::class, 'createSubscriber']);
    // удалить пользователя
    Route::delete('users/{id}', [ApiController::class, 'deleteUser']);
});
