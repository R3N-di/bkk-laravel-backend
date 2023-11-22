<?php

use App\Http\Controllers\PerusahaanController;



Route::get('/perusahaan', [PerusahaanController::class,'index']);
Route::get('/perusahaan/{id}', [PerusahaanController::class,'show']);
Route::post('/perusahaan/add', [PerusahaanController::class,'store']);
Route::put('/perusahaanUpdate/{id}', [PerusahaanController::class,'update']);
Route::delete('/perusahaanDelete/{id}', [PerusahaanController::class,'destroy']);

