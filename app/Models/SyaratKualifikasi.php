<?php

namespace App\Models;

use App\Models\Lowongan;
use App\Models\InputanKualifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SyaratKualifikasi extends Model
{
    use HasFactory;

    protected $table = 'syarat_kualifikasi';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_lowongan', 'field_kualifikasi', 'tipe_data',
        'isi_kualifikasi', 'is_nullable'
    ];

    /**
     * Get the lowongan that owns the SyaratKualifikasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }

    /**
     * Get the inputanKualifikasi associated with the SyaratKualifikasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inputanKualifikasi(): HasOne
    {
        return $this->hasOne(InputanKualifikasi::class);
    }
}
