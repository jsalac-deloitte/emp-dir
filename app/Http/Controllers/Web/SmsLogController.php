<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Http\Services\SmsLogService;

class SmsLogController extends BaseController
{
    public function __construct(SmsLogService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Sms Log ";
        $this->routes = [
            'main' => 'smslogs.display',
            'form' => 'smslog/form'
        ];
    }
}
