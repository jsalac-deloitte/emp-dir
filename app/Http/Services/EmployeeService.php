<?php

namespace App\Http\Services;

use App\Models\Employee;
use App\Http\Services\BaseService;
use Illuminate\Support\Facades\Log;
use App\Events\SendSmsToEmployeeEvent;
use App\Http\Requests\EmployeeRequest;

class EmployeeService extends BaseService
{
    public function __construct(Employee $model)
    {
        $this->model = $model;

		//will be use for data table searching
		$this->searchableColumns = array_merge($this->model->getFillable(), ["company.company_name", "department.department_name"]);

		// default value id
		$this->defaultSortKey =  ["last_name", "first_name"] ;

        /**
         * instantiate the Request to validate the payload
         */
		$this->requestValidator = new EmployeeRequest;

        /**
         * model resource for formatting the response
         */
        $this->modelResource = "App\Http\Resources\EmployeeResource";

    }

    public function sendSmsToEmployees($request)
    {
        $employees = $this->model
            ->whereIn("id", $request->receiver)
            ->get();

        $payload["employees"] = $employees;
        $payload["message"] = $request->message;
        SendSmsToEmployeeEvent::dispatch($payload);
        return true;
    }
}