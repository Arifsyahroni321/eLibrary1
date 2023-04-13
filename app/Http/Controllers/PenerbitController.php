<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//tambhan
use App\Models\Penerbit;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penerbit::all();
        return view('petugas.penerbit.page', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nm_penerbit' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);

        $data = [
            'nm_penerbit' => $request->nm_penerbit,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ];
        DB::table('penerbit')->insert($data);

        return redirect()->route('petugasPenerbit')->with('msg', ['type' => 'success', 'message' => 'Data Penerbit Berhasil Ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_penerbit' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);

        $penerbit = Penerbit::findOrFail($id);

        $data = [
            'nm_penerbit' => $request->nm_penerbit,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ];

        $penerbit->update($data);
        return redirect()->route('petugasPenerbit')->with('msg', ['type' => 'success', 'message' => 'Data Penerbit Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('petugasPenerbit')->with('msg', ['type' => 'success', 'message' => 'Data Penerbit Berhasil Dihapus!']);
    }
}