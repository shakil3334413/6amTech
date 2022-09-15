<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get("/", [LoginController::class, "showLoginForm"])->name("login.index");
Route::post("/", [LoginController::class, "login"])->name("login");
Route::post("/logout", [LoginController::class, "logout"])->name("logout");

//
Route::group(["prefix" => "product"], function () {
    Route::get("/", [ProductController::class, "index"])->name("product.index");
    Route::get("/get", [ProductController::class, "getData"])->name("product.get");
    Route::post("/", [ProductController::class, "store"])->name("product.store");
    Route::get("/edit/{id}", [ProductController::class, "edit"])->name("product.edit");
    Route::post("/update", [ProductController::class, "update"])->name("product.update");
    Route::post("/detele", [ProductController::class, "destroy"])->name("product.destroy");
    Route::post("/filter", [ProductController::class, "filter"])->name("product.filter");
});
