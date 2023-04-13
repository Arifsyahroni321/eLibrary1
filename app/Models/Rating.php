<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'rating';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['anggota_id', 'buku_id', 'action', 'tgl_rate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
