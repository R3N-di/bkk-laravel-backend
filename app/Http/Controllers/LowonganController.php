<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Models\SyaratKualifikasi;
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

    // public function store(LowonganRequest $request){
    public function store(Request $request){

        $uuidLowongan = Uuid::uuid4()->toString();

        $dataLowongan = new Lowongan;
        $dataLowongan->id = $uuidLowongan;
        $dataLowongan->id_perusahaan = $request->id_perusahaan;
        $dataLowongan->tanggal_tutup = $request->tanggal_tutup;
        $dataLowongan->gambar = $request->gambar;
        $dataLowongan->save();

        $keys = $request->request->keys();

        $indexTerakhir = key(array_slice($keys, -1, 1, true));

        // Mencocokkan pola angka dalam string
        preg_match('/\d+/', $keys[$indexTerakhir], $arrayAngka);
        // Mengambil angka dari hasil pencocokan
        $jumlah = $arrayAngka[0];

        for($i=1; $i <= $jumlah; $i++){
            $uuidSyaratKualifikasi = Uuid::uuid4()->toString();

            $dataSyaratKualifikasi = new SyaratKualifikasi;
            $dataSyaratKualifikasi->id = $uuidSyaratKualifikasi;
            $dataSyaratKualifikasi->id_lowongan = $uuidLowongan;
            $dataSyaratKualifikasi->field_kualifikasi = $request['field_kualifikasi_' . $i];
            // $dataSyaratKualifikasi->tipe_data = $request['tipe_data_' . $i];
            $dataSyaratKualifikasi->isi_kualifikasi = $request['isi_kualifikasi_' . $i];
            // $dataSyaratKualifikasi->is_nullable =$request['is_nullable_' . $i];
            $dataSyaratKualifikasi->save();
        }

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

        $dataSyaratKualifikasi = SyaratKualifikasi::where('id_lowongan', $id)->get();

        $jumlahSyaratKualifikasi = count($dataSyaratKualifikasi);

        if($dataLowongan == null){
            return response()->json(['messages' => 'Data Lowongan tersebut tidak ada']);
        }
        else{
            $dataLowongan->delete();

            if($jumlahSyaratKualifikasi > 0){
                for($i=0; $i < $jumlahSyaratKualifikasi; $i++){
                    $dataSyaratKualifikasi[$i]->delete();
                }
            }

            return response()->json(['messages' => 'Berhasil menghapus data Lowongan']);
        }

    }

}

