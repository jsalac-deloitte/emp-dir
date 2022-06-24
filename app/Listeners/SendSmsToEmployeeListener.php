<?php

namespace App\Listeners;

use App\Models\SmsLog;
use App\Models\Employee;
use App\Http\Services\SmsService;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSmsToEmployeeListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $records = json_decode(json_encode($event), true);
        $mobile_nos = [];
      
        foreach ($records["data"]["employees"] as $key => $value) {
            array_push($mobile_nos, $value["mobile_no"]);
        }

        $payload["mobile_nos"] = $mobile_nos;
        $payload["message"] = $records["data"]["message"];

        $response = SmsService::sendSms($payload);

        $smsLogs["message"] = $payload["message"];
        $smsLogs["payload"] = $payload;
        
        if ($response["Error"]){
            $smsLogs["error"] = true;
            $smsLogs["remarks"] = $response["message"];
            
        } else {
            $smsLogs["error"] = false;
            $smsLogs["remarks"] = $response["ReferenceId"];
        }

        $smsLogs["api_response"] = $response;
        
        $log = SmsLog::create($smsLogs);
    }
}
