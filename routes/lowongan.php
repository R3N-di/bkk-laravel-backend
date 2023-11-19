<?php

use App\Http\Controllers\LowonganController;


Route::get('/lowongan', [LowonganController::class, 'index']);
Route::post('/lowongan/tambah', [LowonganController::class, 'store']);
Route::post('/lowongan/update/{id}', [LowonganController::class, 'update']);
Route::delete('/lowongan/delete/{id}', [LowonganController::class, 'destroy']);


