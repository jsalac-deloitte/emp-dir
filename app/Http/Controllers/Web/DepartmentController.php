<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Http\Services\DepartmentService;

class DepartmentController extends BaseController
{
    public function __construct(DepartmentService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Department ";
        $this->routes = [
            'main' => 'departments.display',
            'form' => 'department/form'
        ];
    }
}
