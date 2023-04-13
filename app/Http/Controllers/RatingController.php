<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends Controller
{
    public function like($id)
    {
        $user = Auth::user();
        $dataRating = Rating::where(['anggota_id'=> $user->id, 'buku_id' => $id])->get()->first();
        if ($dataRating) {
            if ($dataRating->action == 'like') {
                $dataRating->delete();
                $dataBuku = Buku::findOrFail($id);
                $response = [
                    'likeVal' => $dataBuku->like,
                    'dislikeVal' => $dataBuku->dislike,
                    'other' => 'bi-hand-thumbs-down',
                    'ths' => 'bi-hand-thumbs-up'
                ];
                return response()->json($response, Response::HTTP_OK);
            } elseif ($dataRating->action == 'dislike') {
                DB::table('rating')->where(['anggota_id'=> $user->id, 'buku_id' => $id])->update(['action' => 'like']);
                $dataBuku = Buku::findOrFail($id);
                $response = [
                    'likeVal' => $dataBuku->like,
                    'dislikeVal' => $dataBuku->dislike,
                    'other' => 'bi-hand-thumbs-down',
                    'ths' => 'bi-hand-thumbs-up-fill text-primary'
                ];
                return response()->json($response, Response::HTTP_OK);
            } 
        } else {
            $data = [
                'action' => 'like',
                'anggota_id' => $user->id,
                'buku_id' => $id,
                'tgl_rate' => now(),
            ];
            DB::table('rating')->insert($data);
            $dataBuku = Buku::findOrFail($id);
            $response = [
                'likeVal' => $dataBuku->like,
                'dislikeVal' => $dataBuku->dislike,
                'other' => 'bi-hand-thumbs-down',
                'ths' => 'bi-hand-thumbs-up-fill text-primary'
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
    public function dislike($id)
    {
        $user = Auth::user();
        $dataRating = Rating::where(['anggota_id'=> $user->id, 'buku_id' => $id])->get()->first();
        if ($dataRating) {
            if ($dataRating->action == 'dislike') {
                $dataRating->delete();
                $dataBuku = Buku::findOrFail($id);
                $response = [
                    'likeVal' => $dataBuku->like,
                    'dislikeVal' => $dataBuku->dislike,
                    'other' => 'bi-hand-thumbs-up',
                    'ths' => 'bi-hand-thumbs-down'
                ];
                return response()->json($response, Response::HTTP_OK);
            } elseif ($dataRating->action == 'like') {
                DB::table('rating')->where(['anggota_id'=> $user->id, 'buku_id' => $id])->update(['action' => 'dislike']);
                $dataBuku = Buku::findOrFail($id);
                $response = [
                    'likeVal' => $dataBuku->like,
                    'dislikeVal' => $dataBuku->dislike,
                    'other' => 'bi-hand-thumbs-up',
                    'ths' => 'bi-hand-thumbs-down-fill text-primary'
                ];
                return response()->json($response, Response::HTTP_OK);
            } 
        } else {
            $data = [
                'action' => 'dislike',
                'anggota_id' => $user->id,
                'buku_id' => $id,
                'tgl_rate' => now(),
            ];
            DB::table('rating')->insert($data);
            $dataBuku = Buku::findOrFail($id);
            $response = [
                'likeVal' => $dataBuku->like,
                'dislikeVal' => $dataBuku->dislike,
                'other' => 'bi-hand-thumbs-up',
                'ths' => 'bi-hand-thumbs-down-fill text-primary'
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
    public function destroy()
    {

    }
}
