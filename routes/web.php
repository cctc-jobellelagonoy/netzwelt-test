<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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

Route::get('/account/login', [AuthController::class, 'index'])->name('login');
Route::post('/account/login', [AuthController::class, 'signin']);
Route::get('/account/logout', [AuthController::class, 'logout'])->middleware('apiauth');

Route::get('/home/index', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', function () {
    return redirect('/home/index');
});