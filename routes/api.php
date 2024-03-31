<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\LiderJopeController;
use App\Http\Controllers\TarefasController;
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


Route::post('registrar', [AuthController::class, 'register']);

Route::delete('deletar-event', [EventosController::class, 'delete']);


Route::post('/task-create', [TarefasController::class, 'store']);
Route::delete('deletar-task', [TarefasController::class, 'delete']);
Route::post('update-task', [TarefasController::class, 'update']);

Route::put('edituser',  [LiderJopeController::class, 'update']);