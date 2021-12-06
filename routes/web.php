<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoodsController;

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
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/test', function () {
//    return 'Hello';
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('register', [RegisterController::class, 'register'])->middleware('restrictothers');

Route::get('dashboard', function () {
    if (Auth::check() && Auth::user()->role === 1) {
        return auth()
            ->user()
            ->createToken('auth_token', ['admin'])
            ->plainTextToken;
    }
    return redirect('/');
})->middleware('auth');

Route::get('clear/token', function () {
    if (Auth::check() && Auth::user()->role === 1) {
        Auth::user()->tokens()->delete();
    }
    return 'Token Cleared';
})->middleware('auth');

Route::resource('user', UserController::class)->middleware('auth');;
Route::resource('goods', GoodsController::class)->middleware('auth');;
