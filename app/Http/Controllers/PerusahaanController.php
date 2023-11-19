<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PerusahaanStoreRequest;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan = Perusahaan::all();

        return response()->json([
            'data'=>$perusahaan
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerusahaanStoreRequest $request)
    {
        try{
            Perusahaan::create([
                'id' => Str::uuid(),
                'nama_perusahaan' => $request->nama_perusahaan,
                'logo_perusahaan' => $request->logo_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'kontak_perusahaan' => $request->kontak_perusahaan
            ]);
            return response()->json(['messages'=>'berhasil tambah'], 200);
        }catch(Exception  $e){
            return response()->json(['messages'=> 'ada yang salah',
        'error'=> $e], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perusahaan=Perusahaan::find($id);
        if(!$perusahaan){
            return response()->json(['messege'=>'Perusahaan tidak ditemukan'], 404);
        }
        return response()->json(['perusahaan' => $perusahaan], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerusahaanStoreRequest $request, string $id)
    {
        try{
            $perusahaan= Perusahaan::find($id);
            if(!$perusahaan){
                return response()->json([
                    'message'=>'Perusahaan Tidak Ditemukan'
                ],404);
            }
                $perusahaan->nama_perusahaan = $request->nama_perusahaan;
                $perusahaan->logo_perusahaan = $request->logo_perusahaan;
                $perusahaan->alamat_perusahaan = $request->alamat_perusahaan;
                $perusahaan->kontak_perusahaan = $request->kontak_perusahaan;

                $perusahaan->save();

            return response()->json(['messages'=>'Perusahaan berhasil Diubah'], 200);
        }catch(Exception  $e){
            return response()->json(['messages'=> 'ada yang salah',
        'error'=> $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan= Perusahaan::find($id);
            if(!$perusahaan){
                return response()->json([
                    'message'=>'Perusahaan Tidak Ditemukan'
                ],404);
            }
            $perusahaan->delete();
            return response()->json(['message'=>'Perusahaan Berhasil dihapus'], 200);
    }
}
