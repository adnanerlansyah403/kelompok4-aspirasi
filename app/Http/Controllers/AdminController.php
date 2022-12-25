<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        $responses = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/aspirasis"
        );

        $aspirasis = $responses["data"];
        // dd($aspirasis);

        return view("page.admin.index", compact("aspirasis"));
    }

    public function create()
    {

        $responses = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/admins"
        );

        $admins = $responses["data"];

        return view("page.admin.create", compact("admins"));
    }

    public function store(Request $request)
    {

        $responses = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/admins/store",
            $request->all()
        );

        if (isset($responses["errors"])) {
            return back()->withErrors($responses["errors"]);
        }

        // dd($responses);
        $user = $responses["data"];

        return redirect()->route("admin.create");
    }
}
