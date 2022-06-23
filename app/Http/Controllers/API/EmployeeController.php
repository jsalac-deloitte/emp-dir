<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Services\EmployeeService;
use App\Http\Controllers\API\BaseController;

class EmployeeController extends BaseController
{
    /**
     * inject the service
     */
    public function __construct(EmployeeService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Employee ";
    }
}
