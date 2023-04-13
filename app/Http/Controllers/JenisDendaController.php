<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//tambhan
use App\Models\Denda;
use Illuminate\Support\Facades\DB;

class JenisDendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Denda::all();
        return view('petugas.jenisDenda.page', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'tarif' => 'required',
        ]);

        $data = [
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'tarif' => $request->tarif,
        ];
        DB::table('denda')->insert($data);

        return redirect()->route('petugasJenisDenda')->with('msg', ['type' => 'success', 'message' => 'Data Jenis Denda Berhasil Ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
            'tarif' => 'required',
        ]);

        $denda = Denda::findOrFail($id);

        $data = [
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'tarif' => $request->tarif,
        ];

        $denda->update($data);
        return redirect()->route('petugasJenisDenda')->with('success', 'Data Jenis Denda Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $denda = Denda::findOrFail($id);
        $denda->delete();
        return redirect()->route('petugasJenisDenda')->with('success', 'Data Jenis Denda Berhasil Dihapus!');
    }
}