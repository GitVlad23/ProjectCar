<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarController;

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


	Route::get('/', [MainController::class, 'index'])->name('main');

Route::group(['middleware' => 'guest'], function() {
	
	Route::get('/login', [MainController::class, 'login'])->name('login');
	Route::post('/login/process', [MainController::class, 'login_process'])->name('login_process');

	Route::get('/register', [MainController::class, 'register'])->name('register');
	Route::post('/register/process', [MainController::class, 'register_process'])->name('register_process');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/logout', [MainController::class, 'logout'])->name('logout');
});

	Route::get('/card/{carID}', [CarController::class, 'drive'])->name('drive');
	Route::get('/exit/{carID}', [CarController::class, 'exit'])->name('exit');