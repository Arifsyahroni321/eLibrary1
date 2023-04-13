<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'pengarang';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['nm_pengarang', 'gender', 'alamat', 'tlp'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
