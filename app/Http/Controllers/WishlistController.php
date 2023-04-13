<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Notifikasi;
use App\Models\Peminjaman;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class WishlistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataWishlist = Wishlist::with('buku')->where(['anggota_id' => $user->id])->get();
        $jmlPeminjaman = Peminjaman::where(['anggota_id' => $user->id])->count();
        $jmlWishlist = Wishlist::where(['anggota_id' => $user->id])->count();
        $jmlNotif = Notifikasi::where(['users_id' => $user->id, 'status' => 'unread'])->count();
        return view('anggota.wishlist.page', compact('dataWishlist', 'jmlPeminjaman', 'jmlWishlist', 'jmlNotif'));
    }
    public function store($id)
    {
        $user = Auth::user();
        $dataWishlist = Wishlist::where(['anggota_id' => $user->id, 'buku_id' => $id])->get()->first();
        if ($dataWishlist) {
            $dataWishlist->delete();
            $jmlWishlist = Wishlist::where(['anggota_id' => $user->id])->count();
            $response = [
                'ths' => 'bi-heart',
                'jmlWishlist' => $jmlWishlist,
                'message' => 'Dihapus dari Wishlist!'
            ];
            return response()->json($response, Response::HTTP_OK);
        } else {
            $data = [
                'anggota_id' => $user->id,
                'buku_id' => $id,
            ];
            DB::table('wishlist')->insert($data);
            $jmlWishlist = Wishlist::where(['anggota_id' => $user->id])->count();
            $response = [
                'ths' => 'bi-heart-fill text-danger',
                'jmlWishlist' => $jmlWishlist,
                'message' => 'Ditambahkan ke Wishlist!'
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
    public function destroy($id)
    {
        $user = Auth::user();
        Wishlist::where(['anggota_id' => $user->id, 'buku_id' => $id])->delete();
        return redirect()->route('wishlist')->with('msg', ['type' => 'success', 'message' => 'Data Buku Berhasil Dihapus dari Wishlist!']);
    }
}
