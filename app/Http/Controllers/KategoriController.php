<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//tambhan
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return view('petugas.kategori.page', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nm_kategori' => 'required',
        ]);

        $data = [
            'kode' => $request->kode,
            'nm_kategori' => $request->nm_kategori,
        ];
        DB::table('kategori')->insert($data);

        return redirect()->route('petugasKategori')->with('msg', ['type' => 'success', 'message' => 'Data Kategori Berhasil Ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nm_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);

        $data = [
            'kode' => $request->kode,
            'nm_kategori' => $request->nm_kategori,
        ];

        $kategori->update($data);
        return redirect()->route('petugasKategori')->with('msg', ['type' => 'success', 'message' => 'Data Kategori Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('petugasKategori')->with('msg', ['type' => 'success', 'message' => 'Data Kategori Berhasil Dihapus!']);
    }
}