<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Pengembalian::all()->sortByDesc('id');
        return view('petugas.pengembalian.page', compact('data'));
    }

    public function cekDenda($id)
    {
        $dataPeminjaman = Peminjaman::all()->where('id', $id)->first();
        $jmlKeterlambatan = Carbon::parse($dataPeminjaman->tgl_kembali) < now() ? Carbon::parse($dataPeminjaman->tgl_kembali)->diffInDays(now()) : '0';
        $jenisDenda = 1;
        $tarif = 0;
        if ($jmlKeterlambatan > 0) $jenisDenda = 2;
        $tarif = $jmlKeterlambatan * 5000;
        $response = [
            'jmlKeterlambatan' => $jmlKeterlambatan,
            'jenisDenda' => $jenisDenda,
            'tarif' => 'Rp.'.number_format($tarif, 0, ',', '.'),
        ];

        return response()->json($response, Response::HTTP_OK);
    }
    public function cekTarif($id, $jenis)
    {
        $dataPeminjaman = Peminjaman::all()->where('id', $id)->first();
        $jmlKeterlambatan = Carbon::parse($dataPeminjaman->tgl_kembali) < now() ? Carbon::parse($dataPeminjaman->tgl_kembali)->diffInDays(now()) : '0';
        if($jenis == 1) {
            $tarif = 0;
        } elseif ($jenis == 2) {
            $tarif = $jmlKeterlambatan * 5000;
        } elseif ($jenis == 3) {
            $tarif = $dataPeminjaman->buku->harga + 5000;
        } elseif ($jenis == 4) {
            $tarif = $dataPeminjaman->buku->harga + 10000;
        }
        $response = [
            'tarif' => 'Rp.'.number_format($tarif, 0, ',', '.')
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $req)
    {
        $req->validate([
            'peminjaman' => 'required',
            'denda' => 'required',
            'tarif' => 'required'
        ]);

        $peminjaman = Peminjaman::all()->where('id', $req->peminjaman)->first();
        $denda = Denda::all()->where('id', $req->denda)->first();

        $user = Auth::user();

        $data = [
            'pustakawan_id' => $user->id,
            'peminjaman_id' => $req->peminjaman,
            'denda_id' => $req->denda,
            'tarif' => preg_replace("/[^0-9]/", "",$req->tarif),
            'tgl_kembali' => now()
        ];

        $dataNotif = [
            'tgl_notif' => now(),
            'users_id' => $peminjaman->anggota->id,
            'pesan' => 'Pengembalian Buku ' . $peminjaman->buku->judul . ' Anda Sukses!. Dengan Denda "' . $denda->jenis . '" dengan biaya '.$req->tarif,
        ];
        DB::table('pengembalian')->insert($data);
        DB::table('notifikasi')->insert($dataNotif);
        DB::table('peminjaman')->where('id', $req->peminjaman)->update(['status' => 'finish']);


        return redirect()->route('petugasPengembalian')->with('msg', ['type' => 'success', 'message' => 'Data Pengembalian Berhasil Ditambahkan!']);
    }
}
