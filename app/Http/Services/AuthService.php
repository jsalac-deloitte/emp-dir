<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AuthService
{

    public function checkUserIfBlocked($email):Array
    {
        $user = User::where("email", $email)->first();
        if($user && $user->blocked_until) {
            $now = Carbon::now();
            $banned = $now->lt($user->blocked_until);


            if ($banned) {
                $until = Carbon::parse($user->blocked_until)->setTimezone('Asia/Manila')->toDayDateTimeString();
                return [
                    "blocked" => true, 
                    "message" => "Sorry your account is still temporarily blocked. \n You may try again after ". $until ." \n Or call your system admin for assistance.", 
                    "code" => 403,
                ];
            }

        }
        return [
            "blocked" => false,
            "message" => "User can login",
            "code" => 200
        ];
    }

    /**
     * Authenticate user
     * @param Request $request
     * @return Array [$success, $message,$code]
     */
    public function authenticate(Request $request)
    {

        $credential = $request->only("email", "password");
        if (!Auth::attempt($credential, $request->remember)) {

            //Invalid credentials, check how many times user had tried to login
            $attempt = $this->failedAttempt($request->email);
            
            $message = "Incorrect Email or Password, Please check your credential and try again";
            if($attempt["blocked"]) {
                $message = "Sorry your account is temporarily blocked. \n You may try again at ". $attempt["until"] ." \n Or call your system admin for assistance.";
            }

            return [
                "success" => false, 
                "message" =>$message, 
                "code" => 401
            ];
        }

        //clear attempts
        $this->unBlockedUser($request->email);
        $token = Auth::user()->createToken('CPD Token')->accessToken;
        return [
            "token" => $token,
            "user" => Auth::user()->only(["name", "email"]),
            "code" => 200,
            "success" => true
        ];


    }


    /**
     * @param string $email 
     * @return Array [boolean $blocked, String $until]
     */
    public function failedAttempt(String $email):Array
    {
        $blocked = false;
        $until = "";
        $user = User::where("email", $email)->first();
        if($user) {
            $user->attempt = $user->attempt += 1;
            if ($user->attempt >= Config::get("auth.max_attempt")) {
                $until = Carbon::now()->addMinutes(Config::get('auth.blocked_minutes'));
                $user->blocked_until = $until;
                $user->attempt = 0;
                $blocked = true;
            }
            $user->save();
        }
        return ["blocked" => $blocked, "until" => $until ? $until->setTimezone('Asia/Manila')->toDayDateTimeString() :""];
    }


    /**
     * Clear attempt and unblocked user
     * @param @email
     * @return Boolean
     */
    public function unBlockedUser(String $email):bool
    {
        $user = User::where("email", $email)->first();
        $user->attempt = 0;
        $user->blocked_until = null;
        return (boolean) $user->save();
    }




    /**
     * Forgot Password
     * @param string $email
     * @return void
     */
    public function sendResetPasswordLink($request)
    {
        $token = Str::random(30);
        $user = User::where("email", $request->email)->first();
        DB::table("password_resets")->where("email", $request->email)->delete();
        DB::beginTransaction();
        try {
            DB::table("password_resets")->upsert([
                ["email" => $request->email, "token" => $token, "valid_until" => Carbon::now()->addMinutes(60)]
            ], ["email" => $request->email]);
    
            $data = array(
                "token"     => $token,
                "url"       => $request->url . "?token=".$token."&email=".$user->email,
                "name"      => $user->name,
                "email"     => $user->email
            );
       
            \Mail::to($user->email)->send(new ResetPasswordMail($data));
            DB::commit();
            return [
                "success" => true,
                "message" => "We send a reset link to your email. please check it now.",
                "code" => 200
            ];

        } catch (\Exception $ex) {
            DB::rollback();
            return [
                "success" => false,
                "message" => $ex->getMessage(),
                "code" => 500
            ];
        }
       
    }

    /**
     * Reset Password
     * @param string $token
     * @param string $email
     * @param string $password
     * @param string $confirm_password
     */
    public function resetPassword($request)
    {
        $status = false;
        $msg =  "Invalid Token - Please try to request new reset link ";
        $pr = DB::table("password_resets")->where("email", $request->email)->where("token", $request->token)->first();
        try {
            if ((bool)$pr) {
                DB::beginTransaction();
                $now = Carbon::now();
                $valid = $now->lessThan($pr->valid_until);
                if($valid) {
                    $user = User::where("email", $pr->email)->first();
                    $user->update(["password" => $request->password, "blocked_until" => null, "attempt" => 0]);
                    DB::table("password_resets")->where("email", $pr->email)->delete();
                    $status = true;
                    $msg =  "Password successfully changed - you can try to login now." ;
                    DB::commit();
                } else {
                    $msg =  "Token Expired - please try to request new reset link ";
                }
                return array(
                    "message" => $msg,
                    "success" => $status,
                    "code"    => $valid ? 200 : 410
                );
            }
        } catch (\Throwable $th) {
            //throw $th;
            return array(
                "message" => $th->getMessage(),
                "success" => $status,
                "code"    => 500
            );
        }
    
    }

}