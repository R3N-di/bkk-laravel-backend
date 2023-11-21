<?php

use App\Http\Controllers\SyaratKualifikasiController;


Route::delete('/syarat_kualifikasi/delete/{id}', [SyaratKualifikasiController::class, 'destroy']);

