<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{

    public function index()
    {
        $aspirasis = Aspirasi::query()
            ->orderBy("status", "asc")
            ->orderBy("created_at", "asc")
            ->with('user')
            ->get();

        return response()->json([
            "status" => "success",
            "data" => $aspirasis
        ], 200);
    }

    public function show($id)
    {
        $aspirasi = Aspirasi::query()
            ->where("id", $id)
            ->with('user')
            ->first();

        return response()->json([
            "status" => true,
            "data" => $aspirasi
        ]);
    }
}
