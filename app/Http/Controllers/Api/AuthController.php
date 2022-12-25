<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {


        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        return response()->json([
            "status" => true,
            "data" => [
                "logged" => true,
                "id_user" => $user->id
            ]
        ], 200);
    }
}
