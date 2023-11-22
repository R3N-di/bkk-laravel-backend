<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerusahaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_perusahaan' => $this->id,
            'nama_perusahaan' => $this->nama_perusahaan,
            'logo_perusahaan' => $this->logo_perusahaan,
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'kontak_perusahaan' => $this->kontak_perusahaan

        ];
    }
}
