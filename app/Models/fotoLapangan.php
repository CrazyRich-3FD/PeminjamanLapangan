<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoLapangan extends Model
{
    use HasFactory;
    protected $table = 'foto_lapangan';
    protected $primaryKey = 'idfoto';
    protected $guarded = [];

    function lap()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'idlapangan');
    }
}
