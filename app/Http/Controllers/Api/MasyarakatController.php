<?php

namespace App\Http\Controllers\Api;

use App\Helpers\HttpClient;
use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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

    public function edit($id)
    {

        $aspirasi = Aspirasi::query()->where("id", $id)->first();

        return response()->json([
            "status" => true,
            "data" => $aspirasi
        ], 200);
    }

    public function store(Request $request, $id)
    {

        $validation = Validator::make($request->all(), [
            "isi_aspirasi" => "required",
            "gambar" => "nullable|image|file|max:1024"
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

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store("gambar_aspirasi", "public");
        }

        $aspirasi = Aspirasi::create([
            "isi_aspirasi" => $request->input('isi_aspirasi'),
            "gambar" => isset($gambar) ? 'storage/' . $gambar : null,
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
        $aspirasi = Aspirasi::query()->where('id', $id)
            ->where("status", 0)->first();

        if (!$aspirasi) {
            return response()->json([
                "status" => false,
                "errors" => "Aspirasi User tidak ditemukan"
            ], 404);
        }

        file_exists($aspirasi->gambar) ?
            unlink(public_path($aspirasi->gambar)) :
            false;

        $aspirasi->delete();

        return response()->json([
            "status" => true,
            "data" => null
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "isi_aspirasi" => "required",
            "gambar" => "nullable|image|file|max:1024"
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validation->errors()
            ], 422);
        }

        $aspirasi = Aspirasi::query()->where("id", $id)->first();

        if (!$aspirasi) {
            return response()->json([
                "status" => false,
                "errors" => "Aspirasi User tidak ditemukan"
            ]);
        }

        if ($request->hasFile('gambar')) {
            file_exists($aspirasi->gambar) ?
                unlink(public_path($aspirasi->gambar)) :
                false;
            $gambar = $request->file("gambar")->store("gambar", "public");
        }

        $aspirasi->update([
            "isi_aspirasi" => $request->input('isi_aspirasi'),
            "gambar" => isset($gambar) ? 'storage/' . $gambar : $aspirasi->gambar,
        ]);

        return response()->json([
            "status" => true,
            "data" => $aspirasi
        ]);
    }
}
