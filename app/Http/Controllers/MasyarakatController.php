<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{

    public function index()
    {

        if (!session()->isStarted()) session()->start();

        $responses = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/masyarakat/" . session()->get("id_user") . "/aspirasi"
        );

        $aspirasis = $responses["data"];

        // dd($aspirasis);

        return view("page.user.index", compact("aspirasis"));
    }

    public function create()
    {
        return view("page.user.aspirasi.create");
    }

    public function store(Request $request)
    {

        if (!session()->isStarted()) session()->start();

        $responses = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/masyarakat/store/aspirasi/" . session()->get("id_user"),
            $request->all()
        );

        if (isset($responses["errors"])) {
            return back()->withErrors($responses["errors"]);
        }

        // dd($responses);

        return redirect()->route("masyarakat.index");
    }

    public function destroy($id)
    {
        if (!session()->isStarted()) session()->start();

        $responses = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/masyarakat/delete/" . $id . "/aspirasi"
        );

        if (isset($responses["errors"])) {
            return back()->withErrors($responses["errors"]);
        }

        return redirect()->back();
    }
}
