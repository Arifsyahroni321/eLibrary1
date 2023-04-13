<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'denda';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['jenis', 'keterangan', 'tarif'];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
