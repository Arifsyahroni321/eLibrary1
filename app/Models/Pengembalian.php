<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'pengembalian';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['tgl_kembali', 'petugas_id', 'peminjaman_id', 'denda_id', 'tarif'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
    public function petugas()
    {
        return $this->belongsTo(User::class);
    }
    public function denda()
    {
        return $this->belongsTo(Denda::class);
    }
}
