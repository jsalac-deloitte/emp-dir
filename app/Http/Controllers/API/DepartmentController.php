<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Services\DepartmentService;
use App\Http\Controllers\API\BaseController;

class DepartmentController extends BaseController
{
    /**
     * inject the service
     */
    public function __construct(DepartmentService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " User ";
    }
}
