<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'nama' => 'Akhmad Lylana',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'gender' => 'L',
            'tgl_lahir' => '2000-09-19',
            'agama' => 'Islam',
            'alamat' => 'Jl. Pangeran Cakrabuana No. 17',
            'tlp' => '083121085114',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'nama' => 'Udin Petot',
            'username' => 'pustakawan123',
            'email' => 'pustakawan@gmail.com',
            'gender' => 'L',
            'tgl_lahir' => '2000-09-19',
            'agama' => 'Islam',
            'alamat' => 'Jl. Pangeran Cakrabuana No. 17',
            'tlp' => '083121085114',
            'email_verified_at' => now(),
            'password' => Hash::make('pustakawan123'),
            'role' => 'pustakawan',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'nama' => 'Sugiono',
            'username' => 'anggota123',
            'email' => 'anggota@gmail.com',
            'gender' => 'L',
            'tgl_lahir' => '2000-09-19',
            'agama' => 'Islam',
            'alamat' => 'Jl. Pangeran Cakrabuana No. 17',
            'tlp' => '083121085114',
            'email_verified_at' => now(),
            'password' => Hash::make('anggota123'),
            'role' => 'anggota',
            'remember_token' => Str::random(10),
        ]);
    }
}
