<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomsController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rooms', function () {
    return view('rooms.rooms');
});

Route::get('/rooms', [App\Http\Controllers\RoomsController::class, 'index'])->name('rooms');

Route::get('available', [App\Http\Controllers\RoomsController::class, 'available'])->name('available');

Route::get('unavailable', [App\Http\Controllers\RoomsController::class, 'unavailable'])->name('unavailable');

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');

Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');