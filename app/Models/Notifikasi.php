<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    //mappping ke table
    protected $table = 'notifikasi';
    //mapping ke kolom2 fieldnya
    protected $fillable = ['users_id', 'pesan', 'redirect'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
