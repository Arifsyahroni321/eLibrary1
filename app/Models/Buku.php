<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table ='buku';

    protected $fillable =['kode','judul','tahun',
    'penerbit_id','kategori_id','pengarang_id', 'sinopsis', 'stok', 'cover', 'harga'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjamam::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
