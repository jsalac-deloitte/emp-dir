<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
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
}
