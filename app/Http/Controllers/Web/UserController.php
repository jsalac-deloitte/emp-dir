<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Controllers\Web\BaseController;

class UserController extends BaseController
{
    public function __construct(UserService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " User ";
        $this->routes = [
            'main' => 'users.display',
            'form' => 'user/form'
        ];
    }
}
