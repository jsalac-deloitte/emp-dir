<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\AuthController;

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

Route::as('departments.')
    ->controller(DepartmentController::class)
    ->group(function () {
        Route::get("departments", "all")->name("list");
        Route::get("departments/{id}", "get")->name("get");
        Route::post("departments", "store")->name("store");
        Route::patch("departments/{id}", "update")->name("update");
        Route::delete("departments/{id}", "destroy")->name("destroy");
});

Route::as('employees.')
    ->controller(EmployeeController::class)
    ->group(function () {
        Route::get("employees", "all")->name("list");
        Route::get("employees/{id}", "get")->name("get");
        Route::post("employees", "store")->name("store");
        Route::patch("employees/{id}", "update")->name("update");
        Route::delete("employees/{id}", "destroy")->name("destroy");
});


Route::as("auth.")
    ->controller(AuthController::class)
    ->group(function() {
        Route::post("login", "login")->name("api.login");
        Route::post("forgot-password", "forgotPassword")->name("forgot.password");
        Route::post("reset-password", "resetPassword")->name("reset.password");
    });