<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'penerbit';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['nm_penerbit', 'alamat', 'tlp'];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
