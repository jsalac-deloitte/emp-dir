<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CompanyController;

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


Route::middleware(['auth'])->group(function() {

    Route::get('/', function () {
        return Inertia::render("dashboard");
    });

    Route::get('/companies', function() {
        return Inertia::render("company");
    });


    Route::as('companies.')
    ->controller(CompanyController::class)
    ->group(function () {
        Route::get('/companies', function () {
            return Inertia::render('company/index');
        })->name("display");
        Route::get('/companies/form/add', function () {
            return Inertia::render('company/form');
        })->name("form");
        Route::post('/companies', "store")->name("store");
        Route::get('/companies/{id}', "get")->name("get");
        Route::patch('/companies/{id}', "update")->name("update");
        Route::delete('/companies/{id}', "destroy")->name("delete");

        //listing
        Route::get("/companies/get-list/all", "all")->name("get-list");
});


});