<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PeminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::all()->sortByDesc('id');
        return view('petugas.peminjaman.page', compact('data'));
    }

    public function accept($id)
    {
        $findPeminjaman =  DB::table('peminjaman')->where('id', $id);
        $findPeminjaman->update([
            'status' => 'accepted',
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7)
        ]);
        $dataPeminjaman = $findPeminjaman->first();
        $dataBuku = Buku::findOrFail($dataPeminjaman->buku_id);
        $dataNotif = [
            'tgl_notif' => now(),
            'users_id' => $dataPeminjaman->anggota_id,
            'pesan' => 'Permintaan Peminjaman Buku ' . $dataBuku->judul . ' Telah Disetujui!. Batas Pengembalian Buku hingga ' . now()->addDays(7)->translatedFormat('l, d F Y H:i') . ' WIB. Silahkan Mengambil Buku Pada Perpustakaan dan Selamat Membaca :).',
        ];
        DB::table('notifikasi')->insert($dataNotif);
        
        return redirect()->route('petugasPeminjaman')->with('msg', ['type' => 'success', 'message' => 'Peminjaman Berhasil Disetujui!']);
    }

    public function reject($id)
    {
        $findPeminjaman =  DB::table('peminjaman')->where('id', $id);
        $findPeminjaman->update(['status' => 'rejected']);
        $dataPeminjaman = $findPeminjaman->first();
        $dataBuku = Buku::findOrFail($dataPeminjaman->buku_id);
        $dataNotif = [
            'tgl_notif' => now(),
            'users_id' => $dataPeminjaman->anggota_id,
            'pesan' => 'Permintaan Peminjaman Buku ' . $dataBuku->judul . ' Telah Ditolak!, Hubungi Petugas Untuk Informasi Lebih Lanjut',
        ];
        DB::table('notifikasi')->insert($dataNotif);
        
        return redirect()->route('petugasPeminjaman')->with('msg', ['type' => 'success', 'message' => 'Peminjaman Berhasil Ditolak!']);
    }
}
