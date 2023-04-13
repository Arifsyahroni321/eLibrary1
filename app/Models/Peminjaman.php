<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'peminjaman';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['anggota_id', 'buku_id', 'tgl_pinjam', 'status'];

    public function anggota()
    {
        return $this->belongsTo(User::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
