<?php

use App\Helpers\HttpClient;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AuthController;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, "login"])
    ->name("login")
    ->middleware("noAuth");

Route::get("/logout", [AuthController::class, "logout"]);

Route::post("/login", [AuthController::class, "login"])
    ->name("auth.login")
    ->middleware("noAuth");

Route::get("/register", function () {
    return view('register');
})->middleware("noAuth");

Route::prefix("/admin")
    ->name("admin.")
    ->middleware("withAuth")
    ->group(function () {

        // Dashboard
        Route::get("/dashboard", [AdminController::class, "index"])->name("dashboard");
        Route::get("/create", [AdminController::class, "create"])->name("create");
        Route::post("/store", [AdminController::class, "store"])->name("store");

        // Aspirasi
        Route::get("/show/{id}/aspirasi", function ($id) {

            $responses = HttpClient::fetch(
                "GET",
                "http://localhost:8001/api/aspirasis/" . $id
            );

            $aspirasi = $responses["data"];

            Aspirasi::query()->where("id", $aspirasi["id"])->update([
                "status" => 1
            ]);

            return view("page.user.aspirasi.show", compact("aspirasi"));
        });


        Route::get("/profile", [AdminProfileController::class, "index"])->name("profile");
    });

Route::prefix("/masyarakat")
    ->name("masyarakat.")
    ->middleware("withAuth")
    ->group(function () {

        Route::get("/", [MasyarakatController::class, "index"])->name("index");

        Route::get("/create/aspirasi", [MasyarakatController::class, "create"])->name("create.aspirasi");

        Route::post("/store/aspirasi", [MasyarakatController::class, "store"])->name("store.aspirasi");

        Route::get("/delete/{id}/aspirasi", [MasyarakatController::class, "destroy"])->name("delete.aspirasi");
    });
