<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Requests\LowonganRequest;
use App\Http\Resources\LowonganResource;

class LowonganController extends Controller
{
    public function index(){
        $dataLowongan = Lowongan::with('perusahaan')->get();

        // dd($dataLowongan);
        if($dataLowongan->isEmpty()){
            return response()->json(['messages' => 'Tidak terdapat lowongan']);
        }
        else{
            return LowonganResource::collection($dataLowongan);
        }
    }

    public function store(LowonganRequest $request){
        $uuid = Uuid::uuid4()->toString();

        $dataLowongan = new Lowongan;
        $dataLowongan->id = $uuid;
        $dataLowongan->id_perusahaan = $request->id_perusahaan;
        $dataLowongan->tanggal_tutup = $request->tanggal_tutup;
        $dataLowongan->gambar = $request->gambar;
        $dataLowongan->save();

        return response()->json(['messages' => 'Data Lowongan baru berhasil ditambahkan']);
    }

    public function update(LowonganRequest $request, $id){
        $dataLowongan = Lowongan::find($id);

        $dataLowongan->id_perusahaan = $request->id_perusahaan;
        $dataLowongan->tanggal_tutup = $request->tanggal_tutup;
        $dataLowongan->gambar = $request->gambar;
        $dataLowongan->save();

        return response()->json(['messages' => 'Berhasil mengedit data Lowongan']);
    }

    public function show($id){
        $dataLowongan = Lowongan::find($id);

        if($dataLowongan == null){
            return response()->json(['messages' => 'Data Lowongan tersebut tidak ada']);
        }
        else{
            
        }
    }

    public function destroy($id){
        $dataLowongan = Lowongan::find($id);

        if($dataLowongan == null){
            return response()->json(['messages' => 'Data Lowongan tersebut tidak ada']);
        }
        else{
            $dataLowongan->delete();

            return response()->json(['messages' => 'Berhasil menghapus data Lowongan']);
        }

    }

}

