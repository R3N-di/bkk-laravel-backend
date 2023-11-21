<?php

namespace App\Models;

use App\Models\Alumni;
use App\Models\Lowongan;
use App\Models\InputanKualifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamaran';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_lowongan', 'id_alumni'
    ];

    /**
     * Get the lowongan that owns the Lamaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }

    /**
     * Get the alumni that owns the Lamaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumni(): BelongsTo
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }

    /**
     * Get all of the inputanLamaran for the Lamaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inputanKualifikasi(): HasMany
    {
        return $this->hasMany(InputanKualifikasi::class, 'id_lamaran', 'id');
    }
}
