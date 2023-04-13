<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Str;
use Carbon\Carbon;



class DashboardController extends Controller
{
    public function index()
    {
        $jml = DB::table('users')->count();
        // $ar_gender = DB::table('users')
        //     ->selectRaw('gender, count(gender) as jumlah')
        //     ->groupBy('gender')
        //     ->get();
        $ar_role = DB::table('users')
            ->selectRaw('role, count(role) as jumlah')
            ->groupBy('role')
            ->get();

        // $data = DB::table('users')
        // ->select([
        //     DB::raw('count(*) as jumlah'),               
        //     DB::raw('DATE(created_at) as tanggal')
        // ])->groupBy('tanggal')
        // ->orderBy('tanggal','desc')
        // ->get();
        $user_jan = User::whereMonth('created_at', '01')->count();
        $user_feb = User::whereMonth('created_at', '02')->count();
        $user_mar = User::whereMonth('created_at', '03')->count();
        $user_apr = User::whereMonth('created_at', '04')->count();
        $user_mei = User::whereMonth('created_at', '05')->count();
        $user_jun = User::whereMonth('created_at', '06')->count();
        $user_jul = User::whereMonth('created_at', '07')->count();
        $user_agus = User::whereMonth('created_at', '08')->count();
        $user_sep = User::whereMonth('created_at', '09')->count();
        $user_okt = User::whereMonth('created_at', '10')->count();
        $user_nov = User::whereMonth('created_at', '11')->count();
        $user_des = User::whereMonth('created_at', '12')->count();

        $ar_status = DB::table('users')->where('is_active', 'aktif')->count();
        $ar_status1 = DB::table('users')->where('is_active', 'nonaktif')->count();

        return view('admin.home', compact('ar_role','jml','ar_status','ar_status1',
        'user_jan','user_feb','user_mar','user_apr','user_mei','user_jun',
        'user_jul','user_agus','user_sep','user_okt','user_nov','user_des'        
    ));

    }
    public function index1(){
        $totalbuku = DB::table('buku')->count();
        $totalkategori = DB::table('kategori')->count();
        $totalpengarang = DB::table('pengarang')->count();
        $totalpenerbit = DB::table('penerbit')->count();
       
       $pemin_jan = Peminjaman::whereMonth('tgl_pinjam', '01')->count();
       $pemin_feb = Peminjaman::whereMonth('tgl_pinjam', '02')->count();
       $pemin_mar = Peminjaman::whereMonth('tgl_pinjam', '03')->count();
       $pemin_apr = Peminjaman::whereMonth('tgl_pinjam', '04')->count();
       $pemin_mei = Peminjaman::whereMonth('tgl_pinjam', '05')->count();
       $pemin_jun = Peminjaman::whereMonth('tgl_pinjam', '06')->count();
       $pemin_jul = Peminjaman::whereMonth('tgl_pinjam', '07')->count();
       $pemin_agus = Peminjaman::whereMonth('tgl_pinjam', '08')->count();
       $pemin_sep = Peminjaman::whereMonth('tgl_pinjam', '09')->count();
       $pemin_okt = Peminjaman::whereMonth('tgl_pinjam', '10')->count();
       $pemin_nov = Peminjaman::whereMonth('tgl_pinjam', '11')->count();
       $pemin_des = Peminjaman::whereMonth('tgl_pinjam', '12')->count();
        
       $pengem_jan = Pengembalian::whereMonth('tgl_kembali','01')->count();
       $pengem_feb = Pengembalian::whereMonth('tgl_kembali','02')->count();
       $pengem_mar = Pengembalian::whereMonth('tgl_kembali','03')->count();
       $pengem_apr = Pengembalian::whereMonth('tgl_kembali','04')->count();
       $pengem_mei = Pengembalian::whereMonth('tgl_kembali','05')->count();
       $pengem_jun = Pengembalian::whereMonth('tgl_kembali','06')->count();
       $pengem_jul = Pengembalian::whereMonth('tgl_kembali','07')->count();
       $pengem_agus = Pengembalian::whereMonth('tgl_kembali','08')->count();
       $pengem_sep = Pengembalian::whereMonth('tgl_kembali','09')->count();
       $pengem_okt = Pengembalian::whereMonth('tgl_kembali','10')->count();
       $pengem_nov = Pengembalian::whereMonth('tgl_kembali','11')->count();
       $pengem_des = Pengembalian::whereMonth('tgl_kembali','12')->count();
         
        return view('petugas.home', compact('totalbuku',
        'totalkategori','totalpengarang','totalpenerbit',
            'pemin_jan','pemin_feb','pemin_mar','pemin_apr',
            'pemin_mei','pemin_jun','pemin_jul','pemin_agus',
            'pemin_sep','pemin_okt','pemin_nov','pemin_des',

            'pengem_jan','pengem_feb','pengem_mar','pengem_apr',
            'pengem_mei','pengem_jun','pengem_jul','pengem_agus',
            'pengem_sep','pengem_okt','pengem_nov','pengem_des',
        
        ));

    }
}
