<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if ($request->method() === 'GET') {
            return view('login');
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::query()
            ->where('email', $email)
            ->first();
        // dd($user);
        if ($user == null) {
            // dd($user);
            return redirect()->back()
                ->withErrors("Kredensial Tidak Valid!");
        }

        if (!Hash::check($password, $user->password)) {
            return redirect()->back()
                ->withErrors("Password Tidak Valid!");
        }

        $responses = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/auth/login",
            $request->all(),
        );

        $session = $responses["data"];

        $user = User::query()->where("id", $session["id_user"])->first();

        session()->put("id_user", $user->id);
        session()->put("role", $user->role);
        session()->put("logged", $session["logged"]);

        if ($user["role"] == 1) {
            return redirect()->route("admin.dashboard");
        }

        return redirect()->route('masyarakat.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
