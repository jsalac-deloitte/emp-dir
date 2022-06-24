<?php

namespace App\Http\Controllers\Web;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
     /**
     * authenticate user credential
     */
    public function login(Request $request)
    {
        $userIs = $this->service->checkUserIfBlocked($request->email);
        if($userIs["blocked"])
        {
            return redirect("login")->with('errorMessage', $userIs["message"]);
        }
        $response =  $this->service->authenticate($request);

        if (!$response["success"]) {
            return redirect("login")->with('errorMessage', $response["message"]);
        }
        return redirect("products")->with('message', "Hi " , Auth::user()->email);
    }

    /**
     * remove token
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Inertia::render("auth/login");
    }

    /**
     * request for a password reset link
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $response = $this->service->sendResetPasswordLink($request);
        if (!$response["success"]) {
            Log::critical($response["message"]);
            return redirect()->back()->with('errorMessage', "Error Occured - please check it with your system administrator");
        }
        return redirect()->back()->with('message', "Hi, we send a reset link to your email.");
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
        }
        return redirect("login")->with('message', $response["message"]);
    }
}
