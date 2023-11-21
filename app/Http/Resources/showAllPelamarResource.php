<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showAllPelamarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_lamaran' => $this->id,
            'nama_pelamar' => $this->alumni->users->name,
            'jk_pelamar' => $this->alumni->users->jk,
            'email_pelamat' => $this->alumni->users->email
        ];
    }
}
