<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::as('companies.')
    ->controller(CompanyController::class)
    ->group(function () {
        Route::get("companies", "all")->name("list");
        Route::get("companies/{id}", "get")->name("get");
        Route::post("companies", "store")->name("store");
        Route::patch("companies/{id}", "update")->name("update");
        Route::delete("companies/{id}", "destroy")->name("destroy");
});

Route::as('users.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get("users", "all")->name("list");
        Route::get("users/{id}", "get")->name("get");
        Route::post("users", "store")->name("store");
        Route::patch("users/{id}", "update")->name("update");
        Route::delete("users/{id}", "destroy")->name("destroy");
});