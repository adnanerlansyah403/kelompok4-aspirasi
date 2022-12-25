<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {

        $admins = User::query()->where("role", 1)->orderBy("id", "DESC")->get();

        return response()->json([
            "status" => true,
            "data" => $admins
        ], 200);
    }

    public function create()
    {
        return view("page.admin.create");
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            "nama" => "required",
            "email" => "required|email",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ], [
            "nama.required" => "Nama wajib di isi",
            "email.required" => "Email wajib di isi",
            "password.required" => "Password wajib di isi",
            "password_confirmation.required" => "Password confirmation wajib di isi",
            "password_confirmation.same" => "Password Confirmation harus wajib sama dengan field password",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validation->errors()
            ], 422);
        }

        $user = User::create([
            "nama" => $request->input("nama"),
            "email" => $request->input("email"),
            "password" => bcrypt($request->input("password")),
            "role" => 1
        ]);

        return response()->json([
            "status" => true,
            "data" => $user
        ], 201);
    }
}
