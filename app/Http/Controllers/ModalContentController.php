<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//tambhan
use App\Models\Buku;
use App\Models\Denda;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rating;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModalContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buku($get, $id)
    {
        $dataKategori = Kategori::all();
        $dataPenerbit = Penerbit::all();
        $dataPengarang = Pengarang::all();
        $dataBuku = Buku::all();
        if (is_numeric($id)) $dataBuku = Buku::findOrFail($id);
        return view('petugas.buku.modal', compact('get', 'dataKategori', 'dataPenerbit', 'dataPengarang', 'dataBuku'));
    }

    public function kategori($get, $id)
    {
        return view('petugas.kategori.modal');
    }

    public function penerbit($get, $id)
    {
        return view('petugas.penerbit.modal');
    }

    public function pengarang($get, $id)
    {
        return view('petugas.pengarang.modal');
    }

    public function jenisDenda($get, $id)
    {
        return view('petugas.jenisDenda.modal');
    }
    public function user($get, $id)
    {
       
        $dataUser = User::all();
        if (is_numeric($id)) $dataUser = User::findOrFail($id);
        return view('admin.user.modal', compact('get', 'dataUser'));
    }

    public function home($get, $id)
    {
        $dataBuku = Buku::findOrFail($id);
        $dataRating = null;
        $dataWishlist = null;
        $dataTransaksiPending = null;
        $dataTransaksiAcc = null;
        if (Auth::check()) {
            $user = Auth::user();
            $dataRating = Rating::where(['anggota_id'=> $user->id, 'buku_id' => $id])->get()->first();
            $dataTransaksiPending = Peminjaman::where(['anggota_id'=> $user->id, 'buku_id' => $id, 'status' => 'pending'])->get()->first();
            $dataTransaksiAcc = Peminjaman::where(['anggota_id'=> $user->id, 'buku_id' => $id, 'status' => 'accepted'])->get()->first();
            $dataWishlist = Wishlist::where(['anggota_id'=> $user->id, 'buku_id' => $id])->get()->first();
        }
        return view('anggota.home.modal', compact('get', 'dataBuku', 'dataRating', 'dataWishlist', 'dataTransaksiPending', 'dataTransaksiAcc'));
    }

    public function wishlist($get, $id)
    {
        $dataBuku = Buku::findOrFail($id);
        $user = Auth::user();
        $dataRating = Rating::where(['anggota_id'=> $user->id, 'buku_id' => $id])->get()->first();
        $dataTransaksiPending = Peminjaman::where(['anggota_id'=> $user->id, 'buku_id' => $id, 'status' => 'pending'])->get()->first();
        $dataTransaksiAcc = Peminjaman::where(['anggota_id'=> $user->id, 'buku_id' => $id, 'status' => 'accepted'])->get()->first();
        $dataWishlist = Wishlist::where(['anggota_id'=> $user->id, 'buku_id' => $id])->get()->first();
        return view('anggota.wishlist.modal', compact('get', 'dataBuku', 'dataRating', 'dataWishlist', 'dataTransaksiPending', 'dataTransaksiAcc'));
    }

    public function transaksi($get, $id)
    {
        $dataTransaksi = Peminjaman::with('buku')->where(['id' => $id])->get()->first();
        return view('anggota.transaksi.modal', compact('get', 'dataTransaksi'));
    }

    public function peminjaman($get, $id)
    {
        $data = Peminjaman::all()->where('id', $id)->first();
        // $test = Carbon::parse($data->tgl_kembali)->diffInDays(now());
        return view('petugas.peminjaman.modal', compact('get', 'data'));
    }
    
    public function pengembalian($get, $id)
    {
        $peminjaman = Peminjaman::all()->where('status', 'accepted');
        $denda = Denda::all();
        return view('petugas.pengembalian.modal', compact('get', 'peminjaman', 'denda'));
        // if (is_numeric($id)) {
        //     $dataPeminjaman = Peminjaman::all()->where('id', $id)->first();
        //     $jmlKeterlambatan = Carbon::parse($dataPeminjaman->tgl_kembali) < now() ? Carbon::parse($dataPeminjaman->tgl_kembali)->diffInDays(now()) * 5000 : '0';
        //     $jenisDenda = 1;
        //     if ($jmlKeterlambatan > 0) {
        //         $jenisDenda = 2;
        //     }
        // }
    }
}