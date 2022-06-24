<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Services\CompanyService;
use App\Http\Controllers\Web\BaseController;

class CompanyController extends BaseController
{
    public function __construct(CompanyService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Company ";
        $this->routes = [
            'main' => 'companies.display',
            'form' => 'company/form'
        ];
    }
}
