<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function index ()
    {
        $buku = Buku::all();
        $response = [
            'message' => 'Menampilkan Seluruh Data Buku',
            'data' => $buku
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function show ($id)
    {
        $buku = Buku::find($id);
        if ($buku) {
            $response = [
                'message' => 'Menampilkan Data Buku Dengan Id ' . $id,
                'data' => $buku
            ];
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response = [
                'message' => 'Data Buku Dengan Id ' . $id . 'tidak ditemukan!',
            ];
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
