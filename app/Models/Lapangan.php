<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lapangan extends Model
{
    use HasFactory;
    protected $table = 'lapangan';
    protected $primaryKey = 'idlapangan';
    protected $guarded = [];
    
    public function jl()
    {
        return $this->belongsTo(jenisLapangan::class, 'jenis_id', 'idjenis');
    }

    function fl()
    {
        return $this->hasMany(fotoLapangan::class);
    }

    function pin()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
