<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $primaryKey = 'idulasan';
    protected $guarded = [];

    function pin()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
