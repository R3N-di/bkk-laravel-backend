<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Http\Resources\showAllPelamarResource;

class LamaranController extends Controller
{
    public function showAllPelamar($id){
        $dataPelamar = Lamaran::with('alumni', 'alumni.users')->where('id_lowongan', $id)->get();

        if($dataPelamar->isEmpty()){
            return response()->json(['messages' => 'Belom ada yang melamar pada lowongan ini']);
        }
        else{
            return showAllPelamarResource::collection($dataPelamar);
        }
    }

    public function showPelamar($id){
        $dataPelamar = Lamaran::with('alumni', 'inputanKualifikasi', 'alumni.users' )->where('id', $id)->get();

        dd($dataPelamar);
    }
}
