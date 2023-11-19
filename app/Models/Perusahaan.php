<?php

namespace App\Models;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_perusahaan', 'logo_perusahaan',
        'alamat_perusahaan', 'kontak_perusahaan'
    ];

    /**
     * Get all of the lowongan for the Perusahaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lowongan(): HasMany
    {
        return $this->hasMany(Lowongan::class);
    }
}
