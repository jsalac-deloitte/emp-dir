<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\SmsLogController;
use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\DepartmentController;

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

    // Route::get('/companies', function() {
    //     return Inertia::render("company");
    // });

    /**
     * company routes
     */
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
            Route::get("/companies/get-all/no-pagination", "allNoPagination")->name("listNoPagination");
    });

    /**
     * user routes
     */
    Route::as('users.')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/users', function () {
                return Inertia::render('user/index');
            })->name("display");
            Route::get('/users/form/add', function () {
                return Inertia::render('user/form');
            })->name("form");
            Route::post('/users', "store")->name("store");
            Route::get('/users/{id}', "get")->name("get");
            Route::patch('/users/{id}', "update")->name("update");
            Route::delete('/users/{id}', "destroy")->name("delete");

            //listing
            Route::get("/users/get-list/all", "all")->name("get-list");
            Route::get("/users/get-all/no-pagination", "allNoPagination")->name("listNoPagination");
    });

    /**
     * department routes
     */
    Route::as('departments.')
        ->controller(DepartmentController::class)
        ->group(function () {
            Route::get('/departments', function () {
                return Inertia::render('department/index');
            })->name("display");
            Route::get('/departments/form/add', function () {
                return Inertia::render('department/form');
            })->name("form");
            Route::post('/departments', "store")->name("store");
            Route::get('/departments/{id}', "get")->name("get");
            Route::patch('/departments/{id}', "update")->name("update");
            Route::delete('/departments/{id}', "destroy")->name("delete");

            //listing
            Route::get("/departments/get-list/all", "all")->name("get-list");
            Route::get("/departments/get-all/no-pagination/{company_id}", "getCompanyDepartments")->name("listNoPagination");

            /**
             * for sending sms
             */
            Route::post("departments/send-sms-to-employees", "sendSmsToEmployees")->name("send.sms");
    });

    /**
     * Employee routes
     */
    Route::as('employees.')
        ->controller(EmployeeController::class)
        ->group(function () {
            Route::get('/employees', function () {
                return Inertia::render('employee/index');
            })->name("display");
            Route::get('/employees/form/add', function () {
                return Inertia::render('employee/form');
            })->name("form");
            Route::post('/employees', "store")->name("store");
            Route::get('/employees/{id}', "get")->name("get");
            Route::patch('/employees/{id}', "update")->name("update");
            Route::delete('/employees/{id}', "destroy")->name("delete");

            //listing
            Route::get("/employees/get-list/all", "all")->name("get-list");
            Route::get("/employees/get-all/no-pagination", "allNoPagination")->name("listNoPagination");
    });

    /**
     * smslog routes
     */
    Route::as('smslogs.')
        ->controller(SmsLogController::class)
        ->group(function () {
            Route::get('/smslogs', function () {
                return Inertia::render('smslog/index');
            })->name("display");
            Route::get('/smslogs/form/add', function () {
                return Inertia::render('smslog/form');
            })->name("form");
            Route::post('/smslogs', "store")->name("store");
            Route::get('/smslogs/{id}', "get")->name("get");
            Route::patch('/smslogs/{id}', "update")->name("update");
            Route::delete('/smslogs/{id}', "destroy")->name("delete");

            //listing
            Route::get("/smslogs/get-list/all", "all")->name("get-list");
            Route::get("/smslogs/get-all/no-pagination", "allNoPagination")->name("listNoPagination");
    });

    // Route::post("/logout", [AuthController::class, "logout"])->name("logout");
});