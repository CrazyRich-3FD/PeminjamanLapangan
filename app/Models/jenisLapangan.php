<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisLapangan extends Model
{
    use HasFactory;
    protected $table = 'jenis_lapangan';
    protected $primaryKey = 'idjenis';
    protected $guarded = [];

    function lapangan()
    {
        return $this->hasMany(Lapangan::class);
    }
}
