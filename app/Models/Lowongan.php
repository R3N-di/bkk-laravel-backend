<?php

namespace App\Models;

use App\Models\Lamaran;
use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    // public $timestamps = false;

    protected $fillable = [
        'id_perusahaan', 'tanggal_tutup'
    ];

    /**
     * Get the perusahaan that owns the Lowongan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    /**
     * Get all of the lamaran for the Lowongan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lamaran(): HasMany
    {
        return $this->hasMany(Lamaran::class);
    }

}
