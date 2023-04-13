<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisDendaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ModalContentController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\DataUsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/modal/{get}/{id}', [ModalContentController::class, 'home'])->name('modalHome');
    Route::middleware('isLogin')->prefix('rating')->group(function () {
        Route::get('/like/{id}', [RatingController::class, 'like'])->name('like');
        Route::get('/dislike/{id}', [RatingController::class, 'dislike'])->name('dislike');
    });
    Route::middleware('isLogin')->prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
        Route::get('/add/{id}', [WishlistController::class, 'store'])->name('addWishlist');
        Route::delete('/destroy/{id}', [WishlistController::class, 'destroy'])->name('destroyWishlist');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'wishlist'])->name('modalWishlist');
    });
    Route::middleware('isLogin')->prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi');
        Route::post('/add/{id}', [TransaksiController::class, 'store'])->name('addTransaksi');
        Route::delete('/destroy/{id}', [TransaksiController::class, 'destroy'])->name('destroyTransaksi');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'transaksi'])->name('modalTransaksi');
    });
    Route::middleware('isLogin')->prefix('notifikasi')->group(function () {
        Route::get('/', [NotifikasiController::class, 'index'])->name('notifikasi');
        Route::get('/clear', [NotifikasiController::class, 'clear'])->name('clearNotifikasi');
    });
    Route::get('page/{page}', [HomeController::class, 'index'])->name('page');
});

Route::prefix('auth')->group(function () {
    Route::middleware('isNotLogin')->get('/', [AuthController::class, 'index'])->name('login');
    Route::middleware('isNotLogin')->get('/login', [AuthController::class, 'index'])->name('login');
    Route::middleware('isNotLogin')->post('/login', [AuthController::class, 'login'])->name('loginAct');
    Route::middleware('isNotLogin')->get('/register', [AuthController::class, 'register'])->name('register');
    Route::middleware('isNotLogin')->post('/register', [AuthController::class, 'create'])->name('registerAct');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('isPetugas')->prefix('petugas')->group(function () {

    // Route::get('/', function () { return view('petugas.home'); })->name('petugasDashboard');
    Route::get('/' ,[DashboardController::class, 'index1'])->name('petugasDashboard');

    Route::prefix('buku')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('petugasBuku');
        Route::post('/', [BukuController::class, 'store'])->name('petugasStoreBuku');
        Route::put('/{id}', [BukuController::class, 'update'])->name('petugasUpdateBuku');
        Route::delete('/{id}', [BukuController::class, 'destroy'])->name('petugasDestroyBuku');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'buku'])->name('modalBuku');
    });
    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('petugasKategori');
        Route::post('/', [KategoriController::class, 'store'])->name('petugasStoreKategori');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'kategori'])->name('modalKategori');
        // Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroyKategori');
        // Route::put('/{id}', [KategoriController::class, 'update'])->name('updateKategori');
    });
    Route::prefix('penerbit')->group(function () {
        Route::get('/', [PenerbitController::class, 'index'])->name('petugasPenerbit');
        Route::post('/', [PenerbitController::class, 'store'])->name('petugasStorePenerbit');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'penerbit'])->name('modalPenerbit');
        // Route::delete('/{id}', [PenerbitController::class, 'destroy'])->name('destroyPenerbit');
        // Route::put('/{id}', [PenerbitController::class, 'update'])->name('updatePenerbit');
    });
    Route::prefix('pengarang')->group(function () {
        Route::get('/', [PengarangController::class, 'index'])->name('petugasPengarang');
        Route::post('/', [PengarangController::class, 'store'])->name('petugasStorePengarang');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'pengarang'])->name('modalPengarang');
        // Route::delete('/{id}', [PengarangController::class, 'destroy'])->name('destroyPenerbit');
        // Route::put('/{id}', [PengarangController::class, 'update'])->name('updatePenerbit');
    });
    Route::prefix('jenisDenda')->group(function () {
        Route::get('/', [JenisDendaController::class, 'index'])->name('petugasJenisDenda');
        Route::post('/', [JenisDendaController::class, 'store'])->name('petugasStoreJenisDenda');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'jenisDenda'])->name('modalJenisDenda');
        // Route::delete('/{id}', [PengarangController::class, 'destroy'])->name('destroyPenerbit');
        // Route::put('/{id}', [PengarangController::class, 'update'])->name('updatePenerbit');
    });

});
Route::middleware('isAdmin')->prefix('admin')->group(function (){
    // Route::get('/', function (){ return view('admin.home'); })->name('adminDashboard');
    Route::get('/' ,[DashboardController::class, 'index'])->name('adminDashboard');
    
    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('petugasPeminjaman');
        Route::post('/', [PeminjamanController::class, 'store'])->name('petugasStorePeminjaman');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'peminjaman'])->name('modalPeminjaman');
        // Route::delete('/{id}', [PengarangController::class, 'destroy'])->name('destroyPenerbit');
        Route::put('acc/{id}', [PeminjamanController::class, 'accept'])->name('petugasAccPeminjaman');
        Route::put('reject/{id}', [PeminjamanController::class, 'reject'])->name('petugasRejectPeminjaman');
    });
    Route::prefix('pengembalian')->group(function () {
        Route::get('/', [PengembalianController::class, 'index'])->name('petugasPengembalian');
        Route::post('/', [PengembalianController::class, 'store'])->name('petugasStorePengembalian');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'pengembalian'])->name('modalPengembalian');
        Route::get('/cekDenda/{id}', [PengembalianController::class, 'cekDenda'])->name('cekDenda');
        Route::get('/cekTarif/{id}/{jenis}', [PengembalianController::class, 'cekTarif'])->name('cekTarif');
    });
});
Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('adminDashboard');

    Route::prefix('user')->group(function () {
        Route::get('/', [DataUsersController::class, 'index'])->name('adminUser');
        Route::post('/', [DataUsersController::class, 'store'])->name('storeAdminUser');
        Route::put('/{id}', [DataUsersController::class, 'update'])->name('adminUpdateUser');
        Route::delete('/{id}', [DataUsersController::class, 'destroy'])->name('adminDestroyUser');
        Route::get('/modal/{get}/{id}', [ModalContentController::class, 'user'])->name('modalAdminUser');
    });
});
Route::get('about', function () {
    return view('anggota.aboutus');
    });
