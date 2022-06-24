<?php

namespace App\Http\Services;

use App\Models\SmsLog;
use App\Http\Services\BaseService;
use App\Http\Requests\SmsLogRequest;

class SmsLogService extends BaseService
{
    public function __construct(SmsLog $model)
    {
        $this->model = $model;

		//will be use for data table searching
		$this->searchableColumns = $this->model->getFillable() ;

		// default value id
		$this->defaultSortKey =  ["created_at"] ;

        /**
         * instantiate the Request to validate the payload
         */
		$this->requestValidator = new SmsLogRequest;

        /**
         * model resource for formatting the response
         */
        $this->modelResource = "App\Http\Resources\SmsLogResource";

    }
}