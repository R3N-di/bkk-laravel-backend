<?php

namespace App\Models;

use App\Models\Lamaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumni extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'alumni';

    protected $fillable = ['id', 'id_users', 'is_verified', 'is_lulusan', 'status'];

    /**
     * Get the users that owns the Alumni
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    /**
     * Get all of the lamaran for the Alumni
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lamaran(): HasMany
    {
        return $this->hasMany(Lamaran::class);
    }
}
