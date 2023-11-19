<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LowonganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_lowongan' => $this->id,
            'tanggal_tutup' => $this->tanggal_tutup,
            'alamat_perusahaan' => $this->perusahaan->alamat_perusahaan,
            'gambar' => $this->gambar
        ];
    }
}
