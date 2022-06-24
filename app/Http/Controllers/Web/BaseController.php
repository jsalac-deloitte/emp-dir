<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BaseController extends Controller
{
    protected $modelService;
    protected $modelAlias;
    protected $routes = [];


    /**
     * Display a listing of the resource with no pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function allNoPagination(Request $request)
    {
        try {
            return $this->modelService->getAllNoPagination($request->columns);
        } catch(\Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->back()->with(["message" => "Errors occurred please contact system administrator"], 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
       return $this->modelService->getAll($request);
    }

    public function get($id)
    {   
        $record = $this->modelService->find($id);
        return Inertia::render($this->routes['form'], ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate($this->modelService->requestValidator->rules($id));
        $record = $this->modelService->store($request, $id);
        return redirect()->route($this->routes['main'], $record["id"])->with(['message' => 'Success', 'data' => $record]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->modelService->requestValidator->rules());
        $record = $this->modelService->store($request);
        return redirect()->route($this->routes['main'], $record["id"])->with(['message' => 'Success', 'data' => $record]);
    }

    public function destroy($id)
    {
        $record = $this->modelService->delete($id);
        return redirect()->back()->with('status', "$this->modelAlias deleted!");    
    }
}
