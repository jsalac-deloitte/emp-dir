<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Services\EmployeeService;
use App\Http\Controllers\Web\BaseController;

class EmployeeController extends BaseController
{
    public function __construct(EmployeeService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Employee ";
        $this->routes = [
            'main' => 'employees.display',
            'form' => 'employee/form'
        ];
    }

    /**
     * send sms to employee
     * get employees by their department id
     */
    public function sendSmsToEmployees(Request $request)
    {
        try {
            return $this->modelService->sendSmstoEmployees($request);
        } catch(\Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->back()->with(["message" => "Errors occurred please contact system administrator"], 500);
        }
    }
}
