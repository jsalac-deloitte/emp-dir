<?php

namespace App\Http\Services;

use App\Models\Department;
use App\Http\Services\BaseService;
use Illuminate\Support\Facades\Log;
use App\Events\SendSmsToDepartmentEvent;
use App\Http\Requests\DepartmentRequest;


class DepartmentService extends BaseService
{
    public function __construct(Department $model)
    {
        $this->model = $model;

		//will be use for data table searching
		$this->searchableColumns = array_merge($this->model->getFillable(), ["company.company_name", "user.name"]);

		// default value id
		$this->defaultSortKey =  ["department_name"] ;

        /**
         * instantiate the Request to validate the payload
         */
		$this->requestValidator = new DepartmentRequest;

        /**
         * model resource for formatting the response
         */
        $this->modelResource = "App\Http\Resources\DepartmentResource";

    }

    public function getCompanyDepartments(int $company_id)
    {
        return $this->model
            ->with('company')
            ->whereRelation('company', 'companies.id', $company_id)
            ->get();
        
    }

    public function sendSmsToEmployees($request)
    {
        $departments = $this->model
            ->whereIn("id", $request->receiver)
            ->has("employees")
            ->get();
        $payload["departments"] = $departments;
        $payload["message"] = $request->message;
        SendSmsToDepartmentEvent::dispatch($payload);
        return true;
    }
}