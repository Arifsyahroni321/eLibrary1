<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//tambhan
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DataUsersController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('admin.user.page', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'is_active' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5000',
        ]);

        $cekEmail = DB::table('users')->where('email', $request->email)->first();
        $cekUname = DB::table('users')->where('username', $request->username)->first();

        if ($cekEmail) {
            return redirect()->route('adminUser')->with('msg', ['type' => 'danger', 'message' => 'Email (' . $request->email . ') Telah Digunakan! Gunakan Email Lainnya!']);
        } elseif ($cekUname) {
            return redirect()->route('adminUser')->with('msg', ['type' => 'danger', 'message' => 'Username (' . $request->username . ') Telah Digunakan! Gunakan Email Lainnya!']);
        }

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'gender' => $request->gender,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'is_active' => $request->is_active,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
        if (request()->file('foto')) {
            $data['foto'] = request()->file('foto')->store('img/avatar', 'public');
        }

        if ($request->role == 'anggota') {
            $uniq = uniqid();
            $uniq = substr($uniq, strlen($uniq) - 4, strlen($uniq));
            $data['no_anggota'] = Carbon::now()->format('m-y') . '-' . $uniq;
            User::create($data);
        } elseif ($request->role == 'pustakawan') {
            $createUser = User::create($data);
            $dataPetugas = [
                'nip' => $createUser->id . rand(1000000000, 9999999999),
            ];
            User::find($createUser->id)->update($dataPetugas);
        }

        return redirect()->route('adminUser')->with('msg', ['type' => 'success', 'message' => 'Data User Berhasil Ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'is_active' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5000',
        ]);

        $user = User::findOrFail($id);
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'gender' => $request->gender,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'is_active' => $request->is_active,
            'updated_at' => now(),
        ];
        if (request()->file('foto')) {
            if ($user->foto != 'img/avatar/default.jpg') Storage::disk('public')->delete($user->foto);
            $data['foto'] = request()->file('foto')->store('img/avatar', 'public');
        }

        if ($request->role != $user->role) {
            if ($user->role == 'anggota' && $request->role == 'pustakawan') {
                if ($user->nip == '' || $user->nip == NULL) {
                    $data['nip'] = $id . rand(1000000000, 9999999999);
                }
            } elseif ($user->role == 'pustakawan' && $request->role == 'anggota') {
                if ($user->no_anggota == '' || $user->no_anggota == NULL) {
                    $uniq = uniqid();
                    $uniq = substr($uniq, strlen($uniq) - 4, strlen($uniq));
                    $data['no_anggota'] = Carbon::now()->format('m-y') . '-' . $uniq;
                }
            }
        }
        $user->update($data);
        return redirect()->route('adminUser')->with('msg', ['type' => 'success', 'message' => 'Data User Berhasil Diubah!']);
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->foto != 'img/avatar/default.jpg') Storage::disk('public')->delete($user->foto);

        $user->delete();
        return redirect()->route('adminUser')->with('msg', ['type' => 'success', 'message' => 'Data User Berhasil Dihapus!']);
    }
}
