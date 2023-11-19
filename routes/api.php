<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerusahaanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class,'login']);
Route::get('/perusahaan', [PerusahaanController::class,'index']);
Route::get('/perusahaan/{id}', [PerusahaanController::class,'show']);
Route::post('/perusahaan/add', [PerusahaanController::class,'store']);
Route::put('/perusahaanUpdate/{id}', [PerusahaanController::class,'update']);
Route::delete('/perusahaanDelete/{id}', [PerusahaanController::class,'destroy']);
