<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//tambhan
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::all();
        return view('petugas.buku.page', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'sinopsis' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5000',
        ]);

        $kategori = Kategori::findOrFail($request->kategori);
        $uniq = uniqid();
        $uniq = substr($uniq, strlen($uniq) - 4, strlen($uniq));
        $kategori = $kategori->kode . '-' . $uniq;

        $data = [
            'kode' => $kategori,
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'kategori_id' => $request->kategori,
            'penerbit_id' => $request->penerbit,
            'pengarang_id' => $request->pengarang,
            'sinopsis' => $request->sinopsis,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        if (request()->file('cover')) {
            $data['cover'] = request()->file('cover')->store('img/cover', 'public');
        }

        DB::table('buku')->insert($data);

        return redirect()->route('petugasBuku')->with('msg', ['type' => 'success', 'message' => 'Data Buku Berhasil Ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'sinopsis' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:5000',
        ]);

        $buku = Buku::findOrFail($id);
        $data = [
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'kategori_id' => $request->kategori,
            'penerbit_id' => $request->penerbit,
            'pengarang_id' => $request->pengarang,
            'sinopsis' => $request->sinopsis,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'updated_at' => now(),
        ];

        if (request()->file('cover')) {
            if ($buku->cover != 'img/cover/default.jpg') Storage::disk('public')->delete($buku->cover);
            $data['cover'] = request()->file('cover')->store('img/cover', 'public');
        }
        
        $buku->update($data);

        return redirect()->route('petugasBuku')->with('msg', ['type' => 'success', 'message' => 'Data Buku Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku->cover != 'img/cover/default.jpg') Storage::disk('public')->delete($buku->cover);

        $buku->delete();
        return redirect()->route('petugasBuku')->with('msg', ['type' => 'success', 'message' => 'Data Buku Berhasil Dihapus']);
    }
}
