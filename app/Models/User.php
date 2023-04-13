<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     protected $table = 'users';
    protected $fillable = ['nama', 'email', 'username', 'password', 'role', 'gender', 'tgl_lahir', 'agama', 'alamat', 'tlp', 'foto', 'remember_token', 'is_active', 'no_anggota', 'nip'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
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
