<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\API\BaseController;

class UserController extends BaseController
{
    /**
     * inject the service
     */
    public function __construct(UserService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " User ";
    }
}
