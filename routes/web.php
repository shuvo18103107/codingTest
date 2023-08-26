<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('sign-up', [AuthController::class, 'signUp'])->name('signup');
Route::post('signin', [AuthController::class, 'signin'])->name('signin');
Route::post('store-sign-up', [AuthController::class, 'storeSignUp'])->name('store.sign-up');
Route::group(['middleware' => 'auth'], function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
