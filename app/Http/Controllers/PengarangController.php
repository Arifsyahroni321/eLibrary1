<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//tambhan
use App\Models\Pengarang;
use Illuminate\Support\Facades\DB;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengarang::all();
        return view('petugas.pengarang.page', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nm_pengarang' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'tlp' => 'required',
        ]);

        $data = [
            'nm_pengarang' => $request->nm_pengarang,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'tlp' => $request->tlp,
        ];
        DB::table('pengarang')->insert($data);

        return redirect()->route('petugasPengarang')->with('msg', ['type' => 'success', 'message' => 'Data Pengarang Berhasil Ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_pengarang' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'tlp' => 'required',
        ]);

        $pengarang = Pengarang::findOrFail($id);

        $data = [
            'nm_pengarang' => $request->nm_pengarang,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'tlp' => $request->tlp,
        ];

        $pengarang->update($data);
        return redirect()->route('petugasPengarang')->with('msg', ['type' => 'success', 'message' => 'Data Pengarang Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();
        return redirect()->route('petugasPengarang')->with('msg', ['type' => 'success', 'message' => 'Data Pengarang Berhasil Dihapus!']);
    }
}