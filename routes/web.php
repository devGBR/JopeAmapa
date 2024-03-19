<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Whoops\Run;

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

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sair', [AuthController::class, 'logout'])->name('sair');

Route::get('/events', [EventosController::class, 'index'])->middleware('auth')->name('eventos');
Route::post('/events', [EventosController::class, 'create']);

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
});
