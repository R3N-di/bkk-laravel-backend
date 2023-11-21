<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyaratKualifikasi;
use App\Http\Requests\SyaratKualifikasiRequest;

class SyaratKualifikasiController extends Controller
{
    // public function store(SyaratKualifikasiRequest $request){

    // }

    public function destroy($id){
        $dataSyaratKualifikasi = SyaratKualifikasi::find($id);

        if($dataSyaratKualifikasi == null){
            return response()->json(['messages' => 'Tidak ada data Syarat Kualifikasi tersebut']);
        }
        else{
            $dataSyaratKualifikasi->delete();
            return response()->json(['messages' => 'Data Syarat Kualifikasi tersebut berhasil di hapus']);
        }
    }
}
