<?php

namespace App\Models;

use App\Models\Lamaran;
use App\Models\SyaratKualifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InputanKualifikasi extends Model
{
    use HasFactory;

    protected $table = 'inputan_kualifikasi';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_lamaran', 'id_syarat_kualifikasi', 'isi_inputan'
    ];

    /**
     * Get the lamaran that owns the InputanKualifikasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lamaran(): BelongsTo
    {
        return $this->belongsTo(Lamaran::class, 'id_lamaran', 'id');
    }

    /**
     * Get the syaratKualifikasi that owns the InputanKualifikasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function syaratKualifikasi(): BelongsTo
    {
        return $this->belongsTo(SyaratKualifikasi::class, 'id_syarat_kualifikasi');
    }


}
