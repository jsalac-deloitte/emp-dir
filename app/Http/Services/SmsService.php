<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SmsService 
{
    public function sendSms($payload)
    {

        $response = Http::post('https://api.itexmo.com/api/broadcast', [
                                'Email' => 'skilltest@mailinator.com',
                                'Password' => '12345678',
                                'Recipients' => $payload["mobile_nos"],
                                "Message" => $payload["message"],
                                "ApiCode" => "DE-SKILL290208_40VHI",
                                "SenderId" => "ITEXMO SMS"
                            ]);
        return json_decode($response, true);
    }
}