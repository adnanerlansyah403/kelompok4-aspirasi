<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AspirasiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MasyarakatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Routes Api Admin
Route::get("/admins", [AdminController::class, "index"]);
Route::post("/admins/store", [AdminController::class, "store"]);

// Routes Api Aspirasi 

Route::get("/aspirasis", [AspirasiController::class, "index"]);
Route::get("/aspirasis/{id}", [AspirasiController::class, "show"]);

// Routes Api User/Masyarakat
Route::get("/masyarakat/{id}/aspirasi", [MasyarakatController::class, "index"]);
Route::post("/masyarakat/store/aspirasi/{id}", [MasyarakatController::class, "store"]);
Route::post("/masyarakat/delete/{id}/aspirasi", [MasyarakatController::class, "destroy"]);

// Route Api Authentication
Route::post("/auth/login", [AuthController::class, "login"]);
