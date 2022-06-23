<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Services\AuthService;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    
    protected $service;

    /**
     * inject the service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request)
    {
        $userIs = $this->service->checkUserIfBlocked($request->email);
        if($userIs["blocked"])
        {
            return response()->json($userIs, $userIs["code"]);
        }
        $response =  $this->service->authenticate($request);
        return response()->json($response, $response["code"]);
    }
}
