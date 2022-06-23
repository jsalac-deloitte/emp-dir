<?php

namespace App\Http\Services;

use App\Models\Employee;
use App\Http\Services\BaseService;
use App\Http\Requests\EmployeeRequest;

class EmployeeService extends BaseService
{
    public function __construct(Employee $model)
    {
        $this->model = $model;

		//will be use for data table searching
		$this->searchableColumns = $this->model->getFillable();

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
}