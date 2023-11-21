<?php

use App\Http\Controllers\LamaranController;


Route::get('lowongan/{id}', [LamaranController::class, 'showAllPelamar']);
Route::get('lowongan/lamaran/{id}', [LamaranController::class, 'showPelamar']);

