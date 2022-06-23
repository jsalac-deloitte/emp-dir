<?php

namespace App\Http\Services;

use App\Models\Company;
use App\Http\Services\BaseService;
use App\Http\Requests\CompanyRequest;

class CompanyService extends BaseService
{
    public function __construct(Company $model)
    {
        parent::__construct($model);

		//will be use for data table searching
		$this->searchableColumns = $this->model->getFillable();

		// default value id
		$this->defaultSortKey =  ["company_name"] ;

        /**
         * instantiate the Request to validate the payload
         */
		$this->requestValidator = new CompanyRequest;

        /**
         * model resource for formatting the response
         */
        $this->modelResource = "App\Http\Resources\CompanyResource";

    }
}