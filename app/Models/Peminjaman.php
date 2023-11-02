<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Peminjaman extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'idpinjam';
    protected $guarded = [];

    function wk()
    {
        return $this->hasMany(waktuPeminjaman::class);
    }

    function lap()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'idlapangan');
    }

    function ul()
    {
        return $this->belongsTo(Ulasan::class, 'ulasan_id', 'idulasan');
    }

    function us()
    {
        return $this->belongsTo(User::class, 'user_id', 'iduser');
    }
}
