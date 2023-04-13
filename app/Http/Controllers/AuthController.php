<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (str_contains($req->username, '@')) {
            $cekUser = DB::table('users')->where('email', $req->username)->first();
            $data = [
                'email' => $req->username,
                'password' => $req->password,
            ];
        } else {
            $cekUser = DB::table('users')->where('username', $req->username)->first();
            $data = [
                'username' => $req->username,
                'password' => $req->password,
            ];
        }

        if (!$cekUser) {
            Session::flash('username', $req->username);
            return redirect()->route('login')->with('msg', ['type' => 'danger', 'message' => 'Username/Email (' . $req->username . ') Tidak Terdaftar!']);
        } else {
            if ($cekUser->is_active == 'nonaktif') {
                Session::flash('username', $req->username);
                return redirect()->route('login')->with('msg', ['type' => 'danger', 'message' => 'Akun Anda Tidak Aktif!']);
            } else {
                if (Auth::attempt($data)) {
                    $user = Auth::user();
                    if ($user->role == 'admin') {
                        return redirect()->route('adminDashboard')->with('msg', ['type' => 'success', 'message' => 'Selamat Datang ' . $cekUser->nama . '!']);
                    } elseif ($user->role == 'pustakawan') {
                        return redirect()->route('petugasDashboard')->with('msg', ['type' => 'success', 'message' => 'Selamat Datang ' . $cekUser->nama . '!']);
                    } elseif ($user->role == 'anggota') {
                        return redirect()->route('home')->with('msg', ['type' => 'success', 'message' => 'Selamat Datang ' . $cekUser->nama . '!']);
                    }
                } else {
                    Session::flash('username', $req->username);
                    return redirect()->route('login')->with('msg', ['type' => 'danger', 'message' => 'Password Anda Salah!']);
                }
            }
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'tlp' => 'required|numeric',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);
        $cekEmail = DB::table('users')->where('email', $req->email)->first();
        $cekUname = DB::table('users')->where('username', $req->username)->first();
        if ($cekEmail) {
            Session::flash('nama', $req->nama);
            Session::flash('alamat', $req->alamat);
            Session::flash('gender', $req->gender);
            Session::flash('agama', $req->agama);
            Session::flash('tgl_lahir', $req->tgl_lahir);
            Session::flash('tlp', $req->tlp);
            Session::flash('email', $req->email);
            Session::flash('username', $req->username);
            return redirect()->route('register')->with('msg', ['type' => 'danger', 'message' => 'Email (' . $req->email . ') Telah Digunakan! Gunakan Email Lainnya!']);
        } elseif ($cekUname) {
            Session::flash('nama', $req->nama);
            Session::flash('alamat', $req->alamat);
            Session::flash('gender', $req->gender);
            Session::flash('agama', $req->agama);
            Session::flash('tgl_lahir', $req->tgl_lahir);
            Session::flash('tlp', $req->tlp);
            Session::flash('email', $req->email);
            Session::flash('username', $req->username);
            return redirect()->route('register')->with('msg', ['type' => 'danger', 'message' => 'Username (' . $req->username . ') Telah Digunakan! Gunakan Username Lainnya!']);
        }
        
        $uniq = uniqid();
        $uniq = substr($uniq, strlen($uniq) - 4, strlen($uniq));
        $data = [
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'gender' => $req->gender,
            'tgl_lahir' => $req->tgl_lahir,
            'agama' => $req->agama,
            'tlp' => $req->tlp,
            'email' => strtolower($req->email),
            'username' => $req->username,
            'no_anggota' => Carbon::now()->format('m-y') .'-'. $uniq,
            'password' => Hash::make($req->password),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];

        User::create($data);

        $loginInfo = ['username' => $req->username, 'password' => $req->password];
        Auth::attempt($loginInfo);
        return redirect()->route('home')->with('msg', ['type' => 'success', 'message' => 'Selamat Datang ' . $req->nama . '!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('msg', ['type' => 'success', 'message' => 'Berhasil Logout!']);
    }
}
