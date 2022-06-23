<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Services\CompanyService;
use App\Http\Controllers\API\BaseController;

class CompanyController extends BaseController
{
    //
    public function __construct(CompanyService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Company ";
    }
}
