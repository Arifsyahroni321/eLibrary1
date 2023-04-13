<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Peminjaman;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataPeminjaman = Peminjaman::with('buku')->where(['anggota_id' => $user->id])->get();
        $jmlPeminjaman = Peminjaman::where(['anggota_id' => $user->id])->count();
        $jmlWishlist = Wishlist::where(['anggota_id' => $user->id])->count();
        $jmlNotif = Notifikasi::where(['users_id' => $user->id, 'status' => 'unread'])->count();
        return view('anggota.transaksi.page', compact('dataPeminjaman', 'jmlPeminjaman', 'jmlWishlist', 'jmlNotif'));
    }

    public function store($id)
    {
        $user = Auth::user();
        $data = [
            'buku_id' => $id,
            'anggota_id' => $user->id,
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7)
        ];
        DB::table('peminjaman')->insert($data);
        return redirect()->route('transaksi')->with('msg', ['type' => 'success', 'message' => 'Permintaan Peminjamam Berhasil Diajukan! Silahkan Tunggu Konfirmasi dari Petugas!']);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        Peminjaman::where(['anggota_id' => $user->id, 'buku_id' => $id])->delete();
        return redirect()->back()->with('msg', ['type' => 'success', 'message' => 'Permintaan Peminjaman Berhasil Dibatalkan!']);
    }
}
