<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class waktuPeminjaman extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    use HasFactory;
    protected $table = 'waktu_peminjaman';
    protected $primaryKey = 'idwaktu';
    protected $guarded = [];

    function pin()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'idpinjam');
    }
}
