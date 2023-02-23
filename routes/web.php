<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::prefix('test')->name('test.')->group(function () {
    Route::get('create', TestController::class . '@create')->name('create');
    Route::post('enter', TestController::class . '@enter')->name('enter');
    Route::get('game/{token}', TestController::class . '@game')->name('game');

    Route::get('error', TestController::class . '@error')->name('error');
});
