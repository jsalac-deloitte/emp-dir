<?php

namespace App\Http\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Services\BaseService;

class UserService extends BaseService
{
    public function __construct(User $model)
    {
        $this->model = $model;

		//will be use for data table searching
		$this->searchableColumns = array_merge($this->model->getFillable(), ["company.company_name"]);

		// default value id
		$this->defaultSortKey =  ["name"] ;

        /**
         * instantiate the Request to validate the payload
         */
		$this->requestValidator = new UserRequest;

        /**
         * model resource for formatting the response
         */
        $this->modelResource = "App\Http\Resources\UserResource";

    }
}