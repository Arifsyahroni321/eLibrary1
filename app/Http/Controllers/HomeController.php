<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Notifikasi;
use App\Models\Peminjaman;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index($page = 1)
    {
        $jmlPeminjaman =null;
        $jmlWishlist =null;
        $jmlNotif =null;
        if (Auth::check()) {
            $user = Auth::user();
            $jmlPeminjaman = Peminjaman::where(['anggota_id' => $user->id])->count();
            $jmlWishlist = Wishlist::where(['anggota_id' => $user->id])->count();
            $jmlNotif = Notifikasi::where(['users_id' => $user->id, 'status' => 'unread'])->count();
        }
        $limit = 20;
        $ofset = ($page * $limit) - $limit;
        $data = Buku::all()->skip($ofset)->take($limit);
        $allRow = Buku::all()->count();
        $sisa = ($allRow % 20) > 0 ? 1 : 0;
        // $jmlPage = 10; 
        $jmlPage = (int)floor($allRow / 20) + $sisa;
        return view('anggota.home.page', compact('data', 'jmlPeminjaman', 'jmlWishlist', 'jmlNotif', 'page', 'jmlPage'));
    }
}
