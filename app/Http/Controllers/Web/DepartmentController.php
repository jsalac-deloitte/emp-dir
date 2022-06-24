<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Services\DepartmentService;
use App\Http\Controllers\Web\BaseController;

class DepartmentController extends BaseController
{
    public function __construct(DepartmentService $service)
    {
        $this->modelService = $service;
        $this->modelAlias = " Department ";
        $this->routes = [
            'main' => 'departments.display',
            'form' => 'department/form'
        ];
    }

    public function getCompanyDepartments($company_id)
    {
        try {
            return $this->modelService->getCompanyDepartments($company_id);
        } catch(\Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->back()->with(["message" => "Errors occurred please contact system administrator"], 500);
        }
    }
}
