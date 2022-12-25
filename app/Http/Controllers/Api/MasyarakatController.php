<?php

namespace App\Http\Controllers\Api;

use App\Helpers\HttpClient;
use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasyarakatController extends Controller
{

    public function index($id)
    {

        $aspirasis = Aspirasi::query()->where("id_user", $id)->get();

        return response()->json([
            "status" => true,
            "data" => $aspirasis
        ], 200);
    }

    public function store(Request $request, $id)
    {

        $validation = Validator::make($request->all(), [
            "isi_aspirasi" => "required",
            "image" => "nullable|image|file|max:1024"
        ], [
            "isi_aspirasi.required" => "Keluhan Aspirasi harus di isi",
            "image.image" => "File harus berupa gambar",
            "image.max" => "Size gambar tidak boleh lebih dari 1mb"
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validation->errors()
            ], 422);
        }

        $aspirasi = Aspirasi::create([
            "isi_aspirasi" => $request->input('isi_aspirasi'),
            "image" => $request->file('image'),
            "id_user" => $id,
            "status" => 0
        ]);

        return response()->json([
            "status" => true,
            "data" => $aspirasi
        ], 201);
    }

    public function destroy($id)
    {
        // dd($id);
        $aspirasi = Aspirasi::query()->where('id', $id)
            ->where("status", 0)->first();

        if (!$aspirasi) {
            return response()->json([
                "status" => false,
                "errors" => "Aspirasi User tidak ditemukan"
            ], 404);
        }
        $aspirasi->delete();

        return response()->json([
            "status" => true,
            "data" => null
        ]);
    }
}
