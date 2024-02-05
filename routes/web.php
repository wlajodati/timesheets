<?php

use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthSessionController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthSessionController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthSessionController::class, 'logout'])->name('auth.logout');
Route::view('/users/create', 'users.create')->name('users.create');
Route::post('/users/create', [UserController::class, 'store'])->name('users.store');

Route::middleware(['auth'])->get('/users/dashboard', [UserController::class, 'index'])->name('users.index');
