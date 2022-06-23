<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Services\AuthService;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Controllers\API\BaseController;
use App\Http\Requests\ForgotPasswordRequest;

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


     /**
     * request for a password reset link
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $response = $this->service->sendResetPasswordLink($request);
        if (!$response["success"]) {
            return response()->json(['message' => "Error occured please try again later."], 400);
        }
        return response()->json(['message' => "Hi, we send a reset link to your email."], 200);
    }

    /**
     * Set New password
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $response = $this->service->resetPassword($request);
        if (!$response["success"]) {
            Log::critical("---Password Reset Request error----");
            Log::critical($response["message"]);
            return redirect()->back()->with('errorMessage', $response["message"]);
            return response()->json(['message' => $response["message"]], 400);
        }
        return response()->json(['message' => $response["message"]], 200);
    }

}
