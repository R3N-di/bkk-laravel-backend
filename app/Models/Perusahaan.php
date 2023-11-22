<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table='perusahaan';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable=[
        'id','nama_perusahaan','logo_perusahaan','alamat_perusahaan','kontak_perusahaan'
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
