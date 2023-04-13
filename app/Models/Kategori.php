<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table ='kategori';
    //mapping ke kolom2 fieldnya
    protected $fillable =['kode','nm_kategori'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
